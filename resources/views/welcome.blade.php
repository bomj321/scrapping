<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Ventas</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!--BOOTSTRAP-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
<!--BOOTSTRAP-->

<!--ICONOS-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<!--ICONOS-->

<!--ESTILOS PERSONALIZADOS-->
<link href="{{ asset('css/multiselect.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" >

<!--ESTILOS PERSONALIZADOS-->
    </head>

    <body>
      <div class="container-fluid">

@include('includes.header')


@include('includes.body')


@include('includes.footer')
</div>

    </body>







<!--SCRIPTS PERSONALIZADOS-->
<script src="{{ asset('js/app.js') }}"></script>
<!--SCRIPTS PERSONALIZADOS-->
</html>
