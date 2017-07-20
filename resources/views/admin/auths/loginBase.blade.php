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
    <title>Login Area | Property Management</title>
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
    <!--/ END FONT STYLES -->

<!-- START @GLOBAL MANDATORY STYLES -->
    <link href="admin/assets/global/plugins/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--/ END GLOBAL MANDATORY STYLES -->

<!-- START @PAGE LEVEL STYLES -->
    <link href="admin/assets/global/plugins/bower_components/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="admin/assets/global/plugins/bower_components/animate.css/animate.min.css" rel="stylesheet">
    <!--/ END PAGE LEVEL STYLES -->

<!-- START @THEME STYLES -->
    <link href="admin/assets/admin/css/reset.css" rel="stylesheet">
    <link href="admin/assets/admin/css/layout.css" rel="stylesheet">
    <link href="admin/assets/admin/css/components.css" rel="stylesheet">
    <link href="admin/assets/admin/css/plugins.css" rel="stylesheet">
    <link href="admin/assets/admin/css/themes/default.theme.css" rel="stylesheet" id="theme">
    <link href="admin/assets/admin/css/pages/sign-type-2.css" rel="stylesheet">
    <link href="../../../assets/admin/css/custom.css" rel="stylesheet">
    <!--/ END THEME STYLES -->

<!-- START @IE SUPPORT -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="admin/assets/global/plugins/bower_components/html5shiv/dist/html5shiv.min.js"></script>
    <script src="admin/assets/global/plugins/bower_components/respond-minmax/dest/respond.min.js"></script>
    <![endif]-->
    <!--/ END IE SUPPORT -->
</head>

<body class="page-sound page-backstretch">

<!--[if lt IE 9]>
<p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- START @SIGN WRAPPER -->
<div id="sign-wrapper">

    <!-- Brand -->
    <div class="brand">
        <img src="http://img.djavaui.com/?create=220x100,81B71A?f=ffffff" alt="brand logo"/>
    </div>
    <!--/ Brand -->

@yield('forms')
    <!-- Content text -->
    <p class="text-muted text-center sign-link">Powered By <a href="http://seersol.com" target="_blank"> SeerSol</a></p>
    <!--/ Content text -->

</div><!-- /#sign-wrapper -->
<!--/ END SIGN WRAPPER -->

<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
<!-- START @CORE PLUGINS -->
<script src="admin/assets/global/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/jquery-cookie/jquery.cookie.js"></script>
<script src="admin/assets/global/plugins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/jquery-easing-original/jquery.easing.1.3.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/ionsound/js/ion.sound.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/retina.js/dist/retina.min.js"></script>
<!--/ END CORE PLUGINS -->

<!-- START @PAGE LEVEL PLUGINS -->
<script src="admin/assets/global/plugins/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="admin/assets/global/plugins/bower_components/jquery-backstretch/jquery.backstretch.min.js"></script>
<!--/ END PAGE LEVEL PLUGINS -->

<!-- START @PAGE LEVEL SCRIPTS -->
<script src="admin/assets/admin/js/pages/blankon.sign.js"></script>
<script src="admin/assets/admin/js/pages/project-management/blankon.project.management.sign.js"></script>
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
<!-- END BODY -->

</html>