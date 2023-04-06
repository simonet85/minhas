@extends("dashboard.layouts.app")
@section("content")
@include("dashboard.partials._menu")
@include("dashboard.partials._sidebar")

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Notifications</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Gestion</li>
                <li class="breadcrumb-item active">Notifications</li>
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
                                {{-- <button class="btn btn-primary text-white btn-sm" data-bs-toggle="modal" data-bs-target="#modal-add-supportservice" data-toggle="tooltip" data-placement="left" title="Ajouter" href="{{route("supportservices.create")}}">
                                <i class="bi bi-plus-square"></i>
                                </button> --}}
                                {{--Add Modal start --}}
                                {{-- @include("dashboard.modals.supportservice-modal-add") --}}
                                {{-- Modal Ends  --}}
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Notifications</h5>

                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                {{-- {{dd($notifications[0])}} --}}
                                @if (!$notifications->isEmpty())

                                <table class="table table-borderless" style="width=100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col" class="w-40">Email</th>
                                            <th scope="col" class="w-10">Objets</th>
                                            <th scope="col">Dates</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $num=1;
                                        @endphp
                                        {{-- {{dd($notifications[0]->data['name'])}} --}}
                                        @for($i = 0; $i < count($notifications); $i++) <tr>

                                            <td scope="row">
                                                {{$num++;}}
                                            </td>
                                            <td>
                                                <a href="#" class="text-primary fw-bold">{{$notifications[$i]->data['name']}}</a>
                                            </td>
                                            <td class="w-10">
                                                <a href="#">{{$notifications[$i]->data['email']}}</a>
                                            </td>
                                            <td>
                                                <a href="#">{{$notifications[$i]->data['message']}}</a>
                                            </td>
                                            <td>{{Carbon\Carbon::parse($notifications[$i]->created_at)->format('d-m-Y à H:i')}}</td>
                                            {{-- {{ Carbon\Carbon::parse($event->start_time)->format('d-m-Y à H:i') }} --}}


                                            <td class=" d-flex justify-content-between">
                                                <a href="{{route('markAsRead', $notifications[$i]->id)}}" onclick="event.preventDefault(); document.getElementById('markAsRead-form').submit();" data-placement="left" title="Marquer comme lu" type="button" class="btn btn-sm btn-danger mr-5">
                                                    <i class="bi bi-check-square"></i>
                                                </a>
                                                <form id="markAsRead-form" action="{{route('markAsRead', $notifications[$i]->id)}}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                                {{-- Delete Modal start --}}
                                                {{-- @include("dashboard.modals.usernotification-modal-delete") --}}
                                                {{-- Modal Ends  --}}

                                                {{-- Edit Button  --}}
                                                {{-- <button data-bs-toggle="modal" data-bs-target="#edit-{{$notification->id}}" data-toggle="tooltip" data-placement="left" title="Reponse" type="button" class="btn btn-sm btn-info text-white">
                                                <i class="bi bi-reply"></i>
                                                </button> --}}

                                                {{--Edit Modal start --}}
                                                {{-- @include("dashboard.modals.usernotification-modal-edit") --}}
                                                {{-- Modal Ends  --}}
                                            </td>
                                            </tr>

                                            @endfor
                                    </tbody>
                                </table>
                                @else
                                <div class="alert alert-danger" role="alert">
                                    La liste des notifications est vide.
                                </div>
                                @endif
                            </div>
                        </div>
                    </div><!-- End Top Selling -->
                    {{-- {{ $notifications->links() }} --}}
                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

</main><!-- End #main -->
@endsection
