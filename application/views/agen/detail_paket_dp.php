    <section class="content-header">
      <h1><i class="fa fa-truck"> <?= $header ?></i></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>admin/"><i class="fa fa-home"></i> Dashboard</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-body">
              <form method="post" action="<?php echo site_url('agen/multi_terima_paket_dp'); ?>">
                <div class="box-header with-border">
                    <div style="float:left">
                      <input class="btn btn-success" type="submit" name="submit" value="Konfirmasi">
                      <input type="hidden" name="id_dp_agen" value="<?= $this->uri->segment('3');  ?>">
                    </div>
                </div>
                <div class="box-body table-responsive">
                  <table class="table table-bordered table-hover dt-responsive nowrap" id="datatable">
                    <thead>
                      <tr>
                        <th><input id="check-all" type="checkbox"></th>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">Tujuan</th>
                        <th style="text-align: center">No Resi</th>
                        <th style="text-align: center">Tgl Pengirim</th>
                        <th style="text-align: center">Penerima</th>
                        <th style="text-align: center">Agen</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $i = 1;
                      foreach ($data->result() as $key) :
                      ?>
                      <tr>
                        <td><input class="check-item" type="checkbox" name="no_resi[<?= $key->no_resi; ?>]" value="<?= $key->no_resi; ?>"></th> 
                        <td style="text-align: center"><?= $i++; ?></td>
                        <td style="text-align: center"><?= $key->provinsi_tujuan.', '.$key->kabupaten_tujuan ?></td>
                        <td style="text-align: center"><?= $key->no_resi; ?></td>
                        <td style="text-align: center"><?= $key->tgl_pengiriman; ?></td>
                        <td style="text-align: center"><?= $key->nama; ?></td>
                        <td style="text-align: center"><?= $key->agen_tujuan; ?></td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
