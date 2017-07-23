@extends('admin.layouts.base')

    @section('title')
        View Profile
        @parent
    @stop
@section('content')


    <!-- START @PAGE CONTENT -->
    <section id="page-content">

        <!-- Start page header -->
        <div class="header-content">
            <h2><i class="fa fa-child"></i> Account Detail <span>all about your profile activity</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="#">Dashboard</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Account Detail</li>
                </ol>
            </div><!-- /.breadcrumb-wrapper -->
        </div><!-- /.header-content -->
        <!--/ End page header -->

        <!-- Start body content -->
        <div class="body-content animated fadeIn">

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4">

                    <div class="panel rounded shadow">
                        <div class="ribbon-wrapper">
                            <a href="https://github.com/djavaui" target="_blank" class="ribbon ribbon-success"><i class="fa fa-github"></i> Github</a>
                        </div><!-- /.ribbon-wrapper -->
                        <div class="panel-body">
                            <div class="inner-all">
                                <ul class="list-unstyled">
                                    <li class="text-center">
                                        <img data-no-retina class="img-circle img-bordered-primary" src="../../../img/avatar/100/1.png" alt="Tol Lee">
                                    </li>
                                    <li class="text-center">
                                        <h4 class="text-capitalize">{{\Auth::user()->name}}</h4>
                                        <p class="text-muted text-capitalize">Owner</p>
                                    </li>
                                    <li>
                                        <a href="#" target="_blank" class="btn btn-success text-center btn-block">PRO Account</a>
                                    </li>
                                    <li><br/></li>
                                    <li>
                                        <div class="btn-group-vertical btn-block">
                                            <a href="#" class="btn btn-default"><i class="fa fa-cog pull-right"></i>Edit Account</a>
                                            <a href="#" class="btn btn-default"><i class="fa fa-sign-out pull-right"></i>Logout</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.panel -->

                    <div class="panel panel-theme rounded shadow">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h3 class="panel-title">Contact</h3>
                            </div>
                            <div class="pull-right">
                                <a href="#" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-facebook"></i></a>
                                <a href="#" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-twitter"></i></a>
                                <a href="#" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-google-plus"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.panel-heading -->
                        <div class="panel-body no-padding">
                            <ul class="list-group no-margin">
                                <li class="list-group-item"><i class="fa fa-envelope mr-5"></i> support@djavaui.com</li>
                                <li class="list-group-item"><i class="fa fa-globe mr-5"></i> www.djavaui.com</li>
                                <li class="list-group-item"><i class="fa fa-phone mr-5"></i> +6281 903 xxx xxx</li>
                            </ul>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->

                </div>
                <div class="col-lg-9 col-md-9 col-sm-8">

                    <div class="profile-cover">
                        <div class="cover rounded shadow no-overflow">
                            <div class="inner-cover">
                                <!-- Start offcanvas btn group menu: This menu will take position at the top of profile cover (mobile only). -->
                                <div class="btn-group cover-menu-mobile hidden-lg hidden-md">
                                    <button type="button" class="btn btn-theme btn-sm dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right no-border" role="menu">
                                        <li class="active"><a href="#"><i class="fa fa-fw fa-clock-o"></i> <span>Timeline</span></a></li>
                                        <li><a href="#"><i class="fa fa-fw fa-user"></i> <span>About</span></a></li>

                                    </ul>
                                </div>
                                <img data-no-retina src="../../../img/media/building/6.jpg" class="img-responsive" alt="cover">
                            </div>
                            <ul class="list-unstyled no-padding hidden-sm hidden-xs cover-menu">
                                <li class="active"><a href="#"><i class="fa fa-fw fa-clock-o"></i> <span>Timeline</span></a></li>
                        </div><!-- /.cover -->
                        <div class="profile-body">
                            <div class="timeline">
                                <!-- Start timeline item -->
                                <div class="timeline-item">
                                    <div class="timeline-badge">
                                        <img data-no-retina class="timeline-badge-userpic" src="../../../img/avatar/djavaui.png">
                                    </div>
                                    <div class="timeline-body">
                                        <div class="timeline-body-arrow">
                                        </div>
                                        <div class="timeline-body-head">
                                            <div class="timeline-body-head-caption">
                                                <a href="javascript:void(0);" class="timeline-body-title font-blue-madison">Djava UI</a>
                                                <span class="timeline-body-time font-grey-cascade">Posted at 6:25 PM . <i class="fa fa-globe"></i></span>
                                            </div>
                                            <div class="timeline-body-head-actions">
                                                <div class="btn-group">
                                                    <button class="btn btn-circle green-haze btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                        Actions <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                                                        <li>
                                                            <a href="javascript:void(0);">Pin to top</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Change date</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Highlight</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Embed post</a>
                                                        </li>
                                                        <li class="divider">
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Hide from timeline</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- /.profile-body -->
                    </div><!-- /.profile-cover -->

                </div>
            </div><!-- /.row -->

        </div><!-- /.body-content -->
        <!--/ End body content -->

        <!-- Start footer content -->
        <footer class="footer-content">
            2014 - <span id="copyright-year"></span> &copy; Blankon Admin. Created by <a href="seersol.com" target="_blank">Djava UI</a>, Yogyakarta ID
            <span class="pull-right">0.01 GB(0%) of 15 GB used</span>
        </footer><!-- /.footer-content -->
        <!--/ End footer content -->

    </section><!-- /#page-content -->
    <!--/ END PAGE CONTENT -->

    <!-- START @SIDEBAR RIGHT -->
    <aside id="sidebar-right">

        <div class="panel panel-tab">
            <div class="panel-heading no-padding">
                <div class="pull-right">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="#sidebar-profile" data-toggle="tab">
                                <i class="fa fa-user"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#sidebar-layout" data-toggle="tab">
                                <i class="fa fa-cogs"></i>
                            </a>
                        </li>
                        <li class="active">
                            <a href="#sidebar-setting" data-toggle="tab">
                                <i class="fa fa-paint-brush"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#sidebar-chat" data-toggle="tab">
                                <i class="fa fa-comments"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body no-padding">
                <div class="tab-content">
                    <div class="tab-pane" id="sidebar-profile">
                        <div class="sidebar-profile">

                            <!-- Start right navigation - menu -->
                            <ul class="sidebar-menu niceScroll">

                                <!-- Start category about me -->
                                <li class="sidebar-category">
                                    <span>ABOUT ME</span>
                                    <span class="pull-right"><i class="fa fa-newspaper-o"></i></span>
                                </li>
                                <!--/ End category about me -->

                                <!--/ Start navigation - about me -->
                                <li>
                                    <ul class="list-unstyled">
                                        <li>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                        </li>
                                        <li>
                                            <i class="fa fa-refresh"></i> Last update about 2 hours ago
                                        </li>
                                        <li>
                                            <i class="fa fa-clock-o"></i> Total time spent 250 hrs
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope"></i> Tol.lee@djavaui.com
                                        </li>
                                        <li>
                                            <i class="fa fa-mobile"></i> 1 405 777 1212
                                        </li>
                                    </ul>
                                </li>
                                <!--/ End navigation - about me -->

                                <!-- Start category recent activity -->
                                <li class="sidebar-category">
                                    <span>RECENT ACTIVITY</span>
                                    <span class="pull-right"><i class="fa fa-line-chart"></i></span>
                                </li>
                                <!--/ End category recent activity -->

                                <!--/ Start navigation - activity -->
                                <li>
                                    <div class="media-list activity">
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <i class="fa fa-flash"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Added a note to Ticket #947</span>
                                                <span class="media-meta time">about 2 hours ago</span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <i class="fa fa-flash"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Added a product to Ticket #948</span>
                                                <span class="media-meta time">about 3 hours ago</span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <i class="fa fa-flash"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Added a service to Ticket #949</span>
                                                <span class="media-meta time">about 15 hours ago</span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                    </div><!-- /.media-list -->
                                </li>
                                <!--/ End navigation - activity -->

                                <!-- Start category current working -->
                                <li class="sidebar-category">
                                    <span>CURRENTLY WORKING</span>
                                    <span class="pull-right"><i class="fa fa-group"></i></span>
                                </li>
                                <!--/ End category current working -->

                                <!-- Start left navigation - current working -->
                                <li>
                                    <div class="media-list working">
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Daddy Botak">
                                                <i class="online"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Daddy Botak</span>
                                                <span class="media-meta status">online</span>
                                                <span class="media-meta device"><i class="fa fa-globe"></i></span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Sarah Tingting">
                                                <i class="offline"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Sarah Tingting</span>
                                                <span class="media-meta status">offline</span>
                                                <span class="media-meta device"><i class="fa fa-globe"></i></span>
                                                <span class="media-meta time">7 m</span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="">
                                                <i class="busy"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Nicolas Olivier</span>
                                                <span class="media-meta status">busy</span>
                                                <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Claudia Cinta">
                                                <i class="online"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Claudia Cinta</span>
                                                <span class="media-meta status">online</span>
                                                <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="">
                                                <i class="busy"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Catherine Parker</span>
                                                <span class="media-meta status">busy</span>
                                                <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                    </div><!-- /.media-list -->
                                </li>
                                <!--/ End left navigation - current working -->

                            </ul>
                            <!-- Start right navigation - menu -->
                        </div>
                    </div><!-- /#sidebar-profile -->
                    <div class="tab-pane" id="sidebar-layout">
                        <div class="sidebar-layout">

                            <!-- Start right navigation - menu -->
                            <ul class="sidebar-menu niceScroll">

                                <!--/ Start navigation - reset settings -->
                                <li>
                                    <a id="reset-setting" href="javascript:void(0);" class="btn btn-inverse btn-block"><i class="fa fa-refresh fa-spin"></i> RESET SETTINGS</a>
                                </li>
                                <!--/ End navigation - reset settings -->

                                <!-- Start category layout -->
                                <li class="sidebar-category">
                                    <span>LAYOUT</span>
                                    <span class="pull-right"><i class="fa fa-toggle-on"></i></span>
                                </li>
                                <!--/ End category layout -->

                                <!--/ Start navigation - layout -->
                                <li>
                                    <ul class="list-unstyled layout-setting">
                                        <li>
                                            <div class="rdio rdio-theme">
                                                <input id="layout-fluid" type="radio" name="layout" value="">
                                                <label for="layout-fluid">Fluid</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rdio rdio-theme">
                                                <input id="layout-boxed" type="radio" name="layout" value="page-boxed">
                                                <label for="layout-boxed">Boxed</label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ End navigation - layout -->

                                <!-- Start category header -->
                                <li class="sidebar-category">
                                    <span>HEADER</span>
                                    <span class="pull-right"><i class="fa fa-toggle-on"></i></span>
                                </li>
                                <!--/ End category header -->

                                <!--/ Start navigation - header -->
                                <li>
                                    <ul class="list-unstyled header-layout-setting">
                                        <li>
                                            <div class="rdio rdio-theme">
                                                <input id="header-default" type="radio" name="header" value="">
                                                <label for="header-default">Default</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rdio rdio-theme">
                                                <input id="header-fixed" type="radio" name="header" value="page-header-fixed">
                                                <label for="header-fixed">Fixed</label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ End navigation - header -->

                                <!-- Start category sidebar -->
                                <li class="sidebar-category">
                                    <span>SIDEBAR</span>
                                    <span class="pull-right"><i class="fa fa-toggle-on"></i></span>
                                </li>
                                <!--/ End category sidebar -->

                                <!--/ Start navigation - sidebar -->
                                <li>
                                    <ul class="list-unstyled sidebar-layout-setting">
                                        <li>
                                            <div class="rdio rdio-theme">
                                                <input id="sidebar-default" type="radio" name="sidebar" value="">
                                                <label for="sidebar-default">Default</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rdio rdio-theme">
                                                <input id="sidebar-fixed" type="radio" name="sidebar" value="page-sidebar-fixed">
                                                <label for="sidebar-fixed">Fixed</label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ End navigation - sidebar -->

                                <!-- Start category sidebar type -->
                                <li class="sidebar-category">
                                    <span>SIDEBAR TYPE</span>
                                    <span class="pull-right"><i class="fa fa-toggle-on"></i></span>
                                </li>
                                <!--/ End category sidebar type -->

                                <!--/ Start navigation - sidebar -->
                                <li>
                                    <ul class="list-unstyled sidebar-type-setting">
                                        <li>
                                            <div class="rdio rdio-theme">
                                                <input id="sidebar-type-default" type="radio" name="sidebarType" value="">
                                                <label for="sidebar-type-default">Default</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rdio rdio-theme">
                                                <input id="sidebar-type-box" type="radio" name="sidebarType" value="sidebar-box">
                                                <label for="sidebar-type-box">Box</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rdio rdio-theme">
                                                <input id="sidebar-type-rounded" type="radio" name="sidebarType" value="sidebar-rounded">
                                                <label for="sidebar-type-rounded">Rounded</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rdio rdio-theme">
                                                <input id="sidebar-type-circle" type="radio" name="sidebarType" value="sidebar-circle">
                                                <label for="sidebar-type-circle">Circle</label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ End navigation - sidebar -->

                                <!-- Start category footer -->
                                <li class="sidebar-category">
                                    <span>FOOTER</span>
                                    <span class="pull-right"><i class="fa fa-toggle-on"></i></span>
                                </li>
                                <!--/ End category footer -->

                                <!--/ Start navigation - footer -->
                                <li>
                                    <ul class="list-unstyled footer-layout-setting">
                                        <li>
                                            <div class="rdio rdio-theme">
                                                <input id="footer-default" type="radio" name="footer" value="">
                                                <label for="footer-default">Default</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rdio rdio-theme">
                                                <input id="footer-fixed" type="radio" name="footer" value="page-footer-fixed">
                                                <label for="footer-fixed">Fixed</label>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ End navigation - footer -->

                            </ul>
                            <!-- Start right navigation - menu -->
                        </div>
                    </div><!-- /#sidebar-layout -->
                    <div class="tab-pane in active" id="sidebar-setting">
                        <div class="sidebar-setting">
                            <!-- Start right navigation - menu -->
                            <ul class="sidebar-menu">

                                <!-- Start category color schemes -->
                                <li class="sidebar-category">
                                    <span>COLOR SCHEMES</span>
                                    <span class="pull-right"><i class="fa fa-tint"></i></span>
                                </li>
                                <!--/ End category color schemes -->

                                <!-- Start navigation - themes -->
                                <li>
                                    <div class="sidebar-themes color-schemes">

                                        <a class="theme" href="javascript:void(0);" style="background-color: #81b71a" data-toggle="tooltip" data-placement="right" data-original-title="Default"><span class="hide">default</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #00B1E1" data-toggle="tooltip" data-placement="top" data-original-title="Blue"><span class="hide">blue</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #37BC9B" data-toggle="tooltip" data-placement="top" data-original-title="Cyan"><span class="hide">cyan</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #8CC152" data-toggle="tooltip" data-placement="top" data-original-title="Green"><span class="hide">green</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #E9573F" data-toggle="tooltip" data-placement="top" data-original-title="Red"><span class="hide">red</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #F6BB42" data-toggle="tooltip" data-placement="top" data-original-title="Yellow"><span class="hide">yellow</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #906094" data-toggle="tooltip" data-placement="top" data-original-title="Purple"><span class="hide">purple</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #D39174" data-toggle="tooltip" data-placement="top" data-original-title="Brown"><span class="hide">brown</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #9FB478" data-toggle="tooltip" data-placement="left" data-original-title="Green Army"><span class="hide">green-army</span></a>

                                        <a class="theme" href="javascript:void(0);" style="background-color: #63D3E9" data-toggle="tooltip" data-placement="right" data-original-title="Blue Sea"><span class="hide">blue-sea</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #5577B4" data-toggle="tooltip" data-placement="top" data-original-title="Blue Gray"><span class="hide">blue-gray</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #AF86B9" data-toggle="tooltip" data-placement="top" data-original-title="Purple Gray"><span class="hide">purple-gray</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #CC6788" data-toggle="tooltip" data-placement="top" data-original-title="Purple Wine"><span class="hide">purple-wine</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #F06F6F" data-toggle="tooltip" data-placement="top" data-original-title="Alizarin Crimson"><span class="hide">alizarin-crimson</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #979797" data-toggle="tooltip" data-placement="top" data-original-title="Black And White"><span class="hide">black-and-white</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #8BC4B9" data-toggle="tooltip" data-placement="top" data-original-title="Amazon"><span class="hide">amazon</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #B0B069" data-toggle="tooltip" data-placement="top" data-original-title="Amber"><span class="hide">amber</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #A9C784" data-toggle="tooltip" data-placement="left" data-original-title="Android green"><span class="hide">android-green</span></a>

                                        <a class="theme" href="javascript:void(0);" style="background-color: #B3998A" data-toggle="tooltip" data-placement="right" data-original-title="Antique brass"><span class="hide">antique-brass</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #8D8D6E" data-toggle="tooltip" data-placement="top" data-original-title="Antique Bronze"><span class="hide">antique-bronze</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #B0B69D" data-toggle="tooltip" data-placement="top" data-original-title="Artichoke"><span class="hide">artichoke</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #F19B69" data-toggle="tooltip" data-placement="top" data-original-title="Atomic Tangerine"><span class="hide">atomic-tangerine</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #98777B" data-toggle="tooltip" data-placement="top" data-original-title="Bazaar"><span class="hide">bazaar</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #C3A961" data-toggle="tooltip" data-placement="top" data-original-title="Bistre Brown"><span class="hide">bistre-brown</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #D6725E" data-toggle="tooltip" data-placement="top" data-original-title="Bittersweet"><span class="hide">bittersweet</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #7789D1" data-toggle="tooltip" data-placement="top" data-original-title="Blueberry"><span class="hide">blueberry</span></a>
                                        <a class="theme" href="javascript:void(0);" style="background-color: #6FA362" data-toggle="tooltip" data-placement="left" data-original-title="Bud Green"><span class="hide">bud-green</span></a>

                                    </div><!-- /.sidebar-themes -->
                                </li>
                                <!--/ End navigation - themes -->

                                <!-- Start category navbar color -->
                                <li class="sidebar-category">
                                    <span>NAVBAR COLOR</span>
                                    <span class="pull-right"><i class="fa fa-tint"></i></span>
                                </li>
                                <!--/ End category navbar color -->

                                <!-- Start navigation - navbar color -->
                                <li>
                                    <div class="sidebar-themes navbar-color">

                                        <a class="theme bg-dark" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Dark"><span class="hide">dark</span></a>
                                        <a class="theme bg-light" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Light"><span class="hide">light</span></a>
                                        <a class="theme bg-primary" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Primary"><span class="hide">primary</span></a>
                                        <a class="theme bg-success" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Success"><span class="hide">success</span></a>
                                        <a class="theme bg-info" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Info"><span class="hide">info</span></a>
                                        <a class="theme bg-warning" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Warning"><span class="hide">warning</span></a>
                                        <a class="theme bg-danger" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Danger"><span class="hide">danger</span></a>

                                    </div><!-- /.navbar-color -->
                                </li>
                                <!--/ End navigation - navbar color -->

                                <!-- Start category sidebar color -->
                                <li class="sidebar-category">
                                    <span>SIDEBAR COLOR</span>
                                    <span class="pull-right"><i class="fa fa-tint"></i></span>
                                </li>
                                <!--/ End category sidebar color -->

                                <!-- Start navigation - sidebar color -->
                                <li>
                                    <div class="sidebar-themes sidebar-color">

                                        <a class="theme bg-dark" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Dark"><span class="hide">dark</span></a>
                                        <a class="theme bg-light" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Light"><span class="hide">light</span></a>
                                        <a class="theme bg-primary" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Primary"><span class="hide">primary</span></a>
                                        <a class="theme bg-success" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Success"><span class="hide">success</span></a>
                                        <a class="theme bg-info" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Info"><span class="hide">info</span></a>
                                        <a class="theme bg-warning" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Warning"><span class="hide">warning</span></a>
                                        <a class="theme bg-danger" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Danger"><span class="hide">danger</span></a>

                                    </div><!-- /.sidebar-color -->
                                </li>
                                <!--/ End navigation - sidebar color -->

                                <!-- Start category task progress -->
                                <li class="sidebar-category">
                                    <span>TASK PROGRESS</span>
                                    <span class="pull-right"><i class="fa fa-sliders"></i></span>
                                </li>
                                <!--/ End category task progress -->

                                <!--/ Start navigation - task progress -->
                                <li>
                                    <ul class="list-group sidebar-task">
                                        <li class="list-group-item">
                                            <p class="details"> <span> Core System </span> <span class="pull-right"> 82% </span> </p>
                                            <div class="progress progress-xs progress-striped active no-margin">
                                                <div style="width: 82%" class="progress-bar progress-bar-success"> </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <p class="details"> <span> Front-End </span> <span class="pull-right"> 67% </span> </p>
                                            <div class="progress progress-xs progress-striped active no-margin">
                                                <div style="width: 47%" class="progress-bar progress-bar-danger"> </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <p class="details"> <span> Back-End </span> <span class="pull-right"> 45% </span> </p>
                                            <div class="progress progress-xs progress-striped active no-margin">
                                                <div style="width: 47%" class="progress-bar progress-bar-info"> </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ End navigation - task progress -->

                                <!-- Start category summary system -->
                                <li class="sidebar-category">
                                    <span>SUMMARY SYSTEM</span>
                                    <span class="pull-right"><i class="fa fa-bar-chart-o"></i></span>
                                </li>
                                <!--/ End category summary system -->

                                <!-- Start left navigation - summary -->
                                <li>
                                    <ul class="sidebar-summary sparklines">
                                        <li>
                                            <div class="list-info">
                                                <span>Average Users</span>
                                                <h4>1, 412, 101</h4>
                                            </div>
                                            <div class="chart"><span class="average">4,2,3,2,4,2,5,1,2,2,5,3</span></div>
                                            <div class="clearfix"></div>
                                        </li>
                                        <li>
                                            <div class="list-info">
                                                <span>Daily Traffic</span>
                                                <h4>781, 601</h4>
                                            </div>
                                            <div class="chart"><span class="traffic">1,2,3,2,4,1,5,3,2,4,2,3</span></div>
                                            <div class="clearfix"></div>
                                        </li>
                                        <li>
                                            <div class="list-info">
                                                <span>Disk Usage</span>
                                                <h4>52.2%</h4>
                                            </div>
                                            <div class="chart"><span class="disk">5,5,3,2,1,3,4,3,2,4,1,3</span></div>
                                            <div class="clearfix"></div>
                                        </li>
                                        <li>
                                            <div class="list-info">
                                                <span>CPU Usage</span>
                                                <h4>67.8%</h4>
                                            </div>
                                            <div class="chart"><span class="cpu">1,5,3,2,4,5,5,3,2,4,5,3</span></div>
                                            <div class="clearfix"></div>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ End left navigation - summary -->

                            </ul>
                            <!-- Start right navigation - menu -->
                        </div>
                    </div><!-- /#sidebar-setting -->
                    <div class="tab-pane" id="sidebar-chat">
                        <div class="sidebar-chat">

                            <form class="form-horizontal">
                                <div class="form-group has-feedback">
                                    <input class="form-control" type="text" placeholder="Search messages...">
                                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                </div>
                            </form>

                            <!-- Start right navigation - menu -->
                            <ul class="sidebar-menu niceScroll">

                                <!-- Start category family chat -->
                                <li class="sidebar-category">
                                    <span>FAMILY</span>
                                    <span class="pull-right"><i class="fa fa-home"></i></span>
                                </li>
                                <!--/ End category family chat -->

                                <li>
                                    <!-- Start chat - contact list -->
                                    <div class="media-list">
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Daddy Botak">
                                                <i class="online"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Daddy Botak</span>
                                                <span class="media-meta status">online</span>
                                                <span class="media-meta device"><i class="fa fa-globe"></i></span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Sarah Tingting">
                                                <i class="offline"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Sarah Tingting</span>
                                                <span class="media-meta status">offline</span>
                                                <span class="media-meta device"><i class="fa fa-globe"></i></span>
                                                <span class="media-meta time">7 m</span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="...">
                                                <i class="busy"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Nicolas Olivier</span>
                                                <span class="media-meta status">busy</span>
                                                <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Harry Potret">
                                                <i class="online"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Harry Potret</span>
                                                <span class="media-meta status">online</span>
                                                <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="...">
                                                <i class="busy"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Catherine Parker</span>
                                                <span class="media-meta status">busy</span>
                                                <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                    </div><!-- /.media-list -->
                                    <!--/ End chat - contact list -->
                                </li>

                                <!-- Start category friends chat -->
                                <li class="sidebar-category">
                                    <span>FRIENDS</span>
                                    <span class="pull-right"><i class="fa fa-group"></i></span>
                                </li>
                                <!--/ End category friends chat -->

                                <li>
                                    <!-- Start chat - contact list -->
                                    <div class="media-list">
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Jeck Joko">
                                                <i class="online"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Jeck Joko</span>
                                                <span class="media-meta status">online</span>
                                                <span class="media-meta device"><i class="fa fa-globe"></i></span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Tenny Imoet">
                                                <i class="busy"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Tenny Imoet</span>
                                                <span class="media-meta status">busy</span>
                                                <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Leli Madang">
                                                <i class="offline"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Leli Madang</span>
                                                <span class="media-meta status">offline</span>
                                                <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                <span class="media-meta time">2 m</span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Rebecca Cabean">
                                                <i class="offline"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Rebecca Cabean</span>
                                                <span class="media-meta status">offline</span>
                                                <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                <span class="media-meta time">8 m</span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="...">
                                                <i class="busy"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">ondoel return</span>
                                                <span class="media-meta status">busy</span>
                                                <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                    </div><!-- /.media-list -->
                                    <!--/ End chat - contact list -->
                                </li>

                                <!-- Start category other chat -->
                                <li class="sidebar-category">
                                    <span>OTHERS</span>
                                    <span class="pull-right"><i class="fa fa-share"></i></span>
                                </li>
                                <!--/ End category other chat -->

                                <li>
                                    <!-- Start chat - contact list -->
                                    <div class="media-list">
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Sishy Mawar">
                                                <i class="offline"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Sishy Mawar</span>
                                                <span class="media-meta status">offline</span>
                                                <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                <span class="media-meta time">23 m</span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="Mbah Roso">
                                                <i class="away"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Mbah Roso</span>
                                                <span class="media-meta status">away</span>
                                                <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                                <span class="media-meta time">2 h</span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                        <a href="#" class="media">
                                            <div class="media-object pull-left has-notif">
                                                <img src="http://img.djavaui.com/?create=30x30,4888E1?f=ffffff" class="img-circle" alt="...">
                                                <i class="busy"></i>
                                            </div><!-- /.media-object -->
                                            <div class="media-body">
                                                <span class="media-heading">Alma Butoi</span>
                                                <span class="media-meta status">busy</span>
                                                <span class="media-meta device"><i class="fa fa-mobile"></i></span>
                                            </div><!-- /.media-body -->
                                        </a><!-- /.media -->
                                    </div><!-- /.media-list -->
                                    <!--/ End chat - contact list -->
                                </li>

                            </ul><!-- /.sidebar-menu -->
                            <!-- Start right navigation - menu -->

                        </div><!-- /.sidebar-chat -->
                    </div><!-- /#sidebar-chat -->
                </div>
            </div>
        </div>

    </aside><!-- /#sidebar-right -->
    <!--/ END SIDEBAR RIGHT -->

    </section><!-- /#wrapper -->
    <!--/ END WRAPPER -->

    <!-- START @BACK TOP -->
    <div id="back-top" class="animated pulse circle">
        <i class="fa fa-angle-up"></i>
    </div><!-- /#back-top -->
    <!--/ END BACK TOP -->

    <!-- START @ADDITIONAL ELEMENT -->
    <!-- Start modal navbar messages -->
    <div id="modal-navbar-messages" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"><i class="fa fa-comment-o"></i> Create new message</h4>
                </div>
                <div class="modal-body no-padding">
                    <form class="form-horizontal form-bordered" role="form">
                        <div class="form-body">
                            <div class="form-group">
                                <label for="navbar-message-to" class="col-sm-3 control-label">To</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" id="navbar-message-to">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label for="navbar-message-cc" class="col-sm-3 control-label">Cc</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-sm" id="navbar-message-cc">
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label for="navbar-message-priority" class="col-sm-3 control-label">Priority</label>
                                <div class="col-sm-7">
                                    <select class="form-control input-sm mb-15" id="navbar-message-priority">
                                        <option>High</option>
                                        <option selected="selected">Normal</option>
                                        <option>Low</option>
                                    </select>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label for="navbar-message-textarea" class="col-sm-3 control-label">Message</label>
                                <div class="col-sm-7">
                                    <textarea id="navbar-message-textarea" class="form-control" maxlength="20" rows="5" placeholder="Type your messages on here..."></textarea>
                                </div>
                            </div><!-- /.form-group -->
                        </div><!-- /.form-body -->
                        <div class="form-footer">
                            <div class="col-sm-offset-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div><!-- /.form-footer -->
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--/ End modal navbar messages -->
    <!--/ END ADDITIONAL ELEMENT -->

@endsection

@section('footer_scripts')

@endsection

