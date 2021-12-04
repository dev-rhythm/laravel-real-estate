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
            @if(Auth::user()->user_role !=1)
            @include('frontend.partials.menu')
            @endif
            <!-- Secondary sidebar -->
            <div class="sidebar sidebar-secondary sidebar-default">
                <div class="sidebar-content">

                    <!-- /sub navigation -->
                    @include('frontend.partials.secondary-menu')
                </div>
            </div>
            <!-- /secondary sidebar -->
            <!-- Main content -->
            <div class="content-wrapper">
                <form action="/saveAddress" method="post">
                    @csrf
                    <input type="hidden" name="property_id" value="{{$details->id}}">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <form>
                                    <div class="panel panel-flat">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Street <span class="form-required red"
                                                                title="This field is required.">*</span></label>
                                                        <input type="text" name="street" class="form-control"
                                                            placeholder="enter street"
                                                            value="{{$details->street or ""}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>City <span class="form-required red"
                                                                title="This field is required.">*</span></label>
                                                        <select class="form-control" name="city" id="city">
                                                            @foreach ($cities as $city)
                                                            <option value="{{$city->id}}"
                                                                {{ $city->id == $details->city ? 'selected' : '' }}>
                                                                {{$city->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>State <span class="form-required red"
                                                                title="This field is required.">*</span></label>
                                                        <select class="form-control" name="state" id="state">
                                                            @foreach ($states as $state)
                                                            <option value="{{$state->id}}"
                                                                {{ $state->id == $details->state ? 'selected' : '' }}>
                                                                {{$state->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>ZIP code <span class="form-required red"
                                                                title="This field is required.">*</span></label>
                                                        <input type="text" name="zipcode" class="form-control"
                                                            placeholder="" value="{{$details->zipcode or ""}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Country <span class="form-required red"
                                                                title="This field is required.">*</span></label>
                                                        <select class="form-control" name="country" id="country">
                                                            {{-- <option value="">Select Country</option> --}}
                                                            @foreach ($countries as $country)
                                                            <option
                                                                {{ $country->id == $details->country ? 'selected' : '' }}
                                                                value="{{$country->id}}">
                                                                {{$country->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <button href="submit" class="btn btn-primary">Update
                                                            Map</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="map" style="width: 100%; height: 400px;"></div>
                                                </div>
                                                <script
                                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQjmoWXaw3jONRXX6ou9i07L85AJ_0_ww&callback=map">
                                                </script>


                                                <script type="text/javascript">
                                                    var city = $( "#city option:selected" ).text();
    var state = $( "#state option:selected" ).text();
    var country = $( "#country option:selected" ).text();
   var address = '{{$details->street}},'+city+','+state+','+country;

   var map = new google.maps.Map(document.getElementById('map'), {
       mapTypeId: google.maps.MapTypeId.TERRAIN,
       zoom: 6
   });

   var geocoder = new google.maps.Geocoder();

   geocoder.geocode({
      'address': address
   },
   function(results, status) {
      if(status == google.maps.GeocoderStatus.OK) {
         new google.maps.Marker({
            position: results[0].geometry.location,
            map: map
         });
         map.setCenter(results[0].geometry.location);
      }
   });

                                                </script>
                                            </div>


                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>




                    </div>
                </form>
                <!-- /main content -->
            </div>
            <!-- /page content -->
        </div>
        <!-- /page container -->






</body>

@include('frontend.partials.footer');
<script>
    function openform() {
      document.getElementById("sidebar-form").style.width = "500px";
    }

    function closeform() {
      document.getElementById("sidebar-form").style.width = "0";
    }
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

</html>
