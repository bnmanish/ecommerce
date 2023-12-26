@extends('backend/layouts/main')
@section('title', 'Order List | KarimaWilliams')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Order List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Order List</li>
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
                                <h4 class="card-title">Manage Orders</h4>
                            </div>
                            <div class="col-6">
                                {{--<h4 class="card-title text-end"><a href="{{route('admin.add.product')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a></h4>--}}
                            </div>
                        </div>

                        <table id="productlist-datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Order No</th>
                                    <th>User</th>
                                    <th>Grand Total</th>
                                    <th>Mode</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $dataRow)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>#{{$dataRow->order_no}}</td>
                                    <td>{{$dataRow->user->name}}-({{$dataRow->user->id}})</td>
                                    <td>{{$dataRow->grand_total}}</td>
                                    <td>{{$dataRow->mode == '2' ? 'PayUMoney' : 'COD'}}</td>
                                    <td>{{$dataRow->status == '2' ? 'Paid' : 'Unpaid'}}</td>
                                    <td>{{date('d-m-Y',strtotime($dataRow->created_at))}}</td>
                                    <td><a target='_blank' href="{{route('admin.order.invoice',$dataRow->order_no)}}"><i class="fas fa-file-invoice"></i></a></td>
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
        $('#productlist-datatable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            ajax: '{{route("admin.get.list.order")}}',
            deferLoading: '{{$datacount}}',
        });
    });

</script>
@endpush