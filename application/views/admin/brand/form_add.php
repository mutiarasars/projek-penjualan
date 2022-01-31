<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Bootstrap Components</a></div>
                <div class="breadcrumb-item">Form</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Forms</h2>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <form method="POST" action="<?= site_url('admin/brand/save'); ?>" enctype="multipart/form-data" class="needs-validation" novalidate="">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Tambah Brand</h4>
                            </div>
                            <?php if ($this->session->flashdata('mssg')) { ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Warning!</strong><br> <?= $this->session->flashdata('mssg'); ?>
                                </div>
                            <?php } ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Brand</label>
                                    <input type="text" name="nama_brand" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Logo Brand</label>
                                    <div class="custom-file">
                                        <input type="file" name="logo_brand" class="custom-file-input" id="site-logo">
                                        <label class="custom-file-label">Choose File</label>
                                    </div>
                                    <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>