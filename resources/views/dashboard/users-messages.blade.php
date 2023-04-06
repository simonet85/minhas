@extends("dashboard.layouts.app")
@section("content")
@include("dashboard.partials._menu")
@include("dashboard.partials._sidebar")

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Messages</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Gestion</li>
                <li class="breadcrumb-item active">Messages</li>
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
                                {{-- @include("dashboard.modals.supportservice-modal-add") --}}
                                {{-- Modal Ends  --}}
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Messages</h5>

                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                @if (!$messages->isEmpty())

                                <table id="users-table" class="table table-borderless" style="width=100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col" class="w-10">Email</th>
                                            <th scope="col" class="w-40">Messages</th>
                                            <th scope="col">Dates</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i=1;
                                        @endphp
                                        @foreach ($messages as $message)

                                        <tr>

                                            <td scope="row">
                                                {{$i++;}}
                                            </td>
                                            <td>
                                                <a href="#" class="text-primary fw-bold">{{$message->name}}</a>
                                            </td>
                                            <td class="w-10">
                                                <a href="#" class="text-primary fw-bold">{{$message->email}}</a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-primary fw-bold w-40">{{$message->getMessage()}}</a>
                                            </td>
                                            <td>{{$message->created_at}}</td>


                                            <td class="d-flex justify-content-between">
                                                <button data-bs-toggle="modal" data-bs-target="#delete-{{$message->id}}" data-toggle="tooltip" data-placement="left" title="Supprimer" type="button" class="btn btn-sm btn-danger mr-5">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
                                                {{-- Delete Modal start --}}
                                                @include("dashboard.modals.usermessage-modal-delete")
                                                {{-- Modal Ends  --}}

                                                {{-- Edit Button  --}}
                                                <button data-bs-toggle="modal" data-bs-target="#edit-{{$message->id}}" data-toggle="tooltip" data-placement="left" title="Reponse" type="button" class="btn btn-sm btn-info text-white">
                                                    <i class="bi bi-reply"></i>
                                                </button>

                                                {{--Edit Modal start --}}
                                                @include("dashboard.modals.usermessage-modal-edit")
                                                {{-- Modal Ends  --}}
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="alert alert-danger" role="alert">
                                    La liste des messages est vide.
                                </div>
                                @endif
                            </div>
                        </div>
                    </div><!-- End Top Selling -->
                    {{-- {{ $messages->links() }} --}}
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

</main><!-- End #main -->
@endsection
