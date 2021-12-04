@include('layouts.head')

@include('layouts.header')

<section class="page-header">
    <div class="container">
        <div class="text">
            <h1>contact us</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem</p>
        </div>
    </div>
</section>
<section class="contact-details pt-70 ">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="relative-div">
                    <div class="bg-shadow">
                        <div class="address">
                            <i class="fas fa-map-marker-alt"></i>
                            <h3>Address</h3>
                            <p>123 North 4th Street
                                Brookings, South Dakota
                                57006</p>
                        </div>
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="border-div"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="relative-div">
                    <div class="bg-shadow">
                        <div class="address">
                            <i class="fas fa-phone-alt"></i>
                            <h3>phone</h3>
                            <p>+91 987654321<br />
                                (555) 123456</p>
                        </div>
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="border-div"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="relative-div">
                    <div class="bg-shadow">
                        <div class="address">
                            <i class="fas fa-envelope-open-text"></i>
                            <h3>email</h3>
                            <p>info@realysta.com<br />
                                support@company.com</p>
                        </div>
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <div class="border-div"></div>
                </div>
            </div>
        </div>
        <div class="social-sharing">
            <h4><i class="fas fa-share-alt"></i>Social media</h4>
            <ul>
                <li>
                    <a href="#" class="social-tag fb"><i class="fab fa-facebook-f"></i>facebook</a>
                </li>
                <li>
                    <a href="#" class="social-tag twiter"><i class="fab fa-twitter"></i>Twitter</a>
                </li>
                <li>
                    <a href="#" class="social-tag linkedin"><i class="fab fa-linkedin"></i>Linkedin</a>
                </li>
                <li>
                    <a href="#" class="social-tag pinterest"><i class="fab fa-pinterest-p"></i>pinterest</a>
                </li>
                <li>
                    <a href="#" class="social-tag gmail"><i class="far fa-envelope"></i> gmail</a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="getintouch pt-70 pb-70">
    <div class="container">
        <div class="heading text-center">
            <h2>GET IN TOUCH</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.</p>
        </div>
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Name">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="last name">
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Email">
                            <i class="far fa-envelope"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Phone Number">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <textarea class="form-control" placeholder="your message"></textarea>
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <a href="#" class="btn bg-orange">send inquiry</a>
                </div>
            </div>
        </form>
    </div>
</section>

@include('layouts.footer')
