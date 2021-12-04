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
                        <div class="col-md-12">
                            <div class="tour-gallery-tab">
                                <a class="active" href="#basic-tab1" id="tab1" data-id="1" data-toggle="tab"> Docs</a>
                                <a class="" href="#basic-tab2" id="tab2" data-id="2" data-toggle="tab"> Floor Plans</a>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="form-group">

                            <div class="col-lg-12">
                                <input type="file" class="file-floor-ajax" multiple="multiple">
                                <span class="help-block">This scenario uses asynchronous/parallel uploads. Uploading
                                    itself is turned off in live preview.</span>
                            </div>

                            <div class="right" style="float: right">
                                <div class="btns-wrap">
                                    {{-- <input type="submit" value="Save" class="btn secondary-btn"> --}}
                                    <input type="hidden" value="{{collect(request()->segments())->last()}}"
                                        id="property_id">
                                    <input type="hidden" name="type" value="1" id="type">

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <!-- Media library -->
                        <div class="panel panel-white">


                            <table class="table table-striped media-library table-lg floor_table">

                                <tbody>
                                    @foreach ($floors as $file)
                                    @php
                                    $names = explode('.',$file->file);
                                    $name = $names[0];
                                    $extension = $names[1];
                                    @endphp
                                    <tr class="{{($file->type == 1) ? 'doc_file' : 'floor_file'}}">
                                        <td><a href="#">{{$name}}</a></td>
                                        <td><a href="#">{{($file->type == 1) ? 'Docs' : 'Floor Plans'}}</a></td>
                                        <td>
                                            <ul class="list-condensed list-unstyled no-margin">
                                                <li><span class="text-semibold">Format:</span> {{$extension}}</li>
                                            </ul>
                                        </td>
                                        <td class="text-center">
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>

                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a class="edit-file" data-id={{$file->id}} href="#"
                                                                data-toggle="modal" data-target="#modal-right"><i
                                                                    class="icon-pencil7"></i>
                                                                Edit file</a></li>
                                                        <li><a href="#" class="delete-image" data-value={{$file->id}}><i
                                                                    class="icon-bin"></i> Move to trash</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /media library -->
                    </div>
                </div>
                <!-- /main content -->
            </div>
            <!-- /page content -->
        </div>
        <!-- /page container -->


        <!-- Modal -->
        <div class="modal right fade" id="modal-right" tabindex="-1" role="dialog" aria-labelledby="">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel2">Edit Document</h4>
                    </div>
                    <div class="form-type-textfield form-item-title form-item form-group">
                        <div class="modal-body">
                            <div class="overlay-inner">
                                <div id="rela-property-doc-form-wrapper"
                                    class="rela-form-wrapper rela_property_doc_form">
                                    <form class="form-group" action="" method="post" id="rela-property-doc-form"
                                        accept-charset="UTF-8">
                                        <div>
                                            <div class="form-type-textfield form-item-title form-item form-group">
                                                <label for="edit-title">Document Title <span class="form-required"
                                                        title="This field is required.">*</span></label>
                                                <input class="form-control form-text required" type="text" id="name"
                                                    name="title" size="60" maxlength="255">
                                            </div>
                                            <div
                                                class="form-type-checkbox form-item-status form-item checkbox doc-visible">
                                                <input type="checkbox" id="visible" name="status" value="1"
                                                    class="form-checkbox"> <label>Visible (visitors will see this
                                                    document on
                                                    your property site) </label>
                                                <input type="hidden" name="fileid" id="fileid">
                                            </div>
                                            <div class="form-actions form-wrapper form-group" id="edit-actions--3">
                                                <button class="btn btn-primary form-submit ajax-processed" id="save"
                                                    name="op" value="Save" type="submit">Save</button>


                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- modal-content -->
                </div><!-- modal-dialog -->
            </div><!-- modal -->



</body>
<script>
    function openform() {
      document.getElementById("sidebar-form").style.width = "500px";
    }

    function closeform() {
      document.getElementById("sidebar-form").style.width = "0";
    }
</script>

<script>
    $(".delete-image").click(function(){
        event.preventDefault();
        var photo_id = $(this).attr('data-value')
        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
        $.ajax({
               type:'POST',
               url:'/deleteDocsAjax',
               data: {
                   photo_id,
                  },
               success:function(data) {
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

    $("#edit-delete").click(function(){
        event.preventDefault();
        var photo_id = $(this).attr('data-value')
        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
        $.ajax({
               type:'POST',
               url:'/deleteImageAjax',
               data: {
                   photo_id,
                  },
               success:function(data) {
                  location.reload()
               }
            });
    })


    $(".edit-file").click(function(){

        event.preventDefault();
        var id = $(this).attr('data-id')
        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
        $.ajax({
               type:'GET',
               url:'/editFloor/'+id+'',
               success:function(data) {
                var fileid = data[0].id
                var visible = data[0].visible
                var filename = data[0].file
                $('#fileid').val(fileid)
                $('#name').val(filename)
                if(visible == 1){
                    $("#visible").prop("checked", true);
                }else{
                    $("#visible").prop("checked", false);
                }
               }

            });
    })

    $("#save").click(function(){
        event.preventDefault();
        var id = $('#fileid').val()
         var file = $('#name').val()
         var visible = $('#visible').is(":checked")
        $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
        $.ajax({
            type:'POST',
            url:"/updatefloor",
            data:{
                file,
                id,
                visible
            },
            success:function(data) {
                  location.reload()
               }
        })
    })
</script>

<script>
    $("#tab1").click(function(){
        var type = $(this).attr('data-id')
        $("#tab1").addClass('active')
        $("#tab2").removeClass('active')
        $("#type").val(type)

        render_plans(type)
    })


    $("#tab2").click(function(){
        var type = $(this).attr('data-id')
        $("#tab2").addClass('active')
        $("#tab1").removeClass('active')
        $("#type").val(type)
        render_plans(type)


    })

    // show hide list based on tab selected.
    function render_plans(type = 1){
        if(type == 1){
            $('.floor_table tbody .floor_file').hide();
            $('.floor_table tbody .doc_file').show();
        }else{
            $('.floor_table tbody .doc_file').hide();
            $('.floor_table tbody .floor_file').show();
        }
    }

    render_plans();
</script>
@include('frontend.partials.footer')

</html>
