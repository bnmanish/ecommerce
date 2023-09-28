<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Login | TimyShop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="TimyShop Admin Login Page" name="description" />
        <meta content="TimyShop" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('assets/backend/images/favicon.ico')}}">
        <!-- Bootstrap Css -->
        <link href="{{url('assets/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{url('assets/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{url('assets/backend/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    </head>

    <body class="bg-pattern">
        <div class="bg-overlay"></div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="">
                                    <div class="text-center">
                                        <a href="index.html" class="">
                                            <img src="{{url('assets/backend/images/logo-dark.png')}}" alt="" height="24" class="auth-logo logo-dark mx-auto">
                                            <img src="{{url('assets/backend/images/logo-light.png')}}" alt="" height="24" class="auth-logo logo-light mx-auto">
                                        </a>
                                    </div>
                                    <!-- end row -->
                                    <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back !</h4>
                                    <p class="mb-3 text-center">Sign in to continue TimyShop.</p>
                                    @if($errors->any())
                                        @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissible py-2">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                            <strong><i class="ri-error-warning-line"></i></strong> {{$error}}
                                        </div>
                                        @endforeach
                                    @endif
                                    @if(Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible py-2">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        <strong><i class="ri-error-warning-line"></i></strong> {{Session::get('error')}}
                                    </div>
                                    @endif
                                    <form class="form-horizontal" action="{{route('admin.logedin')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label" for="username">Username/Email</label>
                                                    <input type="text" class="form-control" id="username" placeholder="Enter username/Email" name="user_name" value="{{old('user_name')}}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="userpassword">Password</label>
                                                    <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password">
                                                </div>
                                                {{--
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customControlInline">
                                                            <label class="form-label" class="form-check-label" for="customControlInline">Remember me</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-md-end mt-3 mt-md-0">
                                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                --}}
                                                <div class="d-grid mt-4">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit" onclick="return validate()">Log In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <p class="text-white-50">Copyrights © {{date('Y')}} <a target="_blank" href="{{route('home')}}">TimyShop</a>. All rights reserved.</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="{{url('assets/backend/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{url('assets/backend/js/app.js')}}"></script>
        <script type="text/javascript">
            
            function validate(){
                var uname = $('#username').val();
                var pass = $('#userpassword').val();
                if(uname.length < 1){
                    alert('User Name is required!');
                    $('#username').focus();
                    return false;
                }
                if(pass.length < 1){
                    alert('Password is required!');
                    $('#userpassword').focus();
                    return false;
                }
            }

        </script>
    </body>
</html>
