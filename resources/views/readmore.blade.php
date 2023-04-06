@extends("layouts.app")
@section("content")
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="my-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('index')}}">Accueil</a></li>
            <li class="breadcrumb-item " aria-current="page"> <a href="{{route('development')}}">Development</a> </li>
            <li class="breadcrumb-item active" aria-current="page">Plus de details</li>
        </ol>
    </div>
</nav>

<!-- Professional Development Opportunities -->
<section class="container mb-5">
    <h1>{{$profesional->title}}</h1>
    <p><strong>Organisation:</strong> {{$profesional->entreprise}}</p>
    <p><strong>Description:</strong> {!!$profesional->description!!}</p>
    {{-- <p><strong>Date:</strong> Disponible toute l'année, durée du stage de 6 mois à 1 an</p> --}}
    <p><strong>Date de début:</strong> {{\Carbon\Carbon::parse($profesional->date)->format('d-m-Y')}}</p>
    <p><strong>Date de fin:</strong> {{\Carbon\Carbon::parse($profesional->end_date)->format('d-m-Y')}}</p>
    <p><strong>Lieu:</strong> {{$profesional->venue}}</p>
    <p><strong>Coût:</strong> {{$profesional->cost}}</p>
    <p><strong>Objectifs du stage:</strong></p>
    <p>{!!$profesional->course_objectives!!}</p>
    <p><strong>Public cible:</strong> {{$profesional->target_audience}}</p>
    <a href="#" class="btn btn-primary">S'inscrire</a>
</section>

@endsection
