<section class="content">
  <form method="post" action="<?= site_url('user/simpan_transaksi'); ?>">
    <div class="box box-primary">
      <div class="box-body">
        <div>
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
        <div class="row">
          <div class="col-md-6">
              <div class="box-header with-border">
                <h3 class="box-title">Tarif & Tujuan</h3>
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
                  <div class="form-group">
                    <label>Provinsi *</label>
                    <select class="form-control provinsi_tujuan" name="provinsi_tujuan" required id="provinsi_tujuan">
                      <option value="">-- Pilih Provinsi --</option>
                      <?php foreach ($data->result() as $key): ?>
                      <option value="<?= $key->nama_provinsi; ?>"><?= $key->nama_provinsi; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kabupaten/Kota *</label>
                    <select class="form-control kota_tujuan" name="kabupaten_tujuan" required id="kabupaten_tujuan">
                      <option value="">-- Menunggu --</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kecamatan *</label>
                    <select class="form-control kecamatan_tujuan" name="kecamatan_tujuan" required id="kecamatan_tujuan">
                      <option value="">-- Menunggu --</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <table class="table table-bordered table-hover dt-responsive nowrap">
                    <thead>
                      <tr style="color: #ccc">
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
                  
                  <hr>
                  <div class="form-group has-success">
                    <div class="input-group">
                      <span class="input-group-addon">Total Biaya (Rp)</span>
                      <input readonly id="total_biaya" name="total_biaya" type="text" style="text-align: right" class="form-control">
                      <span class="input-group-addon">.00</span>
                    </div>
                  </div>
          </div><!--col-md-6-->
          <div class="col-md-6">
              <div class="box-header with-border">
                <h3 class="box-title">Penerima</h3>
              </div>
                  <div class="form-group">
                    <label>Nama *</label>
                    <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap Penerima">
                  </div>
                  <div class="form-group">
                    <label>Alamat *</label>
                    <p style="color: #ccc">Dusun, Desa RT/RW</p>
                    <textarea name="alamat" required class="form-control"  style="resize:vertical" rows="3" placeholder="Alamat Penerima; contoh: Jrakah, Kaliurang RT06/RW02"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Kode Pos *</label>
                    <input name="kode_pos" required type="number" class="form-control" placeholder="Kode Pos Penerima">
                  </div>
                  <div class="form-group">
                    <label>Nomor Telepon *</label>
                    <input name="no_tlp" required type="number" class="form-control" placeholder="Nomor Telepon Penerima">
                  </div>
                  <div class="box-footer">
                  <button name="submit" value="Submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
          </div><!--col-md-6-->
        </div><!--row-->
      </div><!--body-->
    </div><!--primary-->
  </form>
</section>