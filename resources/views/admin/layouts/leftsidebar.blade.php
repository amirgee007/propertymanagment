<aside id="sidebar-left" class="sidebar-circle">

    <!-- Start left navigation - profile shortcut -->
    <div class="sidebar-content">
        <div class="media">
            <a class="pull-left has-notif avatar" href="#">
                <img src="{{ url('/admin/images/user.png') }}" alt="admin">
                <i class="online"></i>
            </a>
            <div class="media-body">
                <h4 class="media-heading">Hello,</h4>
                <small>{{ \Auth::user()->name }}</small>
            </div>
        </div>
    </div><!-- /.sidebar-content -->
    <!--/ End left navigation -  profile shortcut -->

    <!-- Start left navigation - menu -->
    <ul class="sidebar-menu niceScroll">

        <!-- Start navigation - dashboard -->
        <li class="active">
            <a href="{{route('get.dashboard')}}">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="text">Dashboard</span>
                <span class="selected"></span>
            </a>
        </li>
        <!--/ End navigation - dashboard -->

        <!-- Start navigation - my projects -->
        {{--<li>--}}
        {{--<a href="#">--}}
        {{--<span class="icon"><i class="fa fa-black-tie"></i></span>--}}
        {{--<span class="text">All E-Condo Features</span>--}}
        {{--</a>--}}
        {{--</li>--}}
        <!--/ End navigation - my projects -->

        @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin'))
            <li class="submenu @if(request()->is('users/*', 'users')) active @endif">
                <a href="javascript:void(0);">
                    <span class="icon"><i class="fa fa-suitcase"></i></span>
                    <span class="text">User Management</span>
                    <span class="arrow"></span>
                </a>
                <ul>
                    <li class="@if(request()->is('users/*', 'users')) active @endif"><a
                                href="{{route('users.index')}}">Manage Users
                            <span class="label label-success pull-right"></span></a>
                    </li>
                </ul>
            </li>
        @endif
        
        @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin') ||auth()->user()->hasRole('Manager')||auth()->user()->hasRole('Owner'))
            <li class="submenu @if(request()->is('dashboard/owner/*', 'dashboard/owner')) active @endif">
                <a href="javascript:void(0);">
                    <span class="icon"><i class="fa fa-suitcase"></i></span>
                    <span class="text">Owner Management</span>
                    <span class="arrow"></span>
                </a>
                <ul>
                    <li class="@if(request()->is('dashboard/owner/index', 'dashboard/owner/add', 'dashboard/owner/edit/*', 'dashboard/owner/show/*')) active @endif"><a
                                href="{{route('owner.index')}}">Manage Owners<span
                                    class="label label-success pull-right"></span></a></li>
                    <li class="@if(request()->is('dashboard/owner/assign-lot')) active @endif"><a href="{{route('owner.assign.lot')}}">Assign lot <span
                                    class="label label-danger pull-right"></span></a></li>
                    <li class="@if(request()->is('dashboard/owner/assign-lot/list')) active @endif"><a href="{{route('owner.list.assign.lot')}}">List of owned Lot No <span
                                    class="label label-danger pull-right"></span></a></li>
                    <li class="@if(request()->is('dashboard/owner/sell-to-other')) active @endif"><a href="{{route('owner.lot.sell.other')}}">Sell to Other <span
                                    class="label label-danger pull-right"></span></a></li>
                </ul>
            </li>
        @endif

        <li class="submenu @if(request()->is('sinking-funds/*', 'sinking-funds', 'dashboard/lot/*')) active @endif">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-suitcase"></i></span>
                <span class="text">Lots Management</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li class="@if(request()->is('dashboard/lot/add')) active @endif"><a href="{{route('get.lot.list')}}">Add
                        Lot Type<span class="label label-success pull-right"></span></a></li>
            </ul>

            <ul>
                <li class="@if(request()->is('dashboard/lot/manage')) active @endif"><a
                            href="{{route('get.lot.manage')}}">Manage Lots<span
                                class="label label-success pull-right"></span></a></li>
            </ul>

            @if(config('system.sinking_funds_module'))
                <ul>
                    <li class="@if(request()->is('sinking-funds/*', 'sinking-funds')) active @endif"><a
                                href="{{route('sinking-funds.index')}}">Manage Sinking Funds<span
                                    class="label label-success pull-right"></span></a></li>
                </ul>
            @endif
        </li>

        @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin') ||auth()->user()->hasRole('Manager')||auth()->user()->hasRole('Owner'))
            <li class="submenu @if(request()->is('invoices/*', 'invoices')) active @endif">
                <a href="javascript:void(0);">
                    <span class="icon"><i class="fa fa-suitcase"></i></span>
                    <span class="text">Invoice Management</span>
                    <span class="arrow"></span>
                </a>
                <ul>
                    {{--<li><a href="#">Ownership Management <span class="label label-success pull-right"></span></a></li>--}}
                    <li class="@if(request()->is('invoices/*', 'invoices')) active @endif"><a
                                href="{{ route('invoices.index') }}">Invoicing<span
                                    class="label label-warning pull-right"></span></a></li>
                    {{--<li><a href="#">Managements <span class="label label-danger pull-right"></span></a></li>--}}
                </ul>
            </li>
        @endif

        {{--Meter Mangments Utilities , only nodule for Super Admin, Admin and Super Admin can show hide this feature Access--}}
        @if((auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin')) && config('system.utility_module'))
            <li class="submenu @if(request()->is('dashboard/meter/*', 'dashboard/meter')) active @endif">
                <a href="javascript:void(0);">
                    <span class="icon"><i class="fa fa-suitcase"></i></span>
                    <span class="text">Meter Management</span>
                    <span class="arrow"></span>
                </a>
                <ul>
                    <li class="@if(request()->is('dashboard/meter')) active @endif"><a href="{{route('meter.index')}}">Meter Type<span
                                    class="label label-warning pull-right"></span></a></li>
                    <li class="@if(request()->is('dashboard/meter/assignment')) active @endif"><a href="{{route('meter.assignment.index')}}">Assign Meter<span
                                    class="label label-danger pull-right"></span></a></li>
                    <li class="@if(request()->is('dashboard/meter/reading', 'dashboard/meter/reading/create')) active @endif"><a href="{{route('meter.reading.index')}}">Manage Meter Reading<span
                                    class="label label-danger pull-right"></span></a></li>
                </ul>
            </li>
        @endif

        {{--System Setting , only nodule for Super Admin Access--}}
        @if(auth()->user()->hasRole('Super Admin'))
            <li class="submenu @if(request()->is('dashboard/invoicing-setting/*', 'dashboard/system-setting/*', 'tax-types/*', 'tax-types')) active @endif">
                <a href="javascript:void(0);">
                    <span class="icon"><i class="fa fa-suitcase"></i></span>
                    <span class="text">Settings</span>
                    <span class="arrow"></span>
                </a>
                @if(auth()->user()->hasRole('Super Admin'))
                    <ul>
                        <li class="@if(request()->is('dashboard/system-setting/create')) active @endif"><a
                                    href="{{route('system-setting.create')}}">System Setting<span
                                        class="label label-success pull-right"></span></a></li>
                    </ul>
                @endif
                <ul>
                    <li class="@if(request()->is('dashboard/invoicing-setting/add')) active @endif"><a
                                href="{{route('invoicing-setting.add')}}">Invoicing Setting<span
                                    class="label label-success pull-right"></span></a></li>
                </ul>
                <ul>
                    <li class="@if(request()->is('tax-types', 'tax-types/*')) active @endif"><a
                                href="{{route('tax-types.index')}}">Tax Types<span
                                    class="label label-success pull-right"></span></a></li>
                </ul>
            </li>
        @endif

    </ul><!-- /.sidebar-menu -->
    <!--/ End left navigation - menu -->

    <!-- Start left navigation - footer -->
    <div class="sidebar-footer hidden-xs hidden-sm hidden-md">
        <a id="setting" class="pull-left" href="#" data-toggle="tooltip" data-placement="top" data-title="Setting"><i
                    class="fa fa-cog"></i></a>
        <a id="fullscreen" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
           data-title="Fullscreen"><i class="fa fa-desktop"></i></a>
        <a id="lock-screen" data-url="#" class="pull-left" href="javascript:void(0);" data-toggle="tooltip"
           data-placement="top" data-title="Lock Screen"><i class="fa fa-lock"></i></a>
        <a id="logout" data-url="{{url('/dashboard/logout')}}" class="pull-left" href="javascript:void(0);"
           data-toggle="tooltip" data-placement="top" data-title="Logout"><i class="fa fa-power-off"></i></a>
    </div><!-- /.sidebar-footer -->
    <!--/ End left navigation - footer -->

</aside><!-- /#sidebar-left -->
<!--/ END SIDEBAR LEFT -->
