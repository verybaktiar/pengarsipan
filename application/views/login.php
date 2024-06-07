<!DOCTYPE html>
<html lang="en">

<head>
<title><?= $main_title; ?> - <?php echo $title; ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="<?php echo base_url('vendor/login/') ?>images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/login/') ?>vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/login/') ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/login/') ?>vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/login/') ?>vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/login/') ?>vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/login/') ?>css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/login/') ?>css/main.css">
  <!--===============================================================================================-->
  <style>
    .login-title {
      margin-top: -150px; /* Mengatur margin atas */
      font-size: 30px;   /* Mengatur ukuran font */
    }
    .container-login100 {
      background: red !important; /* Mengubah background menjadi merah */
    }
  </style>
</head>

<body>

  <div class="limiter">

    <div class="container-login100">

      <div class="wrap-login100">
        <div class="text-center">
          <h1 class="h4 login-title mb-4">Sistem Otomatisasi Informasi Jadwal Sosialisasi Bina Keluarga Remaja</h1>
        </div>
        <div class="login100-pic js-tilt" data-tilt>
          <img src="<?php echo base_url('vendor/login/') ?>images/logo.png" alt="IMG">
        </div>

       
        <form class="login100-form validate-form" action="<?php echo base_url('auth'); ?>" method="post">
          <span class="login100-form-title">
            Member Login
          </span>
          <?php echo $this->session->flashdata('message'); ?>

          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="username" value="<?php echo set_value('username') ?>" placeholder="Masukkan username">
                      <?= form_error('username', '<small class="text-danger pl-3 pt-0">', '</small>'); ?>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password" id="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
            <?= form_error('password', '<small class="text-danger pl-3 pt-0">', '</small>'); ?>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" name="masuk">
              Login
            </button>
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">

            </span>
            <a class="txt2" href="#">

            </a>
          </div>

          <div class="text-center p-t-136">
            <a class="txt2" href="#">

              <i class="fa fa-long-arrow- m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>




  <!--===============================================================================================-->
  <script src="<?php echo base_url('vendor/login/') ?>vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('vendor/login/') ?>vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo base_url('vendor/login/') ?>vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('vendor/login/') ?>vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('vendor/login/') ?>vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url('vendor/login/') ?>js/main.js"></script>
  <script>
    $(document).ready(function() {
      $('#showpass').click(function() {
        if ($(this).is(':checked')) {
          $('#password').attr("type", "text");
        } else {
          $('#password').attr("type", "password");
        }
      })
    })
  </script>
</body>

</html>