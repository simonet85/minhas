@extends("layouts.app")
@section("content")
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="my-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Actualités</li>
        </ol>
    </div>
</nav>

<!-- News and Events  -->
<section class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-4">Actualités</h2>
            {{-- {{dd($latestNews)}} --}}
            @if (!$latestNews->isEmpty())
            @foreach ($latestNews as $latestNew)

            <div class="card mb-4">

                <div class="card-body">
                    <h5 class="card-title">{{$latestNew->title}}</h5>
                    <p class="card-text">{!!$latestNew->text!!}</p>
                    <a href="#" class="btn btn-primary">{{$latestNew->button}}</a>
                </div>

            </div>

            @endforeach
            @else
            <div>
                <p class="text-center">Pas d'informations pour l'instant .</p>
            </div>
            @endif

        </div>

        <div class="col-md-4">
            <div class="list-group">
                <h2 class="mb-2">Événements à venir</h2>
                @if (isset($validEvents))

                @foreach ($validEvents as $event)
                <a href="#" class="list-group-item list-group-item-action">{{ $event->title }}
                    <p class="fst-italic">{{ Carbon\Carbon::parse($event->start_time)->format('d-m-Y à H:i')  }}</p>
                </a>
                @endforeach

                @else
                <p class="fst-italic">Pas d'événements pour l'instant.</p>
                @endif

            </div>

            <div class="list-group">
                <h2 class="mb-2 mt-4">Événements passés</h2>
                @if (isset($invalidEvents))

                @foreach ($invalidEvents as $event)
                <a href="#" class="list-group-item list-group-item-action">{{ $event->title }}
                    <p class="fst-italic">{{ Carbon\Carbon::parse($event->start_time)->format('d-m-Y à H:i')  }}</p>
                </a>
                @endforeach

                @else
                <p class="fst-italic">Pas d'événements pour l'instant.</p>
                @endif

            </div>
        </div>
    </div>
    {{$latestNews->links()}}
</section>
@endsection
