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


            @include('frontend.partials.home-menu')

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

                                <a href="{{route('idx.listing')}}" class="btn secondary-btn">Import Property</a>
                            </div>
                            <!--  <div class="btns-wrap">

                            </div> -->
                        </div>
                        <div class="welcome-text">
                            <h3>Hi {{Auth::user()->fname}}!</h3>
                            <p>Welcome to Realysta! Check out some of the new features and updates below!</p>
                        </div>

                        <div class="property-address">
                            <div class="left">
                                @php
                                $c= \DB::table("countries")->where("id",$pro->country)->first();
                                $s= \DB::table("states")->where("id",$pro->state)->first();
                                $ct= \DB::table("cities")->where("id",$pro->city)->first();
                                @endphp
                                <h4 id="pnames">{{$pro->propertydetails->name or  ""}}</h4>
                                <p id="pdetails">{{$ct->name or  ""}}, {{$s->name}} {{$pro->zipcode or  ""}}</p>
                            </div>
                            <div class="right">
                                <div class="btns-wrap">
                                    <a href="/property_details/{{$pro->id or  ""}}" id="edit-btn"
                                        class=" btn secondary-btn">Edit Property</a>
                                    {{-- <a target="_blank" href="/template{{isset($theme->theme_id) ? $theme->theme_id : $theme->id }}/{{$pro->id or ""}}"
                                    id="view_theme" class="btn primary-btn">View Property</a> --}}
                                    <a target="_blank" href="{{route('property_details', $pro->id)}}" id="view_theme"
                                        class="btn primary-btn">View Property</a>
                                    <a href="#" onClick="return deleteProperty({{$pro->id}})" id="view_theme"
                                        class="btn danger-btn">Delete Property</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-flat col-md-6 col-xs-offset-6">
                            <div class="panel-heading">
                                <h6 class="panel-title">Share <i class='icon-share3'></i><a
                                        class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul id="admin_social_list">
                                            <li class="share-icon share-icon-facebook first">
                                                <a href="javascript:void(0)" data-type='facebook' class='share_link'
                                                    data-url='{{route('property_details', $pro->id)}}'>
                                                    <span class="icon-facebook"></span></a>
                                            </li>
                                            <li class="share-icon share-icon-twitter">
                                                <a href="javascript:void(0)" data-type='twitter' class='share_link'
                                                    data-url='{{route('property_details', $pro->id)}}'
                                                    rel="nofollow"><span class="icon-twitter"></span></a></li>
                                            <li class="share-icon share-icon-linkedin">
                                                <a href="javascript:void(0)" data-type='linkedin' class='share_link'
                                                    data-url='{{route('property_details', $pro->id)}}'
                                                    rel="nofollow"><span class=" icon-linkedin2"></span></a></li>
                                            <li class="share-icon share-icon-pintrest">
                                                <a href="javascript:void(0)" data-type='pinterest'
                                                    data-url='{{route('property_details', $pro->id)}}'
                                                    class='share_link' rel="nofollow"><span
                                                        class="icon-pinterest2"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="view-empty">
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
                    </div> --}}
                    {{-- <div class="paymest-section">
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
                    </div> --}}
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
                        @if($propertyLeads)
                        {{-- @foreach($ as $lead)
                        <div class="panel-heading"> --}}
                        {{-- <div class="left">
                                <p class="filter-title">{{$lead->name}} <span class="filter-toggle"><span
                                class="filter-icon pe-7s-edit"></span> Filter</span></p>
                    </div> --}}
                    {{-- <div class="center">
                                <a href="/export/leads/block-property-leads/30579441"><span
                                        class="fa fa-file-excel-o"></span> {{$lead->message}}</a>
                </div> --}}
                {{-- <div class="right">
                                <p class="filter-title">{{$lead->email}} <span class="filter-toggle"><span
                        class="filter-icon pe-7s-edit"></span> Filter</span></p>
            </div> --}}
            <table class="table datatable-basic">
                <thead>
                    <tr>
                        {{-- <th>Sr.No</th> --}}
                        <th>Email</th>
                        <th>Message</th>
                        <th>Send Reply</th>
                        {{-- <th></th>
                                        <th></th>
                                        <th></th> --}}
                        {{-- <th>Send Reply</th> --}}
                        {{-- <th class="text-center">Action</th> --}}
                    </tr>
                </thead>
                <tbody>

                    @foreach ($propertyLeads as $lead)
                    <tr>
                        <td>{{$lead->email}}</td>
                        <td>{{ $lead->message }}</td>
                        <td><button type="button" class="btn btn-primary btn-sm" id="send-reply"
                                data-id="{{$lead->email}}" onClick="return sendMail('{{$lead->email}}')">Send Reply
                            </button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="view">
            <div class="view-empty">
                <p>There are no leads yet for Adadasds...</p>
                <p>It's time to hit the market! Click the share button below to share this property with
                    your network!</p>
                <div class="share-wrapper"><a class="btn btn-share-property use-ajax overlay-trigger ajax-processed"
                        href="/relajax/nojs/referrals/send-invite/30579441">Click to Share</a></div>
            </div>
        </div>
        @endif
    </div>
    {{-- <div class="property-analytics-block">
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
                    </div> --}}
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
                                    <label>Country <span class="red">*</span></label>
                                    <select class="form-control" name="country" id="country">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                        <option value="{{$country->id}}">
                                            {{$country->name}}
                                        </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-sm-10">
                                    <label>Street <span class="red">*</span></label>
                                    <input type="text" required name="street" class="form-control">
                                </div>


                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>State <span class="red">*</span></label>
                                    <select class="form-control" name="state" id="state">
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
                                        @foreach ($cities as $city)
                                        <option value="{{$city->id}}">
                                            {{$city->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @csrf

                                </div>


                                <div class="col-sm-3">
                                    <label>Zipcode <span class="red">*</span></label>
                                    <input type="text" required name="zipcode" placeholder="" class="form-control"
                                        maxlength="15">
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
    @php
    $email_sig = $user_signature;
    $emailSign = preg_replace('!\s+!smi', ' ', $email_sig);

    @endphp
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

                var details = `${data.ct.name},${data.s.name} ${data.zipcode}`
                if(typeof(variable) != "undefined" && variable !== null) {
                    $("#pname").text(data.propertydetails.name)
                    $("#pnames").text(data.propertydetails.name)
                    $("#pdetails").text(details)


                }else{
                    $("#pname").text(data.street)
                    $("#pnames").text(data.street)
                    $("#pdetails").text(details)
                }

                // update share link
                $('#admin_social_list .share_link').each(function() {
                    $(this).attr('data-url', data.share_url);
                });


                $("#view_theme").attr("href", "/view/property/"+id)
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

                                    noty({
                                        width: 200,
                                        text: "Deleted Successfully",
                                        type: 'success',
                                        dismissQueue: true,
                                        timeout: 2000,
                                        layout: "topRight",
                                    });
                                    setTimeout(() => {
                                        window.location.replace('/property')
                                    }, 2000);

								}
							})

						}
					}
				})

			}
		})
	}
</script>
<script>
    function myFunction() {
           document.getElementById("demo").innerHTML = "<textarea cols = '20' rows = '20' name='text' id='text_id' class='form-control' style='resize:vertical' ></textarea><br/><button class='btn btn-success' id='send-mail'>Send</button>";
    }
</script>
<script>
    // $('#send-mail').click(function(){

    // })

    $("#search-property").keyup(function(){
      var searchterm = $(this).val();
      $.ajax({
					type: "GET",
					url: `/search-property/${searchterm}`,
					success: function(data) {
						$('.property_list').replaceWith(data)
					}
				})
    });
</script>
<script>
    // Prompt dialog
       function sendMail(id) {
            event.preventDefault()
            var email =id
            // const signature = '{!!Auth::user()->email_signatures!!}';
            var from = "{{Auth::user()->email}}"
                var bootboxModal = bootbox.prompt({
                    title: "Send Reply",
                    className: 'medium',
                    value: '',
                    // Change the input type
                    inputType: 'textarea',

                    // You can't change the buttons, but you can tweak their style and label (content)
                    buttons: {
                        cancel: {
                            className: 'btn-warning'
                        },
                        confirm: {
                            label: 'Send',
                            className: 'btn-success'
                        }
                    },

                    // Let Bootbox do the work of getting the textarea value
                    callback: function (res) {

                        // forcefully update textarea update value
                        CKEDITOR.instances["editorfull"].updateElement();// update textarea value
                        var data = $('#editorfull').val(); // text area value

                        // callback message won't work due to ckeditor. Thus take ckeditor instance value
                        var message = CKEDITOR.instances["editorfull"].getData();
                        if ($.trim(message) != '' && data != '' && res != null) {
                            $.post('/send-reply', {'email': email, from, message},
                                function (returnedData) {
                                    // if (returnedData == 'Set') {
                                    //     document.getElementById('accept').disabled = true;
                                    //     document.getElementById('reject').disabled = true;
                                    // }
                                    if (returnedData == 'Own timesheet') {
                                    }

                                });

                        }

                    }
                });

                // on initalize set signature and ckeditor.
                bootboxModal.init(function(){
                    setTimeout(function(){
                        CKEDITOR.replace( 'editorfull', {
                            height: '400px',
                            extraPlugins: 'forms',
                            removeButtons: 'Subscript,Superscript'
                        });

                        var email_sig = '<br>{!!$emailSign!!}'; // adding br purposefully for some space.
                        CKEDITOR.instances.editorfull.setData(email_sig, function(){
                                this.checkDirty();  // true
                        });
                    }, 200);
                });

                // add id for ckeditor.
                $(".bootbox-input-textarea").attr('id', 'editorfull');
    };

    $(document).on('click', '.share_link', function(){
        var data_url = $(this).attr('data-url');
        var type = $(this).attr('data-type');
        var share_link = '';

        switch (type) {
            case 'facebook':
                share_link = '//web.facebook.com/sharer/sharer.php?u='+data_url
                break;
            case 'twitter':
                share_link = '//twitter.com/share?url='+data_url
                break;
            case 'linkedin':
                share_link = '//www.linkedin.com/shareArticle?mini=true&url='+data_url
                break;
            case 'pinterest':
                share_link = '//www.pinterest.com/pin/create/button/?url='+data_url
                break;
            default:
                break;
        }

        window.open(share_link,'TMSocialWindow',width=600,height=100);
        return false;
    });

</script>
@include('frontend.partials.footer')
<style>
    ul#admin_social_list {
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        padding: 0;
        m,
        : ;
    }

    ul#admin_social_list li {
        width: 50%;
        display: inline-block;
        text-align: center;
        padding: 0;
        padding: 6px;
    }

    ul#admin_social_list li.share-icon-facebook {
        background: #46629e;
    }

    ul#admin_social_list li a {
        color: #fff;
        font-size: 22px !important;
        display: block;
    }

    ul#admin_social_list li.share-icon-twitter {
        background: #5fa9ce;
    }

    ul#admin_social_list li.share-icon-linkedin {
        background: #1a84bc;
    }

    ul#admin_social_list li.share-icon-pintrest {
        background: #c8232c;
    }

    .modal-header button.close {
        color: red;
        position: absolute;
        top: 22px;
    }

    #modal_form_vertical .modal-title {
        padding-bottom: 15px;
    }
</style>

</html>
