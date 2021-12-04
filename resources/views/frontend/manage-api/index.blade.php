<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.head')
    <script type="text/javascript" src="{{asset('admin/assets/js/pages/editor_ckeditor.js')}}"></script>
</head>

{{-- @php 
    use App\User;
    $user = User::where('id', Auth::user()->id)->with('active_api')->get(); 
@endphp --}}
    

{{-- @php 
    // foreach ($user as $u) {
    //     foreach ($u->active_api as $x) {
    //         $data[] = $x->toArray(); 
    //     }
    // }
@endphp --}}


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
                                        class="text-semibold">Manage Api</span></h4>
                            </div>
                        </div>
                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="form_inputs_basic.html">Manage API</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel panel-flat">
                        
                        <div class="panel-body">
                            <form class="form-horizontal" action="{{route('manage-api.save')}}" method="POST">
                                @csrf
                                <fieldset class="content-group">
                                    <legend class="text-bold">IDX Broker</legend>
                                </fieldset>
                                <!-- <div class="form-group">
                                    <label class="control-label col-lg-2">Select API <span class="red">*</span></label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="api_type">
                                            <option value="idx">IDX</option>
                                        </select>
                                    </div>
                                </div> -->
                                
                                <div id="idx_form">
                                    <input type="hidden" name="api_id" value="idx">

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">API Key<span class="red">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="api_key" placeholder="Enter IDX Broker API key" value="{{Auth::user()->active_api->api_key ?? ''}}">

                                            @if ($errors->has('api_key'))
                                                <span class="text-danger">{{ $errors->first('api_key') }}</span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- <div class="panel panel-flat">
                        <div class="panel-body">
                            <form class="form-horizontal" action="{{route('manage-api.save')}}" method="POST">
                                @csrf
                                <fieldset class="content-group">
                                    <legend class="text-bold">RETS</legend>
                                </fieldset>
                                    
                                <input type="hidden" name="api_id" value="rets">

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Username <span class="red">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="api_key" placeholder="Enter IDX Broker API key" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Password<span class="red">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="api_key" placeholder="Enter IDX Broker API key" value="">
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div> -->

                    @if(session('success'))
                    <div class="col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
                        <div class="alert alert-success text-center">
                          <strong>{{session('success')}}</strong>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- /page content -->
        </div>
        <!-- /page container -->
</body>


@include('frontend.partials.footer')
<script>

    setTimeout(function(){
        $('.alert-success').remove();
    },2000)

</script>

</html>
