<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js">
    </script>
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
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <!-- <div class="col-md-12">
                                <div class="tour-gallery-tab">
                                    {{-- <a class=""  href="#"> <i class="icon-film4"></i>   Video</a> --}}
                                    <a class="active" href="#"> <i class="icon-shutter"></i> Virtual</a>
                                </div>
                            </div> -->

                        </div>
                        <div class="col-md-10 col-md-offset-1">

                            <fieldset class="content-group">
                                <legend class="text-bold">
                                    <h3>Video Gallery</h3> <a href="" class="btn btn-info" data-toggle="modal"
                                        data-target="#modal_virtual_tour">+ Add Video</a>
                                </legend>
                            </fieldset>

                            <div class="virtual-tour-list">
                                @foreach($virtuals as $virtual)
                                <div class="virtual-tour-list-item">
                                    {{-- <div class="virtual-tour-img">
                                        <img src="https://my.matterport.com/api/v1/player/models/aSx1MpRRqif/thumb"
                                            class="img-fluid img-thumbnail" alt="Sheep"
                                            style="height: 123px;float: left;margin-right: 20px;" />
                                    </div> --}}
                                    <div class="virtual-tour-content" style="flex: 0 0 100%;max-width: 92%;">
                                        <h4><a class='ml-5' href="#"
                                                class="use-ajax overlay-trigger no-throbber ajax-processed">{{$virtual->virtual_title}}
                                                -
                                                {{

                                                ($virtual->video_link != '') ? '(Video)' : ($virtual->type != '' && $virtual->type == 'social_link' ? '(Social Link)' : '(Link)')}}</a>
                                        </h4>

                                        <div
                                            class="views-field views-field-rela-dropdown-content branding-both pull-left">
                                            {{-- <span class="field-content">
                                                <div class=" btn-group"><a
                                                        class="btn btn-default  btn-sm dropdown-toggle"
                                                        data-toggle="dropdown" href="#"><span
                                                            class="m-r-1 dropdown-title">Visibility: Both</span><span
                                                            class="caret"></span></a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li class="visibility" data-id="{{$virtual->id}}"
                                            data-value="Both" id="1"><a href=""
                                                class="both-link use-ajax ajax-processed">Both<span
                                                    class="icon fa fa-check"></span></a></li>
                                            <li class="visibility" data-id="{{$virtual->id}}" data-value="Branded"
                                                id="2"><a href=""
                                                    class="branded-link use-ajax ajax-processed">Branded<span
                                                        class="icon fa fa-check"></span></a></li>
                                            <li class="visibility" data-id="{{$virtual->id}}" data-value="Unbranded"
                                                id="3"><a href=""
                                                    class="unbranded-link use-ajax ajax-processed">Unbranded<span
                                                        class="icon fa fa-check"></span></a></li>
                                            </ul>
                                        </div>
                                        </span> --}}
                                    </div>


                                </div>
                                <div class="virtual-tour-action">
                                    <h4> <a href="#"> <i class="icon-trash" data-id="{{$virtual->id}}"></i> </a>
                                    </h4>
                                </div>
                            </div>
                            @endforeach
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
    <div id="modal_virtual_tour" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Video </h5>
                </div>

                <form action="{{route('save-video')}}" method="POST" id="vr_tour_form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="property_id" value="{{$property_id}}">
                    <div class="modal-body">

                        <div>
                            <div class="form-type-textfield form-item-title form-item form-group">
                                <label for="edit-title">Title <span class="form-required red"
                                        title="This field is required.">*</span></label>
                                <div class="err_display"></div>
                                <input class="form-control form-text required" type="text" id="virtual_title"
                                    name="virtual_title" value="" size="60" maxlength="255">
                            </div>
                            <div class="form-group">
                                <label class="display-block text-semibold"> Type</label>
                                <div class="err_display"></div>
                                <label class="radio-inline">
                                    <input type="radio" selected value="virtual" name="type" class="styled type">
                                    URL
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" value="upload" name="type" class="styled type">
                                    Video
                                </label>
                                {{-- <label class="radio-inline">
                                    <input type="radio" value="social_link" name="type" class="styled type">
                                    Youtube / Vimeo Link
                                </label> --}}

                            </div>
                            <div class="form-group desc virtual" style="display:none" id="edit-field-vt-link">
                                <div
                                    class="form-type-textfield form-item-field-vt-link-und-0-value form-item form-group">
                                    <label for="edit-field-vt-link-und-0-value"
                                        class="control-label text-semibold">Video
                                        URL </label>
                                    <div class="err_display"></div>
                                    <input class="text-full form-control form-text" type="text" id="virtual_link"
                                        name="virtual_link" value="" size="60" maxlength="255">
                                    <p class="help-block">Enter the url of your virtual tour. E.g.
                                        https://my.matterport.com/show/?m=aSx1MpRRqif</p>
                                    <p class="help-block">Your Youtube or Vimeo videos should be EMBED videos links,
                                        like
                                        shown on
                                        example links below:</p>
                                    <p class="help-block">Example Youtube video Link:
                                        https://www.youtube.com/embed/uso7W3savww</p>
                                    <p class="help-block">Example Vimeo video Link:
                                        https://player.vimeo.com/video/519796196</p>
                                </div>
                            </div>
                            <div class="form-group desc upload" style="display:none;">
                                <label class=" control-label text-semibold">Upload:</label>
                                <div class="err_display"></div>
                                <div class="">
                                    <input type="file" class="file-input" name='video' accept="video/*">
                                </div>
                            </div>
                            {{-- <div class="form-group desc social_link" style="display:none;">
                                <label class=" control-label text-semibold">Youtube / Vimeo Link:</label>
                                <div class="err_display"></div>
                                <div class="">
                                    <input type="text" class="text-full form-control form-text"
                                        name='youtube_vimeo_link'>
                                    <p class="help-block">Your Youtube or Vimeo videos should be EMBED videos links,
                                        like
                                        shown on
                                        example links below:</p>
                                    <p class="help-block">Example Youtube video Link:
                                        https://www.youtube.com/embed/uso7W3savww</p>
                                    <p class="help-block">Example Vimeo video Link:
                                        https://player.vimeo.com/video/519796196</p>
                                </div>
                            </div> --}}
                        </div>
                        <br><br>
                        <input type="hidden" value="{{collect(request()->segments())->last()}}" id="property_id">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                            <button type="submit" id="add-tour" class="btn btn-primary">Add </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /vertical form modal -->




</body>

@include('frontend.partials.footer');
<script>
    function openform() {
      document.getElementById("sidebar-form").style.width = "500px";
    }

    function closeform() {
      document.getElementById("sidebar-form").style.width = "0";
    }

    $(document).on('change', 'input[type=radio][name=type]', function(){
        var cur_val = this.value;
        $(".desc").hide();
        $('.desc'+'.'+cur_val).show();
    })

    $("#vr_tour_form").validate({
        onkeyup: function(element) {
            $(element).valid();
        },
        ignore: [],
        rules: {
            virtual_title: {
                required:true
            },
            type: {
                required:true
            },
        },
        errorPlacement: function (error, element) {
            $(element).closest('.form-group').find('.err_display').text(error.text()).show();
            $(element).closest('.inputBox').removeClass('focus');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).closest('.form-group').find('.err_display').html('');
        },
        messages: {
            virtual_title: {
                required: "Title is required",
            },
            type: {
                required: "Type is required",
            },
            type: {
                required: "Media type can't be empty!",
            },
            submitHandler: function(form) {
                form.submit();
            },
        },
    });

    $("#add-tour").click(function(e) {
        if($("#vr_tour_form").valid()){
            $("#vr_tour_form").submit();
        }else{

        }
    });


    $("#add-toursss").click(function(){
        event.preventDefault()
        var property_id = $("#property_id").val()
        var virtual_title = $("#virtual_title").val()
        var virtual_link = $("#virtual_link").val()

            $.ajax({
                headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                    url: '/virtual',
                    data: {
                        property_id,
                        virtual_title,
                        virtual_link
                    },
                    type: 'POST',
                    success: function ( data ) {
                    location.reload();
                    }
            });

    })
</script>
<script>
    $(".visibility").click(function(){
        event.preventDefault()
       var type = $(this).attr("id")
       var virtual_id = $(this).attr("data-id")
       var name = $(this).attr("data-value")

       $.ajax({
                headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                    url: '/updateVirutalType',
                    data: {
                        type,
                        virtual_id,
                    },
                    type: 'POST',
                    success: function ( data ) {
                        $('.dropdown-title').text("Visibility: "+name)
                    }
            });
    })


    $(".icon-trash").click(function(){
        event.preventDefault()

       var virtual_id = $(this).attr("data-id");



       $.ajax({
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
            url: '/deleteVirtual/'+virtual_id,
            type: 'GET',
            success: function ( data ) {
                noty({
                    width: 200,
                    text: "Deleted Successfully",
                    type: 'success',
                    dismissQueue: true,
                    timeout: 2000,
                    layout: "topRight",
                });
                setTimeout(() => {
                    location.reload()
                }, 2000);
            }
    });
    })
</script>

</html>
