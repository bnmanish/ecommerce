<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
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
    <!-- chosen -->
    <link href="{{url('backend/css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
    <!-- chosen -->
    <!-- Toastr style -->
    <link href="{{url('backend/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        @include('backend/layouts/sidebar')

        <div id="page-wrapper" class="gray-bg">

            @include('backend/layouts/topbar')

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Setting</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-content">
                                <form method="post" action="{{route('save.website.setting',$setting->id)}}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="text-center bg-primary">
                                                <h5 class="py-2">Social Media</h5>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Facebook</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="facebook" value="{{$setting->facebook}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Instagram</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="instagram" value="{{$setting->instagram}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Twitter</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="twitter" value="{{$setting->twitter}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Google Plus</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="gplus" value="{{$setting->gplus}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">LinkedIn</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="linkedin" value="{{$setting->linkedin}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Youtube</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="youtube" value="{{$setting->youtube}}">
                                                </div>
                                            </div>

                                        </div><!-- end half -->

                                        <div class="col-md-6">

                                            <div class="text-center bg-primary">
                                                <h5 class="py-2">General</h5>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Website Title</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control blog" name="site_title" value="{{$setting->site_title}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Head Content</label>
                                                <div class="col-lg-9">
                                                    <textarea class="form-control blog" name="head_content">{{$setting->head_content}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-1 col-form-label">Logo</label>
                                                <div class="col-lg-5">
                                                    <input type="file" class="form-control dropify" name="logo" data-default-file="{{url('uploads/logo/'.$setting->logo)}}">
                                                </div>
                                                <label class="col-lg-1 col-form-label">Favicon</label>
                                                <div class="col-lg-5">
                                                    <input type="file" class="form-control dropify" name="favicon" data-default-file="{{url('uploads/favicon/'.$setting->favicon)}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                
                                            </div>

                                        </div>   <!-- end half -->

                                    </div> <!-- end row -->

                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="text-center bg-primary">
                                                <h5 class="py-2">About</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Email 1</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="email1" value="{{$setting->email1}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Email 2</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="email2" value="{{$setting->email2}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Contact 1</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="contact1" value="{{$setting->contact1}}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Contact 2</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="contact2" value="{{$setting->contact2}}">
                                                </div>
                                            </div>

                                           

                                        </div><!-- end half -->

                                        <div class="col-md-6">

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Address</label>
                                                <div class="col-lg-9">
                                                    <textarea class="form-control" name="address">{{$setting->address}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Footer Text</label>
                                                <div class="col-lg-9">
                                                    <textarea class="form-control" name="footer_text">{{$setting->footer_text}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Copyright</label>
                                                <div class="col-lg-9">
                                                    <textarea class="form-control" name="copyright">{{$setting->copyright}}</textarea>
                                                </div>
                                            </div>

                                        </div>   <!-- end half -->

                                    </div> <!-- end row -->
                                    
                                    <div class  ="form-group row">
                                        <div class="col-lg-12 text-center">
                                            <button class="btn btn-primary" type="submit">Update Setting</button>
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
    <!-- chosen -->
    <script src="{{url('backend/js/plugins/chosen/chosen.jquery.js')}}"></script>
    <!-- chosen -->
    <script src="{{url('backend/js/plugins/toastr/toastr.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            @if(Session::has('success'))
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('','{{Session::get('success')}}');
            }, 1300);
            @endif


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
            $(".chosen-select").chosen({width: "100%"}); 
        });
    </script>
</body>

</html>
