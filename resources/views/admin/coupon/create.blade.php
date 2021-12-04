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
                            <h5 class="panel-title">Add Coupon</h5>
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

                            <form class="form-horizontal" action="{{action('CouponController@store')}}" method="POST">
                                <fieldset class="content-group">
                                    <legend class="text-bold">Coupons Details</legend>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Coupon Title <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="text" name="title" value="{{ old('title') }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Coupon Description <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-10">
                                            <textarea name="description" id="" cols="30" rows="10"
                                                class="form-control">{{old('description')}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Discount Amount <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="number" name="coupon_amount" value="{{ old('coupon_amount') }}"
                                                class="form-control">
                                            <span class="help-block">In Percentage</span>
                                        </div>
                                    </div>


                                    @csrf


                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit <i
                                                class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                            </form>
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
