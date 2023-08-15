@extends('backend/layouts/main')
@section('title', 'Manage Coin | Crypto')
@section('content')
<!-- plugin css -->
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Course</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Course</li>
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
                        <form id="updateCoin">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="coin_name" class="form-label">Coin Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="coin_name" id="coin_name" value="{{$cdata->title ?? null}}">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="rate" class="form-label">Rate (in INR) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="rate" id="rate" value="{{$cdata->rate ?? null}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-12 course-banner">
                                            <label for="logo" class="form-label">Logo</label>
                                            <input type="file" class="form-control dropify" name="logo" id="logo" @if($cdata) data-default-file="{{url('uploads/coin/'.$cdata->logo)}}" @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="col-md-12 mb-3">
                                        <label for="meta_title" class="form-label">&nbsp;</label>
                                        <div>
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
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
            $('#updateCoin').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.update.coin') }}",
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

</script>
@endpush