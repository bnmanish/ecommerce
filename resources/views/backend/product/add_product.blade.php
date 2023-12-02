@extends('backend/layouts/main')
@section('title', 'Add Product | TimyShop')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Product</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Greate!</strong> {{Session::get('success')}}
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="validation-message"></div>
                        <form id="categoryForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="title" value="{{old('title')}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Slug <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="slug" value="{{old('slug')}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Code <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="code" value="{{old('code')}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Category</label>
                                <div class="col-md-10">
                                    <select class="form-control" type="text" name="category">
                                        <option value="">--select--</option>
                                        @foreach($category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Price <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="price" value="{{old('price')}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Discount Price</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="discount_price" value="{{old('discount_price')}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Meta Title</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="meta_title" value="{{old('meta_title')}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Meta Keywords</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="meta_keywords" value="{{old('meta_keywords')}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Meta Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" type="text" name="meta_description" value="{{old('meta_description')}}"></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Short Description </label>
                                <div class="col-md-10">
                                    <textarea class="form-control texteditor" type="text" name="short_description" value="{{old('short_description')}}"></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control texteditor" type="text" name="description" value="{{old('description')}}"></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Other Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control texteditor" type="text" name="other_description" value="{{old('other_description')}}"></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Popular </label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="popular" switch="bool" name="popular">
                                    <label class="form-label" for="popular" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">New </label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="new" switch="bool" name="new">
                                    <label class="form-label" for="new" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">featured </label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="featured" switch="bool" name="featured">
                                    <label class="form-label" for="featured" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Sale </label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="sale" switch="bool" name="sale">
                                    <label class="form-label" for="sale" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Status </label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="status" switch="bool" name="status">
                                    <label class="form-label" for="status" data-on-label="Enabled" data-off-label="Disabled" style="width:80px;"></label>
                                </div>
                            </div>


                            <!-- Add Image for product -->
                            <div id="inputContainer">
                                <hr>
                                <div class="main-clonediv row">
                                    <div class="col-6">
                                        <div class="">
                                            <label class="col-form-label">Image<span class="text-danger">*</span></label>
                                            <input class="form-control dropify" type="file" name="image[]">
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <label class="col-form-label">&nbsp</label>
                                        <div>
                                            <button type="button" class="btn btn-danger remove-btn">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <button type="button" class="btn btn-danger" onclick="addInput()">Add Image</button>
                            </div>

                            <!-- add image -->


                            <div class="mb-3 row">
                                <div class="col-md-10 offset-md-2">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
@stop
@push('scripts')
<script>

    $(document).ready(function() {
        $('#categoryForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('admin.store.product') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if(response.status == true){
                        $('.loader-overlay').show();
                        location.reload();
                    }else{
                        var message = "";
                        $.each(response.errors, function( index, value ) {
                            message = message+"<div class='alert alert-danger alert-dismissible fade show' role='alert'><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><strong>Error! </strong>"+value+"</div>";
                        });
                        $('.validation-message').html(message);
                         $("html, body").animate({ scrollTop: 0 }, "slow");
                    }
                },
            });
        });
    });


    // js for clone image section
    var a=1;
    function addInput() {
        const inputContainer = document.getElementById('inputContainer');
        const newInput = document.createElement('div');
        newInput.classList.add('mb-3');
        newInput.innerHTML = `<div class="main-clonediv row"><div class="col-6"><div class=""><label class="col-form-label">Image<span class="text-danger">*</span></label><input class="form-control dropify" type="file" name="image[]" required></div></div><div class="col-2"><label class="col-form-label">&nbsp</label><div><button type="button" class="btn btn-danger remove-btn">Remove</button></div></div></div>`;
        inputContainer.appendChild(newInput);
        // load js for cloned editor
        0 <  $('.dropify').dropify();
        // load js for cloned input file dropify
    }
    $('#inputContainer').on('click', '.remove-btn', function() {
        $(this).closest('.main-clonediv').remove();
    });
    // js for clone image section
</script>
@endpush