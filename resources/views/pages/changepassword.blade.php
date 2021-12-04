@include('layouts.head')
<body>
  <section class="registe-bg">
    <div class="container">
      <div class="content-wrap">
        <div class="left">
          <div class="logo">
            <a href="/"><img src="{{asset("images/logo-transparent.png")}}" alt="Logo"></a>
          </div>
          <h3>A BETTER WAY TO MARKET YOUR LISTINGS</h3>
          {{-- <p>We are proud to have been chosen as the “Best Single Property Website Builder 2019” by FitSmallBusiness.com based on price, templates and usability and best for agents seeking a website builder with integrated lead generation!</p> --}}
        </div>
        <div class="right">
          <div class="form-wrap">
            <h2>Forgot Password</h2>
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
        @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
          <form action="/reset_password" method="POST">
              <div class="form-group">
                <input type="text" required name="email" class="form-control" placeholder="Enter Email">
              </div>
              <div class="form-group">
                <input type="password" required name="password" class="form-control" placeholder="Enter New Password">
              </div>

              {{ csrf_field() }}
             <div class="form-group">
                  <button class="btn bg-orange">Change Password</button>

                </div>

                <div class="col-md-6 text-left">
                  <a href="/" id="login" class="link">Return to Home</a>
                </div>

                </p>
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
