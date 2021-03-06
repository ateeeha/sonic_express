    <section class="content-header">
      <h1><i class="fa fa-truck"> <?= $header ?></i></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>admin/"><i class="fa fa-home"></i> Dashboard</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <div class="box-body">
          <form method="post" action="<?php echo site_url('droppoint/multi_proses_penjemputan'); ?>">
            
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover dt-responsive nowrap" id="datatable">
                <thead>
                  <tr>
                    <th style="text-align: center">#</th>
                    <th style="text-align: center">Agen Asal</th>
                    <th style="text-align: center">Dp Asal</th>
                    <th style="text-align: center">Status</th>
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
                    <td style="text-align: center"><?= $key->id_agen; ?></td>
                    <td style="text-align: center"><?= $key->id_dp; ?></td>
                    <td style="text-align: center"><?= $key->status_agen_dp; ?></td>
                    <td>
                    <a href="<?= base_url(); ?>droppoint/detail_penjemputan/<?= $key->id_agen_dp ?>/" class="btn btn-primary btn-xs" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-search"></i> Detail</a>
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
