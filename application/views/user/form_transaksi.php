    <section class="content-header">
      <h1><i class="fa fa-money"> Transaksi</i></h1>
    </section>

    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
          <div class="box-header with-border">      
            <?php if(validation_errors())
               {
                 echo "<div class='alert alert-warning alert-message'>";
                 echo validation_errors();
                 echo "</div>";
               } ?> 
            <?php if($this->session->flashdata('success'))
               {
                 echo "<div class='alert alert-success alert-message'>";
                 echo $this->session->flashdata('success');
                 echo "</div>";
               } ?>                
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" action="<?php echo site_url('user/transaksi_simpan'); ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Asal</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="asal" value="">
                  </div>
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Nama</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="nama" value="">
                  </div>
                </div>              

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Tujuan</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="tujuan" value="">
                  </div>
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Provinsi</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <select class="province" name="provinsi" required id="provinsi" class="col-md-6">
                      <option value="">--Pilih Provinsi--</option>
                      <?php foreach ($data->result() as $key): ?>
                      <option value="<?= $key->nama_provinsi; ?>"><?= $key->nama_provinsi; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Berat</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="berat" value="">
                  </div>
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Kabupaten</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                  <select class="city" name="kabupaten" required id="kabupaten" class="col-md-6">
                    <option value="">--Pilih Kabupaten--</option>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Jenis Kiriman</label>
                  <div class="col-md-3 col-sm-6">
                    <select name="jenis_kiriman" class="form-control">
                        <option value=""disabled selected>Pilih Jenis Kiriman</option>
                        <option>pilihan1</option>
                        <option>pilihan2</option>
                    </select>
                  </div>
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Alamat</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                  <textarea class="form-control" name="alamat"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Panjang</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="panjang" value="">
                  </div>
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Kode Pos</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="kode_pos" value="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Lebar</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="lebar" value="">
                  </div>
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">No Telepon</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="no_tlp" value="">
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
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2" align="right">
                    <button type="submit" class="btn btn-success" name="submit" value="Submit"><i class="fa fa-save "></i> Proses</button>                   
                  </div>
                </div>

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