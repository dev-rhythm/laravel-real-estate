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
                        <div class="col-md-4">
                            <h3>Current Domains</h3>
                            <p>Your primary domain is the one you want customers and search engines to see.</p>
                           <div>
                            <a href="#" class="btn btn-lg btn-primary">Add Custom Domian</a>
                           </div>
                           <br>
                           <div>
                            <a href="#" class="btn btn-lg btn-success">Order Sign Rider</a>
                           </div>
                        </div>
                        <div class="col-md-8">
                            <div class="panel domian-table-panel">
                                <div class="table-responsive">
                                    <table class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th class="text-left">Domain</th>
                                                <th class="">Status</th>
                                                <th class="text-center">HTTPS</th>
                                                <th class="text-right">Options</th>
                                             </tr>
                                        </thead>
                                       <tbody>
                                        <tr>
                                            <td  class="text-left">https://adadasds2500.relahq.com</td>
                                            <td></td>
                                            <td  class="text-center"><span class="icon-lock2 text-success"></span> Enabled</td>
                                            <td  class="text-right">Change</td>
                                         </tr>
                                       </tbody>
                                       </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <h3>Available Domains</h3>
                            <p>This is a list of domains that you have purchased through us. You can assign any of these domains to this property.</p>
                        </div>
                        <div class="col-md-8">

                            <div class="panel domian-table-panel">
                                <form class="form-inline">
                                    <label for="" class="">Domain Name</label> <br>
                                    <div class="form-group mx-sm-3 mb-2">

                                      <input type="text" class="form-control" id="" placeholder="">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                  </form>

                                <div class="table-responsive no-domian-available">
                                    <center>No Domain Available</center>
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
