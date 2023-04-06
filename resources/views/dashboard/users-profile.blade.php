@extends("dashboard.layouts.app")
@section("content")
@include("dashboard.partials._menu")
@include("dashboard.partials._sidebar")

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item">Utilisateurs</li>
                <li class="breadcrumb-item active">Profil</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    @if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>

    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">

                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        @if($user->photo==='/storage/users/profile.png')
                        <img class="rounded-circle" src='{{$user->photo}}' alt="">
                        @else
                        <img src="{{asset('storage/users/'.$user->photo)}}" alt="Profile" class="rounded-circle">
                        @endif
                        <h2 class="text-center">{{$user->name}}</h2>
                        <h3>{{$user->job}}</h3>
                        <div class="social-links mt-2">

                            <a href="{{isset($profile->twitter_url)  ? $profile->twitter_url : '#'}}" class="twitter"><i class="bi bi-twitter"></i></a>

                            <a href="{{isset($profile->facebook_url) ? $profile->facebook_url : '#'}}" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="{{isset($profile->instagram_url) ? $profile->instagram_url: '#'}}" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="{{isset($profile->linkedin_url) ? $profile->linkedin_url: '#'}}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"> Présentation </button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier le profil</button>
                            </li>


                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer de mot de passe</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Biographie</h5>
                                @if (isset($profile->about))
                                <p class="small fst-italic">{!!$profile->about!!}</p>
                                @else
                                <p class="small fst-italic">La rubrique Biographie est vide . Veuillez la mettre à jour.</p>
                                @endif

                                {{-- {{isset($profile->about) ?? '<p>La rubrique Biographie est vide . Veuillez la mettre à jour.</p>'}} --}}



                                <h5 class="card-title">Détails du profil</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nom et prénom(s)</div>
                                    <div class="col-lg-9 col-md-8">{{$user->name}}</div>
                                </div>

                                {{-- <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Company</div>
                                    <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                                </div> --}}

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Emploi</div>
                                    <div class="col-lg-9 col-md-8">{{$user->job}}</div>
                                </div>

                                {{-- <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Country</div>
                                    <div class="col-lg-9 col-md-8">USA</div>
                                </div> --}}

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Direction Régional/Ville</div>
                                    <div class="col-lg-9 col-md-8">
                                        @if (isset($user->place))
                                        <div class="col-lg-9 col-md-8">
                                            {{$user->place}}
                                        </div>
                                        @else
                                        <div class="col-lg-9 col-md-8">
                                            Votre Direction Régional/Ville n'est pas encore enregistré.
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Téléphone</div>
                                    @if (isset($profile->phone))
                                    <div class="col-lg-9 col-md-8">
                                        {{$profile->phone}}
                                    </div>
                                    @else
                                    <div class="col-lg-9 col-md-8">
                                        Votre Numero de téléphone n'est pas encore enregistré.
                                    </div>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="POST" action="{{route("profile.update", $user->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Image de profil</label>
                                        <div class="col-md-8 col-lg-9">
                                            @if($user->photo==='/storage/users/profile.png')
                                            <img class="rounded-circle" src='/storage/users/profile.png' alt="">
                                            @else
                                            <img src="{{asset('storage/users/'.$user->photo)}}" alt="Profile">
                                            @endif
                                            <div class="pt-2">
                                                <label for="file-upload" class="custom-file-upload @error('photo')
                                                    is-invalid
                                                @enderror ">
                                                    <i class="bi bi-upload"></i> Télécharger
                                                </label>
                                                <input style="display:none;" id="file-upload" type="file" name="photo" />
                                                @error('photo')
                                                <div class="invalid-feeback">{{$message}}</div>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom et prénom(s)</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" value="{{$user->name}}" type="text" class="form-control @error('name') is-invalid @enderror" id="fullName">
                                            @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Biographie</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="about" placeholder="Mettre à jour votre Biographie." class="form-control @error('about') is-invalid @enderror" id="editor" style="height: 100px">{{ isset($profile->about) ? $profile->about : 'Veuillez mettre à jour votre Biographie.'  }}</textarea>
                                            @error('about')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Direction Régional/Ville</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="place" type="text" class="form-control @error('place') is-invalid @enderror" id="place" value="{{ isset($user->place) ? $user->place : "Veuillez mettre à jour votre Direction Régional/ville."  }}">
                                        </div>
                                        @error('place')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Emlpoi</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="job" type="text" class="form-control @error('job') is-invalid @enderror" id="Job" value="{{$user->job}}">
                                        </div>
                                        @error('job')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Téléphone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" placeholder="Mettre à jour votre Numéro." type="text" class="form-control @error('phone') is-invalid @enderror" id="Phone" value="{{isset($profile->phone) ? $profile->phone : ''}}">
                                        </div>
                                        @error('phone')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="{{$user->email}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Profil Twitter</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input placeholder="Veuillez mettre à jour votre profil" name="twitter_url" type="text" class="form-control @error('twitter_url') is-invalid @enderror" id="Twitter" value="{{isset($profile->twitter_url) ? $profile->twitter_url : ''}}">
                                        </div>
                                        @error('twitter_url')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Profil Facebook</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input placeholder="Veuillez mettre à jour votre profil" name="facebook_url" type="text" class="form-control @error('facebook_url') is-invalid @enderror" id="Facebook" value="{{isset($profile->facebook_url) ? $profile->facebook_url: ''}}">
                                        </div>
                                        @error('facebook_url')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Profil Instagram</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="instagram_url" placeholder="Veuillez mettre à jour votre profil" type="text" class="form-control @error('instagram_url') is-invalid @enderror" id="Instagram" value="{{isset($profile->instagram_url) ? $profile->instagram_url : ''}}">
                                        </div>
                                        @error('instagram_url')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Profil Linkedin</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="linkedin_url" placeholder="Veuillez mettre à jour votre profil" type="text" class="form-control" id="Linkedin" value="{{isset($profile->linkedin_url) ? $profile->linkedin_url : ''}}">
                                        </div>
                                        @error('linkedin_url')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>



                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="POST" action="{{route("users.updatePassword")}}" was-validated>
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de passe actuel</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" id="currentPassword" autocomplete="current-password" required>
                                            @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPassword" autocomplete="new-password" required>
                                            @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Saisir à nouveau le nouveau mot de passe</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" autocomplete="new-password" id="renewPassword" required>
                                            @error('confirm_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

    </script>
</main><!-- End #main -->
@endsection
