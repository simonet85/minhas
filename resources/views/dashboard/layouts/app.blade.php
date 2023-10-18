<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicons -->
    <link href="{{asset("assets/img/favicon.png")}}" rel="icon">
    <link href="{{asset("assets/img/apple-touch-icon.png")}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="{{url("https://fonts.gstatic.com")}}" rel="preconnect">
    <link href="{{url("https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i")}}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset("assets/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/bootstrap-icons/bootstrap-icons.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/boxicons/css/boxicons.min.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/quill/quill.snow.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/quill/quill.bubble.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/remixicon/remixicon.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/simple-datatables/style.css")}}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css')}}">


    <!-- Template Main CSS File -->
    <link href="{{asset("assets/css/style.css")}}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js')}}"></script>
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js')}}"></script>
    <!--Fullcalendar-->
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js')}}"></script>
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css')}}" />
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale/fr.js')}}"></script>
    <!--Moment-->
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js')}}"></script>
    <!--CKEditor-->
    <script src="{{url('https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js')}}"></script>
    <script>
        moment.locale('fr'); // Set the locale to French

    </script>


    <script>
        $(document).ready(function() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // fullCalendar
            var calendar = $('#calendar').fullCalendar({
                locale: 'fr'
                , header: {
                    left: 'prev, next today'
                    , center: 'title'
                    , right: 'month, agendaWeek, agendaDay'
                }
                , defaultDate: moment().format('YYYY-MM-DD')
                , editable: true
                , eventLimit: true
                , events: {
                    url: '{{ route("calendarevents.index") }}'
                    , type: 'GET'
                    , error: function() {
                        alert('Error fetching events');
                    }
                    , success: function(response) {
                        // console.log(response);
                        $.each(response, function(index, event) {
                            $('#calendar').fullCalendar('renderEvent', {
                                id: event.id
                                , title: event.title
                                , start: event.start_time
                                , end: event.end_time
                                , url: "/manage/calendarevents/" + event.id
                            }, true);
                        })
                    }
                }
                , eventClick: function(info) {
                        window.location.href = info.event.url;
                    }
                    // , eventAfterRender: function(event, element, view) {
                    //     var now = new Date();
                    //     var end = event.end_time || event.start_time; // If event has no end time, use start time instead
                    //     if (end < now) {
                    //         $('#calendar').fullCalendar('removeEvents', event.id);
                    //     }
                    // }
                , eventRender: function(event, element) {
                    var actions = $('<div class="fc-event-actions"></div>');

                    actions.append('<a href="' + event.action.show + '" class="btn btn-primary btn-sm text-white rounded-pill" title="Voir"><i class="bi bi-eye"></i></a>');

                    actions.append('<a href="' + event.action.edit + '" class="btn btn-success btn-sm text-white rounded-pill" title="Modifier"><i class="bi bi-pen"></i></a>');

                    actions.append(
                        `<form method="POST" action=${event.action.delete}>
                            @csrf
                            @method("DELETE")
                            <button  class=" btn btn-danger btn-sm text-white rounded-pill" type="submit" title="Supprimer">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>`
                    );

                    element.append(actions);
                }
            });

            //DataTable
            let table = $('#users-table').DataTable({
                language: {
                    "sEmptyTable": "Aucune donnée disponible dans le tableau"
                    , "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments"
                    , "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément"
                    , "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)"
                    , "sInfoPostFix": ""
                    , "sInfoThousands": ","
                    , "sLengthMenu": "Afficher _MENU_ éléments"
                    , "sLoadingRecords": "Chargement..."
                    , "sProcessing": "Traitement..."
                    , "sSearch": "Rechercher :"
                    , "sZeroRecords": "Aucun élément correspondant trouvé"
                    , "oPaginate": {
                        "sFirst": "Premier"
                        , "sLast": "Dernier"
                        , "sNext": "Suivant"
                        , "sPrevious": "Précédent"
                    }
                    , "oAria": {
                        "sSortAscending": ": activer pour trier la colonne par ordre croissant"
                        , "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                    }
                    , "select": {
                        "rows": {
                            "_": "%d lignes sélectionnées"
                            , "0": "Aucune ligne sélectionnée"
                            , "1": "1 ligne sélectionnée"
                        }
                    }
                    , "buttons": {
                        "print": "Imprimer"
                        , "colvis": "Visibilité"
                    }
                },

            });
            // Search
            $('#search-input').on('input', function() {
                let query = $(this).val();

                $.ajax({
                    url: "{{ route('users.search') }}"
                    , type: 'GET'
                    , data: {
                        query: query
                    }
                    , success: function(users) {
                        console.log(users);
                    }
                    , error: function(xhr, status, error) {
                        console.log('Error :' + status + '' + error + '' + xhr.status + '' + xhr.statusText);
                    }
                });
            });

            // Notifications
            $.ajax({
                type: "GET"
                , url: "{{route('notification.index')}}"
                , success: function(data) {
                        // console.log("Notifications :", data.unreadNotifications.data)
                        let unreadNotifications = data.unreadNotifications

                        // console.log("unreadNotifications :", unreadNotifications)
                        //Display only 5 notifs
                        // unreadNotifications = data.unreadNotifications.data.slice(0, 6);
                        //count 
                        // let count = unreadNotifications.length > 5 ? "5+" : unreadNotifications.length
                        let count = unreadNotifications.length;
                        //Update notification count
                        // $('.notification-count').text(count)
                        $('span.badge.bg-primary.badge-number.notification-count').text(count)
                        // //Update dropdown menu
                        let html = ''
                        for (let index = 0; index < unreadNotifications.length; index++) {

                            html += `<li class="notification-item">
                                <i class="bi bi-exclamation-circle text-warning"></i>
                                <div>
                                    <a href="/users/notification/${unreadNotifications[index].id}" onclick="event.preventDefault(); document.getElementById('markAsRead-form').submit();">
                                        <h4>${unreadNotifications[index].data.name}</h4>
                                        <p>${unreadNotifications[index].data.message}</p>
                                        <p>${moment(unreadNotifications[index].created_at).fromNow()}</p>
                                    </a>
                                    <form id="markAsRead-form" action="/users/notification/${unreadNotifications[index].id}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>`
                            // html += '<li><a href="' + unreadNotifications[index].data.name + '">' + unreadNotifications[index].data.name + '</a></li>';
                        }
                        $('.notifications').html(html);
                    }

                , error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Handle any errors that occur
                }
            });

            // Unread Messages
            $.ajax({
                type: "GET"
                , url: "{{route('messages.unread')}}"
                , success: function(data) {
                        let messages = data.messages
                        console.log("unread messages :", messages)

                        // console.log("messages :", messages)
                        //Display only 5 notifs
                        // messages = messages.slice(0, 6);
                        //count 
                        let count = messages.length > 10 ? "10+" : messages.length
                        // console.log('count :', count);
                        //Update notification count
                        $('.messages-count').text(count)
                        // //Update dropdown menu

                        let html = ''
                        for (let index = 0; index < messages.length; index++) {
                            html += `
                            <li class="message-item">
                            <a href="{{route('messages.index')}}">
                                <div>
                                <h4>${messages[index].name}</h4>
                                <p>${messages[index].created_at}</p>
                                </div>
                            </a>
                            </li>
                            `
                        }
                        $('.all-messages').html(html);

                    }

                , error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Handle any errors that occur
                }
            });





        });

    </script>

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>

    @yield('content')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset("assets/vendor/apexcharts/apexcharts.min.js")}}"></script>
    <script src="{{asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("assets/vendor/chart.js/chart.min.js")}}"></script>
    <script src="{{asset("assets/vendor/echarts/echarts.min.js")}}"></script>
    <script src="{{asset("assets/vendor/quill/quill.min.js")}}"></script>
    <script src="{{asset("assets/vendor/simple-datatables/simple-datatables.js")}}"></script>
    <script src="{{asset("assets/vendor/tinymce/tinymce.min.js")}}"></script>
    <script src="{{asset("assets/vendor/php-email-form/validate.js")}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset("assets/js/main.js")}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <!-- Scripts -->
    <!-- DataTables JS -->
    <script src="{{url('https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        setTimeout(function() {
            $('.alert.alert-success').fadeOut('slow');
        }, 5000); // 5000 milliseconds = 5 seconds
        setTimeout(function() {
            $('.alert.alert-danger').fadeOut('slow');
        }, 5000); // 5000 milliseconds = 5 seconds

    </script>

</body>

</html>
