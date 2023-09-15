@extends("dashboard.layouts.app")
@section("content")
@include("dashboard.partials._menu")
@include("dashboard.partials._sidebar")

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Missions et Objectifs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Gestion</li>
                <li class="breadcrumb-item active">Missions et Objectifs </li>
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
                                <button class="btn btn-primary text-white btn-sm" data-bs-toggle="modal" data-bs-target="#add-mission" data-toggle="tooltip" data-placement="left" title="Ajouter" href="{{route("lastnews.create")}}">
                                    <i class="bi bi-plus-square"></i>
                                </button>
                                @include("dashboard.modals.mission-add-modal")
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Missions et Objectifs </h5>

                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                @if (!$missionObjectifs->isEmpty())

                                <table class="table table-borderless" width="100">
                                    <thead>
                                        <tr>
                                            <th scope="col">Images</th>
                                            <th scope="col">Titres</th>
                                            <th scope="col">Textes</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($missionObjectifs as $missionObjectif)

                                        <tr>

                                            <th scope="row">
                                                <a href="#">
                                                    <img src="{{asset('storage/missions/'.$missionObjectif->image)}}" alt="">
                                                </a>
                                            </th>
                                            <td>
                                                <a href="#" class="text-primary fw-bold">{{$missionObjectif->title}}</a>
                                            </td>
                                            <td>{!!$missionObjectif->getdescription()!!}</td>

                                            <td class="d-flex justify-content-between">
                                                <button data-bs-toggle="modal" data-bs-target="#delete-{{$missionObjectif->id}}" data-toggle="tooltip" data-placement="left" title="Supprimer" type="button" class="btn btn-sm btn-danger mr-5">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                {{-- Delete Modal start --}}
                                                @include("dashboard.modals.mission-delete-modal")
                                                {{-- Modal Ends  --}}

                                                {{-- Edit Button  --}}
                                                <button data-bs-toggle="modal" data-bs-target="#edit-{{$missionObjectif->id}}" data-toggle="tooltip" data-placement="left" title="Modifier" type="button" class="btn btn-sm btn-success text-white">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>

                                                {{--Edit Modal start --}}
                                                @include("dashboard.modals.mission-edit-modal")
                                                {{-- Modal Ends  --}}
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="alert alert-danger" role="alert">
                                    La liste est vide. <a href="{{route("lastnews.create")}}" class="alert-link">
                                        Créer une nouvelle Section</a>
                                </div>
                                @endif
                                {{$missionObjectifs->links()}}
                            </div>
                        </div>
                    </div><!-- End Top Selling -->
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

</main><!-- End #main -->
@endsection
