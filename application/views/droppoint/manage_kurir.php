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
                  <a href="<?= base_url(); ?>index.php/droppoint/add_kurir" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kurir</a>            
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover dt-responsive nowrap" id="datatable">
                <thead>
                  <tr>
                    <th style="text-align: center">#</th>
                    <th style="text-align: center">Username</th>
                    <th style="text-align: center">Email</th>
                    <th style="text-align: center">Status</th>
                    <th style="text-align: center" width="10%;">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 1;
                  foreach ($data->result() as $key) :
                  ?>
                  <tr>
                    <td style="text-align: center"><?= $i++; ?></td>
                    <td style="text-align: center"><?= $key->username; ?></td>
                    <td style="text-align: center"><?= $key->email; ?></td>
                    <td style="text-align: center">
                    <?php if ($key->status_kurir == 2) { ?>
                          <a href="<?= base_url(); ?>index.php/droppoint/status/2/<?= $key->id_kurir ?>" class="btn btn-primary btn-xs">Aktif</a>
                      <?php } else { ?>
                          <a href="<?= base_url(); ?>index.php/droppoint/status/1/<?= $key->id_kurir ?>" class="btn btn-danger btn-xs">Tidak Aktif</a>

                      <?php } ?> 
                    </td>
                    <td>
                        <a href="<?= base_url(); ?>index.php/droppoint/del_kurir/<?= $key->id_kurir; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </  >
              </table>
                </div>
            <!-- /.box-body -->
              <div class="box-footer with-border">
                <p class="help-text">* Button <label class="label label-primary" style="padding:3px 5px;">Aktif</label> untuk menonaktifkan member, button <label class="label label-danger" style="padding:3px 5px;">Tidak Aktif</label> untuk mengaktifkan member</p>
              </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
        <!--/.col (right) -->