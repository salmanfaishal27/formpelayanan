<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>Assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>Assets/img/ptpnlogpng.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Riwayat Permintaan
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php echo base_url(); ?>Assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>Assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url(); ?>Assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?php echo base_url(); ?>Assets/img/ptpnlog.jpg">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a class="simple-text logo-normal">
          USER
          <!-- <div class="logo-image-big">
            <img src="<?php //echo base_url(); ?>Assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="<?php echo base_url();?>home">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url();?>home/form">
              <i class="nc-icon nc-paper"></i>
              <p>Form Pelayanan</p>
            </a>
          </li>
          <li class="active">
            <a href="<?php echo base_url();?>home/tanggapan">
              <i class="nc-icon nc-tile-56"></i>
              <p>Riwayat Permintaan</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Riwayat Permintaan</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?php echo base_url();?>auth/logout" data-toggle="modal" data-target="#logoutModal">Logout</a>                  
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
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
      <!-- End Navbar -->

      <div class="content">
        <div class="row">
          <div class="col-md-2">
            <div class="card card-user">
            </div>
          </div>
          <div class="table-responsive"> <table class="table">
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
                                            <?php $i=0; foreach($datapermintaan as $permintaan){  if($user['id_user'] == $permintaan->id_user){ $i++;?>
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
                                                    <?php if($permintaan->status == "Complete" && $permintaan->status_review == 0){ ?>
                                                    <a class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $permintaan->id_permintaan; ?>" href="#" style="color: white;margin-bottom:5px;">Review</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="myModal<?php echo $permintaan->id_permintaan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content" style="width: 120%;">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">FORM REVIEW</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                <form method="POST" action="<?php echo site_url('/home/update_history/'.$permintaan->id_permintaan);?>">
                                                  <div class="modal-body">
                                                      <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Rating</label>
                                                        <div class="input-group-btn" data-toggle="buttons"><input type="text" name="id_permintaan" value="<?= $permintaan->id_permintaan; ?>" hidden>
                                                          <label class="btn btn-danger">
                                                            <input type="radio" name="rating" id="rating1" autocomplete="off" style="visibility: hidden;" value="1">Poor
                                                          </label>
                                                          <label class="btn btn-warning">
                                                            <input type="radio" name="rating" id="rating2" autocomplete="off" style="visibility: hidden;" value="2">Avarage
                                                          </label>
                                                          <label class="btn btn-primary active">
                                                            <input type="radio" name="rating" id="rating3" autocomplete="off" style="visibility: hidden;" value="3" checked>Good
                                                          </label>
                                                          <label class="btn btn-success">
                                                            <input type="radio" name="rating" id="rating4" autocomplete="off" style="visibility: hidden;" value="4">Excellent
                                                          </label>
                                                          <label class="btn btn-success">
                                                            <input type="radio" name="rating" id="rating5" autocomplete="off" style="visibility: hidden;" value="5">Extraordinary
                                                          </label>
                                                        </div>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Tanggapan Anda:</label>
                                                        <input type="textarea" class="form-control" name="tanggapan">
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
                                            <?php }} ?>
                                        </tbody>                                       
                                    </table> 
                                  </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url(); ?>Assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>Assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>Assets/js/core/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>Assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="<?php echo base_url(); ?>Assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url(); ?>Assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url(); ?>Assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url(); ?>Assets/demo/demo.js"></script>
</body>

</html>