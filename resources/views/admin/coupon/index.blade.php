<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.partials.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                                        class="text-semibold">Coupons</span></h4>
                            </div>
                        </div>
                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="/admin/dashboard"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="{{ route('coupons.index') }}">Coupons</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Form horizontal -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Coupons List</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>

                            <div class="text-center">
                                @if (session('success'))
                                <div class="alert alert-success error-alert">
                                    <p>{{ session('success') }}</p>
                                </div>
                                @endif
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Discount %</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{$coupon->id}}</td>
                                        <td>{{$coupon->title}}</td>
                                        <td>{{$coupon->description}}</td>
                                        <td>{{$coupon->coupon_amount}}</td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                            <a href="{{route('coupons.edit', $coupon->id)}}"><i
                                                                    class="icon-pencil3"></i>
                                                                Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)"
                                                                onclick="deleteCoupon({{$coupon->id}})"><i
                                                                    class="icon-trash"></i>
                                                                Delete</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>

                                    </tr>

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


@include('admin.partials.footer')

</html>
<script>
    function deleteCoupon(id) {
		event.preventDefault()

		Swal.fire({
			title: 'Are you sure you want to delete this coupon?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes Please'
		}).then((result) => {
			if (result.value) {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
                    type: "DELETE",
					url: `/admin/coupons/`+id,
                    id: id,
					success: function(data) {
						if (data) {
							Swal.fire(
								'Success!',
								'Deleted Successfully',
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
