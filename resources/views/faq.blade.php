@extends("layouts.app")
@section("content")
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="my-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./contact.html">Contacter Nous</a></li>
            <li class="breadcrumb-item active" aria-current="page">Questions générales</li>
        </ol>
    </div>
</nav>


<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <h1>Questions fréquemment posées</h1>
            <p class="lead">Voici quelques questions courantes que nous recevons de nos membres.</p>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-lg-12">
            <div class="accordion" id="accordionExample">
                @forelse ($faqs as $faq)

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{$faq->id}}" aria-expanded="true" aria-controls="collapseOne">
                            {{$faq->title}}
                        </button>
                    </h2>
                    <div id="collapseOne-{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {!!$faq->description!!}
                        </div>
                    </div>
                </div>

                @empty
                <p class="text-center">Nous n'avons aucune information pour l'instant !</p>
                @endforelse

            </div>
        </div>
    </div>
</div>
@endsection
