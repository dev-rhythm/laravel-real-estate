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
            @if(Auth::user()->user_role !=1)
            @include('frontend.partials.menu')
            @endif
            <!-- Secondary sidebar -->
            <div class="sidebar sidebar-secondary sidebar-default">
                <div class="sidebar-content">
                    <!-- Sidebar search -->
                    <div class="sidebar-category">

                        <div class="category-content">
                            <form action="/property-details-update" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="property_id" value="{{$details->id}}">


                        </div>
                    </div>
                    <!-- /sidebar search -->
                    <!-- Action buttons -->
                    <div class="sidebar-category">
                    </div>
                    <!-- /action buttons -->
                    @include('frontend.partials.secondary-menu')

                </div>
            </div>
            <!-- /secondary sidebar -->
            <!-- Main content -->
            <div class="content-wrapper">

                <div class="content">
                    <div class="row">
                        <form action="" method="POST">
                            <div class="col-md-8">

                                <!-- Horizontal form -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                            </ul>
                                        </div>
                                        <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                                    </div>

                                    <div class="panel-body">
                                        @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                        @endif
                                        <div class="form-horizontal" action="#">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <label>Property Name</label>
                                                    <input type="text" value="{{$details->name}}" name="name"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <label>Property Description</label>
                                                    <textarea id="editor-full" rows="5" cols="5" name="description"
                                                        class="form-control"
                                                        placeholder="Default textarea">{{$details->description}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Horizontal form -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                            </ul>
                                        </div>
                                        <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                                    </div>

                                    <div class="panel-body">
                                        <div class="form-horizontal" action="#">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <label>Amenties</label>
                                                    {{-- <input type="text" name="amenties" class="form-control tokenfield" value="{!! $details->amenties !!}"> --}}
                                                    <input type="text" id="amenties" name="amenties"
                                                        data-role="tagsinput" value="{!! $details->amenties !!}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /horizotal form -->
                                {{-- <div class="form-group">
                                <label>Tags:</label>
                                <div class="col-lg-12 tags">
                                    <span class="label label-default">Tag1</span>  <span class="label label-default">Tag1</span> <span class="label label-default">Tag1</span>
                                    <span class="label label-default">Tag1</span>  <span class="label label-default">Tag1</span> <span class="label label-default">Tag1</span>
                                </div>
                            </div> --}}



                            </div>

                            <div class="col-md-4">

                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Listing Status</h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                            </ul>
                                        </div>
                                        <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                                    </div>

                                    <div class="panel-body">


                                        <div class="form-group">
                                            <label>Listing Status</label>
                                            <select name="listing_status" class="form-control">
                                                <option {{ $details->listing_status == "" ? 'selected' : '' }} value="">
                                                    - None -</option>
                                                <option {{ $details->listing_status == "Sold" ? 'selected' : '' }}
                                                    value="Sold">Sold</option>
                                                <option {{ $details->listing_status == "In Escrow" ? 'selected' : '' }}
                                                    value="In Escrow">In Escrow</option>
                                                <option {{ $details->listing_status == "None" ? 'selected' : '' }}
                                                    value="None">None</option>
                                                <option
                                                    {{ $details->listing_status == "Pending" ? 'selected' : '' }}
                                                    value="Pending">Pending</option>
                                                <option
                                                    {{ $details->listing_status == "Active" ? 'selected' : '' }}
                                                    value="Active">Active</option>
                                                <option
                                                    {{ $details->listing_status == "Featured" ? 'selected' : '' }}
                                                    value="Featured">Featured</option>
                                                <option
                                                    {{ $details->listing_status == "For Rent" ? 'selected' : '' }}
                                                    value="For Rent">For Rent</option>
                                                <option
                                                    {{ $details->listing_status == "New" ? 'selected' : '' }}
                                                    value="New">New</option>
                                                <option
                                                    {{ $details->listing_status == "Reduced" ? 'selected' : '' }}
                                                    value="Reduced">Reduced</option>
                                                <option
                                                    {{ $details->listing_status == "select_or_other" ? 'selected' : '' }}
                                                    value="select_or_other">Custom Status</option>
                                            </select>
                                        </div>


                                    </div>
                                </div>


                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">General</h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                            </ul>
                                        </div>
                                        <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                                    </div>

                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label>Property Type</label>
                                            <select name="type" class="form-control">
                                                <option {{ $details->type == "SingleFamily" ? 'selected' : '' }}
                                                    value="SingleFamily">Single Family</option>
                                                <option {{ $details->type == "Duplex" ? 'selected' : '' }}
                                                    value="Duplex">Duplex</option>
                                                <option {{ $details->type == "Triplex" ? 'selected' : '' }}
                                                    value="Triplex">Triplex</option>
                                                <option {{ $details->type == "Quadruplex" ? 'selected' : '' }}
                                                    value="Quadruplex">Quad-Plex</option>
                                                <option {{ $details->type == "Condominium" ? 'selected' : '' }}
                                                    value="Condominium">Condo</option>
                                                <option {{ $details->type == "Cooperative" ? 'selected' : '' }}
                                                    value="Cooperative">Co-op</option>
                                                <option {{ $details->type == "Mobile" ? 'selected' : '' }}
                                                    value="Mobile">Mobile Home</option>
                                                <option {{ $details->type == "MultiFamily2To4" ? 'selected' : '' }}
                                                    value="MultiFamily2To4">Multi Family</option>
                                                <option {{ $details->type == "MultiFamily5Plus" ? 'selected' : '' }}
                                                    value="MultiFamily5Plus">Multi Family</option>
                                                <option {{ $details->type == "Timeshare" ? 'selected' : '' }}
                                                    value="Timeshare">Timeshare</option>
                                                <option {{ $details->type == "Townhouse" ? 'selected' : '' }}
                                                    value="Townhouse">Town House</option>
                                                <option {{ $details->type == "Miscellaneous" ? 'selected' : '' }}
                                                    value="Miscellaneous">Miscellaneous</option>
                                                <option
                                                    {{ $details->type == "VacantResidentialLand" ? 'selected' : '' }}
                                                    value="VacantResidentialLand">Residential Land</option>
                                                <option {{ $details->type == "Residential" ? 'selected' : '' }} 
                                                    value="Residential">Residential</option>
                                                <option {{ $details->type == "Commercial" ? 'selected' : '' }} 
                                                    value="Commercial">Commercial</option>
                                                <option {{ $details->type == "Lots And Land" ? 'selected' : '' }}  
                                                    value="Lots And Land">Lots And Land</option>
                                                <option {{ $details->type == "select_or_other" ? 'selected' : '' }}
                                                    value="select_or_other">Other</option>
                                            </select>
                                        </div>
                                        @php
                                        $currencies= \DB::table("currencies")->get();

                                        @endphp
                                        <div class="form-group">

                                            <label>Currency</label>
                                            <select class="form-control form-select" id="currency" name="currency">
                                                @foreach($currencies as $currency)
                                                <option
                                                    {{ $details->currency_country ==$currency->country ? 'selected' : '' }}
                                                    value="{{$currency->country}}">
                                                    {{$currency->country}}({{$currency->symbol}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>List Price<span class="red">*</span></label>
                                            <input type="text" value="{{$details->list_price}}" name="list_price"
                                                class="form-control" name="" id="">
                                        </div>
                                        <div class="form-group">
                                            <label>Display Price<span class="red">*</span></label>
                                            <input type="text" value="{{$details->display_price}}" name="display_price"
                                                class="form-control" name="" id="">
                                        </div>
                                        <div class="form-group">
                                            <label>Year Built</label>
                                            <input type="text" value="{{$details->year_built}}" name="year_built"
                                                class="form-control" id="">
                                        </div>


                                    </div>
                                </div>

                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Rooms</h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                            </ul>
                                        </div>
                                        <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                                    </div>

                                    <div class="panel-body">


                                        <div class="form-horizontal" action="#">
                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                    <label>Bedrooms</label>
                                                    <input name="bedrooms" value="{{$details->bedrooms}}" type="text"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                    <label>Bathrooms</label>
                                                    <input type="text" name="bathrooms" value="{{$details->bathrooms}}"
                                                        class="form-control">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Half Baths</label>
                                                    <input value="{{$details->half_baths}}" type="text"
                                                        name="half_baths" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Size</h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                            </ul>
                                        </div>
                                        <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                                    </div>

                                    <div class="panel-body">

                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                    <label>Home</label>
                                                    <input value="{{$details->sqr_foot}}" type="text"
                                                        class="form-control" name="sqr_foot">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for=""> Metric </label>

                                                    <select name="sqr_foot_metric" class="form-control">
                                                        <option
                                                            {{ $details->sqr_foot_metric == "sqmt" ? 'selected' : '' }}
                                                            value="sqmt">Sqmt</option>
                                                        <option
                                                            {{ $details->sqr_foot_metric == "sqft" ? 'selected' : '' }}
                                                            value="sqft">Sqft</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                    <label>Lot Size</label>
                                                    <input type="text" value="{{$details->lot_size}}"
                                                        class="form-control" name="lot_size">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for=""> Metric </label>

                                                    <select name="metric" class="form-control">
                                                        <option {{ $details->metric == "sf" ? 'selected' : '' }}
                                                            value="sf">sf</option>
                                                        <option {{ $details->metric == "m" ? 'selected' : '' }}
                                                            value="m">m2</option>
                                                        <option {{ $details->metric == "km" ? 'selected' : '' }}
                                                            value="km">km2</option>
                                                        <option {{ $details->metric == "acre" ? 'selected' : '' }}
                                                            value="acre">acre</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Additional</h5>
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                            </ul>
                                        </div>
                                        <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                                    </div>

                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label for="">Stories</label>
                                            <input name="stories" value="{{$details->stories}}" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Garage</label>
                                            <select name="garage" class="form-control">
                                                <option {{ $details->garage == "" ? 'selected' : '' }} value="">- None -
                                                </option>
                                                <option {{ $details->garage == "Attached" ? 'selected' : '' }}
                                                    value="Attached">Attached</option>
                                                <option {{ $details->garage == "Dettached" ? 'selected' : '' }}
                                                    value="Dettached">Dettached</option>
                                                <option {{ $details->garage == "Carport" ? 'selected' : '' }}
                                                    value="Carport">Carport</option>
                                                <option {{ $details->garage == "None" ? 'selected' : '' }} value="None">
                                                    None</option>
                                                <option {{ $details->garage == "Other" ? 'selected' : '' }}
                                                    value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Parking Spaces</label>
                                            <input type="text" value="{{$details->parking_space}}" name="parking_space"
                                                class="form-control">
                                        </div>


                                    </div>
                                </div>
                                <div class="right" style="float: right">
                                    <div class="btns-wrap">
                                        <input type="submit" value="Save" class="btn secondary-btn">


                                    </div>
                                </div>


                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
    </div>
    <!-- /page container -->



</body>
<script>
    $('#amenties').tagsinput({
confirmKeys: [13, 44],
maxTags: 20
});

</script>
@include('frontend.partials.footer')

</html>
