    <!-- ======= Header ======= -->
    <div id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{route('dashboard.home')}}" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->
                @if(Auth::user()->role ==='admin')

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        {{-- {{$unreadNotificationCount > 10 ? "10+" : $unreadNotificationCount}} --}}
                        @if(isset($allNotificationsCount))
                        <span class="badge bg-primary badge-number notification-count"> {{$allNotificationsCount > 10 ? "10+" : $allNotificationsCount}} </span>
                        {{-- @else --}}

                        {{-- <span class="badge bg-primary badge-number notification-count"> {{$unreadNotificationCount > 10 ? "10+" : $unreadNotificationCount}} </span> --}}
                        @endif
                    </a><!-- End Notification Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow ">
                        <li class="dropdown-header">
                            {{-- {{$unreadNotificationCount > 10 ? "10+" : $unreadNotificationCount}} --}}
                            @if(isset($unreadNotificationCount))
                            Vous avez <span class="notification-count">{{$unreadNotificationCount > 10 ? "10+" : $unreadNotificationCount}}</span> nouvelles notifications
                            <a href="{{route('unread.notifications')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">Voir tous</span></a>
                            @endif

                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item notifications">

                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="{{route('notification.index')}}">Afficher toutes les notifications</a>
                        </li>

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->
                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number messages-count">0</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            Vous avez <span class="messages-count">0</span> nouveaux messages
                            <a href="{{route('messages.unread')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">Voir tous</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item all-messages">

                        </li>

                        <li class="dropdown-footer">
                            <a href="{{route('messages.index')}}">Voir tous</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                @endif


                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        {{-- <img src="{{asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle"> --}}

                        @if(Auth::user()->photo==='/storage/users/profile.png')
                        <img class="rounded-circle" style="width:40px;" src="{{Auth::user()->photo}}" alt="">
                        @else
                        <img class="rounded-circle" style="width:40px;" src="{{asset('/storage/users/'.auth()->user()->photo)}}" alt="">
                        @endif

                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->job }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('profile.index')}}">
                                <i class="bi bi-person"></i>
                                <span>Mon Profil</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('settings.index')}}">
                                <i class="bi bi-gear"></i>
                                <span>Paramétres du site</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        {{-- <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li> --}}
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            {{-- <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Déconnecter') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form> --}}
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span> {{ __('Déconnecter') }}</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </div><!-- End Header -->
