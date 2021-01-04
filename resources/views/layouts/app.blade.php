<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <script src="{{ asset('js/bootstrap.min.js" type="text/javascript') }}"></script>
    <script src="{{ asset('js/bootstrap.js" type="text/javascript') }}"></script>


  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

    <title>Enrique Molina Garmendia</title>

  <link rel="shortcut icon" type="image/png" href="/images/descarga.png"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        body{
            background-image:url({{asset('images/vintage-wallpaper.png')}});
        }

    </style>

</head>
<body>
    <div id="app">


        <main class="py-4">

            @yield('content')
        </main>
    </div>
</body>
</html>
<style type="text/css">
                            .center {
                                  display: block;
                                  margin-left: auto;
                                  margin-right: auto;
                          
                                }
                </style>
