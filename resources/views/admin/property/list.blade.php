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
                                        class="text-semibold">Properties</span></h4>
                            </div>
                        </div>
                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="/admin/dashboard"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="#">Properties</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Form horizontal -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Properties List</h5>
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
                                        <th>Property Name</th>
                                        <th>Published</th>
                                        <th>Registration Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($counter=1)
                                    @foreach ($properties as $property)
                                    <tr>
                                        <td>{{$counter}}</td>
                                        <td>{{$property->propertydetails->name or ""}}</td>
                                        <td>{{$property->published == '1' ? "Published" : "UnPublished" }}</td>
                                        <td>{{\Carbon\Carbon::parse($property->created_at)->format('d/m/Y')}}</td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="/admin/view/{{$property->id}}"><i
                                                                    class="icon-eye"></i> View</a>
                                                        </li>
                                                        @if($property->published == 0)
                                                        <li><a href="#" id="publish"
                                                                onClick="return publish({{$property->id}},'1')"><i
                                                                    class="icon-check"></i>
                                                                Publish</a></li>
                                                        @else
                                                        <li><a href="#"
                                                                onClick="return publish({{$property->id}},'0')"><i
                                                                    class="icon-cross"></i>
                                                                Not Publish</a></li>
                                                        @endif
                                                        <li><a href="/admin/view/{{$property->id}}"><i
                                                                    class="icon-bin"></i> Delete</a>
                                                    </ul>
                                                </li>
                                            </ul>

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
    function publish(id,status) {
		event.preventDefault()
	    if(status == 1){
            var ctext = 'Yes, Publish!';
            var title = "Are you sure you want to make this property publish?";
            var success = "Property has been published"
        }else{
            var ctext = 'Yes, UnPublish!';
            var title = "Are you sure you want to make this property unpublish?";
            var success = "Property has been unpublished"
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
					url: `/admin/make-publish/${id}/${status}`,
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
