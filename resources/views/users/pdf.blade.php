<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        td,
        th {
            border: 2px solid black;
            padding: 8px;
            text-align: left;
        }

        h5 {
            background: #7a5994;
            color: #fff;
            padding: 5px;
            font-size: 20px;
        }

    </style>
    <link rel="stylesheet" href="{{public_path('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body>
    <main id="main" class="main">
        <section class="section dashboard">

            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">

                                <div class="card-body pb-0">
                                    <h5 class="card-title text-center ">TOUS LES UTILISATEURS</h5>

                                    {{-- @if (!$users->isEmpty()) --}}
                                    <div id="search-results"></div>

                                    <table class="table" style="width=100%">
                                        <thead>
                                            <tr>
                                                {{-- <th scope="col">Selectionner</th> --}}
                                                <th scope="col">Photos</th>
                                                <th scope="col">Noms et prénoms</th>
                                                <th scope="col">Emplois</th>
                                                <th scope="col">Villes/Directions Régionales</th>
                                                <th scope="col">Dates d'adhésions</th>
                                                <th scope="col">Types de membres</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)

                                            <tr class="m-2">
                                                <th scope="row">
                                                    @if($user->photo==='/storage/users/profile.png')

                                                    <a href="#">
                                                        <img class="rounded-circle" style="width:40px;" src="{{ public_path('storage/users/profile.png') }}" alt="{{ $user->name }}">
                                                    </a>
                                                    @else

                                                    <a href="#">
                                                        <img class="rounded-circle" style="width:40px; border-radius:100%;" src="{{ public_path('storage/users/'.$user->photo) }}" alt="{{ $user->name }}">
                                                    </a>
                                                    @endif
                                                </th>
                                                <td>
                                                    <a href="#" class="text-primary fw-bold">{{$user->name}}</a>
                                                </td>
                                                <td>{{$user->job}}</td>
                                                <td class="fw-bold">{{$user->place}}</td>
                                                <td class="fw-bold">{{\Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}</td>
                                                <td class="fw-bold">{{$user->membership}}</td>

                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- @else
                                    <div class="alert alert-danger" role="alert">
                                        La liste des Utilisateurs est vide. </a>
                                    </div>
                                    @endif --}}

                                    {{-- {{ $users->links();}} --}}


                                </div>

                            </div>
                        </div><!-- End Top Selling -->

                    </div>


                </div><!-- End Left side columns -->
            </div>


        </section>

    </main><!-- End #main -->
    <script src="{{ public_path('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>
