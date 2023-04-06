<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

    {{-- Bootstrap icons  --}}
    <link href='{{url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css")}}' rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{asset("assets/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    {{-- <link href="{{asset("assets/vendor/bootstrap-icons/bootstrap-icons.css")}}" rel="stylesheet"> --}}
    <link href="{{asset("assets/vendor/boxicons/css/boxicons.min.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/quill/quill.snow.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/quill/quill.bubble.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/remixicon/remixicon.css")}}" rel="stylesheet">
    <link href="{{asset("assets/vendor/simple-datatables/style.css")}}" rel="stylesheet">

    {{-- DataTable --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">


    <!-- Template Main CSS File -->
    <link href="{{asset("assets/css/style.css")}}" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <script src="{{asset("assets/vendor/jquery/jquery.3.6.6/jquery.3.6.6.js")}}"></script>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


        });

    </script>
    {{-- DataTable --}}


</head>
<body>

    <div class="about-hero">
        <!-- Navigation  -->
        @include('partials._nav')
        @include('partials._banner')
    </div>

    <!-- Main Content -->
    @yield("content")

    @include('partials._footer')

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

    <script>
        setTimeout(function() {
            $('.alert.alert-success').fadeOut('slow');
        }, 5000); // 5000 milliseconds = 5 seconds

    </script>


    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        let table = $('#member-list').DataTable({
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

    </script>
</body>
</html>
