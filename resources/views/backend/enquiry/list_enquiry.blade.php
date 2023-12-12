@extends('backend/layouts/main')
@section('title', 'Enquiry List | TimyShop')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Enquiry List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Enquiry List</li>
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
                                <h4 class="card-title">Manage Enquiry</h4>
                            </div>
                            {{--
                            <div class="col-6">
                                <h4 class="card-title text-end"><a href="{{route('admin.add.user')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a></h4>
                            </div>
                            --}}
                        </div>

                        <table id="userlist-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>City</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $dataRow)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$dataRow->name}}</td>
                                    <td>{{$dataRow->mobile}}</td>
                                    <td>{{$dataRow->email}}</td>
                                    <td>{{$dataRow->city}}</td>
                                    <td>{{$dataRow->message}}</td>
                                    <td>{{date('d-m-Y',strtotime($dataRow->created_at))}}</td>
                                    <td>
                                        <a href="{{route('admin.delete.enquiry',$dataRow->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Really! Do you want to delete?')"><i class='fas fa-trash'></i></a>
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
            ajax: '{{route("admin.get.enquiry.data")}}',
            deferLoading: '{{$datacount}}',
        });
    });

</script>
@endpush