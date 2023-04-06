@extends("dashboard.layouts.app")
@section("content")
@include("dashboard.partials._menu")
@include("dashboard.partials._sidebar")

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Sections</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Gestion</li>
                <li class="breadcrumb-item active">Sections</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sections</h5>

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <!-- General Form Elements -->
                        <form method="POST" action="{{route("homesections.store")}}" class="g-3" novalidate>
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <label for="inputText" class=" col-form-label">Titre de la section</label>
                                    <select name="section_name" class="form-select @error('section_name') is-invalid @enderror" id="validationCustom04" required="">
                                        <option selected="" disabled="" value="">Choisir...</option>
                                        <option value="intro">Intro</option>
                                        <option value="service">Service</option>
                                        <option value="mission">Mission</option>
                                        <option value="plaidoyer">Plaidoyer</option>
                                    </select>
                                    {{-- <input type="text" name="section_name" value="{{old('section_name')}}" class="form-control @error('section_name') is-invalid @enderror" placeholder="Ex: Introduction ou Service" required> --}}

                                    @error('section_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <label for="inputText" class=" col-form-label">En-tête de la section</label>
                                    <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" placeholder="Ex: Bienvenue l'association des droits ...." required>

                                    @error('title')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <label for="inputPassword" class=" col-form-label">Texte</label>
                                    <textarea placeholder="Entrer notre texte ici" class="form-control @error('text') is-invalid @enderror" name="message" id="editor" cols="30" rows="5" required></textarea>
                                    @error('text')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <label for="inputText" class=" col-form-label">Bouton d'appel à l'action</label>
                                    <input type="text" name="button" value="{{old('button')}}" class="form-control @error('button') is-invalid @enderror" placeholder="Ex: Rejoignez-nous aujourd'hui.">

                                    @error('button')
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


        </div>
    </section>


    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

    </script>

</main><!-- End #main -->
@endsection
