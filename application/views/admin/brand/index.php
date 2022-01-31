 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Manajemen Brand</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Brand</a></div>
              <div class="breadcrumb-item">Main</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Data Brand</h2>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Brand</h4> <a href="<?= site_url('admin/brand/add'); ?>" class="btn btn-primary"> Tambah Brand </a>
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
                          <th>Nama Brand</th>
                          <th>Logo Brand</th>
                          <th>Action</th>
                        </tr>
                        <?php
                        $n = 1;
                        foreach ($brand as $item) { ?>
                          <tr>
                            <td><?= $n; ?></td>
                            <td><?= $item->nama_brand; ?></td>
                            <td><img src="<?= base_url() ?>assets/img/brand/<?= $item->logo_brand; ?>" style="height:100px; width:100px;"></td>
                            <td>
                              <a class="btn btn-warning" href="<?= site_url('admin/brand/get_id/' . $item->id_brand); ?>"> Edit </a> 
                              <a class="btn btn-danger del-btn" href="<?= site_url('admin/brand/delete/' . $item->id_brand); ?>"> Hapus </a>
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