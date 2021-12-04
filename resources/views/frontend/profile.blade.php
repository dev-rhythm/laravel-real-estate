<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <script type="text/javascript" src="{{asset('admin/assets/js/pages/editor_ckeditor.js')}}"></script>
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
                                        class="text-semibold">Profile</span></h4>
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
                            <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" action="{{route('updateprofile')}}" method="POST">
                                @csrf
                                <fieldset class="content-group">
                                    <legend class="text-bold">Profile</legend>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Email <span class="red">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="email" placeholder="Email"
                                                readonly value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Profile Image <span
                                                class="red">*</span></label>
                                        <div class="col-lg-6">
                                            <div class="col-lg-6">
                                                <div class="panel panel-white panel-theme-settting">
                                                    <div class="panel-body">
                                                        @if(Auth::user()->photo != null)
                                                        @php
                                                        $image =
                                                        'uploads/profile/'.Auth::user()->id.'/'.Auth::user()->photo;
                                                        @endphp
                                                        <img src="{{asset($image)}}" width="100" height="100" alt="">
                                                        <button type="button" class="btn btn-sm btn-default"
                                                            data-toggle="modal" data-target="#modal-right-image">+
                                                            Change Photo</button>

                                                        @else
                                                        <div class="add-logo-box">
                                                            <button type="button" class="btn btn-sm btn-default"
                                                                data-toggle="modal" data-target="#modal-right-image">+
                                                                Click here to add profile photo</button>

                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (\Auth::user()->user_role == 2)
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Custom Logo</label>
                                        <div class="col-lg-6">
                                            <div class="col-lg-6">
                                                <div class="panel panel-white panel-theme-settting">


                                                    <div class="panel-body">
                                                        @if(Auth::user()->custom_logo != null)
                                                        @php
                                                        $image =
                                                        'uploads/profile/'.Auth::user()->id.'/'.Auth::user()->custom_logo;
                                                        @endphp
                                                        <img src="{{asset($image)}}" width="100" height="100" alt="">
                                                        <button type="button" class="btn btn-sm btn-default"
                                                            data-toggle="modal" data-target="#modal-right-custom-logo">+
                                                            Change Logo</button>

                                                        @else
                                                        <div class="add-logo-box">
                                                            <button type="button" class="btn btn-sm btn-default"
                                                                data-toggle="modal"
                                                                data-target="#modal-right-custom-logo">+
                                                                Click here to add custom logo</button>

                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">First Name <span
                                                class="red">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="fname"
                                                placeholder="First Name" value="{{Auth::user()->fname}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Last Name <span
                                                class="red">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="lname" placeholder="Last Name"
                                                value="{{Auth::user()->lname}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Company Name <span
                                                class="red">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="company"
                                                value="{{Auth::user()->company}}" placeholder="Company Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Phone</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="phone"
                                                value="{{Auth::user()->phone}}" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Website</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="website"
                                                value="{{Auth::user()->website}}" placeholder="Website">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Facebook</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="facebook"
                                                value="{{Auth::user()->facebook}}" placeholder="Facebook">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Country <span class="red">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="country" id="country">
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $country)
                                                <option {{ $country->id == $ct ? 'selected' : '' }}
                                                    value="{{$country->id}}">
                                                    {{$country->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">State <span class="red">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="state" id="state">
                                                <option value="">Select State</option>
                                                @foreach ($states as $state)
                                                <option {{ $state->id == $st ? 'selected' : '' }}
                                                    value="{{$state->id}}">
                                                    {{$state->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">City <span class="red">*</span></label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="city" id="city">
                                                <option value="">Select City</option>
                                                @foreach ($cities as $city)
                                                <option {{ $city->id == $ci ? 'selected' : '' }} value="{{$city->id}}">
                                                    {{$city->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Address <span class="red">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="address"
                                                value="{{Auth::user()->address}}" placeholder="address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">ZipCode <span class="red">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="zipcode"
                                                value="{{Auth::user()->zipcode}}" placeholder="ZipCode">
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
										<label class="control-label col-lg-2">Default text input</label>
										<div class="col-lg-6">
											<input type="text" class="form-control">
										</div>
									</div> --}}
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Email Signature</label>
                                        <div class="col-lg-10">
                                            <textarea id="editor-full" rows="5" cols="5" name="email_signature"
                                                class="form-control"
                                                placeholder="Default textarea">{{Auth::user()->email_signature}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">About Us Content<span class='red'>*</span>
                                            <span class='help-block'>This content will
                                                be used on About us secton on landing page.</span></label>

                                        <div class="col-lg-10">
                                            <textarea id="editor-full-about" rows="5" cols="5" name="about_us"
                                                class="form-control"
                                                placeholder="Default textarea">{{Auth::user()->about_us}}</textarea>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit <i
                                                class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
        <!-- /page container -->
        <div class="modal right fade" id="modal-right-image" tabindex="-1" role="dialog" aria-labelledby="">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 800px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel2">Upload Image</h4>
                    </div>

                    <div class="modal-body">
                        <input type="file" class="logo-input-profile">

                    </div>


                </div>

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->

        <div class="modal right fade" id="modal-right-custom-logo" tabindex="-1" role="dialog" aria-labelledby="">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 800px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel2">Upload Image</h4>
                    </div>
                    <div class="modal-body">
                        <input type="file" class="logo-input-custom">
                    </div>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->

</body>


@include('frontend.partials.footer')
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

</html>
