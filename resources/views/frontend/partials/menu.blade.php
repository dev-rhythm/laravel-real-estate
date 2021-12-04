<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    @if(Auth::user()->photo != null)
                    <a href="#" class="media-left"><img
                            src="/uploads/profile/{{Auth::user()->id}}/{{Auth::user()->photo}}"
                            class="img-circle img-sm" alt=""></a>
                    @else
                    <a href="#" class="media-left"><img src="/admin/assets/images/placeholder.jpg"
                            class="img-circle img-sm" alt=""></a>
                    @endif
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{Auth::user()->fname}}</span>
                        {{-- <div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
									</div> --}}
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="/profile"><i class="icon-cog3"></i></a>
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
                    <li class="{{ request()->is('dashboard')? 'active' : '' }}"><a href="/dashboard"><i
                                class="icon-home4"></i> <span>Dashboard</span></a>
                    </li>
                    <li class="">
                        <a href="/property" class="has-ul"><i class="icon-office"></i> <span>Manage
                                Properties</span></a>
                    </li>
                    @if(Auth::user()->invited_by == 0)
                    <li class="{{ request()->is('billing')? 'active' : '' }}"><a href="/billing"><i
                                class="icon-cash"></i> <span>Billing</span></a></li>
                    @endif

                    {{-- <li class="{{ request()->is('profile')? 'active' : '' }}"><a href="/profile"><i
                            class="icon-home4"></i> <span>Profile</span></a>
                    </li> --}}

                    <li class="{{ request()->is('profile')? 'active' : '' }}">

                        @php
                        $role_name = (Auth::user()->user_role == 2) ? 'Broker' : 'Agent';
                        @endphp
                        <a href="#" class="has-ul"><i class="icon-user"></i> <span>{{$role_name}} Profile</span></a>
                        <ul class="hidden-ul"
                            style="{{ request()->is('profile') ? "display: block;" : 'display: hidden;' }} ">
                            <li><a href="/profile/" id="layout3" class="active">Edit {{$role_name}} Profile</a></li>
                            <li><a href="/profile/change-password" id="layout4">Change Password</a></li>
                        </ul>
                    </li>

                    @php
                        $invoice = \App\Invoice::where('user_id',Auth::user()->id)->first();

                        if($invoice){

                            if(isset($invoice->expire_date) && $invoice->expire_date != ''){

                                $date = \Carbon\Carbon::parse($invoice->expire_date);
                                $now = \Carbon\Carbon::now();
                                $diff = $now->diffInDays($date);


                                $exp_date = \Carbon\Carbon::createFromFormat('Y-m-d h:m:s', $invoice->expire_date)->isPast();

                            }else{
                                $exp_date = true;
                            }

                        }else{
                            $exp_date = true;
                        }

                    @endphp

                    @if(Auth::user()->invited_by == 0 && $exp_date == false) <li
                        class="{{ request()->is('client') ? "active" : '' }}">
                        <a href="#" class="has-ul"><i class="icon-user-check"></i> <span>Agents</span></a>
                        <ul class="hidden-ul"
                            style="{{ request()->is('client') ? "display: block;" : 'display: hidden;' }} ">
                            <li><a href="/client/" id="layout3" class="active">Add Agents</a></li>
                            <li><a href="/list-client" id="layout4">Agents</a></li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->user_role == 2)
                    <li>
                        <a href="#" class="has-ul"><i class="icon-key"></i> <span>Manage API</span></a>
                        <ul class="hidden-ul">
                            <li><a href="{{route('manage-api.add')}}" id="layout3" class="active">Add API</a></li>
                        </ul>
                    </li>
                    @endif
                    <!-- /page kits -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
