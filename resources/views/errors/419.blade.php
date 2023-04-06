@extends("dashboard.layouts.app")
@section("content")
<main>
    <div class="container">

        <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <h1>419</h1>
            <h2>La page a expiré.</h2>
            <a class="btn" href="{{route("dashboard.home")}}">Retourner à l'accueil</a>
            <img src=" {{asset('assets/img/not-found.svg')}}" class="img-fluid py-5" alt="Page Not Found">
        </section>

    </div>
</main><!-- End #main -->
@endsection
