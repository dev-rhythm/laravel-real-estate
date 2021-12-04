<!DOCTYPE html>
<html lang="en">

<head>
    <title>Realysta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Saira:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    @include('frontend.partials.favicon')

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

    {{-- css for broker landing page --}}
    @if(Route::is('broker_landing_page') )
    <link rel="stylesheet" href="{{asset('css/broker-landingpage-style.css')}}">
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.js')}}"></script>
</head>
