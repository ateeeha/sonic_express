    <section class="content-header">
      <h1><i class="fa fa-truck"> <?= $header ?></i></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>admin/"><i class="fa fa-home"></i> Dashboard</a></li>
      </ol>
    </section>

    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <form method="post" action="<?php echo site_url('droppoint/terima_banyakdaridp'); ?>">
            <div class="box-header with-border">
                <div style="float:left">
                  <input class="btn btn-success" type="submit" name="submit" value="Konfirmasi">
                </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover dt-responsive nowrap" id="datatable">
                <thead>
                  <tr>
                    <th><input id="check-all" type="checkbox"></th>
                    <th style="text-align: center">#</th>
                    <th style="text-align: center">ID User</th>
                    <th style="text-align: center">Tanggal</th>
                    <th style="text-align: center">No Resi</th>
                    <th style="text-align: center">Penerima</th>
                    <th style="text-align: center">Kode Pos</th>
                    <th style="text-align: center">No Penerima</th>
                    <th style="text-align: center" width="10%;">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 1;
                  foreach ($data->result() as $key) :
                  ?>
                  <tr>
                    <th><input class="check-item" type="checkbox" name="no_resi[<?= $key->no_resi; ?>]" value="<?= $key->no_resi; ?>"></th> 
                    <td style="text-align: center"><?= $i++; ?></td>
                    <td style="text-align: center"><?= $key->id_user; ?></td>
                    <td style="text-align: center"><?= $key->tgl_pengiriman; ?></td>
                    <td style="text-align: center"><?= $key->no_resi; ?></td>
                    <td style="text-align: center"><?= $key->nama; ?></td>
                    <td style="text-align: center"><?= $key->kode_pos; ?></td>
                    <td style="text-align: center"><?= $key->no_tlp; ?></td>
                    <td>
                    <a href="<?= base_url(); ?>index.php/droppoint/terima_paketdp/<?= $key->no_resi ?>/" class="btn btn-success btn-xs" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-check"></i> Konfirmasi</a>
                    </td>
                    <td>
                    <?= $key->status_transaksi; ?>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </  >
              </table>
                </div>
              </form>
              <div class="box-footer with-border">
              </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
        <!--/.col (right) -->