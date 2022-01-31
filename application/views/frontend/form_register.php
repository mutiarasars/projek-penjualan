<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
<!-- costum css -->
 <link rel="stylesheet" href="<?= base_url('assets/css/registerassets.css');?>">

<title><?= $jf; ?></title>
</head>      
<body style="background-color:#F6F7FB;">
    <section class="container-fluid">
        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
        <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
        <div class="login-brand"  class="col-12 col-sm-6 col-md-4" align="center" >
                <img src="<?= base_url() ?>assets/img/logo_login/pengguna.png" alt="logo" width="100" class="shadow-light rounded-circle">
        </div>
            <form class="form-container" method="POST" action="<?= site_url('auth/register_action') ?>" class="needs-validation" novalidate="">
                <h4 class="text-center font-weight-bold"> Sign-Up </h4>
                <div class="form-group">
                    <label for="nama_pengguna">Nama Pengguna</label>
                    <input id="nama_pengguna" type="text" class="form-control" name="nama_pengguna" required autofocus placeholder="Nama Pengguna">
                        <div class="invalid-feedback">
                         Nama Pengguna harap diisi !
                         </div>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" required autofocus placeholder="Username">
                        <div class="invalid-feedback">
                         Username harap diisi !
                         </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required autofocus placeholder="Password">
                        <div class="invalid-feedback">
                         Password harap diisi !
                         </div>
                </div>
                <div class="form-group">
                    <label for="InputPassword">Re-type Password</label>
                    <input id="password" type="password" class="form-control" name="password_validation" required autofocus placeholder="Re-type Password">
                        <div class="invalid-feedback">
                         Re-type Password harap diisi !
                         </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
                <div class="form-footer mt-2">
                    <p> Sudah punya account? <a href="<?= site_url('auth') ?>">Login</a></p>
                </div>
            </form>
        </section>
        </section>
    </section>
 
    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, danyang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>