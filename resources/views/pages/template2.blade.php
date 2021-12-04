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
    document,'script','https://connect.facebook.net/en_US/fbevents.js');

    fbq('init', '{{$pro->propertyAdvance->fb_pixel_id or ""}}');
    fbq('track', "PageView");
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={{$pro->propertyAdvance->fb_pixel_id or ""}}&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Saira:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/t2-style.css')}}">

    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1//js/all.min.js"></script>


    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.js')}}"></script>

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
    section.main-top {

        background: url({{$url}}) !important;

    }
</style>

@else
<style>
    section.main-top {

        background: url("/images/t4-main-img.png");

    }
</style>

@endif
@else
<style>
    section.main-top {

        background: url("/images/t4-main-img.png");

    }
</style>
@endif

<body class='template-two'>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="#">
                    @if($property_logo != null)
                    <img src="{{$property_logo}}" alt="Log" style="height: 98px;width: 145px;">
                    @else
                    <img src=" {{asset("images/t2-logo.png")}}" alt="Logo">
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{$landing_page OR ""}}"><img
                                    src="{{asset("images/home-icon-white.png")}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#home"><img
                                    src="{{asset("images/overview-icon.png")}}">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#feature"><img
                                    src="{{asset("images/features-icon.png")}}">features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#photos"><img src="{{asset("images/photos-icon.png")}}">Photos</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#video"><img src="{{asset("images/play-icon.png")}}">Video</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#floor"><img src="{{asset("images/overlap-icon.png")}}">3d
                                tour</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#floor"><img src="{{asset("images/floor-plans-icon.png")}}">floor
                                plans</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact"><img src="{{asset("images/envelope-icon.png")}}">contact
                                us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#map"><img src="{{asset("images/location-pin.png")}}">map</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <section class="main-top">
        <div class="text-content">

            @if($pro)
            @php
            $country= \DB::table("countries")->where("id",$pro->country)->first();
            $states= \DB::table("states")->where("id",$pro->state)->first();
            $cities= \DB::table("cities")->where("id",$pro->city)->first();
            @endphp
            @endif

            <h1>
                {{$pro->street or 'House care Street'}}<br />
                {{$cities->name or 'Laguna Beach'}}, {{$states->name or 'Ca'}} {{$pro->zipcode or 92125}}
            </h1>
            <a class="play-icon" href="#"><i class="fas fa-play"></i></a>
            <div class="powered-by">
                @if(isset($pro->propertyDetails->listing_status))
                @if($pro->propertyDetails->listing_status != "- None -" || $pro->propertyDetails->listing_status !=
                "None" || $pro->propertyDetails->listing_status != "select_or_other")
                <h3>{{$pro->propertyDetails->listing_status or "Escrow"}}</h3>
                @endif
                <h4>{{$pro->propertyDetails->currency or "$"}} {{$pro->propertyDetails->display_price or "70,000"}}
                </h4>
                @endif
            </div>
        </div>
        <a href="#" class="scroll-down">
            <img src="{{asset("images/down-shape.png")}}">
        </a>
    </section>
    <section class="about-section pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-content">
                        <h5>Laguna Beach</h5>
                        <h3 class="text-left">ABOUT THIS PROPERTY</h3>
                        <p> {!! $pro->propertydetails->description or " orem Ipsum is simply dummy text of the printing
                            and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                            the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book. It has survived not only five centuries, but also the leap into electronic
                            typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                            release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is
                            simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s, </p>" !!}
                        <div class="apt-info">
                            <ul>

                                <li>
                                    <h4>{{$pro->propertydetails->stories or 2}}</h4>
                                    <p>bedrooms</p>
                                </li>
                                <li>
                                    <h4>{{$pro->propertydetails->sqr_foot or "5,114"}}
                                        {{$pro->propertydetails->sqr_foot_metric or "m2"}} </h4>
                                    <p>Surface living</p>
                                </li>
                                <li>
                                    <h4>{{$pro->propertydetails->lot or "2000 "}}
                                        {{$pro->property_dettails->metric or "m2"}}</h4>
                                    <p>Land area</p>
                                </li>
                                <li>
                                    <h4>{{$pro->propertydetails->bedrooms or 2}}</h4>
                                    <p>No. of rooms</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-wrap">
                        @if(isset($pro->propertyTheme))
                        @if($pro->propertyTheme->main_image)
                        @php
                        $background = $pro->propertyTheme->main_image;
                        $logo = $pro->propertyTheme->logo;
                        @endphp
                        <img src="{{asset("uploads/back_image/$pro->id/$background")}}" class="img-fluid">
                        @else
                        <img src="{{asset("images/t4-main-img.png")}}" class="img-fluid" />
                        @endif
                        @else
                        <img src="{{asset("images/t4-main-img.png")}}" class="img-fluid" />
                        @endif
                    </div>
                </div>
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
                <a data-id="{{$voh->id}}" class="btn btn-purple register_now">register
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
                {{-- <a href="#" class="btn btn-purple">register Now</a> --}}
            </div>
            @endif
        </div>

    </section>
    <section class="feature-section pt-70 pb-70" id="feature">
        <div class="container">
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
    </section>
    <section class="photos-section pt-70 pb-70" id="photos">
        <div class="container">
            <h3>Photos</h3>
            <div class="photos-wrap">
                <div class="row">
                    @if(isset($pro->propertyPhoto))
                    @foreach($pro->propertyPhoto as $photo)
                    <div class="col-md-4 mb-3">
                        <div class="img-wrap">
                            <a rel="gallery1" data-fancybox="gallery"
                                href="/uploads/{{$pro->id}}/{{$photo->images}}"><img
                                    src="/uploads/{{$pro->id}}/{{$photo->images}}" class="img-fluid" /></a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-md-4 thrice">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="img-wrap">
                                    <img class="img-fluid" src="{{asset("images/t3-g1.png")}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-wrap">
                                    <img class="img-fluid" src="{{asset("images/t3-g2.png")}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-wrap">
                                    <img class="img-fluid" src="{{asset("images/t3-g3.png")}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="img-wrap">
                            <img class="img-fluid" src="{{asset("images/t3-g4.png")}}" />
                        </div>
                    </div>
                    <div class="col-md-4 twice">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="img-wrap">
                                    <img class="img-fluid" src="{{asset("images/t3-g5.png")}}" />
                                </div>
                            </div>
                            <div class="col-md-12 pt-12">
                                <div class="img-wrap">
                                    <img class="img-fluid" src="{{asset("images/t3-g6.png")}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-12">
                        <div class="img-wrap">
                            <img class="img-fluid" src="{{asset("images/t3-g7.png")}}" />
                        </div>
                    </div>
                    <div class="col-md-4 mt-12">
                        <div class="img-wrap">
                            <img class="img-fluid" src="{{asset("images/t3-g8.png")}}" />
                        </div>
                    </div>
                    <div class="col-md-5 mt-12">
                        <div class="img-wrap">
                            <img class="img-fluid" src="{{asset("images/t3-g9.png")}}" />
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="video-tab pt-70 pb-70" id="floor">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                {{-- <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#video">
                        <img src="{{asset("images/play-icon.png")}}" />
                Video
                </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#vtourr">
                        <img src="{{asset("images/overlap-icon.png")}}">
                        Virtual Tour
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#videot">
                        <img src="{{asset("images/play-icon.png")}}">
                        Videos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#flooor">
                        <img src="{{asset("images/floor-plans-icon.png")}}">
                        Floor Plans
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#doccc">
                        <img src="{{asset("images/floor-plans-icon.png")}}">
                        Documents
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="video" class="container tab-pane ">
                    <div class="video-wrap">
                    </div>
                </div>
                <div id="vtourr" class="container tab-pane active">
                    <div class="video-wrap video-wrap-new  mt-3 d-flex justify-content-center col-md-8 offset-md-2">

                        @if(isset($pro->propertyVirtual))
                        @foreach($pro->propertyVirtual as $link)

                        @if($link->virtual_link != '')
                        <div>

                            <iframe src="{!! trim($link->virtual_link) !!}" allowfullscreen="true"
                                webkitallowfullscreen="true" mozallowfullscreen="true" oallowfullscreen="true"
                                msallowfullscreen="true" style="width: 100%;height: 500px;"></iframe>
                        </div>

                        @elseif($link->video_link != '')
                        <div>

                            <video style="width: 100%;height: 500px;" controls>
                                <source src="/uploads/{{$link->property_id}}/{{$link->video_link}}">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        @endif
                        @endforeach

                        @elseif(!isset($pro->propertyVirtual))
                        <iframe src="https://my.matterport.com/show/?m=aSx1MpRRqif" name="Demo newhome.ch TOP"
                            width="200%" height="400%" frameborder="0"
                            allow="fullscreen; accelerometer; gyroscope; magnetometer; vr; xr; xr-spatial-tracking; autoplay; camera; microphone"
                            allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"
                            oallowfullscreen="true" msallowfullscreen="true" style="
                      width: 76%;
                      height: 330px;
                  "></iframe>
                        {{-- <img src="{{asset("images/t4-video-img.png")}}" class="img-fluid">
                        <div class="text-content">
                            <h3>Sample Listing</h3>
                            <a href="#" class="play-icon"><i class="fas fa-play"></i>
                            </a>
                            <div class="powered-by">
                                <p>Powered By</p>
                                <img src="{{asset("images/t1-powered-by.png")}}" class="img-fluid">
                            </div>
                        </div> --}}
                        @endif
                    </div>
                </div>
                <div id="videot" class="container tab-pane active">
                    <div class="video-wrap video-wrap-new  mt-3 d-flex justify-content-center col-md-8 offset-md-2">

                        @if(isset($pro->propertyVideo))
                        @foreach($pro->propertyVideo as $link)
                        @if($link->virtual_link != '')
                        <div>

                            <iframe src="{!! trim($link->virtual_link) !!}" allowfullscreen="true"
                                webkitallowfullscreen="true" mozallowfullscreen="true" oallowfullscreen="true"
                                msallowfullscreen="true" style="width: 100%;height: 500px;"></iframe>
                        </div>

                        @elseif($link->video_link != '')
                        <div>

                            <video style="width: 100%;height: 500px;" controls>
                                <source src="/uploads/{{$link->property_id}}/{{$link->video_link}}">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        @endif
                        @endforeach

                        @elseif(!isset($pro->propertyVirtual))
                        <iframe src="https://my.matterport.com/show/?m=aSx1MpRRqif" name="Demo newhome.ch TOP"
                            width="200%" height="400%" frameborder="0"
                            allow="fullscreen; accelerometer; gyroscope; magnetometer; vr; xr; xr-spatial-tracking; autoplay; camera; microphone"
                            allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"
                            oallowfullscreen="true" msallowfullscreen="true" style="
                      width: 76%;
                      height: 330px;
                  "></iframe>
                        {{-- <img src="{{asset("images/t4-video-img.png")}}" class="img-fluid">
                        <div class="text-content">
                            <h3>Sample Listing</h3>
                            <a href="#" class="play-icon"><i class="fas fa-play"></i>
                            </a>
                            <div class="powered-by">
                                <p>Powered By</p>
                                <img src="{{asset("images/t1-powered-by.png")}}" class="img-fluid">
                            </div>
                        </div> --}}
                        @endif
                    </div>
                </div>

                <div id="doccc" class="container tab-pane mt-3 justify-content-center">

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
                                @if($files->type == '1')
                                <td>{{$files->file}}</td>
                                <td>
                                    <ul class="file_view_dl">
                                        <li>
                                            <a href="/uploads/floor/{{$files->property_id}}/{{$files->file}}"
                                                download={{$files->file}}><svg version="1.1" id="Capa_1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    width="475.078px" height="475.077px" viewBox="0 0 475.078 475.077"
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
                <div id="flooor" class="container tab-pane mt-3 justify-content-center">
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
                                                    width="475.078px" height="475.077px" viewBox="0 0 475.078 475.077"
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
            <div id="plans" class="container tab-pane active">
                <div class="video-wrap">
                </div>
            </div>
        </div>



        </div>

    </section>
    <section class="presentby-section pt-70 pb-70" id="cotact">
        <div class="container">
            <h3>PRESENTED BY</h3>
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
                            <img src="/uploads/profile/{{$author->id}}/{{$author->photo}}" class="img-fluid">
                            @else
                            <img src="{{asset("images/auther1.png")}}" class="img-fluid">
                            @endif
                        </div>
                        <div class="auther-info">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h4>{{$author->fname}} {{$author->lname}}</h4>
                                    <p>{{$author->email}}</p>
                                    <div class="social">
                                        <a href="{{$author->facebook}}" class="social-tag fb"><i
                                                class="fab fa-facebook-f"></i>Facebook</a>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <a href="{{$author->website}}" class="btn website-link">Website</a>
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
                           <img src="/images/auther4.jpg" class="img-fluid" style="
    height: 170px;
    width: 154px;
">
                        </div>
                        <div class="auther-info">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h4>leslie m.</h4>
                                    <p>SampleCo</p>
                                    <p>Agent@example.com</p>
                                    <p>Lic# 123456</p>
                                </div>
                                <div class="col-md-5">
                                    <a href="#" class="btn website-link">Website</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
    </section>
    <section class="get-touch-section pt-70 pb-70" id="contact">
        <div class="container">
            <h3>GET IN TOUCH</h3>
            <div class="contact-form">
                <div class="alert alert-success" id="succeess" style="display: none">Success!</div>
                <div class="alert alert-danger" id="error" style="display: none">Something went wrong!</div>
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="last" id="last" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message"
                                    placeholder="your message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="#" id="send-mail" class="btn btn-purple">Send Inquiry</a>
                    </div>
                    <ul class="social-icon">
                        <li>
                            <a href='javascript:void(0)' class='share_link' data-url="{{$social_share['facebook']}}"
                                class="fb">
                                <svg class="svg-inline--fa fa-facebook-f fa-w-10" aria-hidden="true" focusable="false"
                                    data-prefix="fab" data-icon="facebook-f" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                    </path>
                                </svg><!-- <i class="fab fa-facebook-f"></i> -->
                            </a>
                        </li>
                        <li>
                            <a href='javascript:void(0)' class='share_link' data-url="{{$social_share['twitter']}}"
                                class="twit">
                                <svg class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" focusable="false"
                                    data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                    </path>
                                </svg><!-- <i class="fab fa-twitter"></i> -->
                            </a>
                        </li>
                        <li>
                            <a href='javascript:void(0)' class='share_link' data-url="{{$social_share['linkedin']}}"
                                class="linkedin">
                                <svg class="svg-inline--fa fa-linkedin-in fa-w-14" aria-hidden="true" focusable="false"
                                    data-prefix="fab" data-icon="linkedin-in" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                                    </path>
                                </svg><!-- <i class="fab fa-linkedin-in"></i> -->
                            </a>
                        </li>
                        <li>
                            <a href='javascript:void(0)' class='share_link' data-url="{{$social_share['pintrest']}}"
                                class="pintrest">
                                <svg class="svg-inline--fa fa-pinterest-p fa-w-12" aria-hidden="true" focusable="false"
                                    data-prefix="fab" data-icon="pinterest-p" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z">
                                    </path>
                                </svg><!-- <i class="fab fa-pinterest-p"></i> -->
                            </a>
                        </li>
                        {{-- <li>
                            <a href="#" class="gmail">
                                <svg class="svg-inline--fa fa-envelope fa-w-16" aria-hidden="true" focusable="false"
                                    data-prefix="far" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z">
                                    </path>
                                </svg><!-- <i class="far fa-envelope"></i> -->
                            </a>
                        </li> --}}
                    </ul>
                </form>
            </div>
        </div>
    </section>
    <section class="map-section" id="map1">
        <div class="map-wrap">
            <div class="col-md-12">
                <div id="map" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
    </section>

    @include('pages.registration-modal')

</body>

</html>
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

        });
</script>

{{--
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
</script> --}}

<script>
    window.onbeforeunload = function () {
        window.scrollTo(0,0);
        };
        $('ul.nav').find('a').click(function(){
        var $href = $(this).attr('href');
        var $anchor = $('#'+$href).offset();
        $('body').animate({scrollTop:0}, 'slow');
        return false;
        });

        $(document).on('click', '.share_link', function(){
            var data_url = $(this).attr('data-url');
            window.open(data_url,'TMSocialWindow',width=600,height=100);
            return false;
        });

        $('.owl-carousel-video').owlCarousel({
            items:1,
            merge:true,
            loop:true,
            margin:10,
            video:true,
            lazyLoad:true,
            center:true,
            responsive:{
                480:{
                    items:2
                },
                600:{
                    items:4
                }
            }
        })


</script>
