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
    {{-- <script>
      !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
      n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
      document,'script','https://connect.facebook.net/en_US/fbevents.js');

      fbq('init', '{{$pro->propertyAdvance->fb_pixel_id or ""}}');
    fbq('track', "PageView");
    </script> --}}
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={{$pro->propertyAdvance->fb_pixel_id or ""}}&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/t4-style.css")}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/owl.theme.default.min.css")}}">
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
</head>

<body class='template-four'>
    <header id="main_header">
        <div class="container">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="#">
                    @if($pro->propertyTheme)
                    @php
                    $background = $pro->propertyTheme->main_image;
                    @endphp
                    @endif

                    @if($property_logo != null)
                    <img src="{{$property_logo}}" alt="Log" style=" height: 51px;
        width: 211px;">
                    @else
                    <img src="{{asset("images/blue-logo.png")}}" alt="Log">
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
                            <a class="nav-link active" href="#overview">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#amenties">AMENITIES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#video">3D TOUR</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#photo">PHOTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">CONTACT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#map">MAP</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <section class="main-section">
        <div class="img-wrap">
            @if(isset($pro->propertyTheme))
            @if($pro->propertyTheme->main_image)
            @php
            $background = $pro->propertyTheme->main_image;
            $logo = $pro->propertyTheme->logo;
            @endphp
            <img src="{{asset("uploads/back_image/$pro->id/$background")}}" style="width: 100%;">
            @else
            <img src="{{asset("images/t4-main-img.png")}}" style="width: 100%;" />
            @endif
            @else
            <img src="{{asset("images/t4-main-img.png")}}" style="width: 100%;" />
            @endif

        </div>
    </section>
    <section class="overview-section pt-70 pb-70" id="overview">
        <div class="container">
            <div class="line-heading">
                <h2>overview</h2>
                <span></span>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab"
                        href="#apartments"><strong>{{$pro->propertydetails->stories or 2}}</strong>Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"
                        href="#surfaceliving"><strong>{{$pro->propertydetails->sqr_foot or "5,114"}}
                            {{$pro->propertydetails->sqr_foot_metric or "m2"}}</strong>Surface living</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"
                        href="#landarea"><strong>{{$pro->propertydetails->lot or "2000 "}}
                            {{$pro->propertydetails->metric or "m2"}}</strong>Land area</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"
                        href="#rooms"><strong>{{$pro->propertydetails->bedrooms or 2}}</strong>No. of rooms</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="apartments" class=" tab-pane active">
                    {!! $pro->propertydetails->description or "
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type and
                        scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into
                        electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                        the release of
                        Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                        software like
                        Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the
                        printing and
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                        survived not
                        only five centuries, but also the leap into electronic typesetting, remaining essentially
                        unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more
                        recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                        Ipsum.</p>"!!}
                </div>
                <div id="surfaceliving" class=" tab-pane fade">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type and
                        scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into
                        electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                        the release of
                        Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                        software like
                        Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the
                        printing and
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                        survived not
                        only five centuries, but also the leap into electronic typesetting, remaining essentially
                        unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more
                        recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                        Ipsum.</p>
                </div>
                <div id="landarea" class="tab-pane fade">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type and
                        scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into
                        electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                        the release of
                        Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                        software like
                        Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the
                        printing and
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                        survived not
                        only five centuries, but also the leap into electronic typesetting, remaining essentially
                        unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more
                        recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                        Ipsum.</p>
                </div>
                <div id="rooms" class=" tab-pane fade">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type and
                        scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                        leap into
                        electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                        the release of
                        Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                        software like
                        Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the
                        printing and
                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                        1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                        survived not
                        only five centuries, but also the leap into electronic typesetting, remaining essentially
                        unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more
                        recently with desktop publishing software like Aldus PageMaker including versions of Lorem
                        Ipsum.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="aminities-section pt-0 pb-70" id="amenties">
        <div class="container">
            <div class="line-heading">
                <h2>amenities</h2>
                <span></span>
            </div>
            <ul class="features">
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
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#documents">
                        <svg height="569pt" viewBox="-66 0 569 569.286" width="569pt"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m.109375 66.382812v493.132813c0 5.238281 4.246094 9.484375 9.484375 9.484375h360.367188c5.234374 0 9.480468-4.246094 9.480468-9.484375v-398.296875c0-.210938-.101562-.390625-.121094-.597656-.046874-.832032-.210937-1.652344-.484374-2.4375-.105469-.304688-.179688-.597656-.3125-.894532-.460938-1.03125-1.101563-1.972656-1.898438-2.777343l-94.832031-94.832031c-.804688-.800782-1.75-1.441407-2.789063-1.898438-.285156-.121094-.574218-.222656-.871094-.3125-.792968-.273438-1.617187-.4375-2.457031-.492188-.160156.027344-.347656-.074218-.546875-.074218h-265.535156c-5.238281 0-9.484375 4.242187-9.484375 9.480468zm346.957031 85.351563h-62.457031v-62.457031zm-327.992187-75.867187h246.570312v85.351562c0 5.234375 4.246094 9.480469 9.480469 9.480469h85.351562v379.335937h-341.402343zm0 0" />
                            <path
                                d="m398.410156 493.132812v18.964844h28.449219c5.238281 0 9.484375-4.242187 9.484375-9.480468v-493.132813c0-5.238281-4.246094-9.484375-9.484375-9.484375h-360.367187c-5.238282 0-9.484376 4.246094-9.484376 9.484375v28.449219h18.96875v-18.96875h341.398438v474.167968zm0 0" />
                            <path d="m75.976562 189.667969h227.597657v18.964843h-227.597657zm0 0" />
                            <path d="m75.976562 132.765625h75.867188v18.96875h-75.867188zm0 0" />
                            <path d="m75.976562 246.566406h151.734376v18.96875h-151.734376zm0 0" />
                            <path d="m246.675781 246.566406h56.898438v18.96875h-56.898438zm0 0" />
                            <path d="m75.976562 303.464844h227.597657v18.96875h-227.597657zm0 0" />
                            <path d="m75.976562 417.265625h227.597657v18.96875h-227.597657zm0 0" />
                            <path d="m161.324219 360.367188h142.25v18.964843h-142.25zm0 0" />
                            <path d="m75.976562 360.367188h66.382813v18.964843h-66.382813zm0 0" />
                            <path d="m75.976562 474.167969h37.933594v18.964843h-37.933594zm0 0" />
                            <path d="m132.875 474.167969h170.699219v18.964843h-170.699219zm0 0" /></svg>
                        Documents
                    </a>
                </li>
                {{-- <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#brochure">
            <svg id="Layer_3" enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><g><path d="m56.707 40.293-5.707-5.707v-32.586c0-.552-.447-1-1-1h-40c-.553 0-1 .448-1 1v54c0 .552.447 1 1 1h29v5c0 .552.447 1 1 1h10c.553 0 1-.448 1-1v-2.586l5.707-5.707c.188-.187.293-.442.293-.707v-12c0-.265-.105-.52-.293-.707zm-17.707.707v14h-28v-52h38v44h-1c-.552 0-1-.449-1-1v-5c0-2.206-1.794-4-4-4s-4 1.794-4 4zm16 11.586-5.707 5.707c-.188.187-.293.442-.293.707v2h-8v-20c0-1.103.897-2 2-2s2 .897 2 2v5c0 1.654 1.346 3 3 3h2c.553 0 1-.448 1-1v-10.586l4 4z"/><path d="m32.707 15.293c-.391-.391-1.023-.391-1.414 0l-4.293 4.293-1.293-1.293c-.391-.391-1.023-.391-1.414 0l-5 5c-.286.286-.372.716-.217 1.09.154.373.52.617.924.617h20c.404 0 .77-.244.924-.617.155-.374.069-.804-.217-1.09zm-10.293 7.707 2.586-2.586 2.586 2.586zm8 0-2-2 3.586-3.586 5.586 5.586z"/><path d="m25 17c1.654 0 3-1.346 3-3s-1.346-3-3-3-3 1.346-3 3 1.346 3 3 3zm0-4c.552 0 1 .449 1 1s-.448 1-1 1-1-.449-1-1 .448-1 1-1z"/><path d="m46 31c.553 0 1-.448 1-1v-24c0-.552-.447-1-1-1h-32c-.553 0-1 .448-1 1v24c0 .552.447 1 1 1zm-31-24h30v22h-30z"/><path d="m14 33h32v2h-32z"/><path d="m14 37h23v2h-23z"/><path d="m14 41h23v2h-23z"/><path d="m14 45h23v2h-23z"/><path d="m14 49h23v2h-23z"/></g></svg>
            brochure
          </a>
        </li> --}}
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#floors">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="512" height="512">
                            <title>plan-floor-planning-Blueprint-Architecture</title>
                            <g id="Expand">
                                <path
                                    d="M61,9H58V7a1,1,0,0,0-1-1H54V4.009a1,1,0,0,0-1-1l-4-.009h0a1,1,0,0,0-1,1V6H7a5.006,5.006,0,0,0-5,5V57a5.006,5.006,0,0,0,5,5h7a1,1,0,0,0,1-1V58H61a1,1,0,0,0,1-1V10A1,1,0,0,0,61,9Zm-9,3H50V10h2Zm0,2V36l-2,0V14Zm-.05,24L51,40.838l-.946-2.844ZM52,5.007V8H50V5ZM7,8H48V38a1.018,1.018,0,0,0,.051.315l2,6a1,1,0,0,0,1.9,0l2-5.991A1,1,0,0,0,54,38.009V8h2V52H7a4.948,4.948,0,0,0-3,1.026V11A3,3,0,0,1,7,8ZM60,56H6v2h7v2H7a3,3,0,0,1,0-6H57a1,1,0,0,0,1-1V11h2Z" />
                                <path
                                    d="M9,47h5V45H10V29h4V27H10V15H22V27H18v2H29v6h2V29h4V27H24V15H42V27H39v2h3V45H31V39H29v6H18v2H43a1,1,0,0,0,1-1V14a1,1,0,0,0-1-1H9a1,1,0,0,0-1,1V46A1,1,0,0,0,9,47Z" />
                                <rect x="32" y="60" width="26" height="2" />
                                <rect x="11" y="2" width="26" height="2" />
                                <rect x="28" y="60" width="2" height="2" />
                            </g>
                        </svg>
                        floor plans
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="documents" class="container tab-pane active">
                    <div class="video-wrap">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">File</th>
                                    <th scope="col">Download / View</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($pro->propertyFloor))
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
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div id="brochure">
            <div id="video-wrap" class="container tab-pane">

            </div>
        </div> --}}
                <div id="floors" class="container tab-pane">
                    <div class="video-wrap">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">File</th>
                                    <th scope="col">Download / View</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($pro->propertyFloor))
                                @foreach($pro->propertyFloor as $files)
                                <tr>
                                    @if($files->type == '2')
                                    <td>{{$files->file}}</td>
                                    <td>

                                        {{-- <a href="/uploads/floor/{{$files->property_id}}/{{$files->file}}"
                                        download={{$files->file}}>Download</a> --}}

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
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
    <section class="gallery-section gallery-item pt-60 pb-700" id="photo">
        <div class="container">
            <h2 class="section-title">
                Gallery
                <span class="line"></span>
            </h2>
            @if(isset($pro->propertyPhoto))
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($pro->propertyPhoto as $photo)
                        <div class="col-md-4" style="margin-top: 15px;">
                            <div class="img-wrap property-photo">
                                <a id="single_image" rel="gallery1" data-fancybox="gallery"
                                    href="/uploads/{{$pro->id}}/{{$photo->images}}"><img
                                        src="/uploads/{{$pro->id}}/{{$photo->images}}" class="img-fluid" /></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="img-wrap">
                                <img src="/images/g1.png" class="img-fluid" style="margin-top: 15px;" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="img-wrap">
                                <img src="/images/g2.png" class="img-fluid" style="margin-top: 15px;" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="img-wrap">
                                <img src="/images/g3.png" class="img-fluid" style="margin-top: 15px;" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-wrap">
                                <img src="/images/g4.png" class="img-fluid" style="margin-top: 15px;" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-wrap">
                                <img src="/images/g5.png" class="img-fluid" style="margin-top: 15px;" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="img-wrap">
                        <img src="/images/g6.png" class="img-fluid" style="margin-top: 15px;" />
                    </div>
                </div>
            </div>
            @endif
        </div>

    </section>
    <section class="register-link">
        <div class="container mt-5">
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
                            <g></g>
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
                <a data-id="{{$voh->id}}" class="btn bg-blue register_now">register
                    Now</a>
                @endif
            </div>

            @elseif( $voh->type == 'video' && $voh->video_url != '')
            <div class="text-content" id="{{$voh->id}}">
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
                {{-- <a href="#" class="btn bg-blue">register Now</a> --}}
            </div>
            @endif
        </div>


    </section>
    <section class="video-section pt-70 pb-70" id="video">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="video-wrap-old  ">
                        <div class="video video-wrap-new">
                            @if(isset($pro->propertyVirtual))

                            @foreach($pro->propertyVirtual as $link)

                            @if($link->virtual_link != '')
                            <div>
                                <iframe src="{!! trim($link->virtual_link) !!}" allowfullscreen="true"
                                    webkitallowfullscreen="true" mozallowfullscreen="true" oallowfullscreen="true"
                                    msallowfullscreen="true" style="width: 100%;height: 400px;"></iframe>
                            </div>
                            @elseif($link->video_link != '')

                            <div>
                                <video style="width: 100%;height: 400px;" controls>
                                    <source src="/uploads/{{$link->property_id}}/{{$link->video_link}}">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            @endif
                            @endforeach

                            @else
                            {{-- <p>Hello</p> --}}
                            <iframe src="https://my.matterport.com/show/?m=aSx1MpRRqif" name="Demo newhome.ch TOP"
                                width="200%" height="400%" frameborder="0"
                                allow="fullscreen; accelerometer; gyroscope; magnetometer; vr; xr; xr-spatial-tracking; autoplay; camera; microphone"
                                allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"
                                oallowfullscreen="true" msallowfullscreen="true" style="
                width: 76%;
                height: 330px;
            "></iframe>

                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and
                            scrambled it </p>
                    </div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" class="active" href="#menu1">
                                <span>
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 512.002 512.002" style="enable-background:new 0 0 512.002 512.002;"
                                        xml:space="preserve">
                                        <g>
                                            <g>
                                                <path
                                                    d="M512.001,255.969c-0.011-5.193-2.708-10.011-7.129-12.737l-52.034-32.076l52.089-32.421
              c4.393-2.734,7.066-7.539,7.074-12.712c0.008-5.174-2.651-9.987-7.036-12.734l-241-151c-4.871-3.052-11.058-3.052-15.929,0
              l-241,151c-4.384,2.747-7.043,7.56-7.036,12.734c0.008,5.174,2.681,9.979,7.074,12.712l51.732,32.198L7.051,243.282 c-4.39,2.744-7.055,7.557-7.05,12.734c0.005,5.177,2.679,9.985,7.074,12.721l51.732,32.198L7.051,333.282 c-4.383,2.74-7.047,7.543-7.05,12.712s2.656,9.975,7.036,12.719l241,151c2.436,1.526,5.2,2.289,7.964,2.289 c2.764,0,5.529-0.763,7.964-2.289l241-151c4.394-2.753,7.055-7.581,7.036-12.766c-0.019-5.185-2.715-9.993-7.129-12.714 l-52.034-32.076l52.089-32.421C509.336,265.992,512.012,261.162,512.001,255.969z M43.32,165.96L256.001,32.703L468.682,165.96 c-2.044,1.272-206.586,128.58-212.681,132.374L43.32,165.96z M468.584,346.106L256.001,479.301L43.278,346.018l43.889-27.431 l160.908,100.15c2.426,1.51,5.176,2.265,7.926,2.265c2.75,0,5.5-0.755,7.926-2.265l160.464-99.874L468.584,346.106z M256.001,388.334L43.345,255.976l43.822-27.389l160.908,100.15c2.426,1.51,5.176,2.265,7.926,2.265c2.75,0,5.5-0.755,7.926-2.265 l160.464-99.874l44.125,27.2C467.297,256.822,261.631,384.829,256.001,388.334z" />
                                            </g>
                                        </g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                    </svg>
                                </span>
                                virtual tour
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="video-wrap-old  ">
                        <div class="video video-wrap-new">
                            @if(isset($pro->propertyVideo))

                            @foreach($pro->propertyVideo as $link)

                            @if($link->virtual_link != '')
                            <div>
                                <iframe src="{!! trim($link->virtual_link) !!}" allowfullscreen="true"
                                    webkitallowfullscreen="true" mozallowfullscreen="true" oallowfullscreen="true"
                                    msallowfullscreen="true" style="width: 100%;height: 400px;"></iframe>
                            </div>
                            @elseif($link->video_link != '')

                            <div>
                                <video style="width: 100%;height: 400px;" controls>
                                    <source src="/uploads/{{$link->property_id}}/{{$link->video_link}}">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            @endif
                            @endforeach

                            @else
                            {{-- <p>Hello</p> --}}
                            <iframe src="https://my.matterport.com/show/?m=aSx1MpRRqif" name="Demo newhome.ch TOP"
                                width="200%" height="400%" frameborder="0"
                                allow="fullscreen; accelerometer; gyroscope; magnetometer; vr; xr; xr-spatial-tracking; autoplay; camera; microphone"
                                allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"
                                oallowfullscreen="true" msallowfullscreen="true" style="
                width: 76%;
                height: 330px;
            "></iframe>

                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and
                            scrambled it </p>
                    </div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" class="active" href="#menu1">
                                <span>
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                        viewBox="0 0 512.002 512.002" style="enable-background:new 0 0 512.002 512.002;"
                                        xml:space="preserve">
                                        <g>
                                            <g>
                                                <path
                                                    d="M512.001,255.969c-0.011-5.193-2.708-10.011-7.129-12.737l-52.034-32.076l52.089-32.421
              c4.393-2.734,7.066-7.539,7.074-12.712c0.008-5.174-2.651-9.987-7.036-12.734l-241-151c-4.871-3.052-11.058-3.052-15.929,0
              l-241,151c-4.384,2.747-7.043,7.56-7.036,12.734c0.008,5.174,2.681,9.979,7.074,12.712l51.732,32.198L7.051,243.282 c-4.39,2.744-7.055,7.557-7.05,12.734c0.005,5.177,2.679,9.985,7.074,12.721l51.732,32.198L7.051,333.282 c-4.383,2.74-7.047,7.543-7.05,12.712s2.656,9.975,7.036,12.719l241,151c2.436,1.526,5.2,2.289,7.964,2.289 c2.764,0,5.529-0.763,7.964-2.289l241-151c4.394-2.753,7.055-7.581,7.036-12.766c-0.019-5.185-2.715-9.993-7.129-12.714 l-52.034-32.076l52.089-32.421C509.336,265.992,512.012,261.162,512.001,255.969z M43.32,165.96L256.001,32.703L468.682,165.96 c-2.044,1.272-206.586,128.58-212.681,132.374L43.32,165.96z M468.584,346.106L256.001,479.301L43.278,346.018l43.889-27.431 l160.908,100.15c2.426,1.51,5.176,2.265,7.926,2.265c2.75,0,5.5-0.755,7.926-2.265l160.464-99.874L468.584,346.106z M256.001,388.334L43.345,255.976l43.822-27.389l160.908,100.15c2.426,1.51,5.176,2.265,7.926,2.265c2.75,0,5.5-0.755,7.926-2.265 l160.464-99.874l44.125,27.2C467.297,256.822,261.631,384.829,256.001,388.334z" />
                                            </g>
                                        </g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                        <g></g>
                                    </svg>
                                </span>
                               Video
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="getintouch-section pt-70 pb-70" id="contact">
        <div class="container">
            <div class="line-heading">
                <h2>get in touch</h2>
                <span></span>
            </div>
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
                    <div class="text-left">
                        <a href="#" id="send-mail" class="btn bg-blue">Send Inquiry</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="presentedby-section pt-70">
        <div class="container">
            <div class="line-heading">
                <h2>presented by</h2>
                <span></span>
                <ul>
                    <li>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="far fa-envelope"></i></a>
                    </li>
                </ul>
            </div>
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
                            <img src="{{asset("images/auther1.png")}}" class="img-fluid">
                        </div>
                        <div class="auther-info">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h4>leslie m.</h4>
                                    <p>SampleCo</p>
                                    <p>Agent@example.com</p>
                                    <p>Lic# 123456</p>
                                    <div class="social">
                                        <a href="#" class="social-tag twit"><i class="fab fa-twitter"></i>twitter</a>
                                    </div>
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
        </div>
    </section>
    <section class="pt-70" id="map1">
        <div class="map-wrap">
            <div class="col-md-12">
                <div id="map" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
    </section>
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
             var user_id = {{$pro->user_id or ""}}
             var property_id = {{$pro->id or ""}}


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
    <script type="text/javascript">
        // $(document).ready(function() {
    //     $(".slider").owlCarousel({
    //         singleItem:true,
    //         navigation: true
    //       });
    // });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQjmoWXaw3jONRXX6ou9i07L85AJ_0_ww&callback=map">
    </script>


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
    });

    </script>

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
