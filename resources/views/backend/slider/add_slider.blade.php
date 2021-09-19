<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Slider</title>
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
                    <h2>Add Slider</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-content">
                                <form method="post" action="{{route('store.slider')}}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Title</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                            <p class="text-danger">{{$errors->first('title')}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Slider Sequence</label>
                                        <div class="col-lg-10">
                                            <input type="number" class="form-control" name="sequence" value="{{old('sequence')}}">
                                            <p class="text-danger">{{$errors->first('sequence')}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Slider Link</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="link" value="{{old('link')}}">
                                            <p class="text-danger">{{$errors->first('link')}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Slider Text1</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="text1" value="{{old('text1')}}">
                                            <p class="text-danger">{{$errors->first('text1')}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Slider Text2</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="text2" value="{{old('text2')}}">
                                            <p class="text-danger">{{$errors->first('text2')}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Slider Text3</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="text3" value="{{old('text3')}}">
                                            <p class="text-danger">{{$errors->first('text3')}}</p>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Image</label>
                                        <div class="col-lg-10">
                                            <input type="file" class="form-control dropify" name="image">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Status</label>
                                        <div class="col-lg-10 row">
                                            <div class="col-lg-2">
                                                <div class="i-checks">
                                                    <label>
                                                        <input type="radio" value="1" name="status" checked> <i></i> Enabled
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="i-checks">
                                                    <label>
                                                        <input type="radio" value="0" name="status"> <i></i> Disable
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-danger">{{$errors->first('status')}}</p>
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
