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
            <form method="post" action="">
            <div class="box-header with-border">
                
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover dt-responsive nowrap" id="datatable">
                <thead>
                  <tr>
                    <th style="text-align: center">#</th>
                    <th style="text-align: center">ID TRANSAKSI DP</th>
                    <th style="text-align: center">DP</th>
                    <th style="text-align: center">AGEN</th>
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
                    <td style="text-align: center"><?= $key->id_transaksidpagen; ?></td>
                    <td style="text-align: center"><?= $key->dp_tujuan; ?></td>
                    <td style="text-align: center"><?= $key->agen_tujuan; ?></td>
                    <td style="text-align: center"><?= $key->tgl_kirim; ?></td>
                    <td style="text-align: center"><?= $key->tgl_sampai; ?></td>
                    <td style="text-align: center"><?= $key->status_tdpagen; ?></td>
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