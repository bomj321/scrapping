<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
@include('includes.header')


@include('includes.body')


@include('includes.footer')
    </body>






<!--BOOTSTRAP-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!--BOOTSTRAP-->
<!--MULTISELECT-->
<script src="{{ asset('js/multiselect.min.js') }}"></script>

<!--MULTISELECT-->

<!--SCRIPTS PERSONALIZADOS-->
<script src="{{ asset('js/app.js') }}"></script>

<!--SCRIPTS PERSONALIZADOS-->

</html>
