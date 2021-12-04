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
                                        class="text-semibold">Agents</span></h4>
                            </div>
                        </div>
                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="/dashboard"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="/client-list">Agents</a></li>
                            </ul>
                        </div>
                    </div>

                <div class="col-md-6 col-md-offset-2">
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

                    @if (count($errors) > 0)
                                        <div class = "alert alert-danger">
                                           <ul>
                                              @foreach ($errors->all() as $error)
                                                 <li>{{ $error }}</li>
                                              @endforeach
                                           </ul>
                                        </div>
                                     @endif
                    <!-- Basic layout-->
                    <form class="center" action="/add-client" method="POST">
                        @csrf
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Send Invite to Edit</h5>

                            <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>

                            <div class="panel-body">


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <label>First Name</label>
                                            <input type="text" name="fname" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control">
                                        </div>
                                    </div>
                                </div>




                                    <button type="submit" class="btn btn-primary">Send Invite</button>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- /basic layout -->

                </div>

                    <!-- /main content -->

                <!-- /page content -->
            </div>
            <!-- /page container -->


</body>

@include('frontend.partials.footer')

</html>
