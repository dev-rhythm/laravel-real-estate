<footer>
    <div class="container">
        <div class="logo-transparent">
            <img src="images/white-logo.png" style="width: 180px;">
        </div>
        <ul class='footer_links'>
            <li>
                <a class='footer_item' href="#features">Features</a>
            </li>
            <li>
                <a class='footer_item' href="#examples">Examples</a>
            </li>
            <li>
                <a class='footer_item' href="#pricing">Pricing</a>
            </li>
            <li>
                <a class='footer_item' href="/register">Sign Up</a>
            </li>
            <li>
                <a class='footer_item' href="/contact">Contact Us</a>
            </li>
            <li>
                <a class='footer_item' href="#">Terms of Service</a>
            </li>
            <li>
                <a class='footer_item' href="#">Privacy </a>
            </li>
        </ul>
        <div class="bottom-footer">
            <div class="row">
                <div class="col-md-6 text-left">
                    <p>Copyright Realysta {{\Carbon\Carbon::now()->format('Y')}} </p>
                </div>
                <div class="col-md-6 text-right">
                    <p>3606 Enterprise Ave, Naples, FL 3410</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<div id="loginmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Login</h3>
                <div class="form-content">
                    <form id="login-forms" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            {{-- <a href="#" id="login" class="btn bg-orange w-100">Login</a> --}}
                            <button type="submit" class="btn bg-orange w-100">Login </button>
                        </div>

                        <div class="login-error" style="display:none;">
                            <p class="alert alert-danger "><strong>Whoops!</strong> Invalid Credentials Or Account Not
                                Verified, Activated</p><br><br>

                        </div>
                        <ul id="login-errors" style="display:none;"></ul>
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="/forgot" class="link">
                                    Forgot Password
                                </a>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{route('register')}}" class="link">
                                    Create a New Account
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    // $('#login').click(function() {
    $('#login-forms').submit(function() {
		event.preventDefault()
		var email = $('#email').val()
		var password = $('#password').val()
		$.ajax({
			type: "POST",
			url: "/login",
			data: {
				email,
				password,
				"_token": "{{ csrf_token() }}",
			},
			success: function(xhr, status, success) {
				if (xhr.success == true) {
					$(".login-error").hide();
					$(".login-success").show();
					$("#success").empty().append("<li>Login Successfull</li>")

                    if(xhr.user_role == '1'){
                        window.location.href = "/admin/dashboard"
                    }else{
                        window.location.href = "/dashboard"
                    }
				} else {
					$("#login-errors").hide();
					$(".login-error").show();
					$(".login-success").hide();
					// $("#login-errors").append("<li class='alert alert-danger'>Invalid Credentials</li>")
				}
			},
			error: function(xhr, status, error) {
				$("#login-errors").empty();
				$("#login-errors").hide();
				$(".login-error").hide();
				$.each(xhr.responseJSON.errors, function(key, item) {
					if (item) {
						$("#login-errors").show()
						$("#login-errors").append("<li class='alert alert-danger'>" + item + "</li>")
					} else {
						$(".login-error").show();
						$(".login-success").hide();
					}
				});
			}
		});
	});
</script>
<script>
    if(window.location.hash == "#loginmodal"){
        $("#loginmodal").modal("show")
    }


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


        $('ul.navbar-nav .nav-link, .footer_links .footer_item').click(function(e){
        e.preventDefault();
        var href = $(this).attr('href');

        // if we are not on homepage then we need to redirect to homepage with #
        if(location.pathname != '/'){
            window.location.replace(window.location.origin+href);
        }

        if(href.substr(0, 1) !== '#'){
            window.location.replace(window.location.origin+href);
        }else{
            $(this).closest('ul').find('.active').removeClass('active');
            $(this).addClass('active');
            $('html, body').animate({
                scrollTop: $(href).offset().top - 200
            }, 2000);
        }
        $('#collapsibleNavbar').removeClass('show');

    });
</script>
</body>

</html>
