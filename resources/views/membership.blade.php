@extends("layouts.app")
@section("content")
<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-1">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">SYNHAS-CI</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-1 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Créer un compte</h5>
                                    <p class="text-center small">Entrez vos données personnelles pour créer un compte</p>
                                </div>

                                <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate>
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Votre Nom</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="yourName" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Votre adresse e-mail</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="yourEmail" required autocomplete="email">

                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Mot de passe</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" required autocomplete="new-password">

                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Confirmer Mot de passe</label>
                                        <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password">

                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value="true" id="acceptTerms" {{ old('remember') ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="acceptTerms">J'accepte les termes et conditions <a href="#">Conditions générales d'utilisation</a></label>
                                            <div class="invalid-feedback">Vous devez donner votre accord avant de soumettre votre candidature.</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Créer un compte</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Vous avez déjà un compte ? <a href="{{route("login")}}">Se connecter</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection
