    <section class="content-header">
      <h1><i class="fa fa-truck"> <?= $header ?></i></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>admin/"><i class="fa fa-home"></i> Dashboard</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <div class="box-body">
          <div>             
             <?php if(validation_errors())
             {
               echo "<div class='alert alert-warning alert-message'>";
               echo validation_errors();
               echo "</div>";
             } ?> 
             <?php if ($this->session->flashdata('alert')) 
             {
               echo "<div class='alert alert-warning alert-message'>";
               echo $this->session->flashdata('alert');
               echo "</div>";
             }
             ?>
              <?php if ($this->session->flashdata('success')) 
             {
               echo "<div class='alert alert-success alert-message'>";
               echo $this->session->flashdata('success');
               echo "</div>";
             }               
             ?>         
          </div>
          <form method="post" action="<?php echo site_url('droppoint/multi_kirim_paket_dp'); ?>">
          <div class="box-header with-border">
              <div>
                <a href="<?= base_url(); ?>droppoint/riwayat_dp_agen/" class="btn btn-default"><i class="fa fa-history"></i> Riwayat Transaksi DP => Agen</a>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="input-group margin">
                  <div class="input-group-btn">
                    <input class="btn btn-primary" type="submit" name="submit" value="Kirim">
                  </div>
                    <select class="form-control" name="agen_tujuan" required> 
                      <option value="" disabled selected>-- Pilih Agen --</option>
                      <?php foreach ($agen->result() as $ag): ?>
                      <option value="<?= $ag->id_agen; ?>"><?= $ag->username; ?></option>
                      <?php endforeach ?>
                  </select>
                </div>
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
                    <th style="text-align: center">Tgl Transaksi</th>
                    <th style="text-align: center">Penerima</th>
                    <th style="text-align: center">Agen Tujuan</th>
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
    </section>
