<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome/css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/materialize.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}"/>
    </head>
    <body>
        <div id="app">
            @include('includes.header')
        </div>
        <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/materialize.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
    </body>
</html>
