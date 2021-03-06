    <section class="content-header">
      <h1><i class="fa fa-truck"> <?= $header ?></i></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>admin/"><i class="fa fa-home"></i> Dashboard</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="box box-primary">
        <div class="box-body">
          <form method="post">
            <div class="box-header with-border">
              <div>
                <a href="<?= base_url(); ?>droppoint/list_transaksi_dp_terima/" class="btn btn-default"><i class="fa fa-history"></i> Riwayat Transaksi DP => DP</a>
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover dt-responsive nowrap" id="datatable">
                <thead>
                  <tr>
                    <th style="text-align: center">#</th>
                    <th style="text-align: center">DP ASAL</th>
                    <th style="text-align: center">DP TUJUAN</th>
                    <th style="text-align: center">TGL KIRIM</th>
                    <th style="text-align: center">TGL SAMPAI</th>
                    <th style="text-align: center">STATUS</th>
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
                    <td style="text-align: center"><?= $key->asal; ?></td>
                    <td style="text-align: center"><?= $key->tujuan; ?></td>
                    <td style="text-align: center"><?= $key->tgl_kirim; ?></td>
                    <td style="text-align: center"><?= $key->tgl_sampai; ?></td>
                    <td style="text-align: center"><?= $key->status_dp_dp; ?></td>
                    <td>
                    <a href="<?= base_url(); ?>droppoint/detail_paket_dp/<?= $key->id_dp_dp; ?>/" class="btn btn-warning btn-xs" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-check"></i> Detail</a>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
    </section>
