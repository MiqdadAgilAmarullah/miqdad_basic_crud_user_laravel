
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SISTEM | LOGIN</title>

    <link href="{{asset('style2/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('style2/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('style2/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('style2/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
            <img src="{{asset('style2/img/login.svg')}}" style="max-width:100%" alt="">
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="{{url('/login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                        @if (session('message'))
                            <div class="alert alert-danger">{{session('message')}}</div>    
                        @endif
                        <button type="submit" class="btn btn-success block full-width m-b">Login</button>
                    </form>
                    <p class="m-t">
                        <small>Inspinia we app framework base on Bootstrap 3 &copy; 2020</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                PT. Kalbe Morinaga Indonesia
            </div>
            <div class="col-md-6 text-right">
                <small>© 2020-2021</small>
            </div>
        </div>
    </div>

</body>

</html>
