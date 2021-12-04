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
            <!-- Secondary sidebar -->
            <div class="sidebar sidebar-secondary sidebar-default">
                <div class="sidebar-content">
                    <!-- Sidebar search -->
                    <div class="sidebar-category">

                        <div class="category-content">
                            <form action="/property-details" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{collect(request()->segments())->last()}}"
                                    name="property_id">

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
                                        <div class="form-horizontal" action="#">
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <label>Property Name</label>
                                                    <input type="text" name="name" value="{{old('name')}}"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <label>Property Description</label>
                                                    <textarea id="editor-full" rows="5" cols="5" name="description"
                                                        class="form-control" placeholder="Default textarea">
                                               {{old('description')}}
                                            </textarea>
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
                                                    <input type="text" id="amenties" name="amenties"
                                                        data-role="tagsinput" value="{{old('amenties')}}" />
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
                                                <option>- None -</option>
                                                <option value="Sold">Sold</option>
                                                <option value="In Escrow">In Escrow</option>
                                                <option value="None">None</option>
                                                <option value="select_or_other">Custom Status</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Active">Active</option>
                                                <option value="Featured">Featured</option>
                                                <option value="For Rent">For Rent</option>
                                                <option value="New">New</option>
                                                <option value="Reduced">Reduced</option>
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
                                            <label>Listing Status</label>
                                            <select name="type" class="form-control">
                                                <option value="SingleFamily">Single Family</option>
                                                <option value="Duplex">Duplex</option>
                                                <option value="Triplex">Triplex</option>
                                                <option value="Quadruplex">Quad-Plex</option>
                                                <option value="Condo">Condo</option>
                                                <option value="Cooperative">Co-op</option>
                                                <option value="Mobile">Mobile Home</option>
                                                <option value="MultiFamily2To4">Multi Family</option>
                                                <option value="MultiFamily5Plus">Multi Family</option>
                                                <option value="Timeshare">Timeshare</option>
                                                <option value="Townhouse">Town House</option>
                                                <option value="Miscellaneous">Miscellaneous</option>
                                                <option value="VacantResidentialLand">Residential Land</option>
                                                <option value="Residential">Residential</option>
                                                <option value="Commercial">Commercial</option>
                                                <option value="Lots And Land">Lots And Land</option>
                                                <option value="select_or_other">Other</option>
                                            </select>
                                        </div>

                                        @php
                                        $currencies= \DB::table("currencies")->get();

                                        @endphp
                                        <div class="form-group">

                                            <label>Currency</label>
                                            <select class="form-control form-select" id="currency" name="currency">
                                                @foreach($currencies as $currency)
                                                <option {{ $currency->country == "America" ? 'selected' : '' }}
                                                    value="{{$currency->country}}">
                                                    {{$currency->country}}({{$currency->symbol}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>List Price<span class="red">*</span></label>
                                            <input type="text" value="{{old('display_price')}}" name="list_price"
                                                class="form-control" name="" id="">
                                        </div>
                                        <div class="form-group">
                                            <label>Display Price<span class="red">*</span></label>
                                            <input type="text" name="display_price" value="{{old('display_price')}}"
                                                class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label>Year Built</label>
                                            <input type="text" class="form-control" id="" value="{{old('year_built')}}"
                                                name="year_built">
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
                                                    <input name="bedrooms" value="{{old('bedrooms')}}" type="text"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                    <label>Bathrooms</label>
                                                    <input type="text" name="bathrooms" value="{{old('bathrooms')}}"
                                                        value"" class="form-control">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Half Baths</label>
                                                    <input name="half_baths" value="{{old('half_baths')}}"
                                                        class="form-control">
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
                                                    <input value="{{old('sqr_foot')}}" class="form-control"
                                                        name="sqr_foot">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for=""> Metric </label><br>
                                                    <select name="sqr_foot_metric" class="form-control">
                                                        <option value="sqmt">Sqmt</option>
                                                        <option value="sqft">Sqft</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                    <label>Lot Size</label>
                                                    <input type="text" value="{{old('lot_size')}}" class="form-control"
                                                        name="lot_size">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for=""> Metric </label><br>
                                                    <select name="metric" class="form-control">
                                                        <option value="sf">sf</option>
                                                        <option value="m">m2</option>
                                                        <option value="km">km2</option>
                                                        <option value="acre">acre</option>
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
                                            <input name="stories" value="{{old('stories')}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Garage</label>
                                            <select name="garage" class="form-control">
                                                <option>- None -</option>
                                                <option value="Attached">Attached</option>
                                                <option value="Dettached">Dettached</option>
                                                <option value="Dettached">Dettached</option>
                                                <option value="Carport">Carport</option>
                                                <option value="None">None</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Parking Spaces</label>
                                            <input type="text" value="{{old('parlking_price')}}" name="parking_space"
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
@include('frontend.partials.footer')

</html>
