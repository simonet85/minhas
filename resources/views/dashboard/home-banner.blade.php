@extends("dashboard.layouts.app")
@section("content")
@include("dashboard.partials._menu")
@include("dashboard.partials._sidebar")

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Banniére</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Gestion</li>
                <li class="breadcrumb-item active">Banniére</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Banniére</h5>

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <!-- General Form Elements -->
                        <form method="POST" action="{{route("homebanner.store")}}" class="g-3  was-validated" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <label for="inputText" class=" col-form-label">Titre</label>
                                    <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" placeholder="Ex: Bienvenue l'association des droits ...." required>

                                    @error('title')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <label for="inputText" class=" col-form-label">Slogan</label>
                                    <input type="text" class="form-control @error('slogan') is-invalid @enderror" name="slogan" value="{{ old('slogan')}}" placeholder="Ex: Travailler ensemble pour l'égalité des ..." required>

                                    @error('slogan')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <label for="inputText" class=" col-form-label">Bouton d'appel à l'action</label>
                                    <input type="text" name="button" value="{{old('button')}}" class="form-control @error('button') is-invalid @enderror" placeholder="Ex: Devenir Membre" required>

                                    @error('button')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <label for="inputNumber" class=" col-form-label">Téléserver Fichier</label>
                                    <input class="form-control @error('file') is-invalid @enderror" type="file" id="formFile" name="file" required>

                                    @error('file')
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

</main><!-- End #main -->
@endsection
