<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>Assets-admin/images/ptpnlogpng.png">
    <title>Administrator</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>Assets-admin/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>Assets-admin/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="<?php echo base_url(); ?>Assets-admin/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="<?php echo base_url(); ?>Assets-admin/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>Assets-admin/css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?php echo base_url(); ?>Assets-admin/css/pages/dashboard1.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url(); ?>Assets-admin/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="<?php echo base_url(); ?>Assets-admin/chartjs/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>Assets-admin/chartjs/utils.js"></script>
<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Wrap</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <label>Administrator</label>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <?php $rt=0; $temp=0; $total=0; foreach($datahistory as $rata2){ 
                            $rt++;$temp = $temp + $rata2->rating; }$total=$temp/$rt; ?>
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-xs-down search-box" style="background: #f9f90366; border:1px solid;"> 
                            <span class="hidden-md-down" style="color: black;">Rata-Rata Rating : <?php echo $total; ?> &nbsp;</span>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>Assets-admin/images/users/9.jpg" alt="user" class="" /> <span class="hidden-md-down"><?php echo $user['nama']; ?> &nbsp;</span> </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="active"> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/admin'); ?>" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/admin/permintaan'); ?>" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Permintaan</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/admin/history'); ?>" aria-expanded="false"><i class="fa fa-history"></i><span class="hide-menu">History</span></a>
                       <li class="nav-item">
                         <a class="nav-link" href="<?php echo base_url();?>auth/logout" data-toggle="modal" data-target="#logoutModal">
                         <i class="fa fa-power-off" aria-hidden="true"></i>                     
                          <span>Logout</span></a>                            
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
         <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url();?>auth/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Sales Chart and browser state-->
                <!-- ============================================================== -->
              <!--  <label>Selamat Datang</label>
               <label> Tujuan pembuatan aplikasi ini adalah :</label><br>
<label>1.  Membuat form pelayanan untuk mempermudah pengaduan gangguan pada PTPN VIII.</label><br>
<label>2.  Menyimpan history pengaduan untuk bahan evaluasi.</label><br>
<label>3.  Mengetahui hasil kinerja IT dengan feedback yang diberikan karyawan di bagian lain.</label> -->
    <?php $i=0; $jan=0; $feb=0; $mar=0; $apr=0; $mei=0; $jun=0; $jul=0; $agu=0; $sep=0; $okto=0; $nov=0; $des=0; foreach($datahistory as $data){ $i++;if ($data->tpc == 1) {$jan++;}if ($data->tpc == 2) {$feb++;}if ($data->tpc == 3) {$mar++;}if ($data->tpc == 4) {$apr++;}if ($data->tpc == 5) {$mei++;}if ($data->tpc == 6) {$jun++;}if ($data->tpc == 7) {$jul++;}if ($data->tpc == 8) {$agu++;}if ($data->tpc == 9){$sep++;}if ($data->tpc == 10) {$okto++;}if ($data->tpc == 11) {$nov++;}if ($data->tpc == 12) {$des++;}
    }?>

                <div style="width:100%;">
                    <canvas id="canvas"></canvas>
                </div>
                <!-- ============================================================== -->
                <!-- End Sales Chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Notification And Feeds -->
                <!-- ============================================================== -->
              
                <!-- ============================================================== -->
                <!-- End Notification And Feeds -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2018 Adminwrap by wrappixel.com </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <script>
        var lineChartData = {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Jumlah Permintaan',
                borderColor: window.chartColors.red,
                backgroundColor: window.chartColors.red,
                fill: false,
                data: [
                    <?php echo $jan;?>,
                    <?php echo $feb;?>,
                    <?php echo $mar;?>,
                    <?php echo $apr;?>,
                    <?php echo $mei;?>,
                    <?php echo $jun;?>,
                    <?php echo $jul;?>,
                    <?php echo $agu;?>,
                    <?php echo $sep;?>,
                    <?php echo $okto;?>,
                    <?php echo $nov;?>,
                    <?php echo $des;?>
                ],
                yAxisID: 'y-axis-1',
            }]
        };

        window.onload = function() {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myLine = Chart.Line(ctx, {
                data: lineChartData,
                options: {
                    responsive: true,
                    hoverMode: 'index',
                    stacked: false,
                    title: {
                        display: true,
                        text: 'Data Permintaan Perbulan'
                    },
                    scales: {
                        yAxes: [{
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'left',
                            id: 'y-axis-1',
                        }, {
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'right',
                            id: 'y-axis-2',

                            // grid line settings
                            gridLines: {
                                drawOnChartArea: false, // only want the grid lines for one axis to show up
                            },
                        }],
                    }
                }
            });
        };

        document.getElementById('randomizeData').addEventListener('click', function() {
            lineChartData.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });
            });

            window.myLine.update();
        });
    </script>
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>Assets-admin/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?php echo base_url(); ?>Assets-admin/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>Assets-admin/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>Assets-admin/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>Assets-admin/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>Assets-admin/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>Assets-admin/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="<?php echo base_url(); ?>Assets-admin/node_modules/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>Assets-admin/node_modules/morrisjs/morris.min.js"></script>
    <!--c3 JavaScript -->
    <script src="<?php echo base_url(); ?>Assets-admin/node_modules/d3/d3.min.js"></script>
    <script src="<?php echo base_url(); ?>Assets-admin/node_modules/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="<?php echo base_url(); ?>Assets-admin/js/dashboard1.js"></script>
</body>

</html>