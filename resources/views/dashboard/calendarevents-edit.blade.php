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
                    <div class="card-body">
                        <h5 class="card-title">Modifier Événement</h5>

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <!-- General Form Elements -->
                        <form method="POST" action="{{route("calendarevents.update", $event->id)}}" class="g-3  ">
                            @csrf
                            @method("PUT")
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <label for="inputText" class=" col-form-label">Titre</label>
                                    <input type="text" name="title" value="{{$event->title}}"" class=" form-control @error('title') is-invalid @enderror" placeholder="Ex: Bienvenue l'association des droits ....">

                                    @error('title')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <label for="inputPassword" class=" col-form-label">Description</label>
                                    <textarea placeholder="Entrer notre texte ici" class="form-control @error('description') is-invalid @enderror" name="description" id="calendar" cols="30" rows="5">{!!$event->description!!}"</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <label class=" col-form-label" for="start_time">Date/Heure de début:</label>
                                    <input type="datetime-local" name="start_time" id="start_time" value="{{ $event->start_time }}" class="form-control @error('start_time') is-invalid @enderror">

                                    @error('start_time')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <label class=" col-form-label" for="end_time">Date/Heure de fin:</label>
                                    <input type="datetime-local" name="end_time" id="end_time" value="{{ $event->end_time }}" class="form-control @error('end_time') is-invalid @enderror">

                                    @error('end_time')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Créer</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>
            </div>
    </section>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#calendar'))
            .catch(error => {
                console.error(error);
            });
    </script>
</main><!-- End #main -->
@endsection
