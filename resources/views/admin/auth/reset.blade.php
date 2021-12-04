<!DOCTYPE html>
    <html lang="en">
<head>

	@include('admin.partials.head')
	

</head>
<body class="login-container">

	

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Password recovery -->
                    <form method="post" action="{{ route('password.reset') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="token" value="{{ $token }}">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
								<h5 class="content-group">Change Password</h5>
							</div>

							<div class="form-group has-feedback">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"/>
								<div class="form-control-feedback">
								</div>
							</div>
							<div class="form-group has-feedback">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
								<div class="form-control-feedback">
								</div>
							</div>
							<div class="form-group has-feedback">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"/>
								<div class="form-control-feedback">
								</div>
							</div>

							<button type="submit" class="btn bg-blue btn-block">{{ __('Reset Password') }} <i class="icon-arrow-right14 position-right"></i></button>
							<br/>
							<div class="text-center">
									@if (count($errors) > 0)
									<div class="alert alert-danger error-alert">
											@foreach ($errors->all() as $error)
										<span>{{ $error }}</span>
											@endforeach
									</div>
									@endif   
							</div>
							<div class="text-center">
									@if (session('status'))
									<div class="alert alert-success error-alert">
											<p class="alert alert-success">{{ session('status') }}</p>
									</div>
									@endif
							</div>
						</div>
						{{ csrf_field() }}
				
					</form>
					<!-- /password recovery -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						Copyright &copy; 2019. <a href=""></a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>


@include('admin.partials.footer')
</html>
