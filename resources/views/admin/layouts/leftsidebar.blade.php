<aside id="sidebar-left" class="sidebar-circle">

    <!-- Start left navigation - profile shortcut -->
    <div class="sidebar-content">
        <div class="media">
            <a class="pull-left has-notif avatar" href="#">
                <img src="{{url('/')}}/admin/images/user.png" alt="admin">
                <i class="online"></i>
            </a>
            <div class="media-body">
                <h4 class="media-heading">Hello, <span>{{\Auth::user()->name}}</span></h4>
                <small>Laravel Developer</small>
            </div>
        </div>
    </div><!-- /.sidebar-content -->
    <!--/ End left navigation -  profile shortcut -->

    <!-- Start left navigation - menu -->
    <ul class="sidebar-menu">

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

        <li class="submenu @if(request()->is('dashboard/owner/*', 'dashboard/owner')) active @endif">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-suitcase"></i></span>
                <span class="text">Owner Management</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li class="@if(request()->is('dashboard/owner/*', 'dashboard/owner')) active @endif"><a href="{{route('owner.index')}}">Manage Owners<span class="label label-success pull-right"></span></a></li>
                <li><a href="{{route('owner.assign.lot')}}">Assign lot <span class="label label-danger pull-right"></span></a></li>
                <li><a href="{{route('owner.list.assign.lot')}}">List of owned Lot No <span class="label label-danger pull-right"></span></a></li>
                <li><a href="{{route('owner.lot.sell.other')}}">Sell to Other <span class="label label-danger pull-right"></span></a></li>
            </ul>
        </li>

        <li class="submenu">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-suitcase"></i></span>
                <span class="text">Lots Management</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li><a href="{{route('get.lot.list')}}">Add Lot Type<span class="label label-success pull-right"></span></a></li>

            </ul>
        </li>


        <li class="submenu @if(request()->is('invoices/*', 'invoices')) active @endif">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-suitcase"></i></span>
                <span class="text">Invoicing</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li><a href="#">Ownership Management <span class="label label-success pull-right"></span></a></li>
                <li class="@if(request()->is('invoices/*', 'invoices')) active @endif"><a href="{{ route('invoices.index') }}">Invoicing <span class="label label-warning pull-right"></span></a></li>
                <li><a href="#">Managements <span class="label label-danger pull-right"></span></a></li>
            </ul>
        </li>


        <li class="submenu">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-suitcase"></i></span>
                <span class="text">Meter Setting</span>
                <span class="arrow"></span>
            </a>
            <ul>
                {{--<li><a href="{{route('meter.create')}}">Create Meter Type<span class="label label-success pull-right"></span></a></li>--}}
                <li><a href="{{route('meter.index')}}">Manage Meter<span class="label label-warning pull-right"></span></a></li>
                <li><a href="{{route('meter.assignment.index')}}">Assign Meter<span class="label label-danger pull-right"></span></a></li>
                <li><a href="{{route('meter.reading.index')}}">Manage Meter Reading<span class="label label-danger pull-right"></span></a></li>
                {{--<li><a href="{{route('meter.reading.create')}}">Manage Meter Reading<span class="label label-danger pull-right"></span></a></li>--}}
            </ul>
        </li>

    </ul><!-- /.sidebar-menu -->
    <!--/ End left navigation - menu -->

    <!-- Start left navigation - footer -->
    <div class="sidebar-footer hidden-xs hidden-sm hidden-md">
        <a id="setting" class="pull-left" href="#" data-toggle="tooltip" data-placement="top" data-title="Setting"><i class="fa fa-cog"></i></a>
        <a id="fullscreen" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Fullscreen"><i class="fa fa-desktop"></i></a>
        <a id="lock-screen" data-url="#" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Lock Screen"><i class="fa fa-lock"></i></a>
        <a id="logout" data-url="{{url('/dashboard/logout')}}" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Logout"><i class="fa fa-power-off"></i></a>
    </div><!-- /.sidebar-footer -->
    <!--/ End left navigation - footer -->

</aside><!-- /#sidebar-left -->
<!--/ END SIDEBAR LEFT -->
