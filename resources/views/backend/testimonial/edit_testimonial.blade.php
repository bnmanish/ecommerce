@extends('backend/layouts/main')
@section('title', 'Edit Testimonial | DEDM')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Testimonial</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Testimonial</li>
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
                        <form id="testimonialForm">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="name" value="{{$data->name}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Profession <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="profession" value="{{$data->profession}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Gender <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <select class="form-control" name="gender">
                                        <option value="">--Select--</option>
                                        <option @if($data->gender == '1') selected  @endif value="1">Male</option>
                                        <option @if($data->gender == '2') selected  @endif value="2">Female</option>
                                        <option @if($data->gender == '0') selected  @endif value="0">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="title" value="{{$data->title}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Description <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <textarea class="form-control texteditor" type="text" name="description">{{$data->description}}</textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Image </label>
                                <div class="col-md-10">
                                    <input class="form-control dropify" type="file" name="image" data-default-file="{{url('uploads/testimonial/'.$data->image)}}">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Status <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="status" switch="bool" name="status" @if($data->status == '1') checked @endif>
                                    <label class="form-label" for="status" data-on-label="Enabled" data-off-label="Disabled" style="width:80px;"></label>
                                </div>
                            </div>

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
        $('#testimonialForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('admin.edit.store.testimonial',$data->id) }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
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
</script>
@endpush