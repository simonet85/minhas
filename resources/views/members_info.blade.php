@extends("layouts.app")
@section("content")
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="my-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Membre</li>
        </ol>
    </div>
</nav>

<!-- Member List -->
<section class="container mb-5">
    <h2 class="mb-4">Liste des Membres</h2>
    <div class="scrollable-table-container">
        <table class="table table-responsive scrollable-table" id="member-list">
            <thead>
                <tr>
                    <th scope="col"> ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Villes/DR</th>
                    <th scope="col">Emplois</th>
                    <th scope="col">Email</th>
                    {{-- <th scope="col">Type d'adhésion</th> --}}
                </tr>
            </thead>
            <tbody>
                @php
                $i=1;
                @endphp
                @foreach ($users as $user)

                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->place}}</td>
                    <td>{{$user->job}}</td>
                    {{-- <td>{{\Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}</td> --}}
                    <td>{{$user->email}}</td>
                    {{-- <td>{{$user->membership}}</td> --}}
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</section>

@endsection
