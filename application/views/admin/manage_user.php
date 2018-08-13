    <section class="content-header">
      <h1><i class="fa fa-user"></i> <?= $header ?></h1>
    </section>
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover dt-responsive nowrap" id="datatable">
                <thead>
                  <tr>
                    <th style="text-align: center">#</th>
                    <th style="text-align: left;">Username</th>
                    <th style="text-align: left">E-Mail</th>
                    <th style="text-align: left">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 1;
                  foreach ($data->result() as $key) :
                  ?>
                  <tr>
                    <td style="text-align: center"><?= $i++; ?></td>
                    <td style="text-align: left"><?= $key->username; ?></td>
                    <td style="text-align: left"><?= $key->email; ?></td>
                    <td style="text-align: left">
                    <?php if ($key->status == 2) { ?>
                          <a href="<?= base_url(); ?>index.php/admin/status_user/1/<?= $key->id_user ?>" class="btn btn-primary btn-xs">Aktif</a>
                      <?php } else { ?>
                          <a href="<?= base_url(); ?>index.php/admin/status_user/2/<?= $key->id_user ?>" class="btn btn-danger btn-xs">Tidak Aktif</a>

                      <?php } ?> 
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