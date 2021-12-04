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
								<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Profile</span></h4>
							</div>
						</div>
						<div class="breadcrumb-line">
							<ul class="breadcrumb">
								<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
								<li><a href="form_inputs_basic.html">Profile</a></li>
							</ul>
						</div>
                    </div>
<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Profile</h5>
							<div class="heading-elements">
								{{-- <ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul> --}}
		                	</div>
						<a class="heading-elements-toggle"><i class="icon-more"></i></a></div>
                        @if (Session::has('success'))
                        <div class="alert alert-info">{{ Session::get('success') }}</div>
                     @endif

                     @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
						<div class="panel-body">

                        <form class="form-horizontal" action="{{route('updatepasswordadmin')}}" method="POST">
                            @csrf
								<fieldset class="content-group">
									<legend class="text-bold">Profile</legend>

									<div class="form-group">
										<label class="control-label col-lg-2">Old Password</label>
										<div class="col-lg-6">
                                        <input type="password" class="form-control" name="old_password" placeholder="Password" value="">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2">New Password</label>
										<div class="col-lg-6">
                                        <input type="password" class="form-control" name="new_password" placeholder="New Password" value="">
										</div>
									</div>
								<div class="text-right">
									<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</form>
						</div>
					</div>
				</div>
            </div>

            <!-- /page content -->

        </div>
        <!-- /page container -->

</body>


@include('admin.partials.footer')

</html>
