@extends("dashboard.layouts.app")
@section("content")
@include("dashboard.partials._menu")
@include("dashboard.partials._sidebar")

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Banniéres</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Gestion</li>
                <li class="breadcrumb-item active">Banniéres</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section dashboard">

        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Top Selling -->
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">

                            <div class="filter px-3">
                                <a class="btn btn-primary text-white btn-sm" data-toggle="tooltip" data-placement="left" title="Ajouter" href="{{route("homebanner.create")}}">
                                    <i class="bi bi-plus-square"></i>
                                </a>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Toutes les banniéres</h5>

                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                @if (!$homeBanners->isEmpty())

                                <table class="table table-borderless" style="width=100%">
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col">Selectionner</th> --}}
                                            <th scope="col">Aperçu</th>
                                            <th scope="col">Titre</th>
                                            <th scope="col">Slogan</th>
                                            <th scope="col" style="width=30%">Button d'appel</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($homeBanners as $homeBanner)

                                        <tr>
                                            {{-- <td class="fw-bold text-center">
                                                <input class="form-check-input" type="checkbox" name="banner_ids[]" value="{{$homeBanner->id}}">
                                            </td> --}}
                                            <th scope="row">
                                                <a href="#">
                                                    <img src="{{asset('storage/banners/'.$homeBanner->file)}}" alt="">
                                                </a>
                                            </th>
                                            <td>
                                                <a href="#" class="text-primary fw-bold">{{$homeBanner->getTitle()}}</a>
                                            </td>
                                            <td>{{$homeBanner->getSlogan()}}</td>
                                            <td class="fw-bold">{{$homeBanner->button}}</td>

                                            <td class="d-flex justify-content-between ">
                                                <button data-bs-toggle="modal" data-bs-target="#delete-{{$homeBanner->id}}" data-toggle="tooltip" data-placement="left" title="Supprimer" type="button" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
                                                {{-- Delete Modal start --}}
                                                @include("dashboard.modals.banner-delete-modal")
                                                {{-- Modal Ends  --}}

                                                {{-- Edit Button  --}}
                                                <button data-bs-toggle="modal" data-bs-target="#edit-{{$homeBanner->id}}" data-toggle="tooltip" data-placement="left" title="Modifier" type="button" class="btn btn-sm btn-success text-white">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>

                                                {{--Edit Modal start --}}
                                                @include("dashboard.modals.banner-edit-modal")
                                                {{-- Modal Ends  --}}
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="alert alert-danger" role="alert">
                                    La liste des Banniéres est vide. <a href="{{route("homebanner.create")}}" class="alert-link">
                                        Créer une nouvelle Banniére</a>
                                </div>
                                @endif

                                {{ $homeBanners->links();}}


                            </div>

                        </div>
                    </div><!-- End Top Selling -->

                </div>


            </div><!-- End Left side columns -->
        </div>


    </section>

</main><!-- End #main -->
@endsection
