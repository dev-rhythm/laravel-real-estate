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
            >
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

                <div class="col-md-6 col-md-offset-2">
                    @if (count($errors) > 0)
                                        <div class = "alert alert-danger">
                                           <ul>
                                              @foreach ($errors->all() as $error)
                                                 <li>{{ $error }}</li>
                                              @endforeach
                                           </ul>
                                        </div>
                                     @endif
                    <!-- Basic layout-->
                    <form action="#" class="center" accept="/property" method="POST">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Add New Property</h5>

                            <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>

                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <label>Country</label>
                                            <select class="form-control" name="country" id="country">
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $country)
                                                <option {{ $country->id == 212 ? 'selected' : '' }}
                                                    value="{{$country->id}}">
                                                    {{$country->name}}
                                                </option>
                                                @endforeach
                                            </select>

                                        </div>



                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <label>Street</label>
                                            <input type="text" name="street" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>State</label>
                                            <select class="form-control" name="state" id="state">
                                                <option value="">Select State</option>
                                                @foreach ($states as $state)
                                                <option value="{{$state->id}}">
                                                    {{$state->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>City</label>
                                            <select class="form-control" name="city" id="city">
                                                <option value="">Select City</option>
                                                @foreach ($cities as $city)
                                                <option value="{{$city->id}}">
                                                    {{$city->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @csrf

                                        </div>


                                        <div class="col-sm-3">
                                            <label>Zipcode</label>
                                            <input type="text" name="zipcode" placeholder="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary">Add Property</button>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- /basic layout -->

                </div>

                    <!-- /main content -->

                <!-- /page content -->
            </div>
            <!-- /page container -->


</body>
<script>
    $(".property_link").click(function(){
        event.preventDefault();
       var id =  $(this).find('input[name="property_id"]').val()
        $('.property_list_item').removeClass('active');
        $(this).closest('.property_list_item').addClass('active');
        $("#edit-btn").attr("href", "/property_details/"+id)
        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
        $.ajax({
               type:'get',
               url:'/getPropertyData/'+id.substr(id.indexOf("?") + 1),
               data: {
                   id,
                  },
               success:function(data) {
                if(typeof(variable) != "undefined" && variable !== null) {
                    $("#pname").text(data.propertydetails.name)
                }else{
                    $("#pname").text(data.street)
                }
                    $("#view_theme").attr("href", "/template/"+id)
                //   location.reload()
               }
            });
    });
</script>
<script>
    $('#country').change(function(){
        var cid = $(this).val();
        if(cid){
        $.ajax({
           type:"get",
           url:" /state/"+cid,
           success:function(res)
           {
                if(res)
                {
                    $("#state").empty();
                    $("#city").empty();
                    $("#state").append('<option>Select State</option>');
                    $.each(res,function(key,value){
                        $("#state").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
           }

        });
        }
    });
    $('#state').change(function(){
        var sid = $(this).val();
        if(sid){
        $.ajax({
           type:"get",
           url:"/city/"+sid,
           success:function(res)
           {
                if(res)
                {
                    $("#city").empty();
                    $("#city").append('<option>Select City</option>');
                    $.each(res,function(key,value){
                        $("#city").append('<option value="'+key+'">'+value+'</option>');
                    });
                }
           }

        });
        }
    });
</script>

<script>
    function deleteProperty(id) {
		event.preventDefault()

            var ctext = 'Yes, Delete!';
            var title = "Are you sure you want to Delete this Property?";
            var success = "Property has been deleted"

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
					url: `/delete-property/${id}`,
					success: function(data) {
						if (data) {
							Swal.fire(
								'Success!',
								success,
								'success'
							).then((result) => {
								if (result.value) {
									window.location.replace('/property')
								}
							})

						}
					}
				})

			}
		})
	}
</script>
@include('frontend.partials.footer')

</html>
