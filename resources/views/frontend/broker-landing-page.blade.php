@include('layouts.head')

<body>
    <header class="page-header">
        <div class="container">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="{{$user_info->website or route('/')}}">
                    @php
                    $logo = ($user_info->custom_logo != '') ?
                    '/uploads/profile/'.$user_info->id.'/'.$user_info->custom_logo :
                    '/broker-landing-images/house-care-logo.png';
                    @endphp
                    <img src="{{$logo}}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#properties">Properties</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <section class="about-us" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-img-wrapper">
                        <div class="about-img">
                            <img src="/broker-landing-images/about.png">
                        </div>
                        <div class="about-img-after">
                            <img src="/broker-landing-images/about-after.png">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-content">
                        <div class="section-heading">
                            <h3>About Us</h3>
                            <span class="line"></span>
                        </div>
                        <div class="section-content">
                            @if ($user_info->about_us != '')
                            <p>{!!$user_info->about_us!!}</p>
                            @else
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. It has
                                survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-img-before">
            <img src="/broker-landing-images/about-before.png">
        </div>
    </section>
    <section class="properties" id="properties">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="section-heading text-center">
                        <h3>Properties</h3>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row property-list">
                @if ($properties != null)
                @foreach ($properties as $property)
                @include('frontend.property-block')
                @endforeach
                @endif
            </div>
            @if ($properties->lastPage() > $properties->currentPage())
            <div class="row">
                <div class="col-md-12 text-center">
                    <button data-broker-id="{{request()->route('id')}}" class="btn btn-show-more">Show More</button>
                </div>
            </div>
            @endif

        </div>
    </section>
    <section class="contact-us" id="contact">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="section-heading text-center">
                        <h3>Contact us</h3>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-5">
                    <div class="contact-left">
                        <h4 class="contact-title">Information</h4>
                        <ul class="c-info">
                            <li>
                                <div class="c-info-icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="c-info-text">
                                    <div class="c-name">
                                        <h5>Company Name:</h5>
                                        <p>{{$user_info->company or 'Jon Doe Co.'}}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="c-info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="c-info-text">
                                    <div class="c-name">
                                        <h5>Address:</h5>
                                        <p>{!!$user_info->full_address or 'XYZ Street.'!!}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="c-info-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="c-info-text">
                                    <div class="c-name">
                                        <h5>Phone:</h5>
                                        <p><a
                                                href="tel:{{$user_info->phone or '987654321'}}">{{$user_info->phone or '987654321'}}</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="c-info-icon">
                                    <i class="fas fa-globe-europe"></i>
                                </div>
                                <div class="c-info-text">
                                    <div class="c-name">
                                        <h5>Website:</h5>
                                        <p><a
                                                href="{{$user_info->website or 'https://example.com'}}">{{$user_info->website or 'https://example.com'}}</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-7">
                    <div class="contact-right">
                        <h4 class="contact-title">Get in Touch With Us</h4>
                        <form action="{{route('broker_contact_form')}}" class="contact-form" id="contact-form"
                            method="POST">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="fname" class="form-control" placeholder="First name">
                                    <span id="basic-error" class="err_display d-none p-1 alert-danger alert"
                                        for="basic"></span>
                                </div>
                                <div class="col">
                                    <input type="text" name="lname" class="form-control" placeholder="Last name">
                                    <span id="basic-error" class="err_display d-none p-1 alert-danger alert"
                                        for="basic"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                    <span id="basic-error" class="err_display d-none p-1 alert-danger alert"
                                        for="basic"></span>
                                </div>
                                <div class="col">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone">
                                    <span id="basic-error" class="err_display d-none  p-1 alert-danger alert"
                                        for="basic"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <textarea class="form-control" name="message" rows="7"
                                        placeholder="Message"></textarea>
                                    <span id="basic-error" class="err_display  d-none p-1 alert-danger alert"
                                        for="basic"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="broker_id" value="{{ request()->route('id') }}">
                                    {!! csrf_field() !!}
                                    <button type="submit" id="csubmit" class="btn btn-inquiry">Send Inquiry</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="about-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="footer-links">
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#properties">Properties</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function(){
            $('ul.navbar-nav .nav-link, .footer-links a').click(function(e){
                e.preventDefault();
                var href = $(this).attr('href');

                if(href.substr(0, 1) !== '#'){
                    window.location.replace(window.location.origin+href);
                }else{
                    $(this).closest('ul').find('.active').removeClass('active');
                    $(this).addClass('active');
                    $('html, body').animate({
                        scrollTop: $(href).offset().top - 200
                    }, 2000);
                }
            });

            $("#contact-form").validate({
                // onkeyup: function(element) {
                //     $(element).valid();
                // },
                ignore: [],
                rules: {
                    fname: {
                        required:true
                    },
                    lname: {
                        required:true,
                    },
                    email: {
                        required:true,
                    },
                    phone: {
                        required:true,
                    },
                    message: {
                        required:true,
                    },
                },
                errorPlacement: function (error, element) {
                    $(element).closest('.col').find('.err_display').text(error.text()).toggleClass('d-none');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).closest('.col').find('.err_display').html('').addClass('d-none');
                },
                submitHandler: function(form) {
                        form.submit();
                },
        });

        $("#csubmit").click(function(e) {
            e.preventDefault();
            var form_data = $("#contact-form").serialize();
            if(  $("#contact-form").valid()){
                var form_data = $("#contact-form").serialize();
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    type:'post',
                    url:'/broker-contact-form',
                    data: form_data,
                    success:function(data){
                        swal({
                            title: "Success",
                            text: "Message sent successfully",
                            icon: "success",
                            button: "Thanks!",
                        }).then((value) => {
                            location.reload();
                        });
                    }
                });
            }else{

            }
        });

        $(document).on('click', '.btn-show-more', function(){
            var broker_id = $(this).attr('data-broker-id');
            var skip = $('.property-list .property_wrap').length;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                type:'get',
                url:'/load_more_properties',
                data: {broker_id: broker_id, skip: skip},
                success:function(data){
                    $('.property-list').append(data);
                }
            });
        });

    });
    </script>
</body>

</html>
