<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <link href="{{asset('style2/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('style2/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('style2/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('style2/css/style.css')}}" rel="stylesheet">

</head>

<body class="">

    <!-- Mainly scripts -->
    <script src="{{asset('style2/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('style2/js/popper.min.js')}}"></script>
    <script src="{{asset('style2/js/bootstrap.js')}}"></script>
    <script src="{{asset('style2/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('style2/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('style2/js/inspinia.js')}}"></script>
    <script src="{{asset('style2/js/plugins/pace/pace.min.js')}}"></script>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="{{asset('style2/img/profile_small.jpg')}}"/>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">
                                @if (session('name'))
                                    {{session('name')}}
                                @endif</span>
                            </a>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li>
                        <a href="{{url('/logout')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{url('/dashboard')}}">Dashboard v.1</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('/user')}}"><i class="fa fa-users"></i> <span class="nav-label">User</span></a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        @yield('welcome_message')
                        <li>
                            <a onclick="return confirm('Anda yakin?');" href="{{url('/logout')}}">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            @yield('breadcrumb')
            
            @yield('content')
        </div>

    </div>
</body>
</html>
