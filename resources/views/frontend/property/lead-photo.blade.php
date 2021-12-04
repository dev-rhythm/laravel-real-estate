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
                                <input type="file" class="file-lead-ajax" multiple="multiple">
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
                  location.reload()
               }
            });
    })
</script>
@include('frontend.partials.footer')

</html>
