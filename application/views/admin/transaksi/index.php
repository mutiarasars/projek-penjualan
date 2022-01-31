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
            <h2 class="section-title">Data keranjang</h2>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data keranjang</h4> 
                  </div>
                  <?php if ($this->session->flashdata('mssg')) { ?>
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <?= $this->session->flashdata('mssg'); ?>
                    </div>
                  <?php } ?>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <tr>
                          <th>No</th>
                          <th>nama Pengguna</th>
                          <th>produk</th>
                          <th>Jumlah barang</th>
                          <th>harga</th>
                          <th>Total</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        <?php
                        $n = 1;
                        foreach ($transaksi as $item) { ?>
                          <tr>
                            <td><?= $n; ?></td>
                            <td><?= $item->nama_pengguna; ?></td>
                            <td><?= $item->nama_produk; ?></td>
                            <td><?= $item->jumlah; ?></td>
                            <td><?= $item->harga; ?></td>
                            <td><?= $item->subtotal; ?></td>
                            <td><?= $item->status; ?></td>
                            <td>
                              <a class="btn btn-warning" href="<?= site_url('admin/keranjang/get_id/'); ?>"> Edit </a> 
                              <a class="btn btn-danger del-btn" href="<?= site_url('admin/keranjang/delete/'); ?>"> Hapus </a>
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