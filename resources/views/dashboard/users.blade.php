@extends("dashboard.layouts.app")
@section("content")
@include("dashboard.partials._menu")
@include("dashboard.partials._sidebar")

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Utilisateurs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Gestion</li>
                <li class="breadcrumb-item active">Utilisateurs</li>
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
                                <a class="btn btn-primary text-white btn-sm" data-toggle="tooltip" data-placement="left" title="Imprimer" href="{{route("users.print")}}">
                                    <i class="bi bi-printer"></i>
                                </a>
                                <a class="btn btn-primary text-white btn-sm" data-bs-toggle="modal" data-bs-target="#upload" data-toggle="tooltip" data-placement="left" title="Importer un fichier .csv" href="{{route("users.print")}}">
                                    <i class="bi bi-upload"></i>
                                </a>
                                {{--Edit Modal start --}}
                                @include("dashboard.modals.users-upload-modal")
                                {{-- Modal Ends  --}}
                                {{-- <div class="search-bar">
                                    <form class="search-form d-flex align-items-center" method="POST" action="#">
                                        @csrf
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="search-input" name="query" placeholder="Search" title="Enter search keyword">
                                            <button type="submit" title="Search" class="btn"><i class="bi bi-search"></i></button>
                                        </div>
                                    </form>
                                </div> --}}

                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Toutes les utilisateurs</h5>

                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                @if(session('danger'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h4 class="alert-heading">Alerte !!</h4>
                                    <p>{{ session('danger') }}</p>
                                    <hr>
                                    <p class="mb-0">NB: Vérifier le role de l'utilisateur avant.</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>

                                @endif

                                @if (!$users->isEmpty())
                                <div id="search-results"></div>

                                <table id="users-table" class="table table-borderless table-responsive" style="width=100%">
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col">Selectionner</th> --}}
                                            <th scope="col">Photos</th>
                                            <th scope="col">Noms et prénoms</th>
                                            <th scope="col">Numeros</th>
                                            <th scope="col">Emplois</th>
                                            <th scope="col">Villes/Directions Régionales</th>
                                            <th scope="col">Types de membres</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)

                                        <tr>
                                            <th scope="row">
                                                <a href="#">
                                                    @if($user->photo==='/storage/users/profile.png')
                                                    <img class="rounded-circle" style="width:40px;" src="{{$user->photo}}" alt="">
                                                    @else
                                                    <img class="rounded-circle" style="width:40px;" src="{{asset('/storage/users/'.$user->photo)}}" alt="">
                                                    @endif
                                                </a>
                                            </th>
                                            <td>
                                                <a href="#" class="text-primary fw-bold">{{$user->name}}</a>
                                            </td>

                                            <td class="fw-bold">{{$user->profile->phone ?? ''}}</td>
                                            <td>{{$user->job}}</td>
                                            <td class="fw-bold">{{$user->place}}</td>

                                            <td class="fw-bold">{{$user->membership}}</td>

                                            <td class="d-flex justify-content-between ">
                                                <button data-bs-toggle="modal" data-bs-target="#delete-{{$user->id}}" data-toggle="tooltip" data-placement="left" title="Supprimer" type="button" class="btn btn-sm btn-danger">
                                                    <i class="bi bi bi-trash"></i>
                                                </button>
                                                {{-- Delete Modal start --}}
                                                @include("dashboard.modals.users-delete-modal")
                                                {{-- Modal Ends  --}}

                                                {{-- Edit Button  --}}
                                                <button data-bs-toggle="modal" data-bs-target="#edit-{{$user->id}}" data-toggle="tooltip" data-placement="left" title="Modifier" type="button" class="btn btn-sm btn-success text-white">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>

                                                {{--Edit Modal start --}}
                                                @include("dashboard.modals.users-edit-modal")
                                                {{-- Modal Ends  --}}
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="alert alert-danger" role="alert">
                                    La liste des Utilisateurs est vide. </a>
                                </div>
                                @endif

                                {{-- {{ $users->links();}} --}}


                            </div>

                        </div>
                    </div><!-- End Top Selling -->

                </div>


            </div><!-- End Left side columns -->
        </div>


    </section>

</main><!-- End #main -->
@endsection
