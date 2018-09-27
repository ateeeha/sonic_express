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
              <form method="post" action="<?= site_url('agen/minta_jemput_paket'); ?>">
                <div>
                    <?php if(validation_errors())
                    {
                     echo "<div class='alert alert-warning alert-message'>";
                     echo validation_errors();
                     echo "</div>";
                    } ?> 
                    <?php if($this->session->flashdata('success'))
                    {
                     echo "<div class='alert alert-success alert-message'>";
                     echo $this->session->flashdata('success');
                     echo "</div>";
                    } ?>  
                    <?php if($this->session->flashdata('alert'))
                    {
                     echo "<div class='alert alert-warning alert-message'>";
                     echo $this->session->flashdata('alert');
                     echo "</div>";
                    } ?>     
                </div>
                <div class="box-header with-border">
                      <button class="btn btn-primary" name="submit" value="Jemput">Minta Jemput</button>
                      <input type="hidden" name="id_dp" value="<?= $this->session->userdata('droppoint'); ?>">
                      <a href="<?= base_url(); ?>agen/list_jemput_paket/" class='btn btn-default'>
                        <i class="fa fa-history"></i> Riwayat Paket Dijemput</a>
                      <a href="<?= base_url(); ?>agen/riwayat_paket_kurir/" class='btn btn-default'>
                        <i class="fa fa-history"></i> Riwayat Paket Kurir</a>
                </div>
                <div class="box-body table-responsive">
                  <table class="table table-bordered table-hover dt-responsive nowrap" id="datatable">
                    <thead>
                      <tr>
                        <th><input id="check-all" type="checkbox"></th>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">Tanggal</th>
                        <th style="text-align: center">No Resi</th>
                        <th style="text-align: center">Penerima</th>
                        <th style="text-align: center">Kabupaten Tujuan</th>
                        <th style="text-align: center">No Penerima</th>
                        <th style="text-align: center">Dp Jemput</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $i = 1;
                      foreach ($data->result() as $key) :
                      ?>
                      <tr>
                        <th><input required class="check-item" type="checkbox" name="no_resi[<?= $key->no_resi; ?>]" value="<?= $key->no_resi; ?>"></th>                 
                        <td style="text-align: center"><?= $i++; ?></td>
                        <td style="text-align: center"><?= $key->tgl_pengiriman; ?></td>
                        <td style="text-align: center"><?= $key->no_resi; ?></td>
                        <td style="text-align: center"><?= $key->nama; ?></td>
                        <td style="text-align: center"><?= $key->kabupaten_tujuan; ?></td>
                        <td style="text-align: center"><?= $key->no_tlp; ?></td>
                        <td style="text-align: center"><?= $key->dp_jemput; ?></td>
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
