<body>
    <header id='main_header'>
        <div class="container">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="/">
                    <img src="images/realystalogo.png" style="width: 180px;" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#examples">Demos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing">Pricing</a>
                        </li>
                        @if (Route::has('login'))
                        @auth

                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('frontend.logout') }}" method="POST"
                                style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>


                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginmodal">Login</a>
                        </li>
                        @endauth
                        @endif

                        @if (!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link btn-freetrial" href="/register">Free Trial</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>
