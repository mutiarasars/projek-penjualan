 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Pengguna</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Pengguna</a></div>
              <div class="breadcrumb-item">Main</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Data Pengguna</h2>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Pengguna</h4>
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
                          <th>Nama Pegguna</th>
                          <th>No Telephone</th>
                          <th>Email</th>
                          <th>Alamat</th>
                          <th>Username</th>
                          <th>Status User</th>
                        </tr>
                        <?php
                        $n = 1;
                        foreach ($pengguna as $item) { ?>
                          <tr>
                            <td><?= $n; ?></td>
                            <td><?= $item->nama_pengguna; ?></td>
                            <td><?= $item->noTelp; ?></td>
                            <td><?= $item->email; ?></td>
                            <td><?= $item->alamat; ?></td>
                            <td><?= $item->username; ?></td>
                            <td><?= $item->statususer; ?></td>
                             <td><?php if ($item->statususer == 'Y') { ?> 
                                  <span class='badge badge-success'>Aktif</span> 
                                      <?php } else { ?> 
                                            <span class='badge badge-danger'>Tidak Aktif</span> 
                                      <?php } ?> 
                                       </td>
                                             <td>
                                                <?php if ($item->statususer == 'N') : ?>
                                                 <a class="btn btn-success" href="<?= site_url('admin/pengguna/status_aktif/' . $item->id_pengguna); ?>"> Aktifkan </a>
                                              <?php else : ?>
                                                  <a class="btn btn-warning" href="<?= site_url('admin/pengguna/status_aktif/' . $item->id_pengguna); ?>"> NonAktifkan </a>
                                                <?php endif ?>
                                        </td>
                                <td> 
                                    <a class="btn btn-danger del-btn" href="<?= site_url('admin/pengguna/delete/' . $item->id_pengguna); ?>"> Hapus </a>
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