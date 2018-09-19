<section class="content">
  <form method="post">
    <div class="box box-primary">
      <div class="box-body">
        <div class="box-header with-border">
        <h3 class="box-title">Cek Ongkir</h3>
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
                <?php if($this->session->flashdata('alert'))
                {
                 echo "<div class='alert alert-warning alert-message'>";
                 echo $this->session->flashdata('alert');
                 echo "</div>";
                } ?>    
        </div>
          <div class="form-group">
            <div class="row">
              <div class="col-xs-3">
                <label>Berat (gram) *</label>
                  <input name="berat" id="berat" required type="number" min="1" class="form-control" placeholder="gram">
              </div>
              <div class="col-xs-3">
                <label style="color: #ccc">Panjang (cm)</label>
                <input name="panjang" id="panjang" type="number" min="0" class="form-control" placeholder="cm">
              </div>
              <div class="col-xs-3">
                <label style="color: #ccc">Lebar (cm)</label>
                <input name="lebar" id="lebar" type="number" min="0" class="form-control" placeholder="cm">
              </div>
              <div class="col-xs-3">
                <label style="color: #ccc">Tinggi (cm)</label>
                <input name="tinggi" id="tinggi" type="number" min="0" class="form-control" placeholder="cm">
              </div>
            </div>
          </div>
        <div class="row">
          <div class="col-md-6">
              <div class="box-header with-border">
                <h3 class="box-title">Asal</h3>
              </div>
                  <div class="form-group">
                    <label for="origin">Origin</label>
                    <input id="origin" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Provinsi *</label>
                    <select class="form-control cek_provinsi_asal" name="cek_provinsi_asal" required id="cek_provinsi_asal">
                      <option value="">-- Pilih Provinsi --</option>
                      <?php foreach ($data->result() as $key): ?>
                      <option value="<?= $key->nama_provinsi; ?>"><?= $key->nama_provinsi; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kabupaten/Kota *</label>
                    <select class="form-control cek_kota_asal" name="cek_kabupaten_asal" required id="cek_kabupaten_asal">
                      <option value="">-- Menunggu --</option>
                    </select>
                  </div>
          </div><!--col-md-6-->
          <div class="col-md-6">
              <div class="box-header with-border">
                <h3 class="box-title">Tujuan</h3>
              </div>
                <div class="form-group">
                    <label>Provinsi *</label>
                    <select class="form-control cek_provinsi_tujuan" name="cek_provinsi_tujuan" required id="cek_provinsi_tujuan">
                      <option value="">-- Pilih Provinsi --</option>
                      <?php foreach ($data->result() as $key): ?>
                      <option value="<?= $key->nama_provinsi; ?>"><?= $key->nama_provinsi; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kabupaten/Kota *</label>
                    <select class="form-control cek_kota_tujuan" name="cek_kabupaten_tujuan" required id="cek_kabupaten_tujuan">
                      <option value="">-- Menunggu --</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kecamatan *</label>
                    <select class="form-control cek_kecamatan_tujuan" name="cek_kecamatan_tujuan" required id="cek_kecamatan_tujuan">
                      <option value="">-- Menunggu --</option>
                    </select>
                  </div>
                  
                  <div class="box-footer">
                  <button name="submit" value="Submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
          </div><!--col-md-6-->
        </div><!--row-->
        <div class="form-group">
        <table class="table table-bordered table-hover dt-responsive nowrap">
          <thead>
            <tr>
              <th style="text-align: center" width="5%">#</th>
              <th style="text-align: center">Paket</th>
              <th style="text-align: center">Ongkir</th>
              <th style="text-align: center">Estimasi</th>
            </tr>
          </thead>
          <tfoot class="ongkir_detail" id="ongkir_detail">
          </tfoot>                
        </table>
        </div>
      </div><!--body-->
    </div><!--primary-->
  </form>
</section>