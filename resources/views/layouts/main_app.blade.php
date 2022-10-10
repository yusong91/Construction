<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title') {{ setting('app_name') }}</title>

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('assets/img/icons/logo-144.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ url('assets/img/icons/logo-152.png') }}" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/logo-32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/logo-16.png') }}" sizes="16x16" />
    <meta name="application-name" content="{{ setting('app_name') }}"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ url('assets/img/icons/logo-144.png') }}" />

    <link media="all" type="text/css" rel="stylesheet" href="{{ url(mix('assets/css/vendor.css')) }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ url(mix('assets/css/app.css')) }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
<style>

        thead {
            background: #dddcdc
        }

        <style>
      input.larger {
        transform: scale(5);
        margin: 30px;
      }
    </style>

</style>

    @yield('styles')

    @hook('app:styles')


</head>
<body>
    @include('partials.navbar')

    <div class="container-fluid">
        
        <main role="main">
            @yield('content')
        </main>
            
    </div>
    
    <script src="{{ url(mix('assets/js/vendor.js')) }}"></script>
    <script src="{{ url('assets/js/as/app.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script>

        $(document).ready( function () {
            $('#myTable').DataTable();
        } );

    </script>
    <script>

        for(var i = 1; i <= 8; i++)
        {
            $('#purchased_date'+i).datepicker({
                format: 'dd/mm/yyyy'
            });
        }

        for(var i = 1; i <= 8; i++)
        {
            $('#a_date'+i).datepicker({
                format: 'dd/mm/yyyy'
            });

            $('#a_date'+i).datepicker().on('changeDate', function (ev) {
                console.log("selected " + ev.format(0,"dd/mm/yyyy"));
            });
        }

        for(var i = 1; i <= 8; i++)
        {
            $('#b_date'+i).datepicker({
                format: 'dd/mm/yyyy'
            });
        }

        $('#a_date').datepicker({
            format: 'dd/mm/yyyy'
        });

        $('#b_date').datepicker({
            format: 'dd/mm/yyyy'
        });
   
    </script>
    
    @yield('scripts')

    @hook('app:scripts')
</body>
</html>
