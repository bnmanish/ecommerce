<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="{{url('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/animate.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/style.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <!-- Dropify CSS -->
    <link rel="stylesheet" href="{{url('dropify/dist/css/dropify.min.css')}}">
    <!-- Dropify CSS -->
    <!-- SUMMERNOTE -->
    <link href="{{url('backend/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
    <!-- SUMMERNOTE -->

</head>

<body>

    <div id="wrapper">

        @include('backend/layouts/sidebar')

        <div id="page-wrapper" class="gray-bg">

            @include('backend/layouts/topbar')

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Edit User</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-content">
                                <form method="post" action="{{route('store.edit.user',$user->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control cat" name="name" value="{{$user->name}}">
                                            <p class="text-danger">{{$errors->first('name')}}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Email</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="email" value="{{$user->email}}" >
                                            <p class="text-danger">{{$errors->first('email')}}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Password</label>
                                        <div class="col-lg-10">
                                            <input type="password" class="form-control" name="password" placeholder="**********">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Contact</label>
                                        <div class="col-lg-10">
                                            <input type="number" class="form-control" name="contact" value="{{$user->contact}}">
                                            <p class="text-danger">{{$errors->first('contact')}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Type</label>
                                        <div class="col-lg-10">
                                            <select class="form-control" name="type">
                                                <option value="user" @php if($user->user_type == 'user'){echo "selected";} @endphp>User</option>
                                                <option value="admin" @php if($user->user_type == 'admin'){echo "selected";} @endphp>Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Status</label>
                                        <div class="col-lg-10 row">
                                            <div class="col-lg-2">
                                                <div class="i-checks">
                                                    <label>
                                                        <input type="radio" value="1" name="status" @php if($user->status == 1){echo "checked";} @endphp> <i></i> Enabled
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="i-checks">
                                                    <label>
                                                        <input type="radio" value="0" name="status" @php if($user->status == 0){echo "checked";} @endphp> <i></i> Disable
                                                    </label>
                                                </div>
                                            </div>
                                            <p class="text-danger">{{$errors->first('status')}}</p>
                                        </div>
                                    </div>
                                    <div class  ="form-group row">
                                        <div class="offset-md-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @include('backend/layouts/footer')

        </div>
    </div>


    <!-- Mainly scripts -->
    <script src="{{url('backend/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{url('backend/js/popper.min.js')}}"></script>
    <script src="{{url('backend/js/bootstrap.js')}}"></script>
    <script src="{{url('backend/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{url('backend/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- Custom and plugin javascript -->
    <script src="{{url('backend/js/inspinia.js')}}"></script>
    <script src="{{url('backend/js/plugins/pace/pace.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{url('backend/js/plugins/iCheck/icheck.min.js')}}"></script>
    <!-- Dropify js -->
    <script src="{{url('dropify/dist/js/dropify.min.js')}}"></script>
    <!-- Dropify js -->
    <!-- SUMMERNOTE -->
    <script src="{{url('backend/js/plugins/summernote/summernote-bs4.js')}}"></script>
    <!-- SUMMERNOTE -->
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('.dropify').dropify();
            $('.summernote').summernote();
        });
    </script>
</body>

</html>
