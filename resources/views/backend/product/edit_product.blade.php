<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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
                    <h2>Edit Product</h2>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-content">
                                <form method="post" action="{{route('store.edit.product',$product->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Product Name</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control pro" name="product_name" value="{{$product->product}}">
                                            <p class="text-danger">{{$errors->first('product_name')}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">URL</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control url" name="url" value="{{$product->url}}">
                                            <p class="text-danger">{{$errors->first('url')}}</p>
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn btn-primary genrate" type="button">Generate URL</button>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Price</label>
                                        <div class="col-lg-10">
                                            <input type="number" class="form-control" name="price" value="{{$product->price}}">
                                            <p class="text-danger">{{$errors->first('price')}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Category</label>
                                        <div class="col-lg-10">
                                            <select class="form-control select2_demo_1 form-control cat" name="category" value="{{old('category')}}">
                                                <option value="">Select Category</option>
                                                @foreach($category as $categoryRow)
                                                <option value="{{$categoryRow->id}}" @php if($categoryRow->id == $product->category){echo "selected";} @endphp>{{$categoryRow->category}}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger">{{$errors->first('category')}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Subcategory</label>
                                        <div class="col-lg-10">
                                            <select id="subcat" class="form-control select2_demo_1 form-control subcat" name="subcategory" value="{{old('subcategory')}}">
                                                <option value="">Select Subcategory</option>
                                                @foreach($subcat as $subcatRow)
                                                <option value="{{$subcatRow->id}}" @php if($subcatRow->id == $product->subcat){echo "selected";} @endphp>{{$subcatRow->sub_category}}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger">{{$errors->first('subcategory')}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Meta Title</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="meta_title" value="{{$product->meta_title}}">
                                            <p class="text-danger">{{$errors->first('meta_title')}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Meta Keywords</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" name="meta_keywords">{{$product->meta_keywords}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Meta Description</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" name="meta_description">{{$product->meta_description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Description</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control summernote" name="description" rows="10">{{$product->description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Image</label>
                                        <div class="col-lg-10">
                                            <input type="file" class="form-control dropify" name="image" data-default-file="{{url('uploads/product/'.$product->image)}}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Status</label>
                                        <div class="col-lg-10 row">
                                            <div class="col-lg-2">
                                                <div class="i-checks">
                                                    <label>
                                                        <input type="radio" value="1" name="status" @php if($product->status == 1){echo "checked";} @endphp> <i></i> Enabled
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="i-checks">
                                                    <label>
                                                        <input type="radio" value="0" name="status" @php if($product->status == 0){echo "checked";} @endphp> <i></i> Disable
                                                    </label>
                                                </div>
                                            </div>
                                            <p class="text-danger">{{$errors->first('status')}}</p>
                                        </div>
                                        <p class="text-danger">{{$errors->first('status')}}</p>
                                    </div>

                                    <div class  ="form-group row">
                                        <div class="offset-md-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Update</button>
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

            $('.genrate').click(function(){
                var pro = $('.pro').val();
                if(pro != ''){
                    var url = pro.split(' ').join('-').toLowerCase();
                    $('.url').val(url);
                }else{
                    alert('Please enter Product Name');
                }
            });

            $(".cat").change(function(){
                var cat = $(this).val();

                $.ajax('{{route("get.subcat.by.catid")}}', {
                    type: 'get',
                    data: { catid:cat},
                    success: function (response) {
                        console.log(response);
                        var l = response.data.length;
                        var drplist = "<option value=''>Select Subcategory</option>";
                        for(var i=0; i<l; i++){
                            var id = response.data[i].id;
                            var subcat = response.data[i].sub_category;
                            drplist = drplist+"<option value='"+id+"'>"+subcat+"</option>";
                        }
                        $('#subcat').html(drplist);
                    }
                });

            });

        });
    </script>
    <script>
        $(document).ready(function(){
            $('.dropify').dropify();
            $('.summernote').summernote();
            $(".select2_demo_1").select2();
        });
    </script>

</body>

</html>
