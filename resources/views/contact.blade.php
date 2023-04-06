@extends("layouts.app")
@section("content")
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="my-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="./contact.html">Contacter Nous</a></li>
            <li class="breadcrumb-item "></li>
        </ol>
    </div>
</nav>

<section class="container my-5">
    <div class="row">
        <div class="col-lg-6">
            <h2>Nous Contacter</h2>
            <p>Vous avez une question ou un commentaire ? Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.</p>


            {{-- @if(session('success')) --}}
            <div id="flash-message"></div>

            {{-- @endif --}}
            {{-- method="POST" action="{{route("messages.store")}}" class="" --}}
            <form id="contact-form" onsubmit="submitForm(event)" novalidate>
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Nom:</label>
                    <input name="name" type="text" class="form-control " id="name" placeholder="Entrez votre Nom">

                    <span class="text-danger" id="name-error"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email:</label>
                    <input name="email" type="email" class="form-control " id="email" placeholder="Entrez votre Email">

                    <span class="text-danger" id="email-error"></span>

                </div>
                <div class="form-group mb-3">
                    <label for="name">Objet:</label>
                    <input name="subject" type="text" class="form-control " id="subject" placeholder="Entrez l'objet">
                    <span class="text-danger" id="subject-error"></span>
                </div>
                <div class="form-group mb-3">
                    <label for="message">Message:</label>
                    <textarea name="message" class="form-control " id="message" rows="5" placeholder="Entrez votre message"></textarea>

                    <span class="text-danger" id="message-error"></span>
                </div>
                <button id="contact-btn" type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
        <div class="col-lg-6">
            <h2>Notre situation géographique</h2>
            <p>1234 Rue principale<br>Abidjan, CI 12345</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3468.7701689837677!2d-122.1399565848848!3d37.42420947981246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f8e2a719d1a43%3A0x7466168c94a034c9!2sGolden%20Gate%20Bridge!5e0!3m2!1sen!2sus!4v1615227653749!5m2!1sen!2sus" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
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
