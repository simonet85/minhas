<div class="container py text-center">
    @if(isset($banners))
    <h1 class="display-4">{{$banners->title}}</h1>
    <p class="lead">{{$banners->slogan}}</p>
    <a href="{{route("register")}}" class="btn btn-primary btn-md register-btn">{{$banners->button}}</a>
    @else
    <h1 class="display-4">BIENVENUE A LA SYNHA-CI</h1>
    <p class="lead">Travaillons ensemble pour l'égalité</p>
    <a href="{{route("register")}}" class="btn btn-primary btn-md">Devenir Membre</a>
    @endif
</div>
