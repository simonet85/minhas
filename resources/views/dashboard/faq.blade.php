@extends("dashboard.layouts.app")
@section("content")
@include("dashboard.partials._menu")
@include("dashboard.partials._sidebar")

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Questions fréquentes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Gestion</li>
                <li class="breadcrumb-item active">Questions fréquentes</li>
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
                                <button class="btn btn-primary text-white btn-sm" data-bs-toggle="modal" data-bs-target="#modal-add-faq" data-toggle="tooltip" data-placement="left" title="Ajouter" href="{{route("faq.create")}}">
                                    <i class="bi bi-plus-square"></i>
                                </button>
                                {{--Add Modal start --}}
                                @include("dashboard.modals.faq-modal-add")
                                {{-- Modal Ends  --}}
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Questions fréquentes</h5>

                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                @if (!$faqs->isEmpty())

                                <table class="table table-borderless" style="width=100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Titres</th>
                                            <th scope="col">Descriptions</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($faqs as $faq)

                                        <tr>

                                            <td>
                                                <a href="#" class="text-primary fw-bold">{!!$faq->getTitle()!!}</a>
                                            </td>
                                            <td>{!!$faq->getDesc()!!}</td>


                                            <td class="d-flex justify-content-between">
                                                <button data-bs-toggle="modal" data-bs-target="#delete-{{$faq->id}}" data-toggle="tooltip" data-placement="left" title="Supprimer" type="button" class="btn btn-sm btn-danger mr-5">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
                                                {{-- Delete Modal start --}}
                                                @include("dashboard.modals.faq-modal-delete")
                                                {{-- Modal Ends  --}}

                                                {{-- Edit Button  --}}
                                                <button data-bs-toggle="modal" data-bs-target="#edit-{{$faq->id}}" data-toggle="tooltip" data-placement="left" title="Modifier" type="button" class="btn btn-sm btn-success text-white">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>

                                                {{--Edit Modal start --}}
                                                @include("dashboard.modals.faq-modal-edit")
                                                {{-- Modal Ends  --}}
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="alert alert-danger" role="alert">
                                    La liste des Questions fréquentes est vide. <button data-bs-toggle="modal" data-bs-target="#modal-add-faq" class="btn btn-danger">
                                        Créer une nouvelle questions fréquente </button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div><!-- End Top Selling -->
                    {{ $faqs->links() }}
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

</main><!-- End #main -->
@endsection
