    <section class="content-header">
      <h1>Ubah Kurir</h1>
    </section>
    <section class="content">
          <div class="box box-primary">
            <div class="box-header with-border">                    
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
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Username</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="username" value="<?= $username; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Email</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="email" value="<?= $email; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Provinsi</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <select class="province" name="provinsi" required id="provinsi" class="col-md-6">
                      <option value="">--Pilih Provinsi--</option>
                      <option selected value="<?= $provinsi; ?>"><?= $provinsi; ?></option>
                      <?php foreach ($data->result() as $key): ?>
                      <option value="<?= $key->nama_provinsi; ?>"><?= $key->nama_provinsi; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>               
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Kabupaten</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                  <select class="city" name="kabupaten" required id="kabupaten" class="col-md-6">
                    <option value="">--Pilih Kabupaten--</option>
                    <option selected value="<?= $kabupaten; ?>"><?= $kabupaten; ?></option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Status</label>
                  <div class="col-md-4 col-sm-6">
                    <select name="status_kurir" class="form-control">
                        <option value=""disabled selected>--Pilih Status--</option>
                        <option value="1" <?php if ($status_kurir == 1) { echo "selected";} ?>>Tidak Aktif</option>
                        <option value="2" <?php if ($status_kurir == 2) { echo "selected";} ?>>Aktif</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                    <button type="submit" class="btn btn-primary" name="submit" value="Submit"><i class="fa fa-save"></i> Save</button>                 
                  </div>
                </div>
              </div>
              <div class="box-footer">
              </div>
            </form>
          </div>
    </section>
   