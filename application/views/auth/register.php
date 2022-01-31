<div class="login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="register-form">
                    <?php if ($this->session->flashdata('msg')) : ?>
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Warning!</strong><br> <?= $this->session->flashdata('msg'); ?>
                        </div>
                    <?php endif ?>
                    <form class="user" method="POST" action="<?= site_url('auth/register_action') ?>">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Username</label>
                                <input class="form-control" type="text" placeholder="Username" name="username" required>
                            </div>
                            <div class="col-md-6">
                                <label>Full Name</label>
                                <input class="form-control" type="text" placeholder="Full Name" name="nama_user" required>
                            </div>
                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="E-mail" name="email_user" required>
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input class="form-control" type="text" placeholder="Address" name="alamat_user" required>
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password_user" required>
                            </div>
                            <div class="col-md-6">
                                <label>Retype Password</label>
                                <input id="password-konfirmasi" class="form-control" type="password" placeholder="Password" name="password-confirm">
                                <div id="message"></div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-confirmation">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>