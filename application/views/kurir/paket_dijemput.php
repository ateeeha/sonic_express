    <section class="content-header">
      <h1><i class="fa fa-truck"> <?= $header ?></i></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>kurir/"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active"><?= $header ?></li>        
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <div class="box-body">
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
                  <th style="text-align: center" width="15%;">Opsi</th>
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
                  <a href="<?= base_url(); ?>kurir/terima_paket/<?= $key->no_resi; ?>/<?= $key->status_transaksi; ?>" class="btn btn-primary btn-xs" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-check"></i> Diterima</a>
                  <a href="<?= base_url(); ?>kurir/tolak_paket/<?= $key->no_resi; ?>/<?= $key->status_transaksi; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-trash"></i> Ditolak</a>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
