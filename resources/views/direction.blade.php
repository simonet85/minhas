@extends("layouts.app")
@section("content")
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="my-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Direction et conseil d'administration</li>
        </ol>
    </div>
</nav>

<!-- Board of Directors -->
<section class="container mb-5">
    <h2 class="mb-4">Conseil d'administration</h2>

    <div class="row">
        @if(!$directions->isEmpty())
        @foreach ($directions as $direction)

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img style="width:350px; height: auto;" src="{{'storage/directions/'.$direction->photo}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$direction->name}}</h5>
                    <p class="card-text">{{$direction->attribute}}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <p class="text-center">Nous n'avons rien afficher !</p>
        @endif
    </div>
</section>
<!-- Management Team -->
{{-- <section class="container mb-5">
    <h2 class="mb-4">Équipe de direction</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">John Doe</h5>
                    <p class="card-text">Président
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Jane Smith</h5>
                    <p class="card-text">Vice-président</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Mark Johnson</h5>
                    <p class="card-text">Trésorier</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Maria Rodriguez</h5>
                    <p class="card-text">Secrétaire</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">David Lee</h5>
                    <p class="card-text">Directeur</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Karen Chen</h5>
                    <p class="card-text">Directeur</p>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection
