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


            <!-- Main content -->
            <div class="content-wrapper">

                <div class="content">
                    <!-- Page header -->
                    <div class="page-header page-header-default">
                        <div class="page-header-content">
                            <div class="page-title">
                                <h4><i class="icon-arrow-left52 position-left"></i> <span
                                        class="text-semibold">Billing</span></h4>
                            </div>
                        </div>
                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="#">Billing</a></li>
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
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link" data-toggle="tab" href="#monthly">Monthly Billing </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#annual">Annual Billing</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="monthly" class="tab-pane active"><br>
                                <div class="plan-content">
                                    <div class="row">

                                        @foreach($monthly as $month)
                                        <form action="{{ route('checkout', $month->id) }}" method="get">
                                            {{-- @csrf --}}
                                            {{-- <input type="hidden" value="{{$month->id}}" name="plan_id"> --}}
                                            <div class="col-md-3">
                                                <div class="plan-item">
                                                    <h3 class="text-uppercase">{{$month->name}}</h3>
                                                    <div class="field-content">
                                                        <h1><sup>$</sup>{{$month->price}}</h1>
                                                        <div class="text-uppercase per">Paid Monthly</div>
                                                        <div class="per-year">
                                                            {{-- <span class="per">(${{$month->price}}}/mo - Save
                                                                18%!)</span> --}}
                                                        </div>
                                                    </div>
                                                    <div class="field-content">
                                                        <ul>
                                                            <li>
                                                                <span
                                                                    class="property-count">{{$month->active_listing}}</span>
                                                                Active Listing</li>
                                                            <li class="pricing-tier-card-count"><span
                                                                    class="property-count">{{$month->listing_agent}}</span>
                                                                Listing Agents</li>
                                                        </ul>
                                                    </div>
                                                    <div class="btn-div">
                                                        <button @if (isset($invoice->plan_id ) && $invoice->plan_id ==
                                                            $month->id)
                                                            disabled="disabled"
                                                            @endif
                                                            class="use-ajax btn btn-success ajax-processed">Choose
                                                            Plan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div id="annual" class="tab-pane fade"><br>
                                <div class="row">
                                    @foreach($yearly as $year)
                                    <form action="{{ route('checkout', $year->id) }}" method="get">
                                        {{-- @csrf --}}
                                        {{-- <input type="hidden" value="{{$year->id}}" name="plan_id"> --}}
                                        <div class="col-md-3">
                                            <div class="plan-item">
                                                <h3 class="text-uppercase">{{$year->name}}</h3>
                                                <div class="field-content">
                                                    <h1><sup>$</sup>{{$year->price}}</h1>
                                                    <div class="text-uppercase per">Paid Yearly</div>
                                                    <div class="per-year">
                                                        <span class="per">(${{$year->price}}}/mo - Save 18%!)</span>
                                                    </div>
                                                </div>
                                                <div class="field-content">
                                                    <ul>
                                                        <li>
                                                            <span
                                                                class="property-count">{{$year->active_listing}}</span>
                                                            Active Listing</li>
                                                        <li class="pricing-tier-card-count"><span
                                                                class="property-count">{{$year->listing_agent}}</span>
                                                            Listing Agents</li>
                                                    </ul>
                                                </div>
                                                <div class="btn-div">
                                                    <button @if (isset($invoice->plan_id ) && $invoice->plan_id ==
                                                        $year->id)
                                                        disabled="disabled"
                                                        @endif
                                                        class="use-ajax btn btn-success ajax-processed">Choose
                                                        Plan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                            <div class="paymest-section">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="inner well">
                                            <div class="box-title m-t-0 h5">Current Plan</div>
                                            @if($response != null)
                                            @php

                                            $plan = \App\Plan::find($invoice->plan_id);

                                            @endphp
                                            <div class="box-line aro-plan h4 m-b-1">{{$plan->name}}
                                                "{{$plan->type == '1' ? 'Monthly' : 'Annually'}}"</div>
                                            <div class="box-line trial-exp"><b> Next Billing Date:
                                                </b>{{\Carbon\Carbon::parse($invoice->payment_date)->addMonths(1)->format('d/m/Y')}}
                                            </div>
                                            @else
                                            <div class="box-line aro-plan h4 m-b-1">Free Trial</div>
                                            <div class="box-line trial-exp"><b> Trial Expires:
                                                </b>{{\Carbon\Carbon::parse(Auth::user()->created_at)->addDays(7)->format('d/m/Y')}}
                                            </div>
                                            @endif
                                            <div class="aro-nbd">
                                                {{-- <a href="/relajax/nojs/commerce/upgrade-options"
                                                    class="use-ajax ajax-processed btn btn-primary"
                                                    rel="nofollow">Updgrade
                                                    Now</a> --}}
                                            </div>
                                            {{-- <div id="discount-manage-wrap"><a
                                                href="/relajax/discounts/nojs/discount-add-form"
                                                class="overlay-trigger text-muted use-ajax ajax-processed"
                                                rel="nofollow">+ Add Coupon</a></div> --}}
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                    <div class="inner well">
                                        <div class="box-title m-t-0 h5">Payment Method <a
                                                href="/account/billing/add-card" class="add-card-btn pull-right">Manage
                                                Cards</a></div>
                                        <div class="box-empty-text">No Cards on File </div>
                                    </div>
                                </div> --}}
                                    <div class="col-md-12">
                                        <div class="inner well">
                                            <div class="box-title m-t-0 h5">Order History</div>
                                            @if($response != null)
                                            <table class="table datatable-basic dataTable no-footer">
                                                <thead>
                                                    <tr>

                                                        <th scope="col">Plan Name</th>
                                                        <th scope="col">Invoice Id</th>
                                                        <th scope="col">Next Billing Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if ($invoices != null)


                                                    @foreach($invoices as $in)

                                                    @php
                                                    $plan = \App\Plan::findOrFail($in->plan_id);

                                                    $months = ($plan->type == 1) ? '1' : '12';
                                                    @endphp
                                                    <tr>
                                                        <td>{{$plan->name}}
                                                            "{{($plan->type == 1) ? "Monthly" : "Annually"}}"</td>
                                                        <td>{{$in->invoice_id}}</td>
                                                        <td>{{\Carbon\Carbon::parse($in->payment_date)->addMonths($months)->format('d/m/Y')}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif

                                                </tbody>
                                            </table>

                                            @else
                                            <div class="view-empty">
                                                <p>You have not placed any orders with us yet.</p>
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>

                </div>
                <!-- /main content -->
            </div>

            <!-- /page content -->

        </div>
        <!-- /page container -->

</body>


@include('frontend.partials.footer')

</html>
