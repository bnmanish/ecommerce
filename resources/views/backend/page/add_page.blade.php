<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Page</title>
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
                    <h2>Add Page</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-content">
                                <form method="post" action="{{route('store.page')}}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Page Title</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                            <p class="text-danger">{{$errors->first('title')}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Meta Title</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="meta_title" value="{{old('meta_title')}}">
                                            <p class="text-danger">{{$errors->first('meta_title')}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Meta Keywords</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" name="meta_keywords">{{old('meta_keywords')}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Meta Description</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" name="meta_description">{{old('meta_description')}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Page Short Content</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control summernote" name="short_content" rows="10">{{old('short_content')}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Page Content</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control summernote" name="content" rows="10">{{old('content')}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Banner</label>
                                        <div class="col-lg-10">
                                            <input type="file" class="form-control dropify" name="banner">
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
