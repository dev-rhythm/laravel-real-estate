<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="/admin/assets/images/placeholder.jpg"
                            class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">Admin</span>
                        {{-- <div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
									</div> --}}
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="/admin/change-password"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        @php
        $url = Request::url();
        @endphp
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="{{ request()->is('admin/dashboard')? 'active' : '' }}"><a href="/admin/dashboard"><i
                                class="icon-home4"></i> <span>Dashboard</span></a>
                    </li>
                    <li class="{{ request()->has('user')? 'active' : '' }}">
                        <a href="#" class="has-ul"><i class="icon-user"></i> <span>User Management</span></a>
                        <ul class="hidden-ul" style="display: hidden;">
                            <li><a href="/admin/user/" id="layout3" class="active">Users</a></li>
                            <li><a href="/admin/user/add" id="layout4">Add Users</a></li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('/admin/plan/')? 'active' : '' }}">
                        <a href="#" class="has-ul"><i class="icon-cash"></i> <span>Plan Management</span></a>
                        <ul class="hidden-ul" style="display: hidden;">
                            <li><a href="/admin/plan" id="layout3">Plans</a></li>
                            <li><a href="/admin/plan/add" id="layout4">Add Plans</a></li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('/admin/subscription/')? 'active' : '' }}">
                        <a href="/admin/subscription" class="has-ul"><i class="icon-credit-card"></i>
                            <span>Subscription</span></a>
                    </li>
                    <li class="{{ request()->is('profile')? 'active' : '' }}">
                        <a href="#" class="has-ul"><i class="icon-reset"></i> <span>Change Password</span></a>
                        <ul class="hidden-ul" style="display: hidden;">
                            <li><a href="/admin/change-password" id="layout4">Change Password</a></li>
                        </ul>
                    </li>
                    <li class="{{(request()->segment(2) == 'coupons') ? 'active' : '' }}">
                        <a href="{{ route('coupons.index') }}"><i class="icon-coins"></i>
                            <span>Coupons</span></a>
                        <ul>
                            <li class="{{request()->is('admin/coupons') ? 'active' : '' }}">
                                <a href="{{ route('coupons.index') }}">All
                                    Coupons</a></li>
                            <li class="{{request()->is('admin/coupons/create') ? 'active' : '' }}">
                                <a href="{{ route('coupons.create') }}">Create
                                    Coupons</a></li>
                        </ul>
                    </li>
                    <!-- /page kits -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
