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
            <!-- Secondary sidebar -->
            <div class="sidebar sidebar-secondary sidebar-default">
                <div class="sidebar-content">
                    <!-- Sidebar search -->
                    <div class="sidebar-category">

                        <div class="category-content">
                            <form action="#">
                                <div class="has-feedback has-feedback-left">
                                    <input type="search" class="form-control" placeholder="Search">
                                    <div class="form-control-feedback">
                                        <i class="icon-search4 text-size-base text-muted"></i>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /sidebar search -->
                    <!-- Action buttons -->
                    <div class="sidebar-category">
                    </div>
                    <!-- /action buttons -->
                    @include('frontend.partials.home-menu')
                </div>
            </div>
            <!-- /secondary sidebar -->
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
                    <div class="dashboard-content">
                        <div class="right" style="float: right">
                            <div class="btns-wrap">
                                <a href="#" class=" btn secondary-btn" data-toggle="modal"
                                    data-target="#modal_form_vertical">Add Property</a>

                            </div>
                        </div>
                        <div class="welcome-text">
                            <h3>Hi Meet!</h3>
                            <p>Welcome to Realysta! Check out some of the new features and updates below!</p>
                        </div>

                        <div class="property-address">
                            <div class="left">
                                <h4>{{$pro->propertydetails->name}}</h4>
                                <p>{{$pro->city}}, GJ {{$pro->zipcode}}</p>
                            </div>
                            <div class="right">
                                <div class="btns-wrap">
                                    <a href="property_details/{{$pro->id}}" id="edit-btn"
                                        class=" btn secondary-btn">Edit Property</a>
                                    <a href="#" class="btn primary-btn">View Property</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="view-empty">
                        <div class="dash-promote-banner">
                            <div class="label label-warning banner-label">INTRODUCING</div>
                            <div class="well-shadow-lt">
                                <div class="addvetisee">
                                    <div class="left">
                                        <div class="image-wrap">
                                            <img
                                                src="https://www.relahq.com/sites/all/themes/relaz/images/content-images/rela-promote-fb.png">
                                        </div>
                                    </div>
                                    <div class=right>
                                        <a href="/relajax/fb-marketing/nojs/create/28681661"
                                            class="use-ajax overlay-trigger fb-step-btn btn m-t-2 ajax-processed">Get
                                            Started</a>
                                    </div>
                                </div>
                                <hr />
                                <p>Start generating more leads & Promote your listing with Rela’s fully integrated
                                    Facebook Ads Publisher!</p>
                            </div>
                        </div>
                    </div>
                    <div class="paymest-section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="inner well">
                                    <div class="box-title m-t-0 h5">Property URLs</div>
                                    <div class="property-urls">
                                        <div class="url-item">
                                            <label>BRANDED</label>
                                            <div class="relative">
                                                <a href="#">Copy</a>
                                                <input type="text" class="form-control" value="abc.com">
                                            </div>
                                        </div>
                                        <div class="url-item">
                                            <label>BRANDED</label>
                                            <div class="relative">
                                                <a href="#">Copy</a>
                                                <input type="text" class="form-control" value="abc.com">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="discount-manage-wrap"><a href="/relajax/discounts/nojs/discount-add-form"
                                            class="overlay-trigger text-muted use-ajax ajax-processed" rel="nofollow">+
                                            Add Custom Domain</a></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inner well">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item active">
                                            <a class="nav-link" data-toggle="tab" href="#share"
                                                aria-expanded="true">Share</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#report"
                                                aria-expanded="false">Reports</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="share" class="tab-pane active in">
                                            <ul class="social-share">
                                                <li>
                                                    <a href="#" class="fb"><i class="fa fa-facebook"></i> Facebook</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="twit"><i class="fa fa-twitter"></i> Twitter</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i>Linked
                                                        in</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="gmail"><i class="fa fa-envelope"></i> Gmail</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div id="report" class="tab-pane fade in">
                                            <div class="reports">
                                                <div class="view-empty">
                                                    <div class=""></div>
                                                    <h2>Automated email reports to share with your clients & team
                                                        members</h2>
                                                </div>
                                                <div class="btns-wrap">
                                                    <a href="#" class=" btn secondary-btn">Schedule</a>
                                                    <a href="#" class="btn primary-btn">Send Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="propertyleads">
                        <div class="panel-heading">
                            <div class="left">
                                <h4 class="filter-title">Property Leads <span class="filter-toggle"><span
                                            class="filter-icon pe-7s-edit"></span> Filter</span></h4>
                            </div>
                            <div class="right">
                                <a href="/export/leads/block-property-leads/30579441"><span
                                        class="fa fa-file-excel-o"></span> Export</a>
                            </div>
                        </div>
                        <div class="view">
                            <div class="view-empty">
                                <p>There are no leads yet for Adadasds...</p>
                                <p>It's time to hit the market! Click the share button below to share this property with
                                    your network!</p>
                                <div class="share-wrapper"><a
                                        class="btn btn-share-property use-ajax overlay-trigger ajax-processed"
                                        href="/relajax/nojs/referrals/send-invite/30579441">Click to Share</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="property-analytics-block">
                        <div class="section-header">
                            <div class="left">
                                <div class="search-div">
                                    <label for="edit-start-date"><span class="icon icon-graph"></span> Page Views
                                    </label>
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" />
                                        </div>
                                        <button class="btn-primary btn form-submit ajax-processed" id="edit-submit"
                                            name="op" value="Go" type="submit">Go</button>
                                    </form>
                                </div>
                            </div>
                            <div class="right">
                                <ul class="counter">
                                    <li>
                                        0
                                        <span class="box-label">Last 7 Days</span>
                                    </li>
                                    <li>
                                        0
                                        <span class="box-label">Last 7 Days</span>
                                    </li>
                                    <li>
                                        0
                                        <span class="box-label">Last 7 Days</span>
                                    </li>
                                    <li>
                                        0
                                        <span class="box-label">Last 7 Days</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="section-body">
                            <div class="graph-div">
                                <h4>Page Views</h4>
                                <div class="chart-div">

                                </div>
                            </div>
                            <div class="time-states">
                                <h4>All-Time Stats</h4>
                                <div class="table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Top Visitor Cities</th>
                                                <th>Top Referrers</th>
                                                <th>New vs Returning</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>No Data Yet</td>
                                                <td>No Referrer Data Yet.</td>
                                                <td>No data yet.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /main content -->
            </div>
            <!-- /page content -->
        </div>
        <!-- /page container -->

        <!-- Vertical form modal -->
        <div id="modal_form_vertical" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Add Property</h5>
                    </div>

                    <form action="/property" method="POST">
                        <div class="modal-body">
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
                                    <div class="col-sm-6">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control">
                                        @csrf
                                    </div>

                                    <div class="col-sm-3">
                                        <label>State</label>
                                        <select
                                            class="state commerce-stripe-administrative-area form-control form-select required"
                                            autocomplete="address-level1"
                                            id="edit-field-property-address-und-0-administrative-area" name="state">
                                            <option value="" selected="selected">- Select -</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NV">Nevada</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="OH">Ohio</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="OR">Oregon</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="TX">Texas</option>
                                            <option value="UT">Utah</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WA">Washington</option>
                                            <option value="WV">West Virginia</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
                                            <option value=" ">--</option>
                                            <option value="AA">Armed Forces (Americas)</option>
                                            <option value="AE">Armed Forces (Europe, Canada, Middle East, Africa)
                                            </option>
                                            <option value="AP">Armed Forces (Pacific)</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="FM">Federated States of Micronesia</option>
                                            <option value="GU">Guam</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="PW">Palau</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="VI">Virgin Islands</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Zipcode</label>
                                        <input type="text" name="zipcode" placeholder="building D, flat #67"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Property</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /vertical form modal -->

</body>
<script>
    $(".property_link").click(function(){
        event.preventDefault();
       var id =  $(this).find('input[name="property_id"]').val()
        $('.property_list_item').removeClass('active');
        $(this).closest('.property_list_item').addClass('active');
        $("#edit-btn").attr("href", "/property_details/"+id)
    });
</script>
@include('frontend.partials.footer')

</html>