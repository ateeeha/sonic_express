    <section class="content-header">
      <h1><i class="fa fa-truck"> <?= $header ?></i></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>admin/"><i class="fa fa-home"></i> Dashboard</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <div class="box-body">
          <form method="post" action="<?php echo site_url('agen/multi_terima_paket_kurir'); ?>">
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover dt-responsive nowrap" id="datatable">
                <thead>
                  <tr>
                    <th style="text-align: center">#</th>
                    <th style="text-align: center">ID User</th>
                    <th style="text-align: center">Tanggal</th>
                    <th style="text-align: center">No Resi</th>
                    <th style="text-align: center">Penerima</th>
                    <th style="text-align: center">Kode Pos</th>
                    <th style="text-align: center">No Penerima</th>
                    <th style="text-align: center">Status Kurir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 1;
                  foreach ($data->result() as $key) :
                  ?>
                  <tr>
                    <td style="text-align: center"><?= $i++; ?></td>
                    <td style="text-align: center"><?= $key->id_user; ?></td>
                    <td style="text-align: center"><?= $key->tgl_pengiriman; ?></td>
                    <td style="text-align: center"><?= $key->no_resi; ?></td>
                    <td style="text-align: center"><?= $key->nama; ?></td>
                    <td style="text-align: center"><?= $key->kode_pos; ?></td>
                    <td style="text-align: center"><?= $key->no_tlp; ?></td>
                    <td style="text-align: center"><?= $key->status_kurir; ?></td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
    </section>
