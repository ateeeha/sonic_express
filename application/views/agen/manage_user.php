    <section class="content-header">
      <h1><i class="fa fa-users"> <?= $header ?></i></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>agen/"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active"><?= $header ?></li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="box-body">
            <div style="float:right">
              <a href="<?= base_url(); ?>agen/add_user" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah User</a>       
            </div>
            <div class="clearfix"></div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover dt-responsive nowrap" id="datatable">
                <thead>
                  <tr>
                    <th style="text-align: center">#</th>
                    <th style="text-align: center">Username</th>
                    <th style="text-align: center">Email</th>
                    <th style="text-align: center">Status</th>
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
                    <td style="text-align: center"><?= $key->username; ?></td>
                    <td style="text-align: center"><?= $key->email; ?></td>
                    <td style="text-align: center">
                    <?php if ($key->status_user == 2) { ?>
                          <a href="" class="btn btn-primary btn-xs">Aktif</a>
                      <?php } else { ?>
                          <a href="" class="btn btn-danger btn-xs">Tidak Aktif</a>

                      <?php } ?> 
                    </td>
                    <td>
                        <a href="<?= base_url(); ?>agen/del_user/<?= $key->id_user; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-trash"></i> Hapus</a>
                        <a href="<?= base_url(); ?>agen/edit_user/<?= $key->id_user; ?>" class="btn btn-warning btn-xs" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-edit"></i> Edit</a>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
