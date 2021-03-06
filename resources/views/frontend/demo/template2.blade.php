<!DOCTYPE html>
<html lang="en">

<head>
    <title>Realysta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/t2-style.css">

    <link rel="stylesheet" href="/css/all.min.css">

    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1//js/all.min.js"></script>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    @include('frontend.partials.favicon')
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="#">
                    <img src="/images/t2-logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#overview"><img
                                    src="/images/overview-icon.png">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features"><img src="/images/features-icon.png">features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#photos"><img src="/images/photos-icon.png">Photos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#video"><img src="/images/play-icon.png">Video</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#video"><img src="/images/overlap-icon.png">3d tour</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#video"><img src="/images/floor-plans-icon.png">floor plans</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact"><img src="/images/envelope-icon.png">contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#map"><img src="/images/location-pin.png">map</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <section class="main-top" id="overview">
        <div class="text-content">
            <h1>
                house care Street<br />
                Laguna Beach, CA 92125
            </h1>
            <a class="play-icon" href="#"><i class="fas fa-play"></i></a>
            <div class="powered-by">
                {{-- <h3>Offered At</h3> --}}
                <h4>$1,240,000</h4>
            </div>
        </div>
        <a href="#" class="scroll-down">
            <img src="/images/down-shape.png">
        </a>
    </section>
    <section class="about-section pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-content">
                        <h5>Laguna Beach</h5>
                        <h3 class="text-left">ABOUT THIS PROPERTY</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                        <div class="apt-info">
                            <ul>
                                <li>
                                    <h4>4</h4>
                                    <p>bedrooms</p>
                                </li>
                                <li>
                                    <h4>154 m2</h4>
                                    <p>Surface living</p>
                                </li>
                                <li>
                                    <h4>203 m2</h4>
                                    <p>Land area</p>
                                </li>
                                <li>
                                    <h4>5</h4>
                                    <p>No. of rooms</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-wrap">
                        <img class="img-fluid" src="/images/t2-img1.png" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="register-link">
        <div class="container">
            <div class="text-content">
                <h3>virtual open house</h3>
                <p>saturday may 1st 10:45 am - 11:45 am</p>
                <a href="#" class="btn btn-purple">register Now</a>
            </div>
        </div>
    </section>
    <section class="feature-section pt-70 pb-70" id="features">
        <div class="container">
            <h3>features</h3>
            <div class="features-wrap">
                <ul>
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
                    <li>Quiet and Private</li>
                    <li>Great Schools</li>
                    <li>High Ceilings</li>
                    <li>Oversized Windows</li>
                    <li>Custom Amenities</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="photos-section pt-70 pb-70" id="photos">
        <div class="container">
            <h3>Photos</h3>
            <div class="photos-wrap">
                <div class="row">
                    <div class="col-md-4 thrice">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="img-wrap">
                                    <a id="single_image" rel="gallery1" data-fancybox="gallery"
                                        href="/images/t3-g1.png">
                                        <img class="img-fluid" src="/images/t3-g1.png" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-wrap">
                                    <a id="single_image" rel="gallery1" data-fancybox="gallery"
                                        href="/images/t3-g2.png">
                                        <img class="img-fluid" src="/images/t3-g2.png" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-wrap"><a id="single_image" rel="gallery1" data-fancybox="gallery"
                                        href="/images/t3-g3.png">
                                        <img class="img-fluid" src="/images/t3-g3.png" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="img-wrap">
                            <a id="single_image" rel="gallery1" data-fancybox="gallery" href="/images/t3-g4.png">
                                <img class="img-fluid" src="/images/t3-g4.png" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 twice">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="img-wrap">
                                    <a id="single_image" rel="gallery1" data-fancybox="gallery"
                                        href="/images/t3-g5.png">
                                        <img class="img-fluid" src="/images/t3-g5.png" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12 pt-12">
                                <div class="img-wrap"><a id="single_image" rel="gallery1" data-fancybox="gallery"
                                        href="/images/t3-g6.png">
                                        <img class="img-fluid" src="/images/t3-g6.png" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-12">
                        <div class="img-wrap"><a id="single_image" rel="gallery1" data-fancybox="gallery"
                                href="/images/t3-g7.png">
                                <img class="img-fluid" src="/images/t3-g7.png" /></a>
                        </div>
                    </div>
                    <div class="col-md-4 mt-12">
                        <div class="img-wrap"><a id="single_image" rel="gallery1" data-fancybox="gallery"
                                href="/images/t3-g8.png">
                                <img class="img-fluid" src="/images/t3-g8.png" /></a>
                        </div>
                    </div>
                    <div class="col-md-5 mt-12">
                        <div class="img-wrap"><a id="single_image" rel="gallery1" data-fancybox="gallery"
                                href="/images/t3-g9.png">
                                <img class="img-fluid" src="/images/t3-g9.png" /></a>
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
                        <img src="/images/play-icon.png" />
                        video
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#vtour">
                        <img src="/images/overlap-icon.png">
                        virtual tour
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#plans">
                        <img src="/images/floor-plans-icon.png">
                        floor plans
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
    <section class="presentby-section pt-70 pb-70">
        <div class="container">
            <h3>PRESENTED BY</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="auther-content">
                        <div class="auther-img">
                            <img src="/images/auther1.png" class="img-fluid">
                        </div>
                        <div class="auther-info">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h4>Ryan Dozen</h4>
                                    <p>SampleCo</p>
                                    <p>Agent@example.com</p>
                                    <p>Lic# 123456</p>
                                    <div class="social">
                                        <a href="#" class="social-tag fb"><svg
                                                class="svg-inline--fa fa-facebook-f fa-w-10" aria-hidden="true"
                                                focusable="false" data-prefix="fab" data-icon="facebook-f" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                                </path>
                                            </svg><!-- <i class="fab fa-facebook-f"></i> -->Facebook</a>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <a href="#" class="btn website-link">Website</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <div class="social">
                                        <a href="#" class="social-tag twit"><svg
                                                class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true"
                                                focusable="false" data-prefix="fab" data-icon="twitter" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                                </path>
                                            </svg><!-- <i class="fab fa-twitter"></i> -->twitter</a>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <a href="#" class="btn website-link">Website</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="get-touch-section pt-70 pb-70" id="contact">
        <div class="container">
            <h3>GET IN TOUCH</h3>
            <div class="contact-form">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="your message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="#" class="btn btn-purple">Send Inquiry</a>
                    </div>
                    <ul class="social-icon">
                        <li>
                            <a href="#" class="fb">
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
                            <a href="#" class="twit">
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
                            <a href="#" class="linkedin">
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
                            <a href="#" class="pintrest">
                                <svg class="svg-inline--fa fa-pinterest-p fa-w-12" aria-hidden="true" focusable="false"
                                    data-prefix="fab" data-icon="pinterest-p" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z">
                                    </path>
                                </svg><!-- <i class="fab fa-pinterest-p"></i> -->
                            </a>
                        </li>
                        <li>
                            <a href="#" class="gmail">
                                <svg class="svg-inline--fa fa-envelope fa-w-16" aria-hidden="true" focusable="false"
                                    data-prefix="far" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z">
                                    </path>
                                </svg><!-- <i class="far fa-envelope"></i> -->
                            </a>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </section>
    {{-- <section class="map-section" id="map">
        <div class="map-wrap"></div>
    </section> --}}

    <section class="map-section" id="map1">
        {{-- <div class="map-wrap"></div> --}}
        <div class="map-wrap">
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

    });
</script>

</html>
