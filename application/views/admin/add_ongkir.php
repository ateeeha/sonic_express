    <section class="content-header">
      <h1>Add Ongkir</h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>admin/"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="<?= base_url(); ?>produk/">Add Ongkir</a></li>
        <li class="active"><?= $header ?></li>
      </ol>
    </section>
    <section class="content">
          <!-- Horizontal Form -->
          <div class="box box-success">
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
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?= site_url('admin/save_ongkir'); ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

              <legend>Asal</legend>
                  <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12 control-label">Provinsi</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <select class="province_asal" name="provinsi_asal" required id="provinsi_asal" class="col-md-6">
                        <option value="">--Pilih Provinsi--</option>
                        <?php foreach ($data->result() as $key): ?>
                        <option value="<?= $key->nama_provinsi; ?>"><?= $key->nama_provinsi; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12 control-label">Kabupaten</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                    <select class="city_asal" name="kabupaten_asal" required id="kabupaten_asal" class="col-md-6">
                      <option value="">--Pilih Kota/Kabupaten--</option>
                    </select>
                    </div>
                  </div>

          
                  <legend>Tujuan</legend>
                  <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12 control-label">Provinsi</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <select class="province_tujuan" name="provinsi_tujuan" required id="provinsi_tujuan" class="col-md-6">
                        <option value="">--Pilih Provinsi--</option>
                        <?php foreach ($data->result() as $key): ?>
                        <option value="<?= $key->nama_provinsi; ?>"><?= $key->nama_provinsi; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12 control-label">Kabupaten</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                    <select class="city_tujuan" name="kabupaten_tujuan" required id="kabupaten_tujuan" class="col-md-6">
                      <option value="">--Pilih Kota/Kabupaten--</option>
                    </select>
                    </div>
                  </div>

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Jenis Layanan</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="jenis_layanan" value="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Berat</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="berat" value="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Harga Ongkir</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="harga" value="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Estimasi</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="estimasi" value="">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                    <button type="submit" class="btn btn-success" name="submit" value="Submit"><i class="fa fa-save "></i> Simpan</button>                   
                  </div>
                </div>

              </div>
            </form>
            <div class="box-footer with-border">
              </div>
          </div>
    </section>
   