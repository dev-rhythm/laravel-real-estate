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
                        <h2 class="content-group text-semibold">
                            Webpage Settings
                            <small class="display-block">Select a theme, upload your logo, and add your contact
                                information.</small>
                        </h2>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="theme-settting-left">
                                <input type="hidden" value="{{collect(request()->segments())->last()}}"
                                    id="property_id">
                                <div class="panel panel-white panel-theme-settting">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">CURRENT THEME</h6>
                                        <h4 class="panel-title"><b id="theme-name" style="text-transform: capitalize;">
                                                {{isset($theme->template->name) ? $theme->template->name : $theme->name }}</b>
                                        </h4>
                                    </div>

                                    {{-- <div class="panel-body">

                                    </div> --}}
                                    <div class="panel-footer">
                                        <button type="button" class="btn btn-sm btn-default" data-toggle="modal"
                                            data-target="#modal-right">Change Theme</button>
                                    </div>
                                </div>

                                <div class="panel panel-white panel-theme-settting">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">Preview</h6>

                                    </div>

                                    {{-- <div class="panel-body">

                                    </div> --}}
                                    <div class="panel-footer">
                                       <a href="{{route('property_details', collect(request()->segments())->last())}}" target="_blank" class="btn btn-success">Preview Selected Theme</a>
                                    </div>
                                </div>

                                <div class="panel panel-white panel-theme-settting">
                                    {{-- <div class="panel-heading">
                                        <h6 class="panel-title">CURRENT THEME</h6>
                                        <h4 class="panel-title"><b> RUBIK_V2</b></h4>
                                    </div> --}}

                                    <div class="panel-body">
                                        <h5 class="mt-0">Logo</h5>
                                        @if($theme->logo != null)
                                        @php
                                        $image = 'uploads/logo/'.$theme->property_id.'/'.$theme->logo;
                                        @endphp
                                        <img src="{{asset($image)}}" width="100" height="100" alt="">
                                        <div class="panel-footer">
                                            <div class="dropdown">
                                                <button class="btn btn-default btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenu-logo" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="true">
                                                    Options
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu options-menu p-t-1 p-b-0"
                                                    aria-labelledby="dropdownMenu-logo">
                                                    <li>

                                                    <li> <a href="/deletelogo" class="m-t-1 p-y-1" id="delete-logo">
                                                            Delete Logo</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        @else
                                        <div class="add-logo-box">
                                            <button type="button" class="btn btn-sm btn-default" data-toggle="modal"
                                                data-target="#modal-right-image">+ Click here to add custom
                                                logo</button>
                                            {{-- <a href="#" data-toggle="modal" data-target="modal-right-image"> + Click here to add custom logo</a> --}}
                                        </div>
                                        <div class="panel-footer">
                                        </div>

                                        @endif
                                    </div>

                                </div>

                                {{-- <div class="panel panel-white panel-theme-settting">

                                    <div class="panel-body">
                                            <h5 class="mt-0">Contacts</h5>
                                           <p>These contacts will show in the Contact section of your webpage. Drag and Drop to sort the order.</p>
                                           <div class="c-card">
                                               <div class="c-card-left">
                                                    <a class="c-card-thumb" href="">Edit to Add Photo</a>
                                               </div>
                                               <div class="c-card-right">
                                                    <div class="c-card-text">
                                                        <p>Text</p>
                                                        <div class="c-card-link"><a href="">Edit</a> <a href="">Hide</a></div>
                                                    </div>
                                               </div>
                                           </div>
                                    </div>
                                    <div class="panel-footer">
                                        <button type="button" class="btn btn-sm btn-default">Add Contact</button>
                                    </div>
                                </div> --}}

                                {{-- <div class="panel panel-white panel-theme-settting"> --}}
                                {{-- <div class="panel-heading">
                                        <h6 class="panel-title">CURRENT THEME</h6>
                                        <h4 class="panel-title"><b> RUBIK_V2</b></h4>
                                    </div> --}}

                                {{-- <div class="panel-body">
                                            <h5 class="mt-0">Additional Menu Links</h5>
                                           <p>Add custom menu links to the main menu of the property website.</p>
                                            <a href="">Use Property Specific Menu</a>
                                            <hr>
                                            <a href="">Use Global Menu</a>
                                    </div> --}}
                                {{-- <div class="panel-footer">
                                        <button type="button" class="btn btn-sm btn-default">Add Contact</button>
                                    </div> --}}
                                {{-- </div> --}}

                                {{-- Main Image  --}}
                                <div class="panel panel-white panel-theme-settting">
                                    {{-- <div class="panel-heading">
                                        <h6 class="panel-title">CURRENT THEME</h6>
                                        <h4 class="panel-title"><b> RUBIK_V2</b></h4>
                                    </div> --}}

                                    <div class="panel-body">
                                        <h5 class="mt-0">Background Image</h5>
                                        @if($theme->main_image != null)
                                        @php
                                        $image = 'uploads/back_image/'.$theme->property_id.'/'.$theme->main_image;
                                        @endphp
                                        <img src="{{asset($image)}}" width="100" height="100" alt="">
                                        <div class="panel-footer">
                                            <div class="dropdown">
                                                <button class="btn btn-default btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenu-logo" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="true">
                                                    Options
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu options-menu p-t-1 p-b-0"
                                                    aria-labelledby="dropdownMenu-logo">
                                                    <li>

                                                    <li> <a href="/deletebackground" class="m-t-1 p-y-1"
                                                            id="delete-background"> Delete Background Image</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        @else
                                        <div class="add-logo-box">
                                            <button type="button" class="btn btn-sm btn-default" data-toggle="modal"
                                                data-target="#modal-backgroun-image">+ Click here to add Background
                                                Image</button>
                                            {{-- <a href="#" data-toggle="modal" data-target="modal-right-image"> + Click here to add custom logo</a> --}}
                                        </div>
                                        <div class="panel-footer">
                                        </div>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="theme-settting-right">
                                @if($theme->property_id)
                                <iframe id="frame" src="{{route('property_details', $theme->property_id)}}"
                                    name="myFrame" style="width: 100%;height: 550px;"></iframe>
                                @else
                                <iframe id="frame" src="/template1" name="myFrame"
                                    style="width: 100%;height: 100%;"></iframe>
                                @endif
                            </div>
                        </div>
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
                <div class="modal-content" style="
                width: 800px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel2">Select Theme</h4>
                    </div>


                    <div class="modal-body">
                        @foreach($templates as $template)
                        <div class="col-sm-5">
                            <div class="thumbnail">
                                <h5>{{ucfirst($template->name)}}</h5>
                                <div class="thumb" data-id="{{$template->id}}" data-name="{{$template->name}}">
                                    <img src="{{asset('images/'.$template->image)}}" alt="">
                                    <div class="caption-overflow">
                                        <span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
        <div class="modal right fade" id="modal-right-image" tabindex="-1" role="dialog" aria-labelledby="">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 800px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel2">Upload Logo</h4>
                    </div>

                    <div class="modal-body">
                        <input type="file" class="logo-input-ajax">

                    </div>


                </div>

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->

        {{-- Backgroun Image --}}
        <div class="modal right fade" id="modal-backgroun-image" tabindex="-1" role="dialog" aria-labelledby="">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 800px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel2">Upload Image</h4>
                    </div>

                    <div class="modal-body">
                        <input type="file" class="logo-background-ajax">

                    </div>


                </div>

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->



</body>
<script>
    $(".thumb").click(function(){
    event.preventDefault();
    var theme_id = $(this).attr('data-id')
    var theme_name = $(this).attr('data-name')
    var property_id = $("#property_id").val()
    var template = 'template'+theme_id
    var url = window.location.origin+"/view/property/{{collect(request()->segments())->last()}}";

    $.ajax({
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
            url: '/theme',
            data: {
                theme_id,
                property_id
            },
            type: 'POST',
            success: function ( data ) {
                $("#theme-name").html(theme_name)
                $('#frame').attr('src', url);
                $("#modal-right").hide()
                $('.modal-backdrop').remove();
            }
    });


});
</script>
<script>
    $("#delete-logo").click(function(){
        event.preventDefault()
     var property_id = $("#property_id").val()

     $.ajax({
         headers: {
         'X-CSRF-TOKEN': "{{ csrf_token() }}"
         },
             url: '/deletelogo',
             data: {
                 property_id
             },
             type: 'POST',
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


 });
</script>
<script>
    $("#delete-background").click(function(){
        event.preventDefault()
     var property_id = $("#property_id").val()

     $.ajax({
         headers: {
         'X-CSRF-TOKEN': "{{ csrf_token() }}"
         },
             url: '/deletebackground',
             data: {
                 property_id
             },
             type: 'POST',
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


 });
</script>
@include('frontend.partials.footer')

</html>
