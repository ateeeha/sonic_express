    <section class="content-header">
      <h1><?= $header ?></h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="">Manajemen Kurir</a></li>
        <li class="active"><?= $header ?></li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <div class="box-body">
          <div>             
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
                <label class="col-md-4 col-sm-2 col-xs-12 control-label">ID Agen</label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="text" readonly class="form-control" name="id_agen" value="<?= $id_agen; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 col-sm-2 col-xs-12 control-label">Username</label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" name="username" value="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 col-sm-2 col-xs-12 control-label">E-Mail</label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="email" class="form-control" name="email" value="">
                </div>
              </div>

               <div class="form-group">
                <label class="col-md-4 col-sm-2 col-xs-12 control-label">Provinsi</label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <select class="form-control province" name="provinsi" required id="provinsi" class="col-md-6">
                    <option value="">--Pilih Provinsi--</option>
                    <?php foreach ($provinsi->result() as $prov): ?>
                    <option value="<?= $prov->nama_provinsi; ?>"><?= $prov->nama_provinsi; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-4 col-sm-2 col-xs-12 control-label">Kabupaten</label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                <select class="form-control city" name="kabupaten" required id="kabupaten" class="col-md-6">
                  <option value="">--Pilih Kabupaten--</option>
                </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-md-4 col-sm-2 col-xs-12 control-label">Password</label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="password" class="form-control" name="pass1" value="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 col-sm-2 col-xs-12 control-label">Ketik Ulang Password</label>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <input type="password" class="form-control" name="pass2" value="">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                  <button type="submit" class="btn btn-primary" name="submit" value="Submit"><i class="fa fa-save "></i> Simpan</button>
                  <a href="<?= base_url(); ?>produk"><button type="button" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Kembali</button></a>                    
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </section>
   