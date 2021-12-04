<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
</head>

<body>
    @include('frontend.partials.header')
    <!-- Page container -->
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">
            @include('frontend.partials.menu')


            <!-- Main content -->
            <div class="content-wrapper">

                <div class="content">
                    <!-- Page header -->
                    <div class="page-header page-header-default">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4><i class="icon-arrow-left52 position-left"></i> <span
                                        class="text-semibold">Agents</span></h4>
                            </div>
                        </div>
                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="/dashboard"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="/client-list">Agents</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Form horizontal -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Client List</h5>
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Registration Date</th>
                                        <th>Account Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($counter=1)
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$counter}}</td>
                                        <td>{{$user->fname}}</td>
                                        <td>{{$user->lname}}</td>
                                        <td>{{$user->email}}</td>
                                        {{-- <td><a href="/admin/property/{{$user->id}}">Click Here</a></td> --}}
                                        <td>{{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</td>
                                        <td>{{$user->active == '1' ? "Active" : "InActive" }}</td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        {{-- <li><a href="job/{{$user->id}}"><i class="icon-eye"></i>
                                                                View</a>
                                                        </li>
                                                        <li><a href="user/edit/{{$user->id}}"><i
                                                                    class="icon-pencil3"></i>
                                                                Edit</a></li> --}}
                                                        @if($user->active == 0)
                                                        <li><a href="#" id="active"
                                                                onClick="return activeUser({{$user->id}},'1')"><i
                                                                    class="icon-check"></i>
                                                                Acitve</a></li>
                                                        @else
                                                        <li><a href="#"
                                                                onClick="return activeUser({{$user->id}},'0')"><i
                                                                    class="icon-trash"></i>
                                                                Delete</a></li>
                                                        @endif

                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>


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


@include('admin.partials.footer')

</html>
<script>
    function activeUser(id,status) {
		event.preventDefault()
	    if(status == 1){
            var ctext = 'Yes, make Active!';
            var title = "Are you sure you want to make this user active?";
            var success = "User account has been activated"
        }else{
            var ctext = 'Yes, Delete!';
            var title = "Are you sure you want to delete this user?";
            var success = "User account has been deleted"
        }
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
					url: `/admin/user/active/${id}/${status}`,
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
