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

					<!-- Simple login form -->
					<form action="{{ route('admin.login') }}" method="post">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i>
								</div>
								<h5 class="content-group">Login to your account <small class="display-block">Enter your
										credentials below</small></h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" placeholder="Email" name="email">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" placeholder="Password" name="password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i
										class="icon-circle-right2 position-right"></i></button>
							</div>
							<div class="form-group">
							</div>

							{{-- <div class="text-center">
								<a href="">Forgot password?</a>
							</div> --}}
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
									<p>{{ session('status') }}</p>
								</div>
								@endif
							</div>
						</div>
						{{ csrf_field() }}

					</form>
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
