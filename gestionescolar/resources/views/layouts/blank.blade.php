<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @section('meta')
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @show 
    

    <title>{{ config('app.name', 'Laravel') }}</title>
    @section('styles')
    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">
    @show
  
</head>
<body class="{{$class_body or ""}}">

        
            @yield('content')
        
            @section('script')          

            @show
</body>
</html>
