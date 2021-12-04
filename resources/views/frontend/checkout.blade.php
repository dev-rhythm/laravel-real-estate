<!DOCTYPE html>
<html lang="en">

<head>

    @include('frontend.partials.head')

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('frontend.partials.plain-header')
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
                                        class="text-semibold">Checkout</span></h4>
                            </div>
                        </div>
                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="{{route('billing')}}">Billing</a></li>
                                <li><a href="#">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                    <section class="plan-section">
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                        @endif
                        <form action="#" class="apply_coupon" method="post">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Coupon</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="coupon_code" name="coupon_code">
                                        <span class="input-group-btn">
                                            <button class="btn bg-success" type="button" id='apply_coupon'>Apply
                                                Coupon</button>
                                        </span>
                                    </div>
                                    <span class='help-block'>If you have a coupon code, please apply it</span>
                                </div>
                            </div>
                        </form>

                        <div class="clearfix "></div>
                        <div class="mt-5"></div>
                        <form class="form-horizontal" action="{{route('payment')}}">
                            <fieldset class="content-group">
                                <legend class="text-bold">Checkout Details</legend>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-lg-4">Plan Selected <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="hidden" name="plan_id" value="{{ $plan->id }}"
                                                class="form-control">
                                            <div class="alert alert-primary text-center">
                                                <span class="text-semibold">{{$plan->name}} </span>
                                                "{{$plan->type == 1 ? 'Monthly' : 'Anually'}}"
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class=" col-md-6">
                                    <div class=" panel ">

                                        <div class="panel-heading">
                                            <h6 class="panel-title">Billing Detials</h6>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>First Name: </td>
                                                        <td><span
                                                                class="label border-left-info label-striped">{{Auth::user()->fname}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Last Name:
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="label border-left-info label-striped">{{Auth::user()->lname}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email:
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="label border-left-info label-striped">{{Auth::user()->email}}</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class=" panel panel-flat">
                                        <div class="table-responsive no-border">

                                            <div class="panel-heading">
                                                <h6 class="panel-title">Order Total</h6>
                                                <div class="heading-elements order_pane hide">
                                                    <ul class="icons-list">
                                                        <li><a data-action="reload" class='reload_effect'></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Subtotal:</th>
                                                        <td class="text-right">$<span
                                                                class='sub_total'>{{$plan->price}}</span>
                                                            <input type="hidden" name="plan_price" id="plan_price"
                                                                value="{{$plan->price}}">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Coupon Discount: <span
                                                                class='discount_percentage text-danger'></span></th>
                                                        <td class="text-right">-$<span
                                                                class="coupon_discount_price">0</span>
                                                            <input type="hidden" name="coupon_discount"
                                                                id="coupon_discount">
                                                            <input type="hidden" name="coupon_id" id="coupon_id">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total:</th>
                                                        <td class="text-right text-primary">
                                                            <h5 class="text-semibold">$<span
                                                                    class='total_price'>{{$plan->price}}</span>
                                                            </h5>
                                                            <input type="hidden" name="total_price" id="total_price"
                                                                value="{{$plan->price}}">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                @csrf
                                <div class="clearfix"></div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Proceed PayPal <i
                                            class="icon-arrow-right14 position-right"></i></button>
                                </div>
                        </form>
                    </section>
                </div>
                <!-- /main content -->
            </div>
            <!-- /page content -->
        </div>
        <!-- /page container -->
        <script>
            jQuery(document).ready(function(){
                jQuery(document).on('click', '#apply_coupon', function(){

                    var coupon_name = jQuery('#coupon_code').val();


                    if(coupon_name != ''){
                        jQuery('.order_pane .reload_effect').trigger('click');
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN':  jQuery('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type: "POST",
                            url: '/check_coupon',
                            data: {  coupon_name: coupon_name},
                            success: function (data) {
                                var data = jQuery.parseJSON(data);
                                if(data.not_available === true){
                                    jQuery('#coupon_code').val('');
                                    jQuery('#coupon_code').focus();

                                    Swal.fire({
                                        title: 'There is no such coupon available, please check and enter correct coupon code.',
                                        type: 'warning',
                                        showCancelButton: true,
                                    });

                                }else if(data.coupon_amount != ''){

                                    // disable the coupon and button if applied
                                    jQuery('#coupon_code, #apply_coupon').attr('disabled', 'disabled');

                                    var plan_actual_price       = jQuery('#plan_price').val();
                                    var total_price             = jQuery('#total_price').val();
                                    var discount_percentage     = data.coupon_amount;
                                    var discount_percent        = (discount_percentage / 100).toFixed(2);
                                    var actual_discount         = (plan_actual_price*discount_percent).toFixed(2); // gives the value for subtract from main value
                                    var discounted_price        = (plan_actual_price-actual_discount).toFixed(2);

                                    // set total price
                                    jQuery('#total_price').val('').val(discounted_price);
                                    jQuery('.total_price').html('').html(discounted_price);
                                    jQuery('#coupon_discount').val('').val(actual_discount);
                                    jQuery('.coupon_discount_price').html('').html(actual_discount);
                                    jQuery('.discount_percentage').html('').html(discount_percentage+'%');

                                    // set coupon id
                                    jQuery('#coupon_id').val('').val(data.id);

                                    Swal.fire({
                                        title: 'Coupon applied successfully!',
                                        type: 'success',
                                    });
                                }
                            }
                        })
                    }else{
                        Swal.fire({
                            title: 'Coupon Cannot be empty',
                            type: 'warning',
                        })
                        jQuery('#coupon_code').focus();
                    }
                });
            });
        </script>
</body>
@include('frontend.partials.footer')

</html>
