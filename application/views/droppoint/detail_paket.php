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
              <form method="post" action="<?php echo site_url('droppoint/kirim_paket'); ?>">
                <table class="table table-bordered table-hover dt-responsive nowrap">
                  <?php 
                  $i = 1;
                  foreach ($data->result() as $key) :
                  ?>
                  <tr>
                    <td>Nama :</td> 
                    <td> <?= $key->username; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal :</td> 
                    <td><?= $key->tgl_pengiriman; ?><br /></td>
                  </tr>
                  <tr>
                    <td>No Resi :</td> 
                    <td><input readonly type="text" name="no_resi" value="<?= $key->no_resi; ?>"></input><br /></td>
                  </tr>
                  <tr>
                    <td>Alamat :</td> 
                    <td><?= $key->alamat; ?></td>
                  </tr>
                  <?php endforeach ?>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
