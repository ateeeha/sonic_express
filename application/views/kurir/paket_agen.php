    <section class="content-header">
      <h1><i class="fa fa-cube"> <?= $header ?></i></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>kurir/"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active"><?= $header ?></li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <div class="box-body table-responsive">
          <div class="box-body">
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
                  <td style="text-align: center"><?= $key->id_user; ?></td>
                  <td style="text-align: center"><?= $key->tgl_pengiriman; ?></td>
                  <td style="text-align: center"><?= $key->no_resi; ?></td>
                  <td style="text-align: center"><?= $key->nama; ?></td>
                  <td style="text-align: center"><?= $key->kode_pos; ?></td>
                  <td style="text-align: center"><?= $key->no_tlp; ?></td>
                  
                  <td>
                  <a href="<?= base_url(); ?>kurir/kirim_paket/<?= $key->no_resi; ?>/" class="btn btn-warning btn-xs" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-plus"></i> Kirim</a>
                  </td>
                  <td>
                    <?= $key->status_transaksi; ?>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
