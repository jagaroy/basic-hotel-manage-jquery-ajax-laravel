<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public') }}/adminlte310/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('public') }}/adminlte310/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="{{ url('public') }}/new_custom/chosen.min.css">

    <!-- jQuery -->
    <script src="{{ url('public') }}/adminlte310/plugins/jquery/jquery.min.js"></script>

    <script src="{{ url('public') }}/js/popper.min.js"></script>
    <script src="{{ url('public') }}/js/jquery-ui-1.13.1.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('public') }}/adminlte310/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ url('public') }}/new_custom/bootstrap-datepicker.standalone.min.css" />
    <script src="{{ url('public') }}/new_custom/bootstrap-datepicker.min.js"></script>
    <style type="text/css">
        .form-inline label {
            justify-content: right !important;
        }

        .form-inline textarea {
            padding: 4px;
        }

        @media only screen and (min-width: 600px) {

            .form-inline .form-control {
                width: 60%;
            }
        }

    </style>
    <!--Notify JS [ RECOMMENDED ]-->
    <script src="{{ url('public') }}/js/notify.js"></script>

    <script src="{{ url('public') }}/new_custom/chosen.jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var base_url = "{{ url('public') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("errorThrown", errorThrown);
                    console.log("textStatus", textStatus);
                    console.log("jqXHR", jqXHR);
                    if (jqXHR.status == 419) {
                        // $.notify('Session Expired! Refreshing...', 'error');
                        setTimeout(function() {

                            location.reload();
                        }, 1000);
                    }
                    if (jqXHR.status == 401) {
                        // $.notify('Unauthenticated! Refreshing...', 'error');
                        setTimeout(function() {

                            location.reload();
                        }, 1000);
                    }

                }
            });

            $('.chosen').chosen();
            $('.datepicker').datepicker({
                format: "dd-mm-yyyy"
            });
        });
    </script>
    <style>
        .chosen-container-single {
            width: 60% !important;
        }

        #data_table_info {
            float: left;
        }

        .dt-buttons {
            margin-bottom: 3px;
            margin-left: 1%;
        }

        #data_table_length {
            float: left;
        }

        #data_table_filter {
            float: right;
        }

        .buttons-html5 {
            padding: 0.15rem 0.5rem;
            font-size: 0.7875rem;
            line-height: 1;
            border-radius: 0.2rem;
        }

        .card-header {
            padding: .4rem 1.25rem;
        }

        .card-header-btn {
            margin-right: 5px;
            margin-left: 15px;
        }

        @media print {

            /* for title */
            body {
                text-align: center !important;
            }
        }

        .dt-buttons .btn {
            margin-left: 5px !important;
            padding: .18rem .55rem;
            font-size: 14px;
        }

        .img-circle {
            border-radius: 10%;
        }

    </style>

    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ url('public') }}/adminlte310/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ url('public') }}/adminlte310/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ url('public') }}/adminlte310/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- DataTables  & Plugins -->
    <script src="{{ url('public') }}/adminlte310/plugins/datatables/jquery.dataTables.min.js" defer></script>
    <script src="{{ url('public') }}/adminlte310/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="{{ url('public') }}/adminlte310/plugins/datatables-responsive/js/dataTables.responsive.min.js" defer>
    </script>
    <script src="{{ url('public') }}/adminlte310/plugins/datatables-responsive/js/responsive.bootstrap4.min.js" defer>
    </script>
    <script src="{{ url('public') }}/adminlte310/plugins/datatables-buttons/js/dataTables.buttons.min.js" defer></script>
    <script src="{{ url('public') }}/adminlte310/plugins/datatables-buttons/js/buttons.bootstrap4.min.js" defer></script>
    <script src="{{ url('public') }}/adminlte310/plugins/jszip/jszip.min.js" defer></script>
    <script src="{{ url('public') }}/adminlte310/plugins/pdfmake/pdfmake.min.js" defer></script>
    <script src="{{ url('public') }}/adminlte310/plugins/pdfmake/vfs_fonts.js" defer></script>
    <script src="{{ url('public') }}/adminlte310/plugins/datatables-buttons/js/buttons.html5.min.js" defer></script>
    <script src="{{ url('public') }}/adminlte310/plugins/datatables-buttons/js/buttons.print.min.js" defer></script>
    <script src="{{ url('public') }}/adminlte310/plugins/datatables-buttons/js/buttons.colVis.min.js" defer></script>
    <script src="{{ url('public') }}/adminlte310/plugins/datatables-select/js/dataTables.select.min.js" defer></script>
    <script>
        $(document).ready(function() {
            // $.fn.dataTable.ext.errMode = 'throw';
        })
    </script>
    <link href="{{ url('public') }}/files/css/fileinput.min.css" rel="stylesheet" type="text/css" />
    <script src="{{ url('public') }}/files/js/fileinput.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('public') }}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item dropdown user-menu">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ url('public'. Auth::user()->image) }}"
                            class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="{{ url('public'. Auth::user()->image) }}"
                                class="img-circle elevation-2" alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>Member since {{ Auth::user()->created_at }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="{{ url('my_profile') }}" class="btn btn-info btn-flat">Profile</a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="btn btn-warning btn-flat-right">
                                <i class="fas fa-power-off"></i> Sign out
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                @endguest
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link">
                <img src="{{ url('public') }}/adminlte310/dist/img/hm.jpg" alt="Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="{{ url('/') }}"
                                class="nav-link {{ Request::is('/') || Request::is('home*') || Request::is('home') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @if (hasPermission('BookingController', 'index'))
                            <li class="nav-item">
                                <a href="{{ url('bookings') }}"
                                    class="nav-link {{ Request::is('bookings*') || Request::is('booking*') || Request::is('booking') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Booking
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('CustomerController', 'index'))
                            <li class="nav-item">
                                <a href="{{ url('customers') }}"
                                    class="nav-link {{ Request::is('customers*') || Request::is('customer*') || Request::is('customer') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Customers
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('ItemtypeController', 'index'))
                            <li class="nav-item">
                                <a href="{{ url('itemtypes') }}"
                                    class="nav-link {{ Request::is('itemtypes*') || Request::is('itemtype*') || Request::is('itemtype') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-sitemap"></i>
                                    <p>
                                        Itemtype
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('ItemController', 'index'))
                            <li class="nav-item">
                                <a href="{{ url('items') }}"
                                    class="nav-link {{ Request::is('items*') || Request::is('item') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-sitemap"></i>
                                    <p>
                                        Items
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('OrderController', 'order'))
                            <li class="nav-item">
                                <a href="{{ url('orders') }}"
                                    class="nav-link {{ Request::is('orders*') || Request::is('order*') || Request::is('order') ? 'active' : '' }}">
                                    <i class="nav-icon fab fa-first-order"></i>
                                    <p>
                                        Order
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('ExpenseController', 'expense'))
                            <li class="nav-item">
                                <a href="{{ url('expenses') }}"
                                    class="nav-link {{ Request::is('expenses*') || Request::is('expense*') || Request::is('expense') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-money-bill-alt"></i>
                                    <p>
                                        Expense
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('PaymentController', 'payment'))
                            <li class="nav-item">
                                <a href="{{ url('payments') }}"
                                    class="nav-link {{ Request::is('payments*') || Request::is('payment*') || Request::is('payment') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-money-bill-alt"></i>
                                    <p>
                                        Payment
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('RoomtypesController', 'roomtypes'))
                            <li class="nav-item">
                                <a href="{{ url('roomtypes') }}"
                                    class="nav-link {{ Request::is('roomtypess*') || Request::is('roomtypes*') || Request::is('roomtypes') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Roomtypes
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('RoomController', 'room'))
                            <li class="nav-item">
                                <a href="{{ url('rooms') }}"
                                    class="nav-link {{ Request::is('rooms*') || Request::is('room') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Room
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('RoleController', 'index'))
                            <li class="nav-item">
                                <a href="{{ url('roles') }}"
                                    class="nav-link {{ Request::is('roles*') || Request::is('role*') || Request::is('role') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-chair"></i>
                                    <p>
                                        Roles
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('PermissionController', 'index'))
                            <li class="nav-item">
                                <a href="{{ url('permissions') }}"
                                    class="nav-link {{ Request::is('permissions*') || Request::is('permission*') || Request::is('permission') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-universal-access"></i>
                                    <p>
                                        Permissions
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('UserController', 'index') || Auth::user()->type == 'superadmin')
                            <li class="nav-item">
                                <a href="{{ url('users') }}"
                                    class="nav-link {{ Request::is('users*') || Request::is('user*') || Request::is('user') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Users
                                    </p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <p>
                                        &nbsp;
                                    </p>
                                </a>
                            </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- /.content -->
            @include('misc/notification')

            @yield('content')

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Jagabandhu Roy</b> .
            </div>
            <strong>&copy; {{ date('Y') }} <a href="#">Digit Web Software</a>.</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    {{-- confirm box --}}
    {{-- <div class="modal fade" id="confirm-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="confirm_title"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="" class="col-sm-4 mr-2">&nbsp;</label>
                            <button class="btn btn-sm btn-primary w-25" type="submit"> Ok </button>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                            <label for="" class="col-sm-4 mr-2">&nbsp;</label>
                            <button class="btn btn-sm btn-danger w-25" type="submit"> Cancel </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            confirmCheck(){
                $('#confirm-modal').modal('show');
            }
        });
    </script> --}}

    {{-- <button class="btn btn-danger " data-toggle="modal" data-target="#delete-modal">Confirm Delete</button> --}}

    <div class="container d-flex justify-content-center">
        <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content border-0">
                    <div class="modal-body p-0">
                        <div class="card border-0 p-sm-3 p-2 justify-content-center">
                            <div class="card-header pb-0 bg-white border-0 ">
                                <div class="row">
                                    <div class="col ml-auto"><button type="button" class="close"
                                            data-dismiss="modal" aria-label="Close"> <span
                                                aria-hidden="true">&times;</span> </button></div>
                                </div>
                                <p class="font-weight-bold mb-2"> Are you sure you wanna delete this ?</p>
                                <p class="text-muted "> Click cancel button to cancel.</p>
                            </div>
                            <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                                <div class="row justify-content-end no-gutters">
                                    <div class="col-auto"><button type="button" class="btn btn-light text-muted"
                                            data-dismiss="modal">Cancel</button></div>
                                    <div class="col-auto"><button type="button" id="delete-action"
                                            class="btn btn-danger px-4" data-dismiss="modal">Delete</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- confirm box ends --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '.delete-ajax', function(event) {
                event.preventDefault();

                $('#delete-action').removeData('url');
                $('#delete-action').removeData('id');
                var url = $(this).data('url');
                var id = $(this).data('id');
                $('#delete-action').data('url', url);
                $('#delete-action').data('id', id);
                $('#delete-modal').modal('show');
            });
            $(document).on('click', '#delete-action', function(event) {
                event.preventDefault();

                var url = $(this).data('url');
                var id = $(this).data('id');
                var _token = '{{ csrf_token() }}';
                $.ajax({
                    url: url,
                    type: "DELETE",
                    data: {
                        '_token': _token
                    },
                    success: function(data) {
                        $.notify(data.message, data.status);
                        $('#delete-modal').modal('hide');
                        $('.row_' + id).remove();
                        location.reload();
                    }
                });
            });
        });
    </script>

    <!-- AdminLTE App -->
    <script src="{{ url('public') }}/adminlte310/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('public') }}/adminlte310/dist/js/demo.js"></script>

    {{-- Notification --}}
    @if (!empty($success))
        <script type="text/javascript">
            $(function() {
                $.notify("{{ $success }}", {
                    globalPosition: 'top right',
                    className: 'success'
                });
            });
        </script>
    @endif

    @if (session()->has('success'))
        <script type="text/javascript">
            $(function() {
                $.notify("{{ session()->get('success') }}", {
                    globalPosition: 'top right',
                    className: 'success'
                });
            });
        </script>
    @endif

    @if (session()->has('info'))
        <script type="text/javascript">
            $(function() {
                $.notify("{{ session()->get('info') }}", {
                    globalPosition: 'top right',
                    className: 'info'
                });
            });
        </script>
    @endif

    @if (session()->has('error'))
        <script type="text/javascript">
            $(function() {
                $.notify("{{ session()->get('error') }}", {
                    globalPosition: 'top right',
                    className: 'error'
                });
            });
        </script>
    @endif

    @if (session()->has('warning'))
        <script type="text/javascript">
            $(function() {
                $.notify("{{ session()->get('warning') }}", {
                    globalPosition: 'top right',
                    className: 'warn'
                });
            });
        </script>
    @endif



</body>

</html>
