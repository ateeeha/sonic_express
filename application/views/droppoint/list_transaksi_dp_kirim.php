    <section class="content-header">
      <h1><i class="fa fa-truck"> <?= $header ?></i></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>admin/"><i class="fa fa-home"></i> Dashboard</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <div class="box-body">
          <form method="post" action="">
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
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
    </section>
