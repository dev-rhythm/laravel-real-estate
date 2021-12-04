
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
								<li><a href="/admin/plan">Plans</a></li>
							</ul>
						</div>
                    </div>

                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel border-top-xlg border-top-info panel-white">
                            <div class="panel panel-flat">
                                <div class="panel-body">
                                    <div class="text-center">
                                        @if (session('status'))
                                        <div class="alert alert-success error-alert">
                                            <p>{{ session('status') }}</p>
                                        </div>
                                        @endif
                                    </div>
                                    <!-- /page header -->

                                    <table class="table table-striped table-bordered" data-alert="" data-all="189">
                                        <tbody>
                                            <tr>
                                                <th class="text-nowrap">Plan Name :</th>
                                                <td>{{$plan->name}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">Plan Price :</th>
                                                <td>{{$plan->price}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">Plan Type :</th>
                                                <td>
                                                    @if ($plan->type == '1')
                                                        {{"Monthly"}}
                                                @else
                                                {{"Yearly"}}
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">Active Listing :</th>
                                                <td>{{$plan->active_listing}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">Listing Agent :</th>
                                                <td>{{$plan->listing_agent}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">Created Date :</th>
                                                <td>{{$plan->created_at}}</td>
                                            </tr>



                                        </tbody>
                                    </table>

                                </div>
                                <!-- /main content -->
                            </div>
                        </div>
                        <!-- /page content -->
                    </div>


				</div>
				<!-- /main content -->

            </div>

			<!-- /page content -->

		</div>
		<!-- /page container -->

</body>

<script>
	function deletePlan(id) {
		event.preventDefault()

            var ctext = 'Yes, Delete!';
            var title = "Are you sure you want to delete this plan?";
            var success = "Plan has been deleted"

		Swal.fire({
			title: title,
			// text: "You won't be able to revert this!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: ctext
		}).then((result) => {
			if (result.value) {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('input[name=_token]').val()
					}
				});
				$.ajax({
					type: "GET",
					url: `/admin/plan/delete/${id}`,
					success: function(data) {
						if (data) {
							Swal.fire(
								'Success!',
								success,
								'success'
							).then((result) => {
								if (result.value) {
									location.reload()
								}
							})

						}
					}
				})

			}
		})
	}
</script>
@include('admin.partials.footer')

</html>

