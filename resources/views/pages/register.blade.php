@include('layouts.head')

<body>
    <section class="registe-bg">
        <div class="container">
            <div class="content-wrap">
                <div class="left">
                    <div class="logo">
                        <a href="/"><img style="width: 250px;" src="{{asset("images/white-logo.png")}}" alt="Logo"></a>
                    </div>
                    <h3>YOUR PORTAL TO PROFESSIONAL MARKETING</h3>
                    {{-- <p>We are proud to have been chosen as the “Best Single Property Website Builder 2019” by FitSmallBusiness.com based on price, templates and usability and best for agents seeking a website builder with integrated lead generation!</p> --}}
                </div>
                <div class="right">
                    <div class="form-wrap">
                        <h2>Register</h2>
                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="center" style="color: red">
                            {{$error}}
                        </div>
                        @endforeach
                        @endif

                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        <form action="{{route('register')}}" method="POST">
                            <div class="form-group">
                                <input type="text" value="{{old('fname')}}" name="fname" class="form-control"
                                    placeholder="First Name *">
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{old('lname')}}" name="lname" class="form-control"
                                    placeholder="Last Name *">
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{old('email')}}" name="email" class="form-control"
                                    placeholder="Email *">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password *">
                            </div>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <button class="btn bg-orange">Create new account</button>
                                <a href="/#loginmodal" class="btn bg-orange">Login</a>
                            </div>
                        </form>
                        @if(session('success'))
                        <span class="alert alert-success" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </span>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
