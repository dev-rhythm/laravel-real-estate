<!DOCTYPE html>
<html lang="en">

<head>
    <title>Realysta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/t3-style.css">

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

<body class='dummy-template3'>
    <header id="main_header">
        <div class="container">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="#">
                    <img src="/images/t1-logo.png" alt="Logo">
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
                            <a class="nav-link" href="#features">features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#photos">Photos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#video">Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tour">3d tour</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#floor">floor plans</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">map</a>
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
                <a href="#" class="btn bg-yellow">view gallery</a>
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
    <section class="pt-70 pb-70 about-section" id="overview">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-content">
                        <h5>VILLA OVERVIEW</h5>
                        <span class="seperator"></span>
                        <h3>ABOUT house VILLA</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.</p>
                    </div>
                    <ul>
                        <li><i class="fas fa-check-square"></i>Lorem Ipsum is simply dummy text</li>
                        <li><i class="fas fa-check-square"></i>Lorem Ipsum is simply dummy text</li>
                        <li><i class="fas fa-check-square"></i>Lorem Ipsum is simply dummy text</li>
                        <li><i class="fas fa-check-square"></i>Lorem Ipsum is simply dummy text</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn bg-black"><span class="icon-paper"></span>Documents</a>
                        <a href="#" class="btn bg-black"><span class="icon-floor"></span>brochure</a>
                        <a href="#" class="btn bg-black">floor plans</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="services-item">
                                <img src="/images/apartment-icon.png">
                                <h4>3</h4>
                                <p>bedrooms</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="services-item">
                                <img src="/images/surface-icon.png">
                                <h4>250 m2</h4>
                                <p>surface living</p>
                            </div>
                        </div>
                        <div class="col-md-6 mt-30">
                            <div class="services-item">
                                <img src="/images/home-icon.png">
                                <h4>2019</h4>
                                <p>year built</p>
                            </div>
                        </div>
                        <div class="col-md-6 mt-30">
                            <div class="services-item">
                                <img src="/images/car-icon.png">
                                <h4>3</h4>
                                <p>garage</p>
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
                <div class="col-md-4 pl-0">
                    <div class="gallery-items">
                        <div class="img-wrap">
                            <img src="/images/t3-img.png" />
                        </div>
                        <div class="view">
                            <a id="single_image" rel="gallery1" data-fancybox="gallery"
                                href="/images/t3-img.png">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-items">
                        <div class="img-wrap">
                            <img src="/images/t3-img2.png" />
                        </div>
                        <div class="view">
                            <a id="single_image" rel="gallery1" data-fancybox="gallery" href="/images/t3-img2.png">
                                View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pr-0">
                    <div class="gallery-items">
                        <div class="img-wrap">
                            <img src="/images/t3-img3.png" />
                        </div>
                        <div class="view">
                            <a id="single_image" rel="gallery1" data-fancybox="gallery"
                                href="/images/t3-img3.png">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pl-0 pt-30">
                    <div class="gallery-items">
                        <div class="img-wrap">
                            <img src="/images/t3-img4.png" />
                        </div>
                        <div class="view">
                            <a id="single_image" rel="gallery1" data-fancybox="gallery"
                                href="/images/t3-img4.png">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pt-30">
                    <div class="gallery-items height-50 pb-15">
                        <div class="img-wrap">
                            <img src="/images/t3-img5.png" />
                        </div>
                        <div class="view">
                            <a id="single_image" rel="gallery1" data-fancybox="gallery"
                                href="/images/t3-img5.png">View</a>
                        </div>
                    </div>
                    <div class="gallery-items pt-15 height-50">
                        <div class="img-wrap">
                            <img src="/images/t3-img6.png" />
                        </div>
                        <div class="view">
                            <a id="single_image" rel="gallery1" data-fancybox="gallery"
                                href="/images/t3-img6.png">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pr-0 pt-30">
                    <div class="gallery-items">
                        <div class="img-wrap">
                            <img src="/images/t3-img7.png" />
                        </div>
                        <div class="view">
                            <a id="single_image" rel="gallery1" data-fancybox="gallery"
                                href="/images/t3-img7.png">View</a>
                        </div>
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
                <a href="#" class="btn bg-yellow">register Now</a>
            </div>
        </div>
    </section>
    <section class="feature-section" id="features">
        <div class="container">
            <div class="text-content">
                <h3>features</h3>
                <div class="features-wrap">
                    <ul>
                        <li>Beach Access</li>
                        <li>City Lights Views</li>
                        <li>Near Schools</li>
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
                        <li>Quiet and Private</li>
                        <li>Great Schools</li>
                        <li>High Ceilings</li>
                        <li>Oversized Windows</li>
                        <li>Custom Amenities</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="floor-plan pt-70 pb-70" id="floor">
        <div class="container">
            <div class="text-content">
                <h3>floor plans</h3>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">floor 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">floor 2</a>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-md-4">
                        <div class="responsive-table">
                            <table>
                                <tr>
                                    <td class="text-left">floors</td>
                                    <td class="text-right">floors 1</td>
                                </tr>
                                <tr>
                                    <td class="text-left">bedroom</td>
                                    <td class="text-right">6</td>
                                </tr>
                                <tr>
                                    <td class="text-left">bathroom</td>
                                    <td class="text-right">4</td>
                                </tr>
                                <tr>
                                    <td class="text-left">total area</td>
                                    <td class="text-right">340 m2</td>
                                </tr>
                                <tr>
                                    <td class="text-left">parking</td>
                                    <td class="text-right">yes</td>
                                </tr>
                                <tr>
                                    <td class="text-left">surface area</td>
                                    <td class="text-right">204 m2</td>
                                </tr>
                                <tr>
                                    <td>price</td>
                                    <td class="text-right">$24562123</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="img-wrap">
                            <img class="img-fluid ml-auto mr-auto d-block" src="/images/plan-img.png">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-content">
                            <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen
                                book. It has survived not only five centuries, but also the leap into electronic
                                typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                                release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                                desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <a href="#" class="btn bg-yellow">learn more</a><br />
                            {{-- <img src="/images/powered-bylogo.png"> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="video-tab pt-70 pb-70" id="video">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#video">
                        <img src="/images/play-icon.png">
                        video
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#vtour">
                        <img src="/images/overlap-icon.png">
                        virtual tour
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="video" class="container tab-pane active">
                    <div class="video-wrap">
                    </div>
                </div>
                <div id="vtour" class="container tab-pane active">
                    <div class="video-wrap">
                    </div>
                </div>
                <div id="plans" class="container tab-pane active">
                    <div class="video-wrap">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="pt-0 pb-0" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-8 pt-70">
                    <div class="text-content">
                        <h3>presented by</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="auther-content">
                                    <div class="auther-img">
                                        <img src="/images/auther1.png" class="img-fluid">
                                    </div>
                                    <div class="auther-info">
                                        <div class="row align-items-center">
                                            <div class="col-md-12">
                                                <h4>Ryan Dozen</h4>
                                                <p>SampleCo</p>
                                                <p>Agent@example.com</p>
                                                <p>Lic# 123456</p>
                                                <div class="social">
                                                    <a href="#" class="social-tag fb"><i
                                                            class="fab fa-facebook-f"></i></a>
                                                    <a href="#" class="btn website-link">Website</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="auther-content">
                                    <div class="auther-img">
                                       <img src="/images/auther4.jpg" class="img-fluid" style="height: 130px; width: 150px;">
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
                        </div>

                        <section class="map-section" id="map1">
                            {{-- <div class="map-wrap"></div> --}}
                            <div class="map-wrap">
                                <div class="col-md-12">
                                    <div id="map" style="width: 100%; height: 500px;"></div>
                                </div>
                            </div>
                        </section>
                        <script
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQjmoWXaw3jONRXX6ou9i07L85AJ_0_ww&callback=map">
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
                    </div>
                </div>
                <div class="col-md-4 pt-70">
                    <div class="text-content">
                        <h3>get in touch</h3>
                    </div>
                    <div class="footer-form">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Your message" /></textarea>
                            </div>
                            <a href="#" class="btn bg-yellow">Send Inquiry</a>
                        </form>
                        <ul class="followus">
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
                </div>
            </div>
        </div>
    </footer>
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
<script>
    $('ul.navbar-nav .nav-link').click(function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        $(this).closest('ul').find('.active').removeClass('active');
        $(this).addClass('active');
        $('html, body').animate({
            scrollTop: $(href).offset().top - 200
        }, 2000);
        $('#collapsibleNavbar').removeClass('show');
    });

</script>

</html>
