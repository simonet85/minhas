    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{route("dashboard.home")}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            @if(auth()->user()->role === 'admin')
            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-flag"></i><span>Banniére</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route("homebanner.create")}}">
                            <i class="bi bi-circle"></i><span>Créer Banniére</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("homebanner.index")}}">
                            <i class="bi bi-circle"></i><span>Toutes les Banniére </span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#accueil-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-house"></i><span>Accueil</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="accueil-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route("homesections.create")}}">
                            <i class="bi bi-circle"></i><span>Créer une section</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("homesections.index")}}">
                            <i class="bi bi-circle"></i><span>Toutes les sections </span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#about-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-house"></i><span>A propos de nous</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="about-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('missionobjectif.index')}}">
                            <i class="bi bi-circle"></i><span>Missions et Objectifs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('directionmanagement.index')}}">
                            <i class="bi bi-circle"></i><span>Direction et conseil d'administration </span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-info-square"></i><span>Informations</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route("lastnews.create")}}">
                            <i class="bi bi-circle"></i><span>Créer Infos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("lastnews.index")}}">
                            <i class="bi bi-circle"></i><span>Toutes Les Infos</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#events-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-calendar-event"></i></i><span>Événements</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="events-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{route("calendarevents.create")}}">
                            <i class="bi bi-circle"></i><span>Créer Calendrier & Événements</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("calendarevents.index")}}">
                            <i class="bi bi-circle"></i><span>Tous les Calendriers & Événements</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Politique générale</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route("generalpolicy.create")}}">
                            <i class="bi bi-circle"></i><span>Créer Déclaration de la politique</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route("generalpolicy.index")}}">
                            <i class="bi bi-circle"></i><span>Toutes les Déclaration de la politique</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bar-chart"></i><span>Resources et Services</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route("profesionaldev.index")}}">
                            <i class="bi bi-circle"></i><span>Dévéloppement professionel</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route("supportservices.index")}}">
                            <i class="bi bi-circle"></i><span>Soutien et Services </span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Charts Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-question-square"></i><span>Faq</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route("faq.index")}}">
                            <i class="bi bi-circle"></i><span>Questions fréquentes</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{route("contactus.index")}}">
                    <i class="bi bi-circle"></i><span>Contactez Nous</span>
                    </a>
            </li> --}}
        </ul>
        </li><!-- End Icons Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route("users.index")}}">
                <i class="bi bi-people"></i>
                <span>Utilisateurs</span>
            </a>
        </li><!-- End Register Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route("messages.index")}}">
                <i class="bi bi-envelope"></i>
                <span>Messages</span>
            </a>
        </li><!-- End Contact Page Nav -->
        @endif
        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route("profile.index")}}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->



        </ul>

    </aside><!-- End Sidebar-->
