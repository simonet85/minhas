@extends("layouts.app")
@section("content")
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="my-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Support</li>
        </ol>
    </div>
</nav>
<section class="container my-5">
    <h2 class="mb-4">Soutien et services aux membres</h2>
    <div class="row">
        <div class="col-md-6 mb-4">
            <h4>Prenez contact avec nous</h4>
            {{-- @if(session('success')) --}}
            <div id="flash-message"></div>

            {{-- @endif --}}
            {{-- method="POST" action="{{route("messages.store")}}" class="" --}}
            <form id="contact-form" onsubmit="submitForm(event)" novalidate>
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Nom:</label>
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Entrez votre Nom">

                    <span class="text-danger" id="name-error"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Entrez votre Email">

                    <span class="text-danger" id="email-error"></span>

                </div>
                <div class="form-group mb-3">
                    <label for="name">Objet:</label>
                    <input name="subject" type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" placeholder="Entrez l'objet">

                    <span class="text-danger" id="subject-error"></span>
                </div>
                <div class="form-group mb-3">
                    <label for="message">Message:</label>
                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="message" rows="5" placeholder="Entrez votre message"></textarea>

                    <span class="text-danger" id="message-error"></span>
                </div>
                <button id="contact-btn" type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
        <div class="col-md-6 mb-4">
            <h4>Les avantages de l'adhésion</h4>
            <div class="accordion" id="membershipBenefitsAccordion">

                @forelse ($services as $service)

                <div class="accordion-item">
                    <h2 class="accordion-header" id="exclusiveContentHeader-{{$service->id}}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#exclusiveContentCollapse-{{$service->id}}" aria-expanded="false" aria-controls="exclusiveContentCollapse">
                            {{$service->title}}
                        </button>
                    </h2>
                    <div id="exclusiveContentCollapse-{{$service->id}}" class="{{$service->id ==1 ? 'accordion-collapse collapse show' : 'accordion-collapse collapse '}}" aria-labelledby="exclusiveContentHeader-{{$service->id}}" data-bs-parent="#membershipBenefitsAccordion">
                        <div class="accordion-body">
                            {!!$service->description!!}
                        </div>
                    </div>
                </div>

                @empty

                <p class="text-center">Nous n'avons aucun avantage à vous proposer pour l'instant !</p>
                @endforelse
                {{$services->links()}}
            </div>
        </div>

    </div>
</section>
<script>
    function submitForm(event) {
        event.preventDefault();

        let formData = $("#contact-form").serialize(); // Serialize the form data
        $.ajax({
            type: "POST"
            , url: "{{route('messages.store')}}"
            , data: formData
            , success: function(response) {
                    // Show a success message for 5 seconds
                    $('#flash-message').addClass('alert alert-success').text('Votre message a été envoyé !').fadeIn();
                    setTimeout(function() {
                        $('#flash-message').fadeOut().removeClass('alert alert-success').text('');
                    }, 5000);
                    // Clear the form inputs
                    $('#contact-form')[0].reset();
                }

            , error: function(xhr, status, error) {
                // Handle any errors that occur
                const errors = JSON.parse(xhr.responseText).errors

                $.each(errors, function(key, value) {

                    // Errors below the inputs 
                    const selector = '#' + key + '-error';
                    $(selector).html('<span>' + value[0] + '</span>');
                    // Errors for inputs
                    const inputElement = $('#' + key);
                    inputElement.addClass('is-invalid');
                    const errorElement = $('#' + key + '-error');
                    errorElement.text(value[0]);

                });
            }
        });


    }

</script>
@endsection
