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
                        <div class="col-md-10 col-md-offset-1">


                            <div class="row lead-modal-preview">
                                    <div class="col-md-5 lead-modal-preview-left">
                                       <a class="btn btn-warning btn-xs" href="#" data-toggle="modal" data-target="#modal_form_vertical"><i class="icon-images2"></i> Change image</a>

                                    </div>
                                    <div class="col-md-7 lead-modal-preview-right">
                                        {{-- <a class="btn btn-warning btn-xs" href="#">Change Text and Form</a> --}}
                                        <div class="text-center">
                                            <h3>Before you go...</h3>
                                            <p class="tagline">We'd love to show you more listings in your area! Fill out the form below to see everything we have to offer.</p>
                                           <form>
                                               <div class="lead-modal-form">
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-light" placeholder=Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-light" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-light" placeholder="Phone">
                                                </div>
                                                <div class="form-group">
                                                   <button type="submit" class="btn btn-primary">Continue</button>
                                                </div>
                                               </div>
                                           </form>
                                        </div>
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

                    <div class="panel-body">
                        <div class="view view-property-images view-id-property_images view-display-id-property_image_select relaview-image-select fullmodal-select-filter-view view-dom-id-169f9e563dfc07086a94ca2efa7e1745 jquery-once-2-processed">



                            <div class="view-empty">
                            <div class="empty-text">
                      <div class="tagline"> There are no photos added to your property.<br><a href="/lead-photo/{{collect(request()->segments())->last()}}">Click here to upload photos.</a> </div>
                      <div class="icon-photos-2 icon"></div>
                      </div>
                          </div>






                      </div>  </div>
                </div>
            </div>
        </div>
        <!-- /vertical form modal -->

</body>
<script>
    $(".icon-bin").click(function(){
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
</script>
@include('frontend.partials.footer')

</html>
