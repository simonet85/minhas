@extends("dashboard.layouts.app")
@section("content")
@include("dashboard.partials._menu")
@include("dashboard.partials._sidebar")

<main id="main" class="main">

    <div class="pagetitle">
        <h1>services aux membres</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Gestion</li>
                <li class="breadcrumb-item active">services aux membres</li>
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
                                <button class="btn btn-primary text-white btn-sm" data-bs-toggle="modal" data-bs-target="#modal-add-supportservice" data-toggle="tooltip" data-placement="left" title="Ajouter" href="{{route("supportservices.create")}}">
                                    <i class="bi bi-plus-square"></i>
                                </button>
                                {{--Add Modal start --}}
                                @include("dashboard.modals.supportservice-modal-add")
                                {{-- Modal Ends  --}}
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">services aux membres</h5>

                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                @if (!$services->isEmpty())

                                <table class="table table-borderless" style="width=100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Titres</th>
                                            <th scope="col">Descriptions</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)

                                        <tr>

                                            <td>
                                                <a href="#" class="text-primary fw-bold">{!!$service->getTitle()!!}</a>
                                            </td>
                                            <td>{!!$service->getDesc()!!}</td>


                                            <td class="d-flex justify-content-between">
                                                <button data-bs-toggle="modal" data-bs-target="#delete-{{$service->id}}" data-toggle="tooltip" data-placement="left" title="Supprimer" type="button" class="btn btn-sm btn-danger mr-5">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                {{-- Delete Modal start --}}
                                                @include("dashboard.modals.supportservice-modal-delete")
                                                {{-- Modal Ends  --}}

                                                {{-- Edit Button  --}}
                                                <button data-bs-toggle="modal" data-bs-target="#edit-{{$service->id}}" data-toggle="tooltip" data-placement="left" title="Modifier" type="button" class="btn btn-sm btn-success text-white">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>

                                                {{--Edit Modal start --}}
                                                @include("dashboard.modals.supportservice-modal-edit")
                                                {{-- Modal Ends  --}}
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="alert alert-danger" role="alert">
                                    La liste des opportinutés est vide. <button data-bs-toggle="modal" data-bs-target="#modal-add" class="btn btn-danger">
                                        Créer une nouvelle opportinutés </button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div><!-- End Top Selling -->
                    {{ $services->links() }}
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

</main><!-- End #main -->
@endsection
