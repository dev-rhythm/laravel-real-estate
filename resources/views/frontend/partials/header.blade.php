<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="/">Realysta</a>
        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>
    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
            </li>
        </ul>
        @php
        $publish = \App\Property::find(collect(request()->segments())->last());
        @endphp
        <div class="header-mid">
            @if(is_numeric(collect(request()->segments())->last()))
            <div class="publish-status">
                <ul class="breadcrumb-elements text-white">
                    @if($publish->published === 0)

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="icon-info22 red"></i>
                            Not Published
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#" onclick="changeStatus('{{$publish->id}}','1')"><i
                                        class="icon-checkmark-circle green"></i> Published</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="icon-checkmark-circle green"></i>
                            Published
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#" onclick="changeStatus('{{$publish->id}}','0')"><i
                                        class="icon-info22 red"></i>Not Published</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
            @endif
            <div>
                <h4 id="pname">{{$pro->propertydetails->name or  ""}}</h4>
            </div>
            <div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown dropdown-user">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/admin/assets/images/placeholder.jpg" alt="">
                            <span>{{Auth::user()->fname}}</span>
                            <i class="caret"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{ route('frontend.logout') }}"><i class="icon-switch2"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /main navbar -->