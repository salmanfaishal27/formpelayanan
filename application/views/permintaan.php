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
    <title>Permintaan</title>
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
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark"></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="fa fa-times"></i></a></form>
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
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>Assets-admin/images/users/9.jpg" alt="user" class="" /> <span class="hidden-md-down"> &nbsp;</span> </a>
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
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/admin'); ?>" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="active"> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/admin/permintaan'); ?>" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Permintaan</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url('index.php/admin/history'); ?>" aria-expanded="false"><i class="fa fa-history"></i><span class="hide-menu">History</span></a>
                         <li class="nav-item">
                         <a class="nav-link" href="<?php echo base_url();?>auth/logout" data-toggle="modal"                  data-target="#logoutModal">
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
                        <h3 class="text-themecolor">Tabel Permintaan</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Tabel Permintaan</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Permintaan</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Bagian</th>
                                                <th>Pesan Permasalahan</th>
                                                <th>Tanggal Permintaan</th>
                                                <th>Jam Permintaan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; foreach($datapermintaan as $permintaan){ $i++; ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $permintaan->nama; ?></td>
                                                <td><?php echo $permintaan->bagian; ?></td>
                                                <td><?php echo $permintaan->permasalahan; ?></td>
                                                <td><?php echo $permintaan->tanggal_permintaan; ?></td>
                                                <td><?php echo $permintaan->jam_permintaan; ?></td>
                                                <?php if($permintaan->status == "Pending" || $permintaan->status == "In Proccess"){ ?>
                                                <td style="color: orange;">
                                                <?php }else if($permintaan->status == "Complete"){ ?>
                                                <td style="color: green;">
                                                <?php } ?>
                                                    <?php echo $permintaan->status; ?>           
                                                </td>
                                                <td>
                                                    <div class="dropdown-inverse dropdown open">
                                                        <button class="btn btn-inverse dropdown-toggle waves-effect waves-light " type="button" id="dropdown-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Action</button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdown-7" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                        <!-- BUTTON COMPLETE -->
                                                        <?php if($permintaan->status == "Pending" || $permintaan->status == "In Proccess"){ ?>
                                                        <a class="dropdown-item waves-light waves-effect btn-success" data-toggle="modal" data-target="#myModal<?php echo $permintaan->id_permintaan; ?>" href="#" style="color: white;margin-bottom:5px;">Complete</a>
                                                        <!-- BUTTON COMPLETE -->
                                                        <?php }if($permintaan->status == "In Proccess"){ ?>
                                                        <a class="dropdown-item waves-light waves-effect btn-warning" href="<?php echo site_url('admin/pending_permintaan/'.$permintaan->id_permintaan);?>" style="margin-bottom:5px;">Pending</a>
                                                        <?php }if ($permintaan->status == "Pending"){ ?>
                                                        <a class="dropdown-item waves-light waves-effect btn-warning" href="<?php echo site_url('admin/proccess_permintaan/'.$permintaan->id_permintaan);?>" style="margin-bottom:5px;">In Proccess</a>
                                                        <?php }?>
                                                        <a class="dropdown-item waves-light waves-effect btn-danger" href="<?php echo site_url('admin/delete_permintaan/'.$permintaan->id_permintaan);?>" style="color: white;">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="myModal<?php echo $permintaan->id_permintaan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">FORM COMPLETE</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                <form method="POST" action="<?php echo site_url('/admin/add_history');?>">
                                                  <div class="modal-body">
                                                      <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Teknisi:</label>
                                                        
                                                        <input type="text" name="id_permintaan" value="<?= $permintaan->id_permintaan; ?>" hidden>
                                                        <input type="text" name="id_user" value="<?= $permintaan->id_user; ?>" hidden>
                                                        <input type="text" name="nama" value="<?= $permintaan->nama; ?>" hidden>
                                                        <input type="text" name="bagian" value="<?= $permintaan->bagian; ?>" hidden>
                                                        <input type="text" name="permasalahan" value="<?= $permintaan->permasalahan; ?>" hidden>
                                                        <input type="text" name="tanggal_permintaan" value="<?= $permintaan->tanggal_permintaan; ?>" hidden>
                                                        <input type="text" name="jam_permintaan" value="<?= $permintaan->jam_permintaan; ?>" hidden>

                                                        <input type="text" class="form-control" id="recipient-name" name="teknisi">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Cara Penyelesaian:</label>
                                                        <input type="textarea" class="form-control" name="cara_penyelsaian">
                                                      </div>
                                                  </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <!-- <a href="<?php //echo site_url('admin/complete_permintaan/'.$permintaan->id_permintaan);?>"><button type="button" class="btn btn-primary">Complete</button></a> -->
                                                        <button type="submit" class="btn btn-primary">Complete</button>
                                                      </div>
                                                    </form>
                                                </div>
                                              </div>
                                            </div>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CSS MODAL (POPUP COMPLETE) -->
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2018 Adminwrap by wrappixel.com
            </footer>
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