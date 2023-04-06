@extends("layouts.app")
@section("content")
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="my-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">développement professionnel</li>
        </ol>
    </div>
</nav>

<!-- Professional Development Opportunities -->
<section class="container mb-5">
    <h2 class="mb-4">Possibilités de développement professionnel</h2>
    @if(!$profesionals->isEmpty())

    <div class="row">
        <div class="col-md-12">
            @foreach ($profesionals as $profesional)

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{$profesional->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Organisation: {{$profesional->entreprise}}</h6>
                    <p class="card-text">{!!$profesional->description!!}</p>
                    <p>Créer le : {{\Carbon\Carbon::parse($profesional->created_at)->format('d-m-Y')}}</p>
                    <a href="{{route('readmore',$profesional->id)}}" class="card-link">Plus d'information</a>
                </div>
            </div>

            @endforeach
            @else
            <p class="text-center">Nous n'avons aucune formations pour l'instant !</p>
            @endif

        </div>
    </div>

    <!-- Pagination  -->
    {{$profesionals->links()}}
    </div>
</section>

@endsection
