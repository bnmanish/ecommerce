<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    <link href="{{url('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/animate.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/style.css')}}" rel="stylesheet">
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <p>Welcome To Admin Panel</p>

            @if(Session::has('error'))
                <p class="text-danger">{{Session::get('error')}}</p>
            @endif

            <form class="m-t" role="form" method="post" action="{{route('adminlogedin')}}">
            	@csrf
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="email" name="email">
                    <p class="text-danger text-left">{{$errors->first('email')}}</p>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <p class="text-danger text-left">{{$errors->first('password')}}</p>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </form>
            <p class="m-t"> <small>copyrights &copy; 2021 Ecommerce. All Rights Reserved.</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{url('backend/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{url('backend/js/popper.min.js')}}"></script>
    <script src="{{url('backend/js/bootstrap.js')}}"></script>

</body>
</html>
