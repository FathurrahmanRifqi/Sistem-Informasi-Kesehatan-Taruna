
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Masuk | Sistem Informasi Kesehatan Taruna
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= base_url('css/nucleo-icons.css?v=2.0.0') ?>" rel="stylesheet" />
  <link href=" <?= base_url('css/nucleo-svg.css?v=2.0.0') ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src=<?= base_url('js/fontawesome.js?v=2.0.0') ?>" crossorigin="anonymous"></script>

  <link href=" <?= base_url('css/nucleo-svg.css') ?>" />
  <!-- CSS Files -->
  <link id="pagestyle" href=" <?= base_url('css/bootstrap5.min.css?v=2.0.0') ?>" rel="stylesheet" />
</head>

<body class="">
  
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-12 flex-column align-item-center mx-lg-0 mx-auto">
              <center>
              <div class="card col-12 col-xl-5 col-lg-7 col-md-12 card-plain bg-white">
                <div class="card-header pb-0 text-start bg-white">
          <center><img src="<?= base_url('img/askess.png') ?>" height="230px" alt=""></center>

                  <h4 class="font-weight-bolder text-center">Selamat Datang Kembali</h4>
                  <p class="mb-0 text-center">Wadah Informasi Seputar Kesehatan Taruna di Poltek SSN</p>
                </div>
                <div class="card-body">
                <?php if(!empty(session('msg'))){ ?>
                  <div class="alert alert-warning alert-dismissible fade show text-white" role="alert">
                    <?= session('msg');?>
                  
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  </div>
                <?php } ?>

                  <form role="form" action="<?= "do_login" ?>" method="post">
                    <div class="mb-3">
                      <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username" value="<?php if(isset($_COOKIE["loginId"])) { echo $_COOKIE["loginId"]; } ?>">
                    </div>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" value="<?php if(isset($_COOKIE["loginPass"])) { echo $_COOKIE["loginPass"]; } ?>">
                    </div>
                    <div class="form-check form-switch">
                      <input name="remember" class="form-check-input" type="checkbox" <?php if(isset($_COOKIE["loginId"])) { ?> checked="checked" <?php } ?> id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Masuk</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Lupa Password?
                    <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Hubungi Kami</a>
                  </p>
                </div>
              </div>
              </center>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="<?= base_url('js/jquery.min.js?v=2.0.0') ?> "></script>
  <script src="<?= base_url('js/bootstrap.min.js?v=2.0.0') ?> "></script>



 
</body>

</html>