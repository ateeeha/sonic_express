    <section class="content-header">
      <h1><i class="fa fa-users"></i> <?= $header ?></h1>
    </section>
    <section class="content">
      <div class="box box-primary">
        <div class="box-body">
          <div class="box-header with-border">
            <div style="float:right">
              <a href="<?= base_url(); ?>agen/add_kurir" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kurir</a>            
            </div>
            <br />
            <div style="float:left">
                <?php if(validation_errors())
                 {
                   echo "<div class='alert alert-warning alert-message'>";
                   echo validation_errors();
                   echo "</div>";
                 } ?> 
                 <?php if ($this->session->flashdata('alert')) 
                 {
                   echo "<div class='alert alert-warning alert-message'>";
                   echo $this->session->flashdata('alert');
                   echo "</div>";
                 }
                 ?>
                  <?php if ($this->session->flashdata('success')) 
                 {
                   echo "<div class='alert alert-success alert-message'>";
                   echo $this->session->flashdata('success');
                   echo "</div>";
                 }               
                 ?>
             </div>
            <div class="clearfix"></div>
          </div>
          <div class="box-body table-responsive">
            <table class="table table-bordered table-hover dt-responsive nowrap" id="datatable">
              <thead>
                <tr>
                  <th style="text-align: center">#</th>
                  <th style="text-align: center">Id Agen</th>
                  <th style="text-align: center">Id Kurir</th>
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
                  <td style="text-align: center"><?= $key->id_agen; ?></td>
                  <td style="text-align: center"><?= $key->id_kurir; ?></td>
                  <td style="text-align: center"><?= $key->username; ?></td>
                  <td style="text-align: center"><?= $key->email; ?></td>
                  <td style="text-align: center"><?= $key->status_kurir; ?></td>
                  <td>
                      <a href="<?= base_url(); ?>/agen/edit_kurir/<?= $key->id_kurir; ?>" class="btn btn-warning btn-xs" onclick="return confirm('Anda Yakin ?');"><i class="fa fa-edit"></i> Edit</a>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
