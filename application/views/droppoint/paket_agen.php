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
              <form method="post" action="<?php echo site_url('droppoint/multi_proses_penjemputan'); ?>">
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
                    <div style="float:left">
                      <input class="btn btn-success" type="submit" name="submit" value="Proses">
                    </div>
                </div>
                <div class="box-body table-responsive">
                  <table class="table table-bordered table-hover dt-responsive nowrap" id="datatable">
                    <thead>
                      <tr>
                        <th><input id="check-all" type="checkbox"></th>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">Id Agen</th>
                        <th style="text-align: center">Tgl Kirim</th>
                        <th style="text-align: center">Tgl tgl_sampai</th>
                        <th style="text-align: center">Status</th>
                        <th style="text-align: center" width="20%;">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $i = 1;
                      foreach ($data->result() as $key) :
                      ?>
                      <tr>
                        <th><input class="check-item" type="checkbox" name="id_agen_dp[<?= $key->id_agen_dp; ?>]" value="<?= $key->id_agen_dp; ?>"></th> 
                        <td style="text-align: center"><?= $i++; ?></td>
                        <td style="text-align: center"><?= $key->id_agen; ?></td>
                        <td style="text-align: center"><?= $key->tgl_kirim; ?></td>
                        <td style="text-align: center"><?= $key->tgl_sampai; ?></td>
                        <td style="text-align: center"><?= $key->status_agen_dp; ?></td>
                        <td style="text-align: center">
                        <a href="<?= base_url(); ?>droppoint/detail_paket_agen/<?= $key->id_agen_dp ?>/" class="btn btn-primary btn-xs" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-search"></i> Detail</a>

                        <a href="<?= base_url(); ?>droppoint/proses_penjemputan/<?= $key->id_agen_dp ?>/" class="btn btn-success btn-xs" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-check"></i> Proses</a>
                        </td>
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
