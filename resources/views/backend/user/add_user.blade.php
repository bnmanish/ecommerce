@extends('backend/layouts/main')
@section('title', 'Add User | DEDM')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add User</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add User</li>
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
                {{--
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Error!</strong> {{$error}}
                    </div>
                    @endforeach
                @endif
                --}}
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('admin.store.user')}}">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="name" value="{{old('name')}}">
                                    @if($errors->first('name'))
                                    <p class="text-danger mb-0">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Mobile</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="mobile" value="{{old('mobile')}}">
                                    @if($errors->first('mobile'))
                                    <p class="text-danger mb-0">{{ $errors->first('mobile') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Email <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="email" name="email" value="{{old('email')}}">
                                    @if($errors->first('email'))
                                    <p class="text-danger mb-0">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">User Name <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="user_name" value="{{old('user_name')}}">
                                    @if($errors->first('user_name'))
                                    <p class="text-danger mb-0">{{ $errors->first('user_name') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Password <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="password" name="password" value="{{old('password')}}">
                                    @if($errors->first('password'))
                                    <p class="text-danger mb-0">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Role <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <select class="form-select" name="role">
                                        <option value="user" @if(old('role') == 'user') selected @endif>User</option>
                                        <option value="admin" @if(old('role') == 'admin') selected @endif>Admin</option>
                                    </select>
                                    @if($errors->first('role'))
                                    <p class="text-danger mb-0">{{ $errors->first('role') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Email Verified</label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="emailstatus" switch="bool" name="emailverified">
                                    <label class="form-label" for="emailstatus" data-on-label="Yes" data-off-label="No"></label>
                                    @if($errors->first('emailverified'))
                                    <p class="text-danger mb-0">{{ $errors->first('emailverified') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Mobile Verified</label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="mobilestatus" switch="bool" name="mobileverified">
                                    <label class="form-label" for="mobilestatus" data-on-label="Yes" data-off-label="No"></label>
                                    @if($errors->first('mobileverified'))
                                    <p class="text-danger mb-0">{{ $errors->first('mobileverified') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Status</label>
                                <div class="col-md-10">
                                    <input class="form-check form-switch" type="checkbox" id="status" switch="bool" name="status">
                                    <label class="form-label" for="status" data-on-label="Enabled" data-off-label="Disabled" style="width:80px;"></label>
                                    @if($errors->first('status'))
                                    <p class="text-danger mb-0">{{ $errors->first('status') }}</p>
                                    @endif
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