<!DOCTYPE html>
<html lang="en">

<head>
    <title>Realysta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', "{{$pro->propertyAdvance->google_analytics_id or ""}}", 'auto');
            ga('send', 'pageview');
    </script>
    <!-- End Google Analytics -->
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','#');

    fbq('init', '{{$pro->propertyAdvance->fb_pixel_id or ""}}');
    fbq('track', "PageView");
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={{$pro->propertyAdvance->fb_pixel_id or ""}}&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/t3-style.css")}}">

    {{-- <link rel="stylesheet" href="{{asset("css/all.min.css")}}"> --}}

    <link rel="stylesheet" href="{{asset("css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/owl.theme.default.min.css")}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>


    <script src="{{asset("js/jquery.min.js")}}"></script>
    <script src="{{asset("js/popper.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/owl.carousel.js")}}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    @include('frontend.partials.favicon')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <script>
        $(document).ready(function(){
            setTimeout(() => {
                $(".video-wrap-new").slick({
                    lazyLoad: 'ondemand', // ondemand progressive anticipated
                    infinite: true,
                    dots: true,
                    fade: true,
                    arrows:false,
                    cssEase: 'linear'
                });
            }, 2000);
        });
    </script>
</head>
@if(isset($pro->propertyTheme))
@if($pro->propertyTheme->main_image)
@php
$background = $pro->propertyTheme->main_image;
$logo = $pro->propertyTheme->logo;
$url = "/uploads/back_image/".$pro->id."/".$background;
@endphp
<style>
    section.main-section {

        background: url({{$url}}) !important;

    }
</style>

@else
<style>
    section.main-section {

        background: url("/images/t4-main-img.png") !important;

    }
</style>

@endif
@else
<style>
    section.main-section {

        background: url("/images/t4-main-img.png") !important;

    }
</style>
@endif

<body class='template-three'>
    <header id="main_header">
        <div class="container">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="#">
                    @if($property_logo != null)
                    <img src="{{$property_logo}}" alt="Log" style=" height: 51px; width: 211px;">
                    @else
                    <img src="{{asset("images/t1-logo.png")}}" alt="Logo">
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{$landing_page OR ""}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#about">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features">features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#photos">Photos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tour">3d tour</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#floorplans">floor plans</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#map">map</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <section class="main-section">
        <div class="container">
            <div class="text-content">
                <a href="#" class="btn bg-black cut-corners text-uppercase">best location . cheap price</a>
                <h1 class="text-uppercase">discover modern villa</h1>
                <a href="#photos" class="btn bg-yellow">View Gallery</a>
            </div>
        </div>
        <ul class="social">
            <li>
                <a href="#">facebook</a>
            </li>
            <li>
                <a href="#">twitter</a>
            </li>
            <li>
                <a href="#">linkedin</a>
            </li>
            <li>
                <a href="#">pinterest</a>
            </li>
        </ul>
    </section>
    <section class="pt-70 pb-70 about-section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-content">
                        <h5>VILLA OVERVIEW</h5>
                        <span class="seperator"></span>
                        <h3>ABOUT house VILLA</h3>
                        {!! $pro->propertydetails->description or "<p>Lorem Ipsum is simply dummy text of the printing
                            and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                            the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book. It has survived not only five centuries, but also the leap into electronic
                            typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                            release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>" !!}
                    </div>

                    <div class="btn-wrap">
                        {{-- <a href="#" class="btn bg-black"><span class="icon-paper" data-toggle="modal" data-target="#modal-document"></span>Documents</a> --}}
                        {{-- <a href="#" class="btn bg-black"><span class="icon-floor"></span>brochure</a> --}}
                        <a href="#" class="btn bg-black" data-toggle="modal" data-target="#modal-document">floor
                            plans</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="services-item">
                                <img src="{{asset("images/apartment-icon.png")}}">
                                <h4>{{$pro->propertydetails->stories or 2}} </h4>
                                <p>bedrooms</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="services-item">
                                <img src="{{asset("images/surface-icon.png")}}">
                                <h4>{{$pro->propertydetails->sqr_foot or '2000'}}
                                    {{$pro->propertydetails->sqr_foot_metric or "m2"}}</h4>
                                <p>surface living</p>
                            </div>
                        </div>
                        <div class="col-md-6 mt-30">
                            <div class="services-item">
                                <img src="{{asset("images/home-icon.png")}}">
                                <h4>{{$pro->propertydetails->year_built or 1992}}</h4>
                                <p>year built</p>
                            </div>
                        </div>
                        <div class="col-md-6 mt-30">
                            <div class="services-item">
                                <img src="{{asset("images/car-icon.png")}}">
                                <h4>{{$pro->propertydetails->rooms or 2}}</h4>
                                <p>rooms</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gallery-section pt-0 pb-70" id="photos">
        <div class="container-fluid">
            <div class="row">
                @if($pro->propertyPhoto != null)
                @foreach($pro->propertyPhoto as $photo)

                <div class="col-md-4 mb-4">
                    <div class="gallery-items">
                        <div class="img-wrap">
                            <a id="single_image" rel="gallery1" data-fancybox="gallery"
                                href="/uploads/{{$pro->id}}/{{$photo->images}}"><img
                                    src="/uploads/{{$pro->id}}/{{$photo->images}}" class="" /></a>
                        </div>
                        <div class="view">
                            <a id="single_image" rel="gallery1" data-fancybox="gallery"
                                href="/uploads/{{$pro->id}}/{{$photo->images}}">View</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-md-4 pl-0">
                    <div class="gallery-items">
                        <div class="img-wrap">
                            <img src="{{asset("images/t3-img.png")}}" />
                        </div>
                        <div class="view">
                            <a href="#">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-items">
                        <div class="img-wrap">
                            <img src="{{asset("images/t3-img2.png")}}" />
                        </div>
                        <div class="view">
                            <a href="#">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pr-0">
                    <div class="gallery-items">
                        <div class="img-wrap">
                            <img src="{{asset("images/t3-img3.png")}}" />
                        </div>
                        <div class="view">
                            <a href="#">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pl-0 pt-30">
                    <div class="gallery-items">
                        <div class="img-wrap">
                            <img src="{{asset("images/t3-img4.png")}}" />
                        </div>
                        <div class="view">
                            <a href="#">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-30">
                    <div class="gallery-items height-50 pb-15">
                        <div class="img-wrap">
                            <img src="{{asset("images/t3-img5.png")}}" />
                        </div>
                        <div class="view">
                            <a href="#">View</a>
                        </div>
                    </div>
                    <div class="gallery-items pt-15 height-50">
                        <div class="img-wrap">
                            <img src="{{asset("images/t3-img6.png")}}" />
                        </div>
                        <div class="view">
                            <a href="#">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pr-0 pt-30">
                    <div class="gallery-items">
                        <div class="img-wrap">
                            <img src="{{asset("images/t3-img7.png")}}" />
                        </div>
                        <div class="view">
                            <a href="#">View</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <section class="register-link">
        <div class="container">
            @if($pro->propertyVOH)

            @foreach($pro->propertyVOH as $voh)
            @php

            $end_time = $voh->date.' '.$voh->end_time;
            $timeZone = ($voh->timezone != '') ? $voh->timezone : 'America/New_York';
            $end_datetime = new \Carbon\Carbon($end_time, $timeZone);

            @endphp
            @if ($voh->type == 'livestream' && $end_datetime->isPast() == false )
            <div class="text-content mt-5">
                <h3>{{$voh->title}}</h3>
                @if ($voh->link_title != '' && $voh->link != '')
                <p class="voh_link"><a href="{{$voh->link}}" target="_blank"><svg version="1.1" id="Layer_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                            xml:space="preserve">
                            <g>
                                <g>
                                    <path
                                        d="M488.727,0H302.545c-12.853,0-23.273,10.42-23.273,23.273c0,12.853,10.42,23.273,23.273,23.273h129.997L192.999,286.09
                           c-9.089,9.089-9.089,23.823,0,32.912c4.543,4.544,10.499,6.816,16.455,6.816c5.956,0,11.913-2.271,16.457-6.817L465.455,79.458
                           v129.997c0,12.853,10.42,23.273,23.273,23.273c12.853,0,23.273-10.42,23.273-23.273V23.273C512,10.42,501.58,0,488.727,0z" />
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path
                                        d="M395.636,232.727c-12.853,0-23.273,10.42-23.273,23.273v209.455H46.545V139.636H256c12.853,0,23.273-10.42,23.273-23.273
                           S268.853,93.091,256,93.091H23.273C10.42,93.091,0,103.511,0,116.364v372.364C0,501.58,10.42,512,23.273,512h372.364
                           c12.853,0,23.273-10.42,23.273-23.273V256C418.909,243.147,408.489,232.727,395.636,232.727z" />
                                </g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                        </svg>{{$voh->link_title}}</a></p>

                @endif


                <p>
                    {{\Carbon\Carbon::parse($voh->date)->format('l')}}
                    {{\Carbon\Carbon::parse($voh->date)->format('F')}}
                    {{\Carbon\Carbon::parse($voh->date)->format('dS')}}
                    {{\Carbon\Carbon::parse($voh->start_time)->format('g:i A')}} -
                    {{\Carbon\Carbon::parse($voh->end_time)->format('g:i A')}}
                    @php
                    $timeZone = ($voh->timezone != '') ? $voh->timezone : 'America/New_York';
                    $time = new DateTime(null, new DateTimeZone($timeZone));
                    $offset = $time->format('P');
                    // $timezone = substr($voh->timezone, strlen($continent) + 1);
                    $timezone = str_replace('St_', 'St. ', $timeZone);
                    $timezone = str_replace('_', ' ', $timeZone);
                    echo '(GMT/UTC' . $offset . ')';
                    @endphp
                </p>


                @if ($voh->registration)
                <a data-id="{{$voh->id}}" class="btn bg-yellow register_now">register
                    Now</a>
                @endif
            </div>

            @elseif( $voh->type == 'video' && $voh->video_url != '')
            <div class="text-content">
                <h3>{{$voh->title}}</h3>

                <iframe width="560" height="315" src="{{$voh->video_url}}" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

            </div>

            @endif



            @endforeach
            @else
            <div class="text-content">
                <h3>virtual open house</h3>
                <p>saturday may 1st 10:45 am - 11:45 am</p>
                <a href="#" class="btn bg-yellow">register Now</a>
            </div>
            @endif
        </div>
    </section>
    <section class="feature-section" id="features">
        <div class="container">
            <div class="text-content">
                <h3>features</h3>
                <div class="features-wrap">
                    <ul>
                        @if(isset($pro->propertyDetails->amenties))
                        @php
                        $amenties = explode(',',$pro->propertyDetails->amenties);
                        @endphp
                        @foreach ($amenties as $item)
                        <li>{{$item}}</li>
                        @endforeach
                        @else
                        <li>Beach Access</li>
                        <li>City Lights Views</li>
                        <li>Reat Schools</li>
                        <li>Heated Pool</li>
                        <li>Large Kitchen</li>
                        <li>Large Lot</li>
                        <li>New Construction</li>
                        <li>Gated Community</li>
                        <li>Open Floor Plan</li>
                        <li>Quiet and Private</li>
                        <li>Shopping Nearby</li>
                        <li>Ocean Views</li>
                        <li>Open Floor Plan</li>
                        <li>Quiet and Private</li>
                        <li>Shopping Nearby</li>
                        <li>Great Schools</li>
                        <li>High Ceilings</li>
                        <li>Oversized Windows</li>
                        <li>Custom Amenities</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="floor-plan pt-70 pb-70" id="floorplans">
        <div class="container">
            <div class="text-content">
                <h3>floor plans</h3>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Floor 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Floor 2</a>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-md-4">
                        <div class="responsive-table">
                            <table>
                                <tr>
                                    <td class="text-left">floors</td>
                                    <td class="text-right"> {{$pro->propertyDetails->stories or 2}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">bedroom</td>
                                    <td class="text-right">{{$pro->propertyDetails->bedrooms or 2}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">bathrooms</td>
                                    <td class="text-right">{{$pro->propertyDetails->bathrooms or 3}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">total area</td>
                                    <td class="text-right">{{$pro->propertyDetails->lot_size or '5,114'}}
                                        {{$pro->propertyDetails->metric or "m2"}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">parking</td>
                                    <td class="text-right">{{$pro->propertyDetails->parking_space or "Yes"}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">surface area</td>
                                    <td class="text-right">{{$pro->propertyDetails->sqr_foot or '2000'}}
                                        {{$pro->propertyDetails->sqr_foot_metric or "m2"}}</td>
                                </tr>
                                <tr>
                                    <td>price</td>
                                    <td class="text-right">{{$pro->propertyDetails->currency or "$"}}
                                        {{$pro->propertyDetails->display_price or "70,0000"}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="img-wrap">
                            <img class="img-fluid ml-auto mr-auto d-block" src="{{asset("images/plan-img.png")}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-content">
                            <p class="text-justify"> {!! $pro->propertydetails->description or "Lorem Ipsum is simply
                                dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                                standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                                and scrambled it to make a type specimen book. It has survived not only five centuries,
                                but also the leap into electronic typesetting, remaining essentially unchanged. It was
                                popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                passages, and more recently with desktop publishing software like Aldus PageMaker
                                including versions of Lorem Ipsum." !!}</p>
                            <a href="#" class="btn bg-yellow">learn more</a><br />
                            {{-- <img src="{{asset("images/powered-bylogo.png")}}"> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="video-tab pt-70 pb-70" id="tour">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#vtour">
                        <img src="{{asset("images/overlap-icon.png")}}">
                        virtual tour
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#video">
                        <img src="{{asset("images/overlap-icon.png")}}">
                        Video
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="video" class="container tab-pane active">
                    <div class="video-wrap video-wrap-new mt-3 d-flex justify-content-center col-md-8 offset-md-2">
                        @if($pro->propertyVideo)
                        @foreach($pro->propertyVideo as $link)
                        @if($link->virtual_link != '')
                        <div>
                            <iframe src="{!! trim($link->virtual_link) !!}" allowfullscreen="true"
                                webkitallowfullscreen="true" mozallowfullscreen="true" oallowfullscreen="true"
                                msallowfullscreen="true" style="width: 100%;height: 500px;"></iframe>
                        </div>
                        @elseif($link->video_link != '')


                        <video style="width: 100%;height: 500px;" controls>
                            <source src="/uploads/{{$link->property_id}}/{{$link->video_link}}">
                            Your browser does not support the video tag.
                        </video>
                        @endif
                        @endforeach

                        @else
                        <iframe src="https://my.matterport.com/show/?m=aSx1MpRRqif" name="Demo newhome.ch TOP"
                            width="200%" height="400%" frameborder="0"
                            allow="fullscreen; accelerometer; gyroscope; magnetometer; vr; xr; xr-spatial-tracking; autoplay; camera; microphone"
                            allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"
                            oallowfullscreen="true" msallowfullscreen="true" style="width: 76%;height: 330px;"></iframe>

                        @endif
                    </div>
                </div>
                <div id="vtour" class="container tab-pane active">
                    <div class="video-wrap video-wrap-new mt-3 d-flex justify-content-center col-md-8 offset-md-2">
                        @if($pro->propertyVirtual)
                        @foreach($pro->propertyVirtual as $link)
                        @if($link->virtual_link != '')
                        <div>
                            <iframe src="{!! trim($link->virtual_link) !!}" allowfullscreen="true"
                                webkitallowfullscreen="true" mozallowfullscreen="true" oallowfullscreen="true"
                                msallowfullscreen="true" style="width: 100%;height: 500px;"></iframe>
                        </div>
                        @elseif($link->video_link != '')


                        <video style="width: 100%;height: 500px;" controls>
                            <source src="/uploads/{{$link->property_id}}/{{$link->video_link}}">
                            Your browser does not support the video tag.
                        </video>
                        @endif
                        @endforeach

                        @else
                        <iframe src="https://my.matterport.com/show/?m=aSx1MpRRqif" name="Demo newhome.ch TOP"
                            width="200%" height="400%" frameborder="0"
                            allow="fullscreen; accelerometer; gyroscope; magnetometer; vr; xr; xr-spatial-tracking; autoplay; camera; microphone"
                            allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"
                            oallowfullscreen="true" msallowfullscreen="true" style="width: 76%;height: 330px;"></iframe>

                        @endif
                    </div>
                </div>
                <div id="plans" class="container tab-pane active">
                    <div class="video-wrap">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="pt-0 pb-0">
        <div class="container" id="contact">
            <div class="row">
                <div class="col-md-8 pt-70">
                    <div class="text-content">
                        <h3>presented by</h3>
                        <div class="row">
                            @php
                            $authors =
                            \App\User::where('id',$pro->user_id)->orWhere('invited_by',$pro->user_id)->where('active','1')->get();

                            @endphp
                            @if(count($authors)>0)
                            @foreach($authors as $author)
                            <div class="col-md-6">
                                <div class="auther-content">
                                    <div class="auther-img">
                                        @if($author->photo != null)
                                        <img src="/uploads/profile/{{$author->id}}/{{$author->photo}}"
                                            class="img-fluid">
                                        @else
                                        <img src="{{asset("images/auther1.png")}}" class="img-fluid">
                                        @endif
                                    </div>
                                    <div class="auther-info">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <h4>{{$author->fname}} {{$author->lname}}</h4>
                                                <p>{{$author->email}}</p>
                                                <div class="social">
                                                    <a href="{{$author->facebook}}" class="social-tag fb"><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a href="{{$author->website}}" class="btn website-link">Website</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="col-md-6">
                                <div class="auther-content">
                                    <div class="auther-img">
                                        <img src="{{asset("images/auther1.png")}}" class="img-fluid">
                                    </div>
                                    <div class="auther-info">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <h4>leslie m.</h4>
                                                <p>SampleCo</p>
                                                <p>Agent@example.com</p>
                                                <p>Lic# 123456</p>
                                                <div class="social">
                                                    <a href="#" class="social-tag twit"><i
                                                            class="fab fa-twitter"></i></a>
                                                    <a href="#" class="btn website-link">Website</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="map-div-wrap"></div>
                    </div>
                </div>
                <div class="col-md-4 pt-70">
                    <div class="text-content">
                        <h3>get in touch</h3>
                    </div>
                    <div class="footer-form">
                        <div class="alert alert-success" id="succeess" style="display: none">Success!</div>
                        <div class="alert alert-danger" id="error" style="display: none">Something went wrong!</div>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="last" id="last" placeholder="Last" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Your message"
                                    id="message" /></textarea>
                            </div>
                            <a href="#" id="send-mail" class="btn bg-yellow">Send Inquiry</a>
                        </form>
                        <ul class="followus">
                            <li>
                                <a href='javascript:void(0)' class='share_link'
                                    data-url="{{$social_share['facebook']}}"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href='javascript:void(0)' class='share_link'
                                    data-url="{{$social_share['twitter']}}"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href='javascript:void(0)' class='share_link'
                                    data-url="{{$social_share['linkedin']}}"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href='javascript:void(0)' class='share_link'
                                    data-url="{{$social_share['pintrest']}}"><i class="fab fa-pinterest-p"></i></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <section class="map-section" id="map1">
        <div class="map-wrap">
            <div class="col-md-12">
                <div id="map" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
    </section>
    <div class="modal right fade" id="modal-document" tabindex="-1" role="dialog" aria-labelledby="">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel2">Documents</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-docs"
                                role="tab" aria-controls="pills-home" aria-selected="true">Documents</a>
                        </li>
                        @if($pro->propertyFloor)
                        <li class="nav-item">
                            <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-floor" role="tab"
                                aria-controls="pills-home" aria-selected="true">Floor Plans</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-docs" role="tabpanel"
                            aria-labelledby="pills-home-tab">

                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">File</th>
                                        <th scope="col">Download</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pro->propertyFloor as $files)
                                    <tr>
                                        @if($files->type == '1')
                                        <td>{{$files->file}}</td>
                                        <td>
                                            <ul class="file_view_dl">
                                                <li>
                                                    <a href="/uploads/floor/{{$files->property_id}}/{{$files->file}}"
                                                        download={{$files->file}}><svg version="1.1" id="Capa_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            width="475.078px" height="475.077px"
                                                            viewBox="0 0 475.078 475.077"
                                                            style="enable-background:new 0 0 475.078 475.077;"
                                                            xml:space="preserve">
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M467.083,318.627c-5.324-5.328-11.8-7.994-19.41-7.994H315.195l-38.828,38.827c-11.04,10.657-23.982,15.988-38.828,15.988 c-14.843,0-27.789-5.324-38.828-15.988l-38.543-38.827H27.408c-7.612,0-14.083,2.669-19.414,7.994 C2.664,323.955,0,330.427,0,338.044v91.358c0,7.614,2.664,14.085,7.994,19.414c5.33,5.328,11.801,7.99,19.414,7.99h420.266 c7.61,0,14.086-2.662,19.41-7.99c5.332-5.329,7.994-11.8,7.994-19.414v-91.358C475.078,330.427,472.416,323.955,467.083,318.627z M360.025,414.841c-3.621,3.617-7.905,5.424-12.854,5.424s-9.227-1.807-12.847-5.424c-3.614-3.617-5.421-7.898-5.421-12.844 c0-4.948,1.807-9.236,5.421-12.847c3.62-3.62,7.898-5.431,12.847-5.431s9.232,1.811,12.854,5.431 c3.613,3.61,5.421,7.898,5.421,12.847C365.446,406.942,363.638,411.224,360.025,414.841z M433.109,414.841 c-3.614,3.617-7.898,5.424-12.848,5.424c-4.948,0-9.229-1.807-12.847-5.424c-3.613-3.617-5.42-7.898-5.42-12.844 c0-4.948,1.807-9.236,5.42-12.847c3.617-3.62,7.898-5.431,12.847-5.431c4.949,0,9.233,1.811,12.848,5.431 c3.617,3.61,5.427,7.898,5.427,12.847C438.536,406.942,436.729,411.224,433.109,414.841z" />
                                                                    <path
                                                                        d="M224.692,323.479c3.428,3.613,7.71,5.421,12.847,5.421c5.141,0,9.418-1.808,12.847-5.421l127.907-127.908 c5.899-5.519,7.234-12.182,3.997-19.986c-3.23-7.421-8.847-11.132-16.844-11.136h-73.091V36.543c0-4.948-1.811-9.231-5.421-12.847 c-3.62-3.617-7.901-5.426-12.847-5.426h-73.096c-4.946,0-9.229,1.809-12.847,5.426c-3.615,3.616-5.424,7.898-5.424,12.847V164.45 h-73.089c-7.998,0-13.61,3.715-16.846,11.136c-3.234,7.801-1.903,14.467,3.999,19.986L224.692,323.479z" />
                                                                </g>
                                                            </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                        </svg></a>

                                                </li>
                                                <li><a target="_blank"
                                                        href="/uploads/floor/{{$files->property_id}}/{{$files->file}}">
                                                        <svg height="512pt" viewBox="-27 0 512 512" width="512pt"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="m188 492c0 11.046875-8.953125 20-20 20h-88c-44.113281 0-80-35.886719-80-80v-352c0-44.113281 35.886719-80 80-80h245.890625c44.109375 0 80 35.886719 80 80v191c0 11.046875-8.957031 20-20 20-11.046875 0-20-8.953125-20-20v-191c0-22.054688-17.945313-40-40-40h-245.890625c-22.054688 0-40 17.945312-40 40v352c0 22.054688 17.945312 40 40 40h88c11.046875 0 20 8.953125 20 20zm117.890625-372h-206c-11.046875 0-20 8.953125-20 20s8.953125 20 20 20h206c11.042969 0 20-8.953125 20-20s-8.957031-20-20-20zm20 100c0-11.046875-8.957031-20-20-20h-206c-11.046875 0-20 8.953125-20 20s8.953125 20 20 20h206c11.042969 0 20-8.953125 20-20zm-226 60c-11.046875 0-20 8.953125-20 20s8.953125 20 20 20h105.109375c11.046875 0 20-8.953125 20-20s-8.953125-20-20-20zm355.472656 146.496094c-.703125 1.003906-3.113281 4.414062-4.609375 6.300781-6.699218 8.425781-22.378906 28.148437-44.195312 45.558594-27.972656 22.324219-56.757813 33.644531-85.558594 33.644531s-57.585938-11.320312-85.558594-33.644531c-21.816406-17.410157-37.496094-37.136719-44.191406-45.558594-1.5-1.886719-3.910156-5.300781-4.613281-6.300781-4.847657-6.898438-4.847657-16.097656 0-22.996094.703125-1 3.113281-4.414062 4.613281-6.300781 6.695312-8.421875 22.375-28.144531 44.191406-45.554688 27.972656-22.324219 56.757813-33.644531 85.558594-33.644531s57.585938 11.320312 85.558594 33.644531c21.816406 17.410157 37.496094 37.136719 44.191406 45.558594 1.5 1.886719 3.910156 5.300781 4.613281 6.300781 4.847657 6.898438 4.847657 16.09375 0 22.992188zm-41.71875-11.496094c-31.800781-37.832031-62.9375-57-92.644531-57-29.703125 0-60.84375 19.164062-92.644531 57 31.800781 37.832031 62.9375 57 92.644531 57s60.84375-19.164062 92.644531-57zm-91.644531-38c-20.988281 0-38 17.011719-38 38s17.011719 38 38 38 38-17.011719 38-38-17.011719-38-38-38zm0 0" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="pills-floor" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">File</th>
                                        <th scope="col">Download / View</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pro->propertyFloor as $files)
                                    <tr>
                                        @if($files->type == '2')
                                        <td>{{$files->file}}</td>
                                        <td>
                                            <ul class="file_view_dl">
                                                <li>
                                                    <a href="/uploads/floor/{{$files->property_id}}/{{$files->file}}"
                                                        download={{$files->file}}><svg version="1.1" id="Capa_1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            width="475.078px" height="475.077px"
                                                            viewBox="0 0 475.078 475.077"
                                                            style="enable-background:new 0 0 475.078 475.077;"
                                                            xml:space="preserve">
                                                            <g>
                                                                <g>
                                                                    <path
                                                                        d="M467.083,318.627c-5.324-5.328-11.8-7.994-19.41-7.994H315.195l-38.828,38.827c-11.04,10.657-23.982,15.988-38.828,15.988 c-14.843,0-27.789-5.324-38.828-15.988l-38.543-38.827H27.408c-7.612,0-14.083,2.669-19.414,7.994 C2.664,323.955,0,330.427,0,338.044v91.358c0,7.614,2.664,14.085,7.994,19.414c5.33,5.328,11.801,7.99,19.414,7.99h420.266 c7.61,0,14.086-2.662,19.41-7.99c5.332-5.329,7.994-11.8,7.994-19.414v-91.358C475.078,330.427,472.416,323.955,467.083,318.627z M360.025,414.841c-3.621,3.617-7.905,5.424-12.854,5.424s-9.227-1.807-12.847-5.424c-3.614-3.617-5.421-7.898-5.421-12.844 c0-4.948,1.807-9.236,5.421-12.847c3.62-3.62,7.898-5.431,12.847-5.431s9.232,1.811,12.854,5.431 c3.613,3.61,5.421,7.898,5.421,12.847C365.446,406.942,363.638,411.224,360.025,414.841z M433.109,414.841 c-3.614,3.617-7.898,5.424-12.848,5.424c-4.948,0-9.229-1.807-12.847-5.424c-3.613-3.617-5.42-7.898-5.42-12.844 c0-4.948,1.807-9.236,5.42-12.847c3.617-3.62,7.898-5.431,12.847-5.431c4.949,0,9.233,1.811,12.848,5.431 c3.617,3.61,5.427,7.898,5.427,12.847C438.536,406.942,436.729,411.224,433.109,414.841z" />
                                                                    <path
                                                                        d="M224.692,323.479c3.428,3.613,7.71,5.421,12.847,5.421c5.141,0,9.418-1.808,12.847-5.421l127.907-127.908 c5.899-5.519,7.234-12.182,3.997-19.986c-3.23-7.421-8.847-11.132-16.844-11.136h-73.091V36.543c0-4.948-1.811-9.231-5.421-12.847 c-3.62-3.617-7.901-5.426-12.847-5.426h-73.096c-4.946,0-9.229,1.809-12.847,5.426c-3.615,3.616-5.424,7.898-5.424,12.847V164.45 h-73.089c-7.998,0-13.61,3.715-16.846,11.136c-3.234,7.801-1.903,14.467,3.999,19.986L224.692,323.479z" />
                                                                </g>
                                                            </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                            <g> </g>
                                                        </svg></a>

                                                </li>
                                                <li><a target="_blank"
                                                        href="/uploads/floor/{{$files->property_id}}/{{$files->file}}">
                                                        <svg height="512pt" viewBox="-27 0 512 512" width="512pt"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="m188 492c0 11.046875-8.953125 20-20 20h-88c-44.113281 0-80-35.886719-80-80v-352c0-44.113281 35.886719-80 80-80h245.890625c44.109375 0 80 35.886719 80 80v191c0 11.046875-8.957031 20-20 20-11.046875 0-20-8.953125-20-20v-191c0-22.054688-17.945313-40-40-40h-245.890625c-22.054688 0-40 17.945312-40 40v352c0 22.054688 17.945312 40 40 40h88c11.046875 0 20 8.953125 20 20zm117.890625-372h-206c-11.046875 0-20 8.953125-20 20s8.953125 20 20 20h206c11.042969 0 20-8.953125 20-20s-8.957031-20-20-20zm20 100c0-11.046875-8.957031-20-20-20h-206c-11.046875 0-20 8.953125-20 20s8.953125 20 20 20h206c11.042969 0 20-8.953125 20-20zm-226 60c-11.046875 0-20 8.953125-20 20s8.953125 20 20 20h105.109375c11.046875 0 20-8.953125 20-20s-8.953125-20-20-20zm355.472656 146.496094c-.703125 1.003906-3.113281 4.414062-4.609375 6.300781-6.699218 8.425781-22.378906 28.148437-44.195312 45.558594-27.972656 22.324219-56.757813 33.644531-85.558594 33.644531s-57.585938-11.320312-85.558594-33.644531c-21.816406-17.410157-37.496094-37.136719-44.191406-45.558594-1.5-1.886719-3.910156-5.300781-4.613281-6.300781-4.847657-6.898438-4.847657-16.097656 0-22.996094.703125-1 3.113281-4.414062 4.613281-6.300781 6.695312-8.421875 22.375-28.144531 44.191406-45.554688 27.972656-22.324219 56.757813-33.644531 85.558594-33.644531s57.585938 11.320312 85.558594 33.644531c21.816406 17.410157 37.496094 37.136719 44.191406 45.558594 1.5 1.886719 3.910156 5.300781 4.613281 6.300781 4.847657 6.898438 4.847657 16.09375 0 22.992188zm-41.71875-11.496094c-31.800781-37.832031-62.9375-57-92.644531-57-29.703125 0-60.84375 19.164062-92.644531 57 31.800781 37.832031 62.9375 57 92.644531 57s60.84375-19.164062 92.644531-57zm-91.644531-38c-20.988281 0-38 17.011719-38 38s17.011719 38 38 38 38-17.011719 38-38-17.011719-38-38-38zm0 0" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    @else
                    <p>No Documents</p>
                    @endif
                </div>

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
    @include('pages.registration-modal')

    <script>
        // When the user scrolls the page, execute myFunction
        window.onscroll = function() {myFunction()};

        // Get the header
        var header = document.getElementById("main_header");

        // Get the offset position of the navbar
        var sticky = header.offsetTop;

        // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("header-sticky");
        } else {
            header.classList.remove("header-sticky");
        }
        }
    </script>
</body>

</html>
@php
$country= \DB::table("countries")->where("id",$pro->country)->first();
$states= \DB::table("states")->where("id",$pro->state)->first();
$cities= \DB::table("cities")->where("id",$pro->city)->first();
@endphp
<script>
    $("#send-mail").click(function(){
        event.preventDefault()
         var name = $('#name').val() + $('#last').val();
         var email = $('#email').val();
         var message = $('#message').val();
         var user_id = {{$pro->user_id}}
         var property_id = {{$pro->id}}
          $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    type:'post',
                    url:'/lead-contact',
                    data: { name: name, email: email, message: message,user_id,property_id},
                    dataType: 'JSON',
                    success:function(data){

                      $('#succeess').show()
                      $('#error').hide()
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown, request) {
                            $('#error').show()
                      $('#succeess').hide()
                        }
                });
        })
    window.onbeforeunload = function () {
    window.scrollTo(0,0);
};
</script>
<script>
    $(document).ready(function() {
  $('.property-photo a').click(function(e) {
    e.preventDefault(); //stops image loading
    // console.log($(this))

    var picUrl = $(this).attr("href"); //stores image URL to variable

    var picDesc = $('img', this).attr("alt"); //stores images description to variable

    $("<div class='overlay'><div class='lightBox'></div></div>").appendTo("body"); //append lightbox html to body
    $(".lightBox").append("<p><img src='" + picUrl + "'></p>"); //append image to lightbox
    $(".lightBox").append(picDesc);

    $('.overlay').click(function() {
      $('.overlay').css("display", "none"); //hide lightbox
    });
  });
});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQjmoWXaw3jONRXX6ou9i07L85AJ_0_ww&callback=map"></script>


<script type="text/javascript">
    var street = "{!! $pro->street or "8519 Star Road" !!}"
var city = "{!! $cities->name or "8519 Star Road" !!}"
var state = "{!! $states->name or "8519 Star Road" !!}"
var country = "{!! $country->name or "8519 Star Road" !!}"
var address = street+','+city+','+state+','+country;

var map = new google.maps.Map(document.getElementById('map'), {
mapTypeId: google.maps.MapTypeId.TERRAIN,
zoom: 6
});

var geocoder = new google.maps.Geocoder();

geocoder.geocode({
'address': address
},
function(results, status) {
if(status == google.maps.GeocoderStatus.OK) {
new google.maps.Marker({
position: results[0].geometry.location,
map: map
});
map.setCenter(results[0].geometry.location);
}
});
</script>

<script>
    window.onbeforeunload = function () {
  window.scrollTo(0,0);
};

    $('ul.navbar-nav .nav-link').click(function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        $(this).closest('ul').find('.active').removeClass('active');
        $(this).addClass('active');
        if(href.substr(0, 1) !== '#'){
            window.location = href;
        }else{
            $('html, body').animate({
                scrollTop: $(href).offset().top - 200
            }, 2000);
        }
        $('#collapsibleNavbar').removeClass('show');
    });

$(document).on('click', '.share_link', function(){
            var data_url = $(this).attr('data-url');
            window.open(data_url,'TMSocialWindow',width=600,height=100);
            return false;
        });
</script>
