 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Produk</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Produk</a></div>
              <div class="breadcrumb-item">Main</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Data Produk</h2>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Produk</h4> <a href="<?= site_url('admin/produk/add'); ?>" class="btn btn-primary"> Tambah Produk </a>
                  </div>
                  <?php if ($this->session->flashdata('mssg')) { ?>
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <?= $this->session->flashdata('mssg'); ?>
                    </div>
                  <?php } ?>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tr>
                          <th>No</th>
                          <th>Nama Produk</th>
                          <th>Harga</th>
                          <th>Deskripsi</th>
                          <th>Stok</th>
                          <th>Promo</th>
                          <th>Image</th>
                          <th>Action</th>
                        </tr>
                        <?php
                        $n = 1;
                        foreach ($produk as $item) { ?>
                          <tr>
                            <td><?= $n; ?></td>
                            <td><?= $item->nama_produk; ?></td>
                            <td><?= $item->	harga; ?></td>
                            <td><?= $item->deskripsi; ?></td>
                            <td><?= $item->stok; ?></td>
                            <td><?= $item->promo; ?></td>
                            <td><img src="<?= base_url() ?>assets/img/produk/<?= $item->image; ?>" style="height:100px; width:100px;"></td>
                            <td>
                              <a class="btn btn-warning" href="<?= site_url('admin/produk/get_id/' . $item->id_produk); ?>"> Edit </a> 
                              <a class="btn btn-danger del-btn" href="<?= site_url('admin/produk/delete/' . $item->id_produk); ?>"> Hapus </a>
                            </td>
                          </tr>
                        <?php $n++;
                        } ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>