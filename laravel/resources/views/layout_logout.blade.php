<!DOCTYPE html>

<!--[if IE 8]>
<html class="ie8"> <![endif]-->
<!--[if IE 9]>
<html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Welcome</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Open Sans font from Google CDN -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin"
          rel="stylesheet" type="text/css">

    <!-- Pixel Admin's stylesheets -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/pixel-admin.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/widgets.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/rtl.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/themes.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/footer.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/pages.min.css')}}" rel="stylesheet" type="text/css">
    {{--<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">--}}

    <!--[if lt IE 9]>
    <script src="{{asset('js/ie.min.js')}}"></script>
    <![endif]-->
</head>


<!-- 1. $BODY ======================================================================================

	Body

	Classes:
	* 'theme-{THEME NAME}'
	* 'right-to-left'      - Sets text direction to right-to-left
	* 'main-menu-right'    - Places the main menu on the right side
	* 'no-main-menu'       - Hides the main menu
	* 'main-navbar-fixed'  - Fixes the main navigation
	* 'main-menu-fixed'    - Fixes the main menu
	* 'main-menu-animated' - Animate main menu
-->
<body class="theme-fresh page-signin-alt main-menu-animated">





@yield('content')


    <div id="small-screen-width-point"
         style="position:absolute;top:-10000px;width:10px;height:10px;background:#fff;"></div>
    <div id="tablet-screen-width-point"
         style="position:absolute;top:-10000px;width:10px;height:10px;background:#fff;"></div>


</body>
</html>