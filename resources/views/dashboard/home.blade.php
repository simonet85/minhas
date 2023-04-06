@extends("dashboard.layouts.app")
@section("content")
@include("dashboard.partials._menu")
@include("dashboard.partials._sidebar")
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            @if (request()->is('manage/users'))
            @include("dashboard.users")
            @endif

            @if (request()->is('manage/profile'))
            @include("dashboard.users-profile")
            @endif

            @if (request()->is('manage/messages'))
            @include("dashboard.users-messages")
            @endif

            @if (request()->is('manage/homebanner/create'))
            @include("dashboard.home-banner")
            @endif

            @if (request()->is('manage/homebanner'))
            @include("dashboard.banners")
            @endif

            @if (request()->is('manage/homesections/create'))
            @include("dashboard.home-sections")
            @endif

            @if (request()->is('manage/homesections'))
            @include("dashboard.sections")
            @endif

            @if (request()->is('manage/lastnews'))
            @include("dashboard.lastnews")
            @endif


            @if (request()->is('manage/lastnews/create'))
            @include("dashboard.lastnews-create")
            @endif


            @if (request()->is('manage/calendarevents'))
            @include("dashboard.calendarevents")
            @endif


            @if (request()->is('manage/calendarevents/create'))
            @include("dashboard.calendarevents-create")
            @endif


            @if (request()->is('manage/calendarevents/*'))
            @if (preg_match('/^manage\/calendarevents\/\d+$/', request()->path()))
            @include("dashboard.calendarevents-show")
            @endif
            @endif


            @if (request()->is('manage/calendarevents/*'))
            @if (preg_match('/^manage\/calendarevents\/(\d+)\/edit$/', request()->path()))
            @include("dashboard.calendarevents-edit")
            @endif
            @endif


            @if (request()->is('manage/generalpolicy'))
            @include("dashboard.generalpolicy")
            @endif


            @if (request()->is('manage/generalpolicy/create'))
            @include("dashboard.generalpolicy-create")
            @endif

            @if (request()->is('manage/profesionaldev'))
            @include("dashboard.profesionaldev")
            @endif

            @if (request()->is('manage/supportservices'))
            @include("dashboard.supportservices")
            @endif

            @if (request()->is('manage/faq'))
            @include("dashboard.faq")
            @endif


            @if (request()->is('manage/profile'))
            @include("dashboard.users-profile")
            @endif

            @if (request()->is('messages'))
            @include("dashboard.users-messages")
            @endif

            @if (request()->is('users/notification'))
            @include("dashboard.users-notifications")
            @endif


            @if (request()->is('manage/missionobjectif'))
            @include("dashboard.mission-objectif")
            @endif

            @if (request()->is('manage/directionmanagement'))
            @include("dashboard.direction-management")
            @endif

            {{-- Settings  --}}

            @if (request()->is('manage/settings'))
            @include("dashboard.site-settings")
            @endif

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Inscrits <span>| aujourd'hui </span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-plus"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="today-count">0</h6>
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">augmentation</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->


                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Inscrits <span>| ce mois-ci</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-check-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 id='monthly-count'>0</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">augmentation</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-md-4">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Total <span>| Membre</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 id="total-count">0</h6>
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">augmentation</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Top Selling -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nombre d'utilisateurs enregistrés par mois</h5>

                                <!-- Bar Chart -->
                                <canvas id="barChart" style="max-height: 400px; display: block; box-sizing: border-box; height: 165.714px; width: 331.81px;" width="871" height="435"></canvas>

                                <!-- End Bar CHart -->

                            </div>
                        </div>
                    </div><!-- End Top Selling -->

                </div>


            </div><!-- End Left side columns -->
        </div>


    </section>

</main><!-- End #main -->
<script>


</script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{route('monthlyusers')}}"
            , method: 'GET'
            , success: function(data) {
                var ctx = document.getElementById("barChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar'
                    , data: {
                        labels: data.labels
                        , datasets: [{
                            label: 'Nombre d\'utilisateurs enregistrés par mois'
                            , data: data.data
                            , backgroundColor: [
                                'rgba(255, 99, 132, 0.2)'
                                , 'rgba(255, 159, 64, 0.2)'
                                , 'rgba(255, 205, 86, 0.2)'
                                , 'rgba(75, 192, 192, 0.2)'
                                , 'rgba(54, 162, 235, 0.2)'
                                , 'rgba(153, 102, 255, 0.2)'
                                , 'rgba(201, 203, 207, 0.2)'
                            ]
                            , borderColor: [
                                'rgb(255, 99, 132)'
                                , 'rgb(255, 159, 64)'
                                , 'rgb(255, 205, 86)'
                                , 'rgb(75, 192, 192)'
                                , 'rgb(54, 162, 235)'
                                , 'rgb(153, 102, 255)'
                                , 'rgb(201, 203, 207)'
                            ]
                            , borderWidth: 1
                        }]
                    }
                    , options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
            , error: function(error_data) {
                console.log(error_data);
            }
        });

        $.ajax({
            type: 'GET'
            , url: "{{route('getusercount.index')}}"
            , success: function(data) {
                // console.log(data.todayUsers)
                $('#today-count').html(data.todayUsers);
                $('#monthly-count').html(data.todayMonthUsers);
                $('#total-count').html(data.totalUser);
            }
        });
    });

</script>

<script>


</script>
@endsection
