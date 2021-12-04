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

                <div class="content">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form method="POST" action="/advance">
                                @csrf
                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 advance-blade-wrapper">
                                                <div class="advance-blade-left">
                                                    <img
                                                        src="https://www.relahq.com/sites/all/themes/relaz/images/leaddistro_image.jpg">
                                                </div>
                                                <div class="advance-blade-right">
                                                    <input type="hidden"
                                                        value="{{collect(request()->segments())->last()}}"
                                                        name="property_id">
                                                    <div class="form-group lead-d-list">
                                                        <label>Lead Distribution List
                                                            <span class="form-required red"
                                                                title="This field is required.">*</span>
                                                        </label>
                                                        <input type="text" name="email[]" class="form-control"
                                                            value="{{ isset($emails[0]) ? $emails[0] : '' }}"
                                                            placeholder="">
                                                        <input type="text" name="email[]" class="form-control"
                                                            value="{{ isset($emails[1]) ? $emails[1] : '' }}"
                                                            placeholder="">
                                                        <input type="text" name="email[]" class="form-control"
                                                            value="{{ isset($emails[2]) ? $emails[2] : '' }}"
                                                            placeholder="">
                                                        <input type="text" name="email[]" class="form-control"
                                                            value="{{ isset($emails[3]) ? $emails[3] : '' }}"
                                                            placeholder="">
                                                        <input type="text" name="email[]" class="form-control"
                                                            value="{{ isset($emails[4]) ? $emails[4] : '' }}"
                                                            placeholder="">
                                                        <p>
                                                            Lead Distribution List
                                                            Enter up to 5 email addresses that should receive lead
                                                            notification emails when a lead is submitted through the
                                                            contact form on this property. Please Note: The listing
                                                            agents shown on the property will already receive a lead
                                                            notification, so there is no need to add their emails here.
                                                        </p>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="panel panel-white">
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-12 advance-blade-wrapper">
                                                <div class="advance-blade-left">
                                                    <img
                                                        src="https://www.relahq.com/sites/all/themes/relaz/images/facebook-md.jpg">
                                                </div>
                                                <div class="advance-blade-right">

                                                    <div class="form-group">
                                                        <label>Facebook Pixel ID <span class="form-required red"
                                                                title="This field is required.">*</span></label>
                                                        <input type="text"
                                                            value="{{ isset($data->fb_pixel_id) ? $data->fb_pixel_id : '' }}"
                                                            name="fb_pixel_id" class="form-control" placeholder="">

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <div class="panel panel-white">
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-12 advance-blade-wrapper">
                                                <div class="advance-blade-left">
                                                    <img
                                                        src="https://www.relahq.com/sites/all/themes/relaz/images/google-md.jpg">
                                                </div>
                                                <div class="advance-blade-right">

                                                    <div class="form-group">
                                                        <label>Google Analytics ID <span class="form-required red"
                                                                title="This field is required.">*</span></label>
                                                        <input type="text"
                                                            value="{{ isset($data->google_analytics_id) ? $data->google_analytics_id : '' }}"
                                                            name="google_analytics_id" class="form-control"
                                                            placeholder="">
                                                        <small>Format: UA-xxxxxxx-yy</small>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>




                </div>
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

</html>
