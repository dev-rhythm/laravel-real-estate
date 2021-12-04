<!DOCTYPE html>
<html lang="en">

<head>

	@include('admin.partials.head')


</head>

<body>
	@include('admin.partials.header')


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">



			@include('admin.partials.menu')


			<!-- Main content -->
			<div class="content-wrapper">

				<div class="content">
					<!-- Page header -->
					<div class="page-header page-header-default">
						<div class="page-header-content">
							<div class="page-title">
								<h4><i class="icon-arrow-left52 position-left"></i> <span
										class="text-semibold">User</span></h4>
							</div>
						</div>
						<div class="breadcrumb-line">
							<ul class="breadcrumb">
								<li><a href="/admin/dashboard"><i class="icon-home2 position-left"></i> Home</a></li>
								<li><a href="/admin/user">User</a></li>
							</ul>
						</div>
                    </div>

                    <!-- Form horizontal -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Add User</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
                            @if (count($errors) > 0)
                                    <div class="alert alert-danger error-alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="text-center">
                                        @if (session('status'))
                                        <div class="alert alert-success error-alert">
                                            <p>{{ session('status') }}</p>
                                        </div>
                                        @endif
                                    </div>

							<form class="form-horizontal" action="{{route('admin.user.add')}}" method="POST" >
								<fieldset class="content-group">
									<legend class="text-bold">User Details</legend>

									<div class="form-group">
										<label class="control-label col-lg-2">First Name</label>
										<div class="col-lg-10">
											<input type="text" name="fname" value="{{ old('fname') }}"  class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Last Name</label>
										<div class="col-lg-10">
											<input type="text" name="lname" value="{{ old('lname') }}"  class="form-control">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Email</label>
										<div class="col-lg-10">
											<input type="text" name="email" value="{{ old('email') }}"  class="form-control" placeholder="Enter Email">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Password</label>
										<div class="col-lg-10">
											<input type="password" name="password" value=""  class="form-control" >
										</div>
									</div>
                                    @csrf

			                        <div class="form-group">
			                        	<label class="control-label col-lg-2">User Role</label>
			                        	<div class="col-lg-10">
				                            <select name="select" name="user_role" class="form-control">
				                                <option value="1">Admin</option>
				                                <option value="2">Broker</option>
				                                <option value="3">Client</option>

				                            </select>
			                            </div>
			                        </div>



								<div class="text-right">
									<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</form>
						</div>
					</div>
					<!-- /form horizontal -->

				</div>
				<!-- /main content -->

            </div>

			<!-- /page content -->

		</div>
		<!-- /page container -->

</body>


@include('admin.partials.footer')

</html>
