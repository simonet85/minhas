@extends("layouts.accueil")
@section("content")
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="my-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="./contact.html">Accueil</a></li>
            <li class="breadcrumb-item "></li>
        </ol>
    </div>
</nav>
<!-- Main Content -->
<section class="main-content py-5">
    <div class="container">
        {{-- {{dd($homeSection)}} --}}
        {{-- Introduction --}}
        <div class="row">
            <div class="col-md-8">
                <h2>{{isset($intro->title) ? $intro->title : "l'Association pour l'égalité des droits au travail"}}</h2>
                <p>{!!isset($intro->text) ? $intro->text: "<p>Notre association se consacre à la promotion de l'égalité des droits et du traitement équitable des travailleurs dans tous les secteurs d'activité. Nous pensons que tous les travailleurs devraient avoir accès à des conditions de travail sûres et équitables, et devraient être à l'abri de la discrimination et du harcèlement sur le lieu de travail.</p>
                    <p>Notre association est composée d'un groupe diversifié d'individus et d'organisations qui s'engagent à promouvoir l'égalité des droits au travail. Nos membres viennent d'horizons divers, notamment de syndicats, de groupes de défense et d'organisations de justice sociale.</p>
                    <p>Nous travaillons sans relâche pour soutenir les travailleurs et promouvoir l'égalité des droits par le biais d'actions de plaidoyer, d'initiatives politiques et d'opportunités de développement professionnel. Nous fournissons également une gamme de services de soutien à nos membres, notamment une assistance juridique, des conseils en matière de carrière et des ressources éducatives.</p>" !!}
                </p>

                @if (isset($intro->button))
                <a class="btn btn-primary mt-3" href="{{route('register')}}">{{isset($intro->button) ? $intro->button : "Rejoingnez-nous aujourd'hui"}}</a>
                @endif
            </div>
            <div class="col-md-4 infos py">
                <div class="card ">
                    <div class="card-body">
                        <h3>Dernières informations</h3>
                        <hr>
                        <ul class="list-unstyled">
                            @if (!$latestNews->isEmpty())

                            @foreach ($latestNews as $latestNew)

                            <li>
                                <h4><a href="#">{{$latestNew->title}}</a></h4>
                                <p>{!!$latestNew->text!!}</p>
                            </li>
                            <hr>

                            @endforeach
                            @else
                            <li>
                                <p>Aucune informations !</p>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Mission Section -->
<section class="our-mission py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ isset($mission->title) ? $mission->title :"Notre mission"}}</h2>
                <p>{!! isset($mission->text) ? $mission->text : "<p>Nous pensons que tous les travailleurs devraient avoir accès à des conditions de travail sûres et équitables, et être à l'abri de la discrimination et du harcèlement sur le lieu de travail.</p>
                    <p>Nous nous efforçons de promouvoir l'égalité des droits et le traitement équitable des travailleurs dans tous les secteurs d'activité par le biais d'actions de sensibilisation, d'initiatives politiques et d'opportunités de développement professionnel. Nous nous engageons à soutenir les travailleurs et à lutter pour la justice sur le lieu de travail.</p>"!!}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Our Advocacy Section -->
<section class="our-advocacy py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h2>{{isset($plaidoyer->title) ? $plaidoyer->title : "Nos actions de plaidoyer"}}</h2>
                <p>{!!isset($plaidoyer->text) ? $plaidoyer->text : "<p>Nous nous engageons à promouvoir l'égalité des droits et le traitement équitable des travailleurs par le biais d'une série d'initiatives et de campagnes de plaidoyer.</p>
                    <p>Voici quelques-unes de nos priorités actuelles:</p>
                    <ul>
                        <li>Plaider en faveur d'une réglementation plus stricte en matière de sécurité sur le lieu de travail</li>
                        <li>Promouvoir des salaires et des avantages équitables pour tous les travailleurs</li>
                        <li>Soutenir les droits des travailleurs</li>
                        <li>Lutter contre la discrimination et le harcèlement sur le lieu de travail</li>
                        <li>Faire pression pour un meilleur accès au développement professionnel et aux opportunités de formation</li>
                    </ul>
                    <p>Nous nous engageons également à élaborer des politiques et des prises de position qui promeuvent l'égalité des droits et le traitement équitable des travailleurs. Nos initiatives politiques sont basées sur la recherche et les meilleures pratiques, et sont conçues pour créer un changement durable sur le lieu de travail.</p>"!!}
                </p>

                <!-- Within your HTML template -->
                {{-- @if (isset($plaidoyer->button))
                <a class="btn btn-primary mt-3" href="/advocacy">{{ $plaidoyer->button }}</a>
                @endif --}}

            </div>
        </div>
    </div>
</section>

<!-- Our Services Section -->
<section class="our-services py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{isset($service->title) ? $service->title : "Nos services"}}</h2>
                <p>{!!isset($service->text) ? $service->text : "<p>Nous offrons une gamme de services de soutien à nos membres pour les aider à atteindre leurs objectifs et à promouvoir l'égalité des droits au travail.</p>
                    <p>Nos services comprennent:</p>
                    <ul>
                        <li>Assistance juridique pour les travailleurs confrontés à la discrimination ou au harcèlement</li>
                        <li>Orientation professionnelle et aide à la recherche d'emploi</li>
                        <li>Possibilités de formation et de développement professionnel</li>
                        <li>Accès aux ressources éducatives et à la recherche</li>
                        <li>des événements de mise en réseau et de renforcement de la communauté</li>
                    </ul>
                    <p>&nbsp;</p>
                    <p><br>&nbsp;</p>"!!}
                </p>

                @if (isset($service->button))
                <a class="btn btn-primary mt-3" href="{{route('support')}}">{{ $service->button }}</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
