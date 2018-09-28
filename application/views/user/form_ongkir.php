    <section class="content-header">
      <h1><i class="fa fa-check-square-o"> <?= $header ?></i></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>user/"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active"><?= $header ?></li>
      </ol>
    </section>
    <section class="content">
      <form method="post">
        <div class="box box-danger">
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
            <div class="row">
              <div class="col-md-6">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-xs-3">
                          <label>Berat (gram) *</label>
                            <input name="berat" value="<?= $berat; ?>" id="berat" required type="number" min="1" class="form-control" placeholder="gram">
                        </div>
                        <div class="col-xs-3">
                          <label style="color: #ccc">Panjang (cm)</label>
                          <input name="panjang" value="<?= $panjang; ?>" id="panjang" type="number" min="0" class="form-control" placeholder="cm">
                        </div>
                        <div class="col-xs-3">
                          <label style="color: #ccc">Lebar (cm)</label>
                          <input name="lebar" value="<?= $lebar; ?>" id="lebar" type="number" min="0" class="form-control" placeholder="cm">
                        </div>
                        <div class="col-xs-3">
                          <label style="color: #ccc">Tinggi (cm)</label>
                          <input name="tinggi" value="<?= $tinggi; ?>" id="tinggi" type="number" min="0" class="form-control" placeholder="cm">
                        </div>
                      </div>
                    </div>
                  <div class="box-header with-border">
                    <h3 class="box-title">Alamat Asal</h3>
                  </div>
                  <div class="form-group">
                    <label>Provinsi *</label>
                    <select class="form-control cek_provinsi_asal" name="cek_provinsi_asal" required id="cek_provinsi_asal">
                      <option value="">-- Pilih Provinsi --</option>

                      <?php foreach ($data->result() as $key): ?>
                      <?php if ($key->nama_provinsi == $prov_asal) { ?>
                      <option value="<?= $key->nama_provinsi; ?>" selected><?= $key->nama_provinsi; ?></option>
                      <?php }else{ ?>
                      <option value="<?= $key->nama_provinsi; ?>"><?= $key->nama_provinsi; ?></option>
                      <?php } ?>
                      <?php endforeach ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kabupaten/Kota *</label>
                    <select class="form-control cek_kota_asal" name="cek_kabupaten_asal" required id="cek_kabupaten_asal">
                      <?php if (isset($kab_asal)){ ?>
                        <?php
                          $this->db->select('id_provinsi');
                          $this->db->from('t_provinsi');
                          $this->db->where(['nama_provinsi'=> $prov_asal]);
                          $idprovasal = $this->db->get()->row();

                          $this->db->from('t_kota');
                          $this->db->where(['id_provinsi'=> $idprovasal->id_provinsi]);
                          $getkotaasal = $this->db->get();
                        ?>
                        <?php foreach ($getkotaasal->result() as $kotaasal): ?>
                          <?php if ($kotaasal->nama_kota == $kab_asal){ ?>
                          <option value="<?= $kotaasal->nama_kota; ?>" selected><?= $kotaasal->nama_kota; ?></option>
                          <?php }else{ ?>
                          <option value="<?= $kotaasal->nama_kota; ?>"><?= $kotaasal->nama_kota; ?></option>
                          <?php } ?>
                        <?php endforeach ?>
                      <?php }else{ ?>
                      <option value="">-- Menunggu --</option>
                      <?php } ?>
                    </select>
                  </div>
              </div><!--col-md-6-->
              <div class="col-md-6">
                  <div class="box-header with-border">
                    <h3 class="box-title">Alamat Tujuan</h3>
                  </div>
                    <div class="form-group">
                        <label>Provinsi *</label>
                        <select class="form-control cek_provinsi_tujuan" name="cek_provinsi_tujuan" required id="cek_provinsi_tujuan">
                          <option value="">-- Pilih Provinsi --</option>

                          <?php foreach ($data->result() as $key): ?>
                          <?php if ($key->nama_provinsi == $prov_tujuan) { ?>
                          <option value="<?= $key->nama_provinsi; ?>" selected><?= $key->nama_provinsi; ?></option>
                          <?php }else{ ?>
                          <option value="<?= $key->nama_provinsi; ?>"><?= $key->nama_provinsi; ?></option>
                          <?php } ?>
                          <?php endforeach ?>

                        </select>
                      </div>
                      <div class="form-group">
                        <label>Kabupaten/Kota *</label>
                        <select class="form-control cek_kota_tujuan" name="cek_kabupaten_tujuan" required id="cek_kabupaten_tujuan">
                          <?php if (isset($kab_tujuan)){ ?>
                            <?php
                              $this->db->select('id_provinsi');
                              $this->db->from('t_provinsi');
                              $this->db->where(['nama_provinsi'=> $prov_tujuan]);
                              $idprovtujuan = $this->db->get()->row();

                              $this->db->from('t_kota');
                              $this->db->where(['id_provinsi'=> $idprovtujuan->id_provinsi]);
                              $getkotatujuan = $this->db->get();
                            ?>
                            <?php foreach ($getkotatujuan->result() as $kotatujuan): ?>
                              <?php if ($kotatujuan->nama_kota == $kab_tujuan) { ?>
                              <option value="<?= $kotatujuan->nama_kota; ?>" selected><?= $kotatujuan->nama_kota; ?></option>
                              <?php }else{ ?>
                              <option value="<?= $kotatujuan->nama_kota; ?>"><?= $kotatujuan->nama_kota; ?></option>
                              <?php } ?>
                            <?php endforeach ?>
                          <?php }else{ ?>
                          <option value="">-- Menunggu --</option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Kecamatan *</label>
                        <select class="form-control cek_kecamatan_tujuan" name="cek_kecamatan_tujuan" required id="cek_kecamatan_tujuan">
                          <?php if (isset($kec_tujuan)){ ?>

                            <?php
                              $this->db->select('id_kota');
                              $this->db->from('t_kota');
                              $this->db->where(['nama_kota'=> $kab_tujuan]);
                              $idkectujuan = $this->db->get()->row();

                              $this->db->from('t_kecamatan');
                              $this->db->where(['id_kota'=> $idkectujuan->id_kota]);
                              $getkectujuan = $this->db->get();
                            ?>
                            <?php foreach ($getkectujuan->result() as $kectujuan): ?>
                              <?php if ($kectujuan->nama_kecamatan == $kec_tujuan) { ?>
                              <option value="<?= $kectujuan->nama_kecamatan; ?>" selected><?= $kectujuan->nama_kecamatan; ?></option>
                              <?php }else{ ?>
                              <option value="<?= $kectujuan->nama_kecamatan; ?>"><?= $kectujuan->nama_kecamatan; ?></option>
                              <?php } ?>
                            <?php endforeach ?>

                          <?php }else{ ?>
                          <option value="">-- Menunggu --</option>
                          <?php } ?>
                        </select>
                      </div>
                      
                      <div class="box-footer">
                      <button name="submit" value="Submit" type="submit" class="btn btn-danger cek_ongkir">Cek</button>
                    </div>
              </div><!--col-md-6-->
            </div><!--row-->
            <?php if ($ongkir == ''): ?>
            <?php else: ?>
              <div class="form-group">
                  <table class="table table-bordered table-hover dt-responsive nowrap">
                    <thead>
                      <tr>
                        <th style="text-align: center">#</th>
                        <th style="text-align: center">Jenis Layanan</th>
                        <th style="text-align: center">Ongkir</th>
                        <th style="text-align: center">Total Biaya</th>
                        <th style="text-align: center">Estimasi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if ($ongkir->num_rows() > 0)
                    { 
                      //kondisi (p / l / t) jika tidak diisi.
                      if ($panjang == '' or $panjang <= 0 || $lebar == '' or $lebar <= 0 || $tinggi == '' or $tinggi <= 0) {
                        $panjang = 0;
                        $lebar = 0;
                        $tinggi = 0;
                      }

                      $i = 1;

                     foreach ($ongkir->result() as $og ){

                        $biaya = $og->harga;
                        $b = ($berat / 1000);
                        if ($b < 1) {

                          $total_biaya = $biaya;

                        }else{

                          if (($panjang * $lebar * $tinggi) < 18000) {

                            $x = $b * $biaya;

                            $ratusan = substr($x, -3);
                            if($ratusan < 500){
                              $total_biaya = $x - $ratusan;
                            }
                            else{
                              $total_biaya = $x + (1000-$ratusan);
                            }
                            

                          }else if (($panjang * $lebar * $tinggi) >= 18000) {

                            $volume = $panjang * $lebar * $tinggi / 6000;

                            if ($volume > $b) {
                              $x = $volume * $biaya;

                              $ratusan = substr($x, -3);

                              if($ratusan<500){
                                $total_biaya = $x - $ratusan;
                              }
                              else{
                                $total_biaya = $x + (1000-$ratusan);
                              }
                            }else {
                              $x = $b * $biaya;

                              $ratusan = substr($x, -3);
                              if($ratusan < 500){
                                $total_biaya = $x - $ratusan;
                              }
                              else{
                                $total_biaya = $x + (1000-$ratusan);
                              }
                            }

                          }
                        } 
                      ?>
                      <tr>
                        <td style="text-align: center"><?= $i++; ?></td>
                        <td style="text-align: center"><?= $og->jenis_layanan; ?></td>
                        <td style="text-align: right"><?= 'Rp. '.number_format($og->harga,0,',','.').',-' ?></td>
                        <td style="text-align: right"><?= 'Rp. '.number_format($total_biaya,0,',','.').',-' ?></td>
                        <td style="text-align: center"><?= $og->estimasi; ?> D</td>
                      </tr>
                    <?php } ?>
                    <?php }else{ ?>
                      <tr>
                        <td colspan="5" style="text-align: center">Data Belum Tersedia</td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
              </div>
            <?php endif ?>
          </div><!--body-->
        </div><!--primary-->
      </form>
    </section>