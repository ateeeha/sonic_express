    <section class="content-header">
      <h1><i class="fa fa-truck"></i> <?= $header ?></h1>
    </section>
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <div style="float:right">
                  <a href="<?= base_url(); ?>index.php/admin/add_kurir" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kurir</a>            
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover dt-responsive nowrap" id="datatable">
                <thead>
                  <tr>
                    <th style="text-align: center" width="5%;">#</th>
                    <th style="text-align: left;">Username</th>
                    <th style="text-align: left;">Email</th>
                    <th style="text-align: left;" width="10%;">Status</th>
                    <th style="text-align: left;" width="15%;">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 1;
                  foreach ($data->result() as $key) :
                  ?>
                  <tr>
                    <td style="text-align: center"><?= $i++; ?></td>
                    <td style="text-align: left;"><?= $key->username; ?></td>
                    <td style="text-align: left;"><?= $key->email; ?></td>
                    <td style="text-align: center;">
                    <?php if ($key->status == 2) { ?>
                          <a class="btn btn-primary btn-xs">Aktif</a>
                      <?php } else { ?>
                          <a class="btn btn-danger btn-xs">Tidak Aktif</a>

                      <?php } ?> 
                    </td>
                    <td>
                        <a href="<?= base_url(); ?>index.php/admin/del_kurir/<?= $key->id_kurir; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-trash"></i> Hapus</a>
                        <a href="<?= base_url(); ?>index.php/admin/edit_kurir/<?= $key->id_kurir; ?>" class="btn btn-warning btn-xs" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-edit"></i> Edit</a>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </  >
              </table>
                </div>
            <!-- /.box-body -->
              <div class="box-footer with-border">
              </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
        <!--/.col (right) -->