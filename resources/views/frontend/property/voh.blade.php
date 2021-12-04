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
                        <div class="form-group">


                            <div class="right" style="float: right">
                                <div class="btns-wrap">
                                    {{-- <input type="submit" value="Save" class="btn secondary-btn"> --}}


                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        @if(count($voh)<1) <div class="col-md-10 col-md-offset-1">
                            <div class="panel panel-flat text-center">
                                <div class="panel-heading">
                                    <h6 class="panel-title"><i class="icon-calendar3 font-35"></i></h6>
                                </div>

                                <div class="panel-body">
                                    <h4> You don't have any open house events assigned to this property. Click the
                                        button below to create a new event.</h4>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-deafult" data-toggle="modal"
                                            data-target="#modal-right">Add New <i
                                                class="icon-plus3 position-right"></i></button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @else
                    <div class="section-actions full-width">
                        <span class="pull-right m-b-2">
                            <a href="#" class="btn btn-default btn-sm use-ajax ajax-processed" rel="nofollow"
                                data-toggle="modal" data-target="#modal-right"><i class="fa fa-plus m-r-1"></i>Add
                                New</a> </span>
                    </div>
                    @foreach($voh as $v)

                    <div class="col-md-10 col-md-offset-1">
                        <div class="panel panel-flat text-center">
                            <div class="panel-body">
                                <div class="well-shadow m-b-3 pos-r p-a-2">
                                    <div class="delete-wrapper">
                                        <a href="#" data-toggle="modal" data-target="#modal-right"
                                            data-value="{{$v->id}}" class="btn btn-default edit-voh">Edit</a><a href=""
                                            class="btn btn-danger delete-voh" rel="nofollow" data-value="{{$v->id}}"><i
                                                class="icon-trash"></i></a> </div>


                                    <h4>{{$v->title}}</h4>

                                    <div class="full-width m-b-1"><i>{{$v->date}}</i></div>
                                    <div class="full-width m-b-1"><b>Link: </b><i class="text-muted">{{$v->link}}</i>
                                    </div>


                                    <div class="leads-wrapper pull-left full-width">
                                        <button class="btn well text-left well-dark m-b-0 pull-left full-width p-a-0"
                                            data-toggle="collapse" data-target="#leads-view-{{$v->id}}">
                                            <div class="p-a-1"> <b>Registrations:</b>
                                                {{$v->registration == 1 ?$v->registrations->count()  : 0}}<i
                                                    class="fa  fa-chevron-down pull-right"></i></div>
                                        </button>

                                        <div id="leads-view-{{$v->id}}" class="collapse">

                                            <div class="m-t-3">
                                                <div class="table-responsiv e">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>First Name</th>
                                                                <th>Last Name</th>
                                                                <th>Email</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @if ($v->registrations->isNotEmpty() && $v->registration ==
                                                            1 )

                                                            @foreach ($v->registrations as $item)
                                                            <tr>
                                                                <td>{{ $loop->index +1}}</td>
                                                                <td>{{$item->f_name}}</td>
                                                                <td>{{$item->l_name}}</td>
                                                                <td><a
                                                                        href="mailto:{{$item->email}}">{{$item->email}}</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @else
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="alert alert-info no-border">
                                                                        No Registrations found!
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                    @endforeach
                    @endif
                </div>

            </div>


        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
    </div>
    <!-- /page container -->

    <!-- Modal -->
    <div class="modal right fade voh_form_modal" id="modal-right" tabindex="-1" role="dialog" aria-labelledby="">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel2">Add Event</h4>
                </div>

                <div class="modal-body">
                    <form class="node-form node-open_house-form" action="/voh" method="post"
                        id="property-openhouse-form" accept-charset="UTF-8">

                        <div>
                            <div class="form-type-textfield form-item-title form-item form-group">
                                <label for="edit-title">Title <span class="form-required red"
                                        title="This field is required.">*</span></label>
                                <input class="form-control form-text required" type="text" id="edit-title" name="title"
                                    value="" size="60" maxlength="255">
                                <input type="hidden" value="{{collect(request()->segments())->last()}}"
                                    name="property_id">

                                @csrf
                            </div>



                            <div class="field-type-list-text field-name-field-open-house-type field-widget-options-buttons form-wrapper form-group"
                                id="edit-field-open-house-type">
                                <div class="form-type-radios form-item-field-open-house-type-und form-item form-group">
                                    <label for="edit-field-open-house-type-und">Type <span class="form-required red"
                                            title="This field is required.">*</span></label>
                                    <div id="edit-field-open-house-type-und" class="form-radios">
                                        <div
                                            class="form-type-radio form-item-field-open-house-type-und form-item radio radio-active">
                                            <input type="radio" id="livestream" name="type" value="livestream"
                                                checked="checked" class="form-radio voh_type_radio">
                                            <label for="livestream">Live Stream </label>

                                        </div>
                                        <div
                                            class="form-type-radio form-item-field-open-house-type-und form-item radio">
                                            <input type="radio" id="video" name="type" value="video"
                                                class="form-radio voh_type_radio">
                                            <label for="video">Pre-recorded Video
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-type-list-boolean field-name-field-open-house-reg field-widget-options-onoff form-wrapper form-group registration_field"
                                id="edit-field-open-house-reg">
                                <div class="form-type-checkbox form-item-field-open-house-reg-und form-item checkbox">
                                    <input type="checkbox" id="edit-field-open-house-reg-und" name="register" value="1"
                                        class="form-checkbox"> <label for="edit-field-open-house-reg-und">Require
                                        Registration </label>

                                    <p class="help-block">Choose this option to require prospects to register for
                                        this event in order to get the event details. </p>
                                </div>
                            </div>
                            <div class="nonrecorded">
                                <div class="field-type-datetime field-name-field-open-house-date field-widget-date-popup form-wrapper form-group"
                                    id="edit-field-open-house-date">
                                    <div
                                        class="form-type-date-combo form-item-field-open-house-date-und-0 form-item form-group">
                                        <label for="edit-field-open-house-date-und-0">Open House Date <span
                                                class="form-required red">*</span></label>
                                        <div class="date-form-element-content">
                                            <div class="date-no-float start-date-wrapper container-inline-date">
                                                <div
                                                    class="form-type-date-popup form-item-field-open-house-date-und-0-value form-item form-group">
                                                    <div id="edit-field-open-house-date-und-0-value "
                                                        class="date-padding flx-col">
                                                        <div class="field-type-list-boolean field-name-field-open-house-timezone field-widget-options-onoff form-wrapper form-g roup w33"
                                                            id="edit-field-open-house-timezone">
                                                            <label for="timezone">Timezone <span
                                                                    class="form-required red">*</span></label>

                                                            {!!Timezonelist::create('timezone', null,'id="tmzone"
                                                            class="form-control"')!!}

                                                        </div>
                                                        <div
                                                            class="form-type-textfield form-item-field-open-house-date-und-0-value-date form-item form-g roup w33">
                                                            <label
                                                                for="edit-field-open-house-date-und-0-value-datepicker-popup-0">Date
                                                                <span class="form-required red">*</span></label>
                                                            <input class="date-clear form-control form-text" type="date"
                                                                id="date" name="date" value="" size="20" maxlength="30">
                                                            <p class="help-block"> E.g., Jul 27 2020</p>
                                                        </div>
                                                        <div
                                                            class="form-type-textfield form-item-field-open-house-date-und-0-value-time form-item form-group w33">
                                                            <label
                                                                for="edit-field-open-house-date-und-0-value-timeEntry-popup-1">Start
                                                                Time <span class="form-required red">*</span></label>
                                                            <input
                                                                class="date-clear timepicker form-control form-text ui-timepicker-input"
                                                                type="time" id="start_time" name="start_time" value=""
                                                                autocomplete="off">
                                                            <p class="help-block">E.g., 11:30pm</p>
                                                        </div>
                                                        <div
                                                            class="form-type-textfield form-item-field-open-house-date-und-0-value2-time form-item form-group w33">
                                                            <label
                                                                for="edit-field-open-house-date-und-0-value2-timeEntry-popup-1">End
                                                                Time <span class="form-required red">*</span></label>
                                                            <input
                                                                class="date-clear timepicker form-control form-text ui-timepicker-input"
                                                                type="time" id="end_time" name="end_time" value=""
                                                                size="15" maxlength="10" autocomplete="off">
                                                            <p class="help-block">E.g., 11:30pm</p>
                                                            {{-- <p class="help-block">
                                                            <span class="js-hide"> Empty 'End date'
                                                                values will use
                                                                the 'Start date' values.</span>
                                                        </p> --}}
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="field-type-link-field field-name-field-open-house-link field-widget-link-field form-wrapper form-group"
                                    id="edit-field-open-house-link">
                                    <div
                                        class="form-type-link-field form-item-field-open-house-link-und-0 form-item form-group">
                                        <label for="edit-field-open-house-link-und-0">Link </label>
                                        <div class="link-field-subrow clearfix">
                                            <div class="link-field-title link-field-column col-md-6">
                                                <div
                                                    class="form-type-textfield form-item-field-open-house-link-und-0-title form-item form-group">
                                                    <label for="edit-field-open-house-link-und-0-title">Title </label>
                                                    <input class="form-control form-text" type="text" id="link_title"
                                                        name="link_title" value="" size="60" maxlength="128">
                                                    <p class="help-block">The link title is limited to 128 characters
                                                        maximum.</p>
                                                </div>
                                            </div>
                                            <div class="link-field-url link-field-column col-md-6">
                                                <div
                                                    class="form-type-textfield form-item-field-open-house-link-und-0-url form-item form-group">
                                                    <label for="edit-field-open-house-link-und-0-url">URL </label>
                                                    <input class="form-control form-text" type="text" id="link"
                                                        name="link" value="" size="60" maxlength="2048">
                                                </div>
                                            </div>
                                        </div>
                                        <p class="help-block">Add the link to your Zoom, FB Live, Google Hangout, or
                                            other live stream.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-type-textfield form-item-video-url form-item form-group recorded">
                                <label for="edit-video-url">Youtube or Vimeo URL </label>
                                <input class="form-control form-text" type="text" id="video_url" name="video_url"
                                    value="" size="60" maxlength="128">
                                <p class="help-block">Your Youtube or Vimeo videos should be EMBED videos links, like
                                    shown on
                                    example links below:</p>
                                <p class="help-block">Example Youtube video Link:
                                    https://www.youtube.com/embed/uso7W3savww</p>
                                <p class="help-block">Example Vimeo video Link:
                                    https://player.vimeo.com/video/519796196</p>
                                <input type="hidden" name="voh_id" id="voh_id">
                            </div>
                            <div class="form-actions form-wrapper form-group" id="edit-actions"><button
                                    class="btn btn-primary form-submit ajax-processed" id="edit-submit" name="op"
                                    value="Save" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->




</body>

@include('frontend.partials.footer');
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function openform() {
      document.getElementById("sidebar-form").style.width = "500px";
    }

    function closeform() {
      document.getElementById("sidebar-form").style.width = "0";
    }


    $(".delete-voh").click(function(){
        event.preventDefault()

       var virtual_id = $(this).attr("data-value")


       $.ajax({
                headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                    url: '/deleteVoh/'+virtual_id,
                    type: 'GET',
                    success: function ( data ) {
                       location.reload()
                    }
            });
    })


    $(".edit-voh").click(function(){
        event.preventDefault()

       var virtual_id = $(this).attr("data-value")


       $.ajax({
            headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: '/editVoh/'+virtual_id,
            type: 'GET',
            success: function ( data ) {
                $("#date").val(data.date);
                $("#end_time").val(data.end_time);
                $("#link").val(data.link);
                $("#link_title").val(data.link_title);
                $("#start_time").val(data.start_time);
                $("#edit-title").val(data.title);
                $("#video_url").val(data.video_url);
                $("#voh_id").val(data.id)
                $("#tmzone").val(data.timezone)
                $("input[name=type][value='"+data.type+"']").prop("checked",true).trigger('change');
                (data.registration == 1) ? $('#edit-field-open-house-reg-und').prop('checked', true) :
                    $('#edit-field-open-house-reg-und').prop('checked', false);

            }
        });
    })

    // reset form on add new button click
    $(document).on('click', '.ajax-processed', function(){
        $('.recorded').hide()
        $("input[name=type][value='livestream']").prop("checked",true).trigger('change');
        $('#edit-field-open-house-reg-und').prop('checked', false);

    })

    jQuery(document).ready(function(){
        $(document).on('change', 'input[name=type]', function(){
            var cur_val = $(this).val();

            if(cur_val == 'video'){
                $('.recorded').show()
                $('.nonrecorded').hide()
                $('.registration_field').hide();
                $('#edit-field-open-house-reg-und').prop('checked', false);
            }else{
                $('.recorded').hide()
                $('.nonrecorded').show()
                $('.registration_field').show();
            }
        })

    })

</script>
<style>
    .flx-col {
        display: flex;
        flex-wrap: wrap;
        margin-left: -15px;
        margin-right: -15px;
    }

    .w33 {
        flex: 50%;
        padding: 0 15px;
    }


    .voh_form_modal .modal-content {
        max-width: 700px;
        width: 700px;
    }

    .date-clear {
        cursor: pointer;
    }

    input::-webkit-calendar-picker-indicator {
        cursor: pointer;
    }
</style>

</html>
