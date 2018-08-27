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
            <form method="post" action="<?php echo site_url('droppoint/kirim_paket'); ?>">
            <div class="box-header with-border">
                <div style="float:right">
                <label>Drop Point Tujuan :</label>
                  <select name="dp_tujuan" required> 
                      <option value="" disabled selected>--Pilih Droppoint--</option>
                      <?php foreach ($droppoint->result() as $dp): ?>
                      <option value="<?= $dp->id_dp; ?>"><?= $dp->username; ?></option>
                      <?php endforeach ?>
                  </select>
                  </div>
                </div>

               <div class="col-md-10 col-sm-8">
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
                </div>                                         
              <div class="box-footer with-border">
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">                
                    <button type="submit" class="btn btn-warning" name="submit" value="Submit"><i class="fa fa-save "></i> Sumbit</button>
                  </div>
                </div>
              </div>
              </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
        <!--/.col (right) -->