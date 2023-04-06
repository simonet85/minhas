@extends("dashboard.layouts.app")
@section("content")
@include("dashboard.partials._menu")
@include("dashboard.partials._sidebar")

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Événement</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Gestion</li>
                <li class="breadcrumb-item active">Événement</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">{{ $event->title }}</div>

                    <div class="card-body">
                        <h4>Description:</h4>
                        <p>{{ $event->description }}</p>
                        <p><strong>Date/Heure de début:</strong> {{ Carbon\Carbon::parse($event->start_time)->format('d-m-Y à H:i') }}</p>
                        <p><strong>Date/Heure de fin:</strong> {{ Carbon\Carbon::parse($event->end_time)->format('d-m-Y à H:i') }}</p>
                        <p><a class="btn btn-primary" href="{{ route("calendarevents.index") }}">Retour aux événements</a></p>
                    </div>
                </div>
            </div>
    </section>

</main><!-- End #main -->
@endsection
