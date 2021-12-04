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

                            <div class="col-lg-12">
                                <input type="file" class="file-input-ajax" accept="image/*" multiple="multiple">
                                <span class="help-block">This scenario uses asynchronous/parallel uploads. Uploading
                                    itself is turned off in live preview.</span>
                            </div>

                            <div class="right" style="float: right">
                                <div class="btns-wrap">
                                    {{-- <input type="submit" value="Save" class="btn secondary-btn"> --}}
                                    <input type="hidden" value="{{collect(request()->segments())->last()}}"
                                        id="property_id">

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        @foreach($photos as $photo)
                        @php
                        $url = 'uploads/'.$photo->property_id.'/'.$photo->images;

                        @endphp
                        <div class="col-lg-3 col-sm-6">
                            <div class="thumbnail">
                                <div class="thumb">
                                    <img src="{{asset($url)}}" alt="">
                                    <div class="caption-overflow">
                                        <span>
                                            {{-- <a href="{{asset($url)}}" data-popup="lightbox"
                                            rel="gallery"
                                            class="btn border-white text-white btn-flat btn-icon btn-rounded"><i
                                                class="icon-plus3"></i></a> --}}
                                            <a href="#"
                                                class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i
                                                    class="icon-bin" data-value="{{$photo->id}}"></i></a>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
                <!-- /main content -->
            </div>
            <!-- /page content -->
        </div>
        <!-- /page container -->



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
<style>
    .file-drop-zone {
        display: none;
    }
</style>
@include('frontend.partials.footer')

</html>
