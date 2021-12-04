<!DOCTYPE html>
<html lang="en">

<head>

    @include('frontend.partials.head')


</head>

<body>
    @include('frontend.partials.header')


    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">



            @include('frontend.partials.menu')


            <!-- Main content -->
            <div class="content-wrapper">

                <div class="content">
                    <!-- Page header -->
                    <div class="page-header page-header-default">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4><i class="icon-arrow-left52 position-left"></i> <span
                                        class="text-semibold">Dashboard</span></h4>
                            </div>
                        </div>
                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="form_inputs_basic.html">Dashboard</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="dashboard-content">
                        <div class="welcome-text">
                            <h3>Hi {{Auth::user()->fname}}!</h3>
                            <p>Welcome to Realysta! Check out some of the new features and updates below!</p>
                        </div>
                        {{-- <div class="order-div">
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="text-content">
                                        <h5>New Feature!</h5>
                                        <h2>Order Prints</h2>
                                        <p>FREE 2-Day Shipping! Now through December!</p>
                                        <p>Now offering professional quality prints in various sizes finishes and paper weights. </p>
                                        <ul>
                                            <li>Flyers</li>
                                            <li>4-page folded brochures</li>
                                            <li>Sign-riders</li>
                                        </ul>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="image-wrap">
                                        <img src="https://rela-s3-e-mlocal-prod.s3.amazonaws.com/public/book-images/188886/8615040/dash-cta-image.jpg">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    {{-- <div class="features-section">
                        <div class="feature-div">
                            <h2 class="section-title">New Features & Updates</h2>
                            <div class="feature-wrap">
                                <div class="feature-item">
                                    <h4> SEO and Metatag Customizations</h4>
                                    <p>Take control over your SEO and Metatag settings!</p>
                                    <a href="" class="btn btn-default">learn More</a>
                                </div>

                            </div>

                        </div>
                    </div> --}}
                </div>
                <!-- /main content -->

            </div>

            <!-- /page content -->

        </div>
        <!-- /page container -->

</body>


@include('frontend.partials.footer')

</html>
