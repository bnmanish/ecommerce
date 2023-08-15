@extends('backend/layouts/main')
@section('title', 'User List | DEDM')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">User List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User List</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row mb-4 border-bottom">
                            <div class="col-6">
                                <h4 class="card-title">Manage User</h4>
                            </div>
                            <div class="col-6">
                                <h4 class="card-title text-end"><a href="{{route('admin.add.user')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a></h4>
                            </div>
                        </div>

                        <table id="userlist-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>User Name</th>
                                    <th>Mobile</th>
                                    <th>Role</th>
                                    <th>Email<br>Verified</th>
                                    <th>Mobile<br>Verified</th>
                                    <th>Register Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $dataRow)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$dataRow->name}}</td>
                                    <td>{{$dataRow->email}} @if($dataRow->email_verified == '1')<i class="fas fa-check-circle"></i> @endif</td>
                                    <td>{{$dataRow->user_name}}</td>
                                    <td>{{$dataRow->mobile}}</td>
                                    <td>{{$dataRow->role}}</td>
                                    <td>{{$dataRow->email_verified == '1' ? 'Yes' : 'No'}}</td>
                                    <td>{{$dataRow->mobile_verified == '1' ? 'Yes' : 'No'}}</td>
                                    <td>{{date('d-m-Y',strtotime($dataRow->created_at))}}</td>
                                    <td>{{$dataRow->status == '1' ? 'Enable' : 'No'}}</td>
                                    <td>
                                        <a href="{{route('admin.edit.user',$dataRow->id)}}" class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a>&nbsp;<a href="{{route('admin.delete.user',$dataRow->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Really! Do you want to delete?')"><i class='fas fa-trash'></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@stop
@push('scripts')
<script type="text/javascript">

    $(document).ready(function () {
        $('#userlist-datatable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            ajax: '{{route("admin.get.user.data")}}',
            deferLoading: '{{$datacount}}',
        });
    });

</script>
@endpush

