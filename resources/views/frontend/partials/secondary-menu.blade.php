<!-- Sub navigation -->
<div class="sidebar-category">

    @php
    $id = collect(request()->segments())->last();
    @endphp
    <div class="category-content no-padding">
        <ul class="navigation navigation-alt navigation-accordion">
            <li class="navigation-header">Property Info</li>
            @if(Auth::user()->user_role !=1)
            <li class="{{ request()->is('property/*') ? "active" : '' }}"><a href="/property/{{$id}}"><i
                        class="icon-googleplus5"></i> Overview</a></li>
            @endif
            <li class="{{ request()->is('property_details/*') ? "active" : '' }}"><a href="/property_details/{{$id}}"><i
                        class="icon-googleplus5"></i> Details</a></li>
            <li class="{{ request()->is('voh/*') ? "active" : '' }}"><a href="/voh/{{$id}}"><i
                        class="icon-googleplus5"></i> Open Virtual House</a></li>
            <li class="{{ request()->is('photos/*') ? "active" : '' }}"><a href="/photos/{{$id}}"><i
                        class="icon-googleplus5"></i> Photo Gallery</a></li>
            <li class="{{ request()->is('virtual/*') ? "active" : '' }}"><a href="/virtual/{{$id}}"><i
                        class="icon-googleplus5"></i> Virtual Tours</a></li>
            <li class="{{ request()->is('video/*') ? "active" : '' }}"><a href="/video/{{$id}}"><i
                        class="icon-googleplus5"></i> Videos</a></li>
            <li class="{{ request()->is('floor/*') ? "active" : '' }}"><a href="/floor/{{$id}}"><i
                        class="icon-googleplus5"></i> Docs & Floorplan</a></li>
            <li class="{{ request()->is('address/*') ? "active" : '' }}"><a href="/address/{{$id}}"><i
                        class="icon-googleplus5"></i> Address & Map</a></li>
            <li class="navigation-header">Settings</li>
            <li class="{{ request()->is('theme/*') ? "active" : '' }}"><a href="/theme/{{$id}}"><i
                        class="icon-googleplus5"></i> Themes & Contacts</a></li>
            <li class="{{ request()->is('lead/*') ? "active" : '' }}"><a href="/lead/{{$id}}"><i
                        class="icon-googleplus5"></i> Lead Colletion</a></li>
            <li class="{{ request()->is('domains/*') ? "active" : '' }}"><a href="/domains/{{$id}}"><i
                        class="icon-googleplus5"></i> Domains</a></li>
            <li class="{{ request()->is('advance/*') ? "active" : '' }}"><a href="/advance/{{$id}}"><i
                        class="icon-googleplus5"></i> Advanced</a></li>
            {{-- <li><a href="/seo/{{$id}}"><i class="icon-googleplus5"></i> Seo & Social</a></li>
            <li class="navigation-header">Marketig</li>
            <li><a href="/marketing/{{$id}}"><i class="icon-googleplus5"></i>Brochures</a></li> --}}
        </ul>
    </div>
</div>
<!-- /sub navigation -->
