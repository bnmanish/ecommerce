<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Slider</title>
    <link href="{{url('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/animate.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/style.css')}}" rel="stylesheet">
    <!-- Toastr style -->
    <link href="{{url('backend/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/plugins/switchery/switchery.css')}}" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        @include('backend/layouts/sidebar')
        <div id="page-wrapper" class="gray-bg">
            @include('backend/layouts/topbar')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-6">
                    <h2>Manage Slider</h2>
                </div>
                <div class="col-lg-6 text-right">
                    <a class="btn btn-sm btn-primary mt-4" href="{{route('add.slider')}}"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="ibox ">
                        
                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>title</th>
                                            <th>Image</th>
                                            <th>Sequence</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($slider as $sliderRow)
                                        <tr class="gradeX">
                                            <td>{{$i++}}</td>
                                            <td>{{$sliderRow->title}}</td>
                                            <td><img src="{{url('uploads/slider/'.$sliderRow->image)}}" width="50px;"></td>
                                            <td>{{$sliderRow->sequence}}</td>
                                            <td>
                                                @if($sliderRow->status == 1)
                                                    Enable
                                                @else
                                                    Disable
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-xs btn-primary" href="{{route('edit.slider',$sliderRow->id)}}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-xs btn-danger" href="{{route('delete.slider',$sliderRow->id)}}" onclick="return confirm('Sure! You want to delete this item!')"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sl</th>
                                            <th>title</th>
                                            <th>Image</th>
                                            <th>Sequence</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

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
    <script src="{{url('backend/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{url('backend/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Custom and plugin javascript -->
    <script src="{{url('backend/js/inspinia.js')}}"></script>
    <script src="{{url('backend/js/plugins/pace/pace.min.js')}}"></script>
    <!-- Page-Level Scripts -->
    <!-- Toastr -->
    <script src="{{url('backend/js/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{url('backend/js/plugins/switchery/switchery.js')}}"></script>
    <script>
        $(document).ready(function(){

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


            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]
            });


        });

    </script>
</body>
</html>
