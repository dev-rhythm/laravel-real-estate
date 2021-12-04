@include('layouts.head')

@include('layouts.header')

<section class="main-section">
    <div class="container mt-5">

        @if(session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
        </div>
        @endif

        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>
    <div class="container">
        <div class="text-content text-center">
            <h1>Beautiful single property websites</h1>
            <p>Effortlessly created from your IDX feed with complete AI-driven marketing tools</p>
            <a href="/register" class="btn bg-orange">try it now for free</a>
        </div>
        <div class="main-img">
            <img src="/images/main-lappy-img.png" alt="main-img">
        </div>
    </div>
</section>
<section class="step-poroperty">
    <div class="section-heading text-center">
        <h3>Amazing Single Property Websites In A Few Clicks</h3>
        <span class="line"></span>
    </div>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="img-wrap">
                    <img src="/images/h1.png">
                </div>
            </div>
            <div class="col-md-8 feature-item">
                <div class="img-wrap text-content">
                    <ul>
                        <li><i class="fas fa-check-square"></i>
                            <h4>ENTER PROPERTIES FROM YOUR IDX FEED OR MANUALLY</h4>
                            Realysta's AI will select and import all the relevant information from each of the
                            properties you wish to promote straight from your existing IDX feel and format them into
                            amazing singe page websites.
                        </li>
                        <li><i class="fas fa-check-square"></i>
                            <h4>ADD ANY PICTURES, VIDEOS AND 3D TOURS</h4>
                            Easily upload any extra material you'd like to showcase on your webpage. You can add any of
                            3D Tour, from Matterport to any other technology.
                        </li>
                        <li><i class="fas fa-check-square"></i>
                            <h4>CHOOSE THE WEBSITE LOOK AND FEEL.</h4>
                            Choose among the ever-upgraded templates available. New ones added every month.
                        </li>
                        <li><i class="fas fa-check-square"></i>
                            <h4>BOOST YOUR PROPERTIES WITH OUR MARKETING TOOLS</h4>
                            Our webpages are optimized for SEO and can be easily shared to any Social Media. Find a
                            series of amazing promotional tools inside our platform.
                        </li>
                        <li><i class="fas fa-check-square"></i>
                            <h4>AI-DRIVEN TO SAVE YOU TIME</h4>
                            Our GPT-3 based AI copywriter effortlessly writes your property descriptions and
                            most effective advertising text for your campaings saving you hours of works.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-curve">
        <img src="/images/bg-circle.png">
    </div>
</section>
<section class="dotted-bg">
    <div class="container text-center">
        <h2>Upgrade Your Web Presence</h2>
        <p>Find all the marketing tolls you need under one roof</p>
    </div>
</section>
<section class="award-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="bg-shadow">
                    <h4>
                        <img src="/images/award.png" />
                        Professional Templates
                    </h4>
                    <p>You will be able to showcase your properties with the best looking single page designs available.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-shadow">
                    <h4>
                        <img src="/images/optimized.png" />
                        New Templates Every Month
                    </h4>
                    <p>Every month we add new templates. You will be able to change looks with a single click and adapt
                        to the latest trend in page design.</p>
                </div>
            </div>
        </div>
        <a class="border-btn" href="/example">view live demos</a>
    </div>
</section>
<section class="templtes-section" id="">
    <div class="container">
        <div class="templetes-div">
            <div class="img-wrap" >
                <img  src="/images/templetes-image.png" />
                <div id="examples"></div>
            </div>
            <a href="/example" class="btn bg-orange">view live examples</a>
        </div>
    </div>
</section>
<section class="fatures-section" id="features">
    <div class="container">
        <div class="section-heading text-center">
            <h3>A Complete Toolkit</h3>
            <span class="line"></span>
            <p>Our templates give your customers the full experience they need.</p>
        </div>
    </div>
    <div class="feature-item">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="img-wrap ml">
                        <img src="/images/feature1.png" />
                        <span class="circle-top-right"></span>
                        <span class="circle-bottom-right"></span>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="text-content">
                        <h3>An Impressive Experience</h3>
                        <ul>
                            <li><i class="fas fa-check-square"></i>Our templates automatically adapt to any device,
                                giving your clients the best viewing experience currently available from anywhere.</li>
                            <li><i class="fas fa-check-square"></i>You can showcase pictures, videos and 3D interactive
                                tours.</li>
                            <li><i class="fas fa-check-square"></i>Connect with your clients live using Zoom or any of
                                your favorite videoconfrencing platform.</li>
                        </ul>
                        <a href="/register" class="btn bg-orange">get started</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-circle">
            <img src="/images/bg-circle1.png" />
        </div>
    </div>
    <div class="feature-item">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="text-content">
                        <h3>Promote Your Properties On Your Favorite Social Media</h3>
                        <ul>
                            <li><i class="fas fa-check-square"></i>Our software connects with any of your social media
                                platforms and allows you to promote your property effortlessly.</li>
                            <li><i class="fas fa-check-square"></i>Your Facebook advertising campaign will be
                                automatically tweaked by our AI in order to target the specific audience that your
                                properties are more appealing to.</li>
                        </ul>
                        <a href="#" class="btn bg-orange">learn more</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="img-wrap mr">
                        <img src="/images/feature2.png" />
                        <span class="f-dotted-bg">
                            <img src="/images/f-dotted-bg.png" />
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="square-curve">
            <img src="/images/square-curve.png" />
        </div>
    </div>
    <div class="feature-item">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="img-wrap ml-40">
                        <img src="/images/feature3.png" />
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="text-content">
                        <h3>View Your Stats In Real Time And Manage Leads</h3>
                        <ul>
                            <li><i class="fas fa-check-square"></i>Analyze the performace of your advertising campaigns
                                are generating and tweak them according to the results.</li>
                            <li><i class="fas fa-check-square"></i>With our internal mail system you can keep track of
                                leads and manage them in the most effective way.</li>
                            <li><i class="fas fa-check-square"></i>You can connnect each of your properties to a
                                specific Google Analytics code and analyze your performance from your Google account
                                also.</li>
                        </ul>
                        <a href="#" class="btn bg-orange">learn more</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="square-curve1">
            <img src="/images/square-curve1.png" />
        </div>
    </div>
</section>
<section class="Services-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="Immopagetive-div">
                    <div class="service-item">
                        <h3>Interactive Tours</h3>
                        <div class="icon-wrap">
                            <img src="/images/floor-plans.png">
                        </div>
                        <p>Add any of your 3D interactive tours from Matterport to any other services.</p>
                    </div>
                    <div class="border-div"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="Immopagetive-div">
                    <div class="service-item">
                        <div class="icon-wrap">
                            <img src="/images/reporting.png">
                        </div>
                        <h3>Easy Reports </h3>
                        <p>Send your client or team members details reports on the scheduled visits to the properties.
                        </p>
                    </div>
                    <div class="border-div"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="Immopagetive-div">
                    <div class="service-item">
                        <div class="icon-wrap">
                            <img src="/images/mobile.png">
                        </div>
                        <h3>Responsive Design</h3>
                        <p>Your property will be seen perfectly from any device.</p>
                    </div>
                    <div class="border-div"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="Immopagetive-div">
                    <div class="service-item">
                        <div class="icon-wrap">
                            <img src="/images/lead-capture.png">
                        </div>
                        <h3>Easy Lead Management</h3>
                        <p>With our integrated mail system you can easily keep leads organized and manage team members.
                        </p>
                    </div>
                    <div class="border-div"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="Immopagetive-div">
                    <div class="service-item">
                        <div class="icon-wrap">
                            <img src="/images/internet.png">
                        </div>
                        <h3>Your Domain</h3>
                        <p>You can create a subdomain for free or buy a domain and have your pages easily redirect to
                            it.</p>
                    </div>
                    <div class="border-div"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="Immopagetive-div">
                    <div class="service-item">
                        <div class="icon-wrap">
                            <img src="/images/analytics.png">
                        </div>
                        <h3>Real Time Stats</h3>
                        <p>View real time stats of your visits and connect to Google Analytics for in-depth data on
                            traffic to your pages.</p>
                    </div>
                    <div class="border-div"></div>
                </div>
            </div>
            <div class="col-sm-12 text-center">
                <p><span style="color: #ef7c2c;">INCLUDED: </span>Unlimited templates, hosting and SEO optimization</p>
            </div>
        </div>
    </div>
</section>
<section class="pricing-section" id="pricing">
    <div class="container">
        <div class="section-heading text-center">
            <h3>Pricing</h3>
            <span class="line"></span>
            <p>Any size from independent brokers to large team of agents.</p>
        </div>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#monthly">monthly</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#anually">annual</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="row align-items-center tab-pane active" id="monthly">
                @foreach ($monthly_plan as $plan)
                <div class="col-md-4">
                    <div class="price-item">
                        <div class="price-type">
                            <img src="/images/plane.png">
                            <h4>{{$plan->name}}</h4>
                        </div>
                        <div class="plan-amount">
                            <h5><small>$</small>{{$plan->price}}<br /><span>per month</span></h5>
                        </div>
                        <ul>
                            <li><a href="#">{{$plan->active_listing}} Active Listing</a></li>
                            <li><a href="#">{{$plan->listing_agent}} Listing Agents</a></li>
                        </ul>
                        <div class="btn-plan">
                            <a href="/register">try Realysta for free</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row align-items-center tab-pane" id="anually">

                @foreach ($annual_plan as $plan)
                <div class="col-md-4">
                    <div class="price-item">
                        <div class="price-type">
                            <img src="/images/plane.png">
                            <h4>{{$plan->name}}</h4>
                        </div>
                        <div class="plan-amount">
                            <h5><small>$</small>{{$plan->price}}<br /><span>per year</span></h5>
                        </div>
                        <ul>
                            <li><a href="#">{{$plan->active_listing}} Active Listing</a></li>
                            <li><a href="#">{{$plan->listing_agent}} Listing Agents</a></li>
                        </ul>
                        <div class="btn-plan">
                            <a href="/register">try Realysta for free</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<script>
    window.onbeforeunload = function () {
        window.scrollTo(0,0);
    };

</script>
@include('layouts.footer')
