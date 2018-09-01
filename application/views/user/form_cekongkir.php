    <section class="content-header">
      <h1>Cek Ongkir</h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>admin/"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="<?= base_url(); ?>produk/">Cek Ongkir</a></li>
        <li class="active"><?= $header; ?></li>
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
            <div class="box-body table-responsive">
            <?php if ($cek=='') {
                    
                    }
                  else { ?>
              <table class="table table-bordered table-hover dt-responsive nowrap">
                <thead>
                  <tr>
                    <th style="text-align: center">Origin</th>
                    <th style="text-align: center">Tujuan</th>
                    <th style="text-align: center">Harga</th>
                    <th style="text-align: center">Berat(Kg)</th>
                    <th style="text-align: center">Estimasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $i = 1;
                    foreach ($cek->result() as $key) {
                  ?>
                  <tr>
                    <td style="text-align: center"><?= $key->origin; ?></td>
                    <td style="text-align: center"><?= $key->kota; ?>, <?= $key->kecamatan; ?></td>
                    <td style="text-align: center"><?= $key->harga; ?></td>
                    <td style="text-align: center"><?= $key->berat; ?></td>
                    <td style="text-align: center"><?= $key->estimasi; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
                  <!--  -->
              </table>
              <?php } ?>
                </div>
              <hr>

            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
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
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Berat</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="berat" value="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Jenis Kiriman</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <select class="col-md-6">
                      <option value="">--Pilih Kiriman--</option>
                    </select>
                  </div>
                </div> 

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Panjang</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="panjang" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Lebar</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="lebar" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Tinggi</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="tinggi" value="">
                  </div>
                </div>      

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Nilai Barang</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="nilai_barang" value="">
                  </div>
                </div>                 

                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                    <button type="submit" class="btn btn-success" name="submit" value="Submit"><i class="fa fa-check "></i> Cek</button>                   
                  </div>
                </div>

              </div>
            </form>
            <div class="box-footer with-border">
              </div>
          </div>
    </section>
   