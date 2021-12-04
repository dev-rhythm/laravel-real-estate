{{-- {{dd($user)}} --}}
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
								<li><a href="/admin/user">Users</a></li>
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

                                    @php
                                    $country= \DB::table("countries")->where("id",$user->country)->first();
                                    $states= \DB::table("states")->where("id",$user->state)->first();
                                    $cities= \DB::table("cities")->where("id",$user->city)->first();
                                    @endphp
                                    <table class="table table-striped table-bordered" data-alert="" data-all="189">
                                        <tbody>
                                            <tr>
                                                <th class="text-nowrap">First Name :</th>
                                                <td>{{$user->fname}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">Last Name :</th>
                                                <td>{{$user->lname}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">Email :</th>
                                                <td>{{$user->email}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">Phone :</th>
                                                <td>{{$user->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">Company :</th>
                                                <td>{{$user->company}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">Website :</th>
                                                <td>{{$user->website}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">Facebook :</th>
                                                <td>{{$user->facebook}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">Country :</th>
                                                <td>{!! $country->name or "" !!}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">State :</th>
                                                <td>{!! $states->name or "" !!}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">City :</th>
                                                <td>{!! $cities->name or "" !!}</td>
                                            </tr>

                                            <tr>
                                                <th class="text-nowrap">Zipcode :</th>
                                                <td>{{$user->zipcode}}</td>
                                            </tr>

                                            <tr>
                                                <th class="text-nowrap">Properties :</th>
                                                <td><a href="/admin/property/{{$user->id}}">Click Here</a></td>
                                            </tr>
                                            <tr>
                                                <th class="text-nowrap">Registration Date :</th>
                                                <td>{{$user->created_at}}</td>
                                            </tr>


                                                <th class="text-nowrap">Status :</th>
                                                <td>@if($user->active == 0)
                                                    <span class="label label-danger">InActive</span>
                                                    @else
                                                    <span class="label label-success">Active</span>
                                                    @endif
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>


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

