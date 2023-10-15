@extends('backend/layouts/main')
@section('title', 'Settings | TimyShop')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Settings</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
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
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Greate!</strong> {{Session::get('success')}}
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('admin.update.setting',['id'=>@$data->id])}}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Primary Contact</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="primary_contact" value="{{@$data->primary_contact}}">
                                    @if($errors->first('primary_contact'))
                                    <p class="text-danger mb-0">{{ $errors->first('primary_contact') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Secondary Contact</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="secondary_contact" value="{{@$data->secondary_contact}}">
                                    @if($errors->first('secondary_contact'))
                                    <p class="text-danger mb-0">{{ $errors->first('secondary_contact') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Primary Email</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="primary_email" value="{{@$data->primary_email}}">
                                    @if($errors->first('primary_email'))
                                    <p class="text-danger mb-0">{{ $errors->first('primary_email') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Secondary Email</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="secondary_email" value="{{@$data->secondary_email}}">
                                    @if($errors->first('secondary_email'))
                                    <p class="text-danger mb-0">{{ $errors->first('secondary_email') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Primary Address</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="primary_address" value="{{@$data->primary_address}}">
                                    @if($errors->first('primary_address'))
                                    <p class="text-danger mb-0">{{ $errors->first('primary_address') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Secondary Address</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="secondary_address" value="{{@$data->secondary_address}}">
                                    @if($errors->first('secondary_address'))
                                    <p class="text-danger mb-0">{{ $errors->first('secondary_address') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Copyrights</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="copyrights" value="{{@$data->copyrights}}">
                                    @if($errors->first('copyrights'))
                                    <p class="text-danger mb-0">{{ $errors->first('copyrights') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Facebook</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="facebook" value="{{@$data->facebook}}">
                                    @if($errors->first('facebook'))
                                    <p class="text-danger mb-0">{{ $errors->first('facebook') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Instagram</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="instagram" value="{{@$data->instagram}}">
                                    @if($errors->first('instagram'))
                                    <p class="text-danger mb-0">{{ $errors->first('instagram') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Twitter</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="twitter" value="{{@$data->twitter}}">
                                    @if($errors->first('twitter'))
                                    <p class="text-danger mb-0">{{ $errors->first('twitter') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Linkedin</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="linkedin" value="{{@$data->linkedin}}">
                                    @if($errors->first('linkedin'))
                                    <p class="text-danger mb-0">{{ $errors->first('linkedin') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Youtube</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="youtube" value="{{@$data->youtube}}">
                                    @if($errors->first('youtube'))
                                    <p class="text-danger mb-0">{{ $errors->first('youtube') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label"> Site Logo </label>
                                <div class="col-md-10">
                                    <input class="form-control dropify" type="file" name="site_logo" @if(@$data->site_logo) data-default-file="{{url('uploads/setting/'.$data->site_logo)}}" @endif>
                                    @if($errors->first('site_logo'))
                                    <p class="text-danger mb-0">{{ $errors->first('site_logo') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label"> Site Logo2 </label>
                                <div class="col-md-10">
                                    <input class="form-control dropify" type="file" name="site_logo2" @if(@$data->site_logo2) data-default-file="{{url('uploads/setting/'.$data->site_logo2)}}" @endif>
                                    @if($errors->first('site_logo2'))
                                    <p class="text-danger mb-0">{{ $errors->first('site_logo2') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label"> Favicon </label>
                                <div class="col-md-10">
                                    <input class="form-control dropify" type="file" name="favicon" @if(@$data->favicon) data-default-file="{{url('uploads/setting/'.$data->favicon)}}" @endif>
                                    @if($errors->first('favicon'))
                                    <p class="text-danger mb-0">{{ $errors->first('favicon') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label"> Head Content </label>
                                <div class="col-md-10">
                                    <textarea name="head_content" class="form-control" rows="5">{{@$data->head_content}}</textarea>
                                    @if($errors->first('head_content'))
                                    <p class="text-danger mb-0">{{ $errors->first('head_content') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="offset-md-2">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>

                        <hr>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
@stop