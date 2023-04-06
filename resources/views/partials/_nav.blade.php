<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        @if (isset($site_settings->site_logo ))
        <a href="/" width="500" class="site-logo navbar-brand">
            <img src="{{isset($site_settings->site_logo ) ? asset('/storage/site_logos/'.$site_settings->site_logo) : $site_settings->site_name}}" alt="{{$site_settings->site_name}}">
        </a>
        @else
        <a href="/" width="500" class="site-logo navbar-brand">
            {{ isset($site_settings->site_name) ? $site_settings->site_name : "SYNAH-CI"}}
        </a>
        @endif
        {{-- <a class="navbar-brand " href="/">SYNHA-CI</a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        A propos de nous
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <li><a class="dropdown-item" href="{{url("about")}}">Missions et Objectifs</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{url("direction")}}">Direction et conseil d'administration</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{url("members_info")}}">Informations sur les membres</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{url("policy")}}">Politique générale</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Infos et événements
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <li><a class="dropdown-item" href="{{url('news')}}">Dernières infos</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{url('events')}}">Calendrier des événements</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ressources et services
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                        <li><a class="dropdown-item" href="{{url('development')}}">Possibilités de développement professionnel</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{url('support')}}">Soutien et services aux membres</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Nous contacter
                    </a>
                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown4">
                        <li><a class="dropdown-item" href="{{url('faq')}}">Questions générales</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{url('contact')}}">Contactez-nous</a></li>
                    </ul>
                </li>
            </ul>
            @guest

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route("login")}}">{{__("Se connecter")}}</a>
                </li>
                @endif
                @if (Route::has("register"))
                <li class="nav-item">
                    <a class="nav-link" href="{{route("register")}}">{{__("S'enregistrer")}}</a>
                </li>
                @endif
                @else
                <li class="nav-item">
                    {{-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu"> --}}
                        <a class="nav-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            {{ __('Déconnecter') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        {{-- </ul> --}}
                </li>
            </ul>
            @endguest

        </div>
    </div>
</nav>
