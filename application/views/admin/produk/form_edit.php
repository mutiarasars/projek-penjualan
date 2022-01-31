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
                    <form method="POST" action="<?= site_url('admin/produk/save_update'); ?>" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    <input type="hidden" name="id_produk" value="<?= $produk->id_produk; ?>">   
                    <div class="card">
                            <div class="card-header">
                                <h4>Form Edit Produk</h4>
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
                                    <select name="id_brand" class="form-control selectric">
                                        <?php foreach ($brand as $key) { ?>
                                        <option value="<?= $key->id_brand; ?>" <?= $produk->id_brand == $key->id_brand ? "selected" : null ?>> <?= $key->nama_brand; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="nama_produk" class="form-control" required="" value="<?= $produk->nama_produk; ?>">
                                </div>
                            
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" name="harga" class="form-control" required="" value="<?= $produk->harga; ?>">
                            </div>
                             
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control" required="" value="<?= $produk->deskripsi; ?>">
                            </div>
                            
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="text" name="stok" class="form-control" required="" value="<?= $produk->stok; ?>">
                                </div>
                            
                                <div class="form-group">
                                    <label>Promo</label>
                                    <input type="text" name="promo" class="form-control"  value="<?= $produk->promo; ?>">
                            </div>   
                                <div class="form-group">
                                    <label class="form-control-label">Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="site-logo">
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