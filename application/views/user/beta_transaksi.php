<section class="content">
      <div class="row">
        <form>
          <!-- left column -->
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tarif</h3>
              </div>
                <div class="box-body">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-3">
                        <label>Berat *</label>
                        <div class="input-group">
                          <input id="berat" required type="number" min="1" class="form-control" placeholder="kg">
                        </div>
                      </div>
                      <div class="col-xs-3">
                        <label>Panjang</label>
                        <div class="input-group">
                        <input id="panjang" type="number" min="0" class="form-control" placeholder="cm">
                        </div>
                      </div>
                      <div class="col-xs-3">
                        <label>Lebar</label>
                        <div class="input-group">
                        <input id="lebar" type="number" min="0" class="form-control" placeholder="cm">
                        </div>
                      </div>
                      <div class="col-xs-3">
                        <label>Tinggi</label>
                        <div class="input-group">
                        <input id="tinggi" type="number" min="0" class="form-control" placeholder="cm">
                        </div>
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
                      <option value="">-- Pilih Kabupaten --</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kecamatan *</label>
                    <select class="form-control kecamatan_tujuan" id="kecamatan_tujuan">
                      <option value="">-- Pilih Kecamatan --</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <table class="table table-bordered table-hover dt-responsive nowrap">
                    <thead>
                      <tr>
                        <th style="text-align: center" width="5%">#</th>
                        <th style="text-align: center">Paket</th>
                        <th style="text-align: center">Harga</th>
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
                      <span class="input-group-addon">Total Harga</span>
                      <input id="total_biaya" name="total_biaya" type="text" class="form-control">
                      <span class="input-group-addon">.00</span>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <!-- right column -->
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Penerima</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Enter ...">
                  </div>
                  <!-- textarea -->
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control"  style="resize:vertical" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                  <div class="form-group">
                    <label>Kode Pos</label>
                    <input type="number" class="form-control" placeholder="Enter ...">
                  </div>
                  <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="number" class="form-control" placeholder="Enter ...">
                  </div>
                  <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>