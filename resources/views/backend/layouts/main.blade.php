<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{url('uploads/setting/'.@settings()->favicon)}}">
        
        <!-- jvectormap -->
        <link href="{{url('assets/backend/libs/jqvmap/jqvmap.min.css')}}" rel="stylesheet" />

        <!-- Bootstrap Css -->
        <link href="{{url('assets/backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{url('assets/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{url('assets/backend/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <!-- dropify css -->
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/dropify/dropify.min.css')}}">

        <!-- DataTables -->
        <link href="{{url('assets/backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{url('assets/backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- date picker -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <!-- custom css -->
        <link rel="stylesheet" type="text/css" href="{{url('assets/backend/css/custom_style.css')}}" />
        <!-- select2 dropdown -->
        <link href="{{url('assets/backend/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">
        @stack('css')
    </head>

    <body data-sidebar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            <!-- === topbar === -->
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box text-center">
                            <a href="{{route('admin.dashboard')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{url('uploads/setting/'.@settings()->favicon)}}" alt="KarimaWilliams" height="50">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{url('uploads/setting/'.@settings()->site_logo)}}" alt="KarimaWilliams" height="60">
                                </span>
                            </a>

                            <a href="{{route('admin.dashboard')}}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{url('uploads/setting/'.@settings()->favicon)}}" alt="KarimaWilliams" height="50">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{url('uploads/setting/'.@settings()->site_logo)}}" alt="KarimaWilliams" height="60">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                        <!-- App Search-->
                        <!-- <form class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="ri-search-line"></span>
                            </div>
                        </form> -->
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="mb-3 m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ms-1" title="Visit Website">
                            <a href="{{route('home')}}" target="_blank">
                                <button type="button" class="btn header-item noti-icon waves-effect">
                                    <i class="ri-computer-line"></i>
                                </button>
                            </a>
                        </div>

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{url('assets/backend/images/users/avatar-2.jpg')}}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">{{Auth::user()->name}} ({{Auth::user()->role}})</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item text-danger" href="{{route('admin.logout')}}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                        <!-- <div class="dropdown d-inline-block">
                            <a href="#">
                                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                    <i class="mdi mdi-cog"></i>
                                </button>
                            </a>
                        </div> -->

                    </div>
                </div>
            </header>
            <!-- === topbar === -->
            <!-- ========== Left Sidebar Start ========== -->
            
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="{{route('admin.dashboard')}}" class="waves-effect">
                                    <i class="fas fa-home"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.list.user')}}" class="waves-effect">
                                    <i class="fas fa-user"></i>
                                    <span>Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.list.slider')}}" class="waves-effect">
                                    <i class="fas fa-sliders-h"></i>
                                    <span>Slider</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.list.category')}}" class="waves-effect">
                                    <i class="ri-flag-line"></i>
                                    <span>Categories</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.list.product')}}" class="waves-effect">
                                    <i class="ri-product-hunt-line"></i>
                                    <span>Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('admin.list.order')}}" class="waves-effect">
                                    <i class="ri-shopping-cart-2-line"></i>
                                    <span>Orders</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('admin.list.page')}}" class="waves-effect">
                                    <i class=" ri-file-list-line"></i>
                                    <span>Pages</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('admin.list.additional.page')}}" class="waves-effect">
                                    <i class="ri-file-list-3-line"></i>
                                    <span>Additional Pages</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{route('admin.list.testimonial')}}" class="waves-effect">
                                    <i class="ri-shield-user-line"></i>
                                    <span>Testimonial</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('admin.list.subscriber')}}" class="waves-effect">
                                    <i class="ri-team-fill"></i>
                                    <span>Subscriber</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('admin.list.enquiry')}}" class="waves-effect">
                                    <i class="ri-contacts-book-line"></i>
                                    <span>Contact Enquiry</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('admin.manage.setting')}}" class="waves-effect">
                                    <i class="ri-settings-2-line"></i>
                                    <span>Setting</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>

            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                @yield('content')
                
                <!-- End Page-content -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 text-center">
                                {!!@settings()->copyrights!!}
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        <!-- loader -->
        <div class="overlay loader-overlay">
            <div class="overlay__inner">
                <div class="overlay__content"><span class="spinner"></span></div>
            </div>
        </div>
        <!-- loader -->
        <!-- JAVASCRIPT -->
        <script src="{{url('assets/backend/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/node-waves/waves.min.js')}}"></script>

        <!-- apexcharts js -->
        <script src="{{url('assets/backend/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- jquery.vectormap map -->
        <script src="{{url('assets/backend/libs/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

        <script src="{{url('assets/backend/js/pages/dashboard.init.js')}}"></script>
        <!--tinymce js-->
        <script src="{{url('assets/backend/libs/tinymce/tinymce.min.js')}}"></script>
        <!-- Dropify -->
        <script type="text/javascript" src="{{url('assets/backend/dropify/dropify.min.js')}}"></script>
        <script src="{{url('assets/backend/js/app.js')}}"></script>

        <!-- Required datatable js -->
        <script src="{{url('assets/backend/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{url('assets/backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{url('assets/backend/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{url('assets/backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{url('assets/backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatable init js -->
        <script src="{{url('assets/backend/js/pages/datatables.init.js')}}"></script>
        <!-- date picker -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <!-- select2 dropdown -->
        <script src="{{url('assets/backend/libs/select2/js/select2.min.js')}}"></script>
        <script src="{{url('assets/backend/js/pages/form-advanced.init.js')}}"></script>
        <script>
            $('.dropify').dropify();
            $(document).ready(function () {
                0 < $(".texteditor").length &&
                    tinymce.init({
                        selector: "textarea.texteditor",
                        height: 300,
                        plugins: [
                            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table contextmenu directionality emoticons template paste textcolor",
                        ],
                        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                        style_formats: [
                            { title: "Bold text", inline: "b" },
                            { title: "Red text", inline: "span", styles: { color: "#ff0000" } },
                            { title: "Red header", block: "h1", styles: { color: "#ff0000" } },
                            { title: "Example 1", inline: "span", classes: "example1" },
                            { title: "Example 2", inline: "span", classes: "example2" },
                            { title: "Table styles" },
                            { title: "Table row 1", selector: "tr", classes: "tablerow1" },
                        ],
                    });
            });
        </script>
        @stack('scripts')
    </body>
</html>
