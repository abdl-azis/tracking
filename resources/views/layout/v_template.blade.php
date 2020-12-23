<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tracking | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('assets/')}}/plugins/daterangepicker/daterangepicker.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{asset('assets/')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/')}}/dist/css/adminlte.min.css">



</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper bg-light">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="/" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">


                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <div class="image">
                    <img src="{{asset('assets/')}}/dist/img/Logoadidata.jpg" class="img-thumbnail" alt="AdminLTE Logo">
                </div>
            </a>
            <!-- <a href="{{asset('assets/')}}/index3.html" class="brand-link">
                <img src="{{asset('assets/')}}/dist/img/Logoadidata.jpg" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">PT. Adidata</span>
            </a> -->

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('assets/')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->

                @include('layout.v_nav')

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper ">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('title')</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->

            <!-- /.content-wrapper -->


        </div>
        @include('layout.v_foot')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('assets/')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="{{asset('assets/')}}/plugins/datatables/jquery.dataTables.js"></script>
    <script src="{{asset('assets/')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/')}}/plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="{{asset('assets/')}}/plugins/moment/moment.min.js"></script>
    <script src="{{asset('assets/')}}/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="{{asset('assets/')}}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('assets/')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="{{asset('assets/')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/')}}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('assets/')}}/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
    $(function() {
        $("#example1").DataTable();
        //signdate
        $('#contractsigndate').datetimepicker({
            useCurrent: false,
            //disabled: true,
            format: 'YYYY-MM-DD',
        });
        //startdate
        $('#startdate').datetimepicker({
            useCurrent: false,
            format: 'YYYY-MM-DD'
        });
        //enddate
        $('#enddate').datetimepicker({
            useCurrent: false,
            format: 'YYYY-MM-DD'
        });
    });
    </script>
    <script type="text/javascript">
    var i = 0;
    $("#add-btn").click(function() {
        ++i;
        $("#dynamicProgress").append('<tr><td><input type="text" name="moreFields[' + i +
            '][nama]" placeholder="Enter nama" class="form-control" /></td><td><input type="text" name="moreFields[' +
            i +
            '][per_invoice]" placeholder="Enter per_invoice" class="form-control" /></td><td><a type="button" class="btn btn-danger remove-tr">-</a></td></tr>'
        );
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
    </script>

    <script type="text/javascript">
    var i = 0;
    $("#add-btnCost").click(function() {
        ++i;
        $("#dynamicCosting").append('<tr><td><input type="text" name="moreFields[' + i +
            '][nama_cost]" placeholder="Enter nama" class="form-control" /></td><td><input type="text" name="moreFields[' +
            i +
            '][desc_cost]" placeholder="Enter desc" class="form-control" /></td><td><input type="text" name="moreFields[' +
            i +
            '][cost]" placeholder="Enter cost" class="form-control" /></td><td><a type="button" class="btn btn-danger remove-tr">-</a></td></tr>'
        );
    });
    $(document).on('click', '.removeCost-tr', function() {
        $(this).parents('tr').remove();
    });
    </script>
    <script>
    function myFunction() {
        var x = document.getElementById("contra").value;
        if (x) {
            //document.getElementById("demo").innerHTML = "You selected: " + x;
            document.getElementById("demo").style.display = "none";
        } else {
            //document.getElementById("demo").innerHTML = "";
            document.getElementById("demo").style.display = "block";
        }
    }
    </script>
    <script>
    $(".deleteRecord").click(function() {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: "/contract_doc/" + id,
            type: 'post',
            data: {
                "id": id,
                "_token": token,
            },
            success: function() {
                console.log("it Works");
                location.reload();
                //location.reload(" #refresh-after-ajax");
                //$(this).parent('div').remove();
                //$('#refresh-after-ajax').remove();
                // $("#refresh-after-ajax").load(location.href + " #refresh-after-ajax");
                // $("#refresh-after-ajax").load(" #refresh-after-ajax");
            }
        });

    });
    </script>
</body>

</html>