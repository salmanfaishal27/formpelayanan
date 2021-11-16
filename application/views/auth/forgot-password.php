<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>
    Forgot Password
  </title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>Assets-login/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>Assets-login/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="background-image: url('img/ptpn8.jpg');">

    <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-lg-5">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Page!</h1>
                  </div>

                  <?php echo $this->session->flashdata('message'); ?>

                  <form class="user" method="post" action="<?php echo base_url(); ?>auth">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email..." value="<?php echo set_value('email'); ?>">
                       <?php echo form_error('email','<small class="text-danger pl-3">','</small>');?>
                    </div>                    
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Reset Password
                    </button> 
                  </form>
                  <hr>
                
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url(); ?>auth">Back to login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>Assets-login/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>Assets-login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>Assets-login/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>Assets-login/js/sb-admin-2.min.js"></script>

</body>

</html>
