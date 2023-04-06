@extends("dashboard.layouts.app")
@section("content")
<main>
    <div class="container">

        <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <h1>403</h1>
            <h2>Vous n'êtes pas autorisé.</h2>
            <a class="btn" href="{{route("dashboard.home")}}"">Retourner à l'accueil</a>
      <img style=" width: 80%" src=" {{asset('assets/img/not-found.svg')}}" class="img-fluid py-5" alt="Page Not Found">
        </section>

    </div>
</main><!-- End #main -->
@endsection
