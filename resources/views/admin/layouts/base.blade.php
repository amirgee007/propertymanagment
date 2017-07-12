<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- START @HEAD -->
<head>
<!-- START @META SECTION -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Blankon is a theme fullpack admin template powered by Twitter bootstrap 3 front-end framework. Included are multiple example pages, elements styles, and javascript widgets to get your project started.">
    <meta name="keywords" content="admin, admin template, bootstrap3, clean, fontawesome4, good documentation, lightweight admin, responsive dashboard, webapp">
    <meta name="author" content="Djava UI">
    <title>PROJECTS DASHBOARD | BLANKON - Fullpack Admin Theme</title>
    <!--/ END META SECTION -->

<!-- START @FAVICONS -->
    <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-144x144-precomposed.png" rel="apple-touch-icon-precomposed" sizes="144x144">
    <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-114x114-precomposed.png" rel="apple-touch-icon-precomposed" sizes="114x114">
    <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-72x72-precomposed.png" rel="apple-touch-icon-precomposed" sizes="72x72">
    <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon-57x57-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="http://themes.djavaui.com/blankon-fullpack-admin-theme/img/ico/html/apple-touch-icon.png" rel="shortcut icon">
    <!--/ END FAVICONS -->

<!-- START @FONT STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Oswald:700,400" rel="stylesheet">
    <!--/ END FONT STYLES -->

<!-- START @GLOBAL MANDATORY STYLES -->
    <link href="admin/assets/global/plugins/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--/ END GLOBAL MANDATORY STYLES -->

<!-- START @PAGE LEVEL STYLES -->
    <link href="admin/assets/global/plugins/bower_components/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="admin/assets/global/plugins/bower_components/animate.css/animate.min.css" rel="stylesheet">
    <link href="admin/assets/global/plugins/bower_components/bootstrap-calendar/css/calendar.min.css" rel="stylesheet">
    <link href="admin/assets/global/plugins/bower_components/jquery.gritter/css/jquery.gritter.css" rel="stylesheet">
    <link href="admin/assets/global/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="admin/assets/global/plugins/bower_components/horizontal-chart/build/css/horizBarChart.css" rel="stylesheet">
    <!--/ END PAGE LEVEL STYLES -->

<!-- START @THEME STYLES -->
    <link href="admin/assets/admin/css/reset.css" rel="stylesheet">
    <link href="admin/assets/admin/css/layout.css" rel="stylesheet">
    <link href="admin/assets/admin/css/components.css" rel="stylesheet">
    <link href="admin/assets/admin/css/plugins.css" rel="stylesheet">
    <link href="admin/assets/admin/css/themes/default.theme.css" rel="stylesheet" id="theme">
    <link href="admin/assets/admin/css/pages/dashboard-projects.css" rel="stylesheet">
    <link href="admin/assets/admin/css/custom.css" rel="stylesheet">
    <!--/ END THEME STYLES -->

<!-- START @IE SUPPORT -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="admin/assets/global/plugins/bower_components/html5shiv/dist/html5shiv.min.js"></script>
    <script src="admin/assets/global/plugins/bower_components/respond-minmax/dest/respond.min.js"></script>
    <![endif]-->
    <!--/ END IE SUPPORT -->
</head>
<!--/ END HEAD -->


<body class="page-session page-sound page-header-fixed page-sidebar-fixed page-footer-fixed demo-dashboard-session">

<!--[if lt IE 9]>
<p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<!-- START @WRAPPER -->
<section id="wrapper">

    @include('admin.layouts.header')
    @include('admin.layouts.leftsidebar')
    @yield('content')
    @include('admin.layouts.rightsidebar')


</section>
<!--/ END WRAPPER -->

<!-- START @BACK TOP -->
<div id="back-top" class="animated pulse circle">
    <i class="fa fa-angle-up"></i>
</div><!-- /#back-top -->
<!--/ END BACK TOP -->


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



<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
<!-- START @CORE PLUGINS -->
<script src="admin/assets/global/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/jquery-cookie/jquery.cookie.js"></script>
<script src="admin/assets/global/plugins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/typehead.js/dist/handlebars.js"></script>
<script src="admin/assets/global/plugins/bower_components/typehead.js/dist/typeahead.bundle.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/jquery-nicescroll/jquery.nicescroll.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/jquery.sparkline.min/index.js"></script>
<script src="admin/assets/global/plugins/bower_components/jquery-easing-original/jquery.easing.1.3.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/ionsound/js/ion.sound.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/bootbox/bootbox.js"></script>
<script src="admin/assets/global/plugins/bower_components/retina.js/dist/retina.min.js"></script>
<!--/ END CORE PLUGINS -->

<!-- START @PAGE LEVEL PLUGINS -->
<script src="admin/assets/global/plugins/bower_components/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/underscore/underscore-min.js"></script>
<script src="admin/assets/global/plugins/bower_components/jsTimezoneDetect/jstz.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/bootstrap-calendar/js/calendar.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/raphael/raphael-min.js"></script>
<script src="admin/assets/global/plugins/bower_components/morrisjs/morris.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/horizontal-chart/build/js/jquery.horizBarChart.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/counter-up/jquery.counterup.min.js"></script>
<!--/ END PAGE LEVEL PLUGINS -->

<!-- START @PAGE LEVEL SCRIPTS -->
<script src="admin/assets/admin/js/apps.js"></script>
<script src="admin/assets/admin/js/pages/project-management/blankon.project.management.dashboard.js"></script>
<script src="admin/assets/admin/js/demo.js"></script>
<!--/ END PAGE LEVEL SCRIPTS -->
<!--/ END JAVASCRIPT SECTION -->

<!-- START GOOGLE ANALYTICS -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-55892530-1', 'auto');
    ga('send', 'pageview');

</script>
<!--/ END GOOGLE ANALYTICS -->

</body>
<!--/ END BODY -->

</html>