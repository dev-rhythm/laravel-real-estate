<!DOCTYPE html>
<html lang="en">

<head>
    <title>Realysta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/t4-style.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/all.min.css">

    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    @include('frontend.partials.favicon')
</head>

<body>
    <header id="main_header">
        <div class="container">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="#">
                    <img src="/images/blue-logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#overview">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#amenities">AMENITIES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tour">3D TOUR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#floor">VIDEO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#photos">PHOTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contat">CONTACT</a>
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
            <img src="/images/t4-main-img.png" class="img-fluid" />
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
                    <a class="nav-link active" data-toggle="tab" href="#apartments"><strong>4</strong>Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#surfaceliving"><strong>154 m2</strong>Surface
                        living</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#landarea"><strong>203 m2</strong>Land area</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#rooms"><strong>5</strong>No. of rooms</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="apartments" class="container tab-pane active">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only
                        five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                        passages, and more recently with desktop publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.</p>
                </div>
                <div id="surfaceliving" class="container tab-pane fade">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only
                        five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                        passages, and more recently with desktop publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.</p>
                </div>
                <div id="landarea" class="container tab-pane fade">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only
                        five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                        passages, and more recently with desktop publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.</p>
                </div>
                <div id="rooms" class="container tab-pane fade">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only
                        five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                        passages, and more recently with desktop publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="aminities-section pt-0 pb-70" id="amenities">
        <div class="container">
            <div class="line-heading">
                <h2>amenities</h2>
                <span></span>
            </div>
            <ul class="features">
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
            </ul>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#apartments">Documents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#surfaceliving">brochure</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#landarea">floor plans</a>
                </li>
            </ul>
        </div>
    </section>
    <section class="gallery-section pb-70" id="photos">
        <div class="container">
            <h2 class="section-title">
                Gallery
                <span class="line"></span>
            </h2>

            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="img-wrap property-photo">
                                <a rel="gallery1" data-fancybox="gallery" href="/images/g1.png">
                                    <img src="/images/g1.png" class="img-fluid" style="margin-top: 15px;" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="img-wrap">
                                <a rel="gallery1" data-fancybox="gallery" href="/images/g2.png">
                                    <img src="/images/g2.png" class="img-fluid" style="margin-top: 15px;" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="img-wrap">
                                <a rel="gallery1" data-fancybox="gallery" href="/images/g3.png">
                                    <img src="/images/g3.png" class="img-fluid" style="margin-top: 15px;" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-wrap">
                                <a rel="gallery1" data-fancybox="gallery" href="/images/g4.png">
                                    <img src="/images/g4.png" class="img-fluid" style="margin-top: 15px;" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-wrap">
                                <a rel="gallery1" data-fancybox="gallery" href="/images/g5.png">
                                    <img src="/images/g5.png" class="img-fluid" style="margin-top: 15px;" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="img-wrap">
                        <a rel="gallery1" data-fancybox="gallery" href="/images/g6.png">
                            <img src="/images/g6.png" class="img-fluid" style="margin-top: 15px;" />
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="register-link" id="tour">
        <div class="container">
            <div class="text-content">
                <h3>virtual open house</h3>
                <p>saturday may 1st 10:45 am - 11:45 am</p>
                <a href="#" class="btn bg-blue">register Now</a>
            </div>
        </div>
    </section>
    <section class="video-section pt-70 pb-70" id="floor">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="video-wrap">
                        <div class="video">
                            <img src="/images/t4-video-img.png" class="img-fluid">
                            <div class="text-content">
                                <h3>Sample Listing</h3>
                                <a href="#" class="play-icon"><i class="fas fa-play"></i>
                                </a>
                                <div class="powered-by">
                                    <p>Powered By</p>
                                    <img src="/images/t1-powered-by.png" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it </p>
                    </div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#video">
                                <span>
                                    <svg id="Capa_1" enable-background="new 0 0 512 512" height="512"
                                        viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path
                                                d="m437.02 74.98c-48.353-48.351-112.64-74.98-181.02-74.98s-132.667 26.629-181.02 74.98c-48.351 48.353-74.98 112.64-74.98 181.02s26.629 132.667 74.98 181.02c48.353 48.351 112.64 74.98 181.02 74.98s132.667-26.629 181.02-74.98c48.351-48.353 74.98-112.64 74.98-181.02s-26.629-132.667-74.98-181.02zm-181.02 407.02c-124.617 0-226-101.383-226-226s101.383-226 226-226 226 101.383 226 226-101.383 226-226 226z" />
                                            <path
                                                d="m374.782 243.84-180-130c-4.566-3.298-10.596-3.759-15.611-1.195s-8.171 7.722-8.171 13.355v260c0 5.633 3.156 10.791 8.171 13.355 2.154 1.102 4.495 1.645 6.827 1.645 3.097 0 6.179-.958 8.784-2.84l180-130c3.904-2.82 6.218-7.344 6.218-12.16s-2.312-9.34-6.218-12.16zm-173.782 112.824v-201.328l139.381 100.664z" />
                                        </g>
                                    </svg>
                                </span>
                                video
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">
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
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">
                                <span>
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                        style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M497,0C482.634,0,29.318,0,15,0C6.716,0,0,6.716,0,15c0,14.366,0,467.682,0,482c0,8.284,6.716,15,15,15
                c14.366,0,467.682,0,482,0c8.284,0,15-6.716,15-15V166V15C512,6.716,505.284,0,497,0z M30,30h121c0,9.412,0,291.444,0,301H30V30z
                M331,482H30V361c9.412,0,291.444,0,301,0V482z M331,331H181V181h150V331z M482,482H361c0-9.412,0-291.444,0-301h121V482z
                M482,151c-9.412,0-291.444,0-301,0V30h301V151z" />
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
                                floor plans
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>
    <section class="map-section mt-5" id="map1">
        {{-- <div class="map-wrap"></div> --}}
        <div class="map- wrap">
            <div class="col-md-12">
                <div id="map" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
    </section>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQjmoWXaw3jONRXX6ou9i07L85AJ_0_ww&callback=map">
    </script>


    <script type="text/javascript">
        var street = "6351 SE 128th Ave"
        var city = "Okeechobee"
        var state = "Florida"
        var country = "United States"
        var address = street+','+city+','+state+','+country;

        var map = new google.maps.Map(document.getElementById('map'), {
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        zoom: 10
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
        $('ul.navbar-nav .nav-link').click(function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            $(this).closest('ul').find('.active').removeClass('active');
            $(this).addClass('active');
            $('html, body').animate({
                scrollTop: $(href).offset().top - 200
            }, 2000);
        });

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
