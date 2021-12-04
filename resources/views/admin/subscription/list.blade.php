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
                                <li><a href="/admin/subscription">Subscription</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Form horizontal -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Users List</h5>
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
                            <table class="table datatable-basic">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>User</th>
                                        <th>Plan</th>
                                        <th>Plan Type</th>
                                        <th>Subscription Date</th>
                                        <th>Subscription End Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php($counter=1)
                                    {{-- @php(dd($subscriptions)) --}}
                                    @foreach ($subscriptions as $subscription)
                                    <tr>
                                        <td>{{$counter}}</td>
                                        <td>{{$subscription->users[0]->fname .' '.$subscription->users[0]->lname}}</td>
                                        <td>{{$subscription->plan->name.' '.$subscription->plan->price}}</td>
                                        <td>{{ $subscription->plan->type == "1" ? 'Monthly' : 'Yearly' }}</td>
                                        <td>{{\Carbon\Carbon::parse($subscription->payment_date)->format('d/m/Y')}}</td>

                                        @if($subscription->plan->type == 1)
                                        <td> {{\Carbon\Carbon::parse($subscription->payment_date)->addMonths(1)->format('d/m/Y')}}
                                        </td>
                                        @else
                                        <td>{{\Carbon\Carbon::parse($subscription->payment_date)->addYears(1)->format('d/m/Y')}}
                                        </td>
                                        @endif


                                    </tr>
                                    @php($counter++)
                                    @endforeach
                                </tbody>
                            </table>

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
