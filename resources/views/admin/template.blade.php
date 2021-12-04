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
										class="text-semibold">Dashboard</span></h4>
							</div>
						</div>
						<div class="breadcrumb-line">
							<ul class="breadcrumb">
								<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
								<li><a href="form_inputs_basic.html">Dashboard</a></li>
							</ul>
						</div>
					</div>

				</div>
				<!-- /main content -->

			</div>
			<!-- /page content -->

		</div>
		<!-- /page container -->

</body>


@include('admin.partials.footer')

</html>
