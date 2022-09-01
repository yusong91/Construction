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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    
    
<style>

    .collapsible {
        
        background-color: #82EBFF;
        color: #444;
        cursor: pointer;
        padding: 12px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    }

    .content {
        padding: 0 0;
        display: none;
        overflow: hidden;
    }
     
    .collapsible_exponse {
        
        background-color: #FED2A9;
        color: #444;
        cursor: pointer;
        padding: 12px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    }

    .content_exponse {
        padding: 0 0;
        display: none;
        overflow: hidden;
    }

</style>

</head>
<body>
    @include('partials.navbar')

    <div class="container-fluid">
        
        <main role="main">
            @yield('content')
        </main>
            
    </div>
    
</body>
<footer>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ url(mix('assets/js/vendor.js')) }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <script>

        var coll = document.getElementsByClassName("collapsible");
       
        for (var i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }

        var coll_exponse = document.getElementsByClassName("collapsible_exponse");
       
        for (var i = 0; i < coll_exponse.length; i++) {
            coll_exponse[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content_exponse = this.nextElementSibling;
                if (content_exponse.style.display === "block") {
                    content_exponse.style.display = "none";
                } else {
                    content_exponse.style.display = "block";
                }
            });
        }

        $(document).ready( function () {
            $('#table_id').DataTable(
               {
                "paging": false,
                "searching": false,
                "info": false
               }
            );
        });

        $(document).ready( function () {
            $('#table_expense').DataTable(
               {
                "paging": false,
                "searching": false,
                "info": false
               }
            );
        });
        
    
    
    </script>
    
</footer>
</html>
