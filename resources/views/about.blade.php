@extends("layouts.app")
@section("content")

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="my-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">À propos de nous</li>
        </ol>
    </div>
</nav>
<!-- Mission and Objectives Section -->

@if(!$missions->isEmpty())

@foreach ($missions as $mission)
@if($mission->id % 2 == 0)
<section class="mission-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid about-img" style="max-width:100%; height: auto;" src="{{'storage/missions/'.$mission->image}}" alt="{{$mission->title}}">
            </div>
            <div class="col-md-6">
                <h2>{{$mission->title}}</h2>
                <p>
                    {!!$mission->description!!}
                </p>

            </div>

        </div>
    </div>
</section>
@else
<section class="mission-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>{{$mission->title}}</h2>
                <p>
                    {!!$mission->description!!}
                </p>

            </div>
            <div class="col-md-6">
                <img class="img-fluid about-img" style="max-width:100%; height: auto;" style="width:500px; height: auto;" src="{{'storage/missions/'.$mission->image}}" alt="{{$mission->title}}">
            </div>
        </div>
    </div>
</section>
@endif
@endforeach
@else
<p class="text-center">Nous n'avons rien n'afficher !</p>
@endif


@endsection
