    <section class="content-header">
      <h1><?= $header ?></h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="">Manage Kurir</a></li>
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
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">ID Agen</label>
                  <div class="col-md-7 col-sm-6 col-xs-12">
                    <input type="text" readonly class="form-control col-md-7 col-xs-12" name="id_agen" value="<?= $id_agen; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Username</label>
                  <div class="col-md-7 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="username" value="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">E-Mail</label>
                  <div class="col-md-7 col-sm-6 col-xs-12">
                    <input type="email" class="form-control col-md-7 col-xs-12" name="email" value="">
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Provinsi</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <select class="province" name="provinsi" required id="provinsi" class="col-md-6">
                      <option value="">--Pilih Provinsi--</option>
                      <?php foreach ($provinsi->result() as $prov): ?>
                      <option value="<?= $prov->nama_provinsi; ?>"><?= $prov->nama_provinsi; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Kabupaten</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                  <select class="city" name="kabupaten" required id="kabupaten" class="col-md-6">
                    <option value="">--Pilih Kabupaten--</option>
                  </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Password</label>
                  <div class="col-md-7 col-sm-6 col-xs-12">
                    <input type="password" class="form-control col-md-7 col-xs-12" name="pass1" value="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Ketik Ulang Password</label>
                  <div class="col-md-7 col-sm-6 col-xs-12">
                    <input type="password" class="form-control col-md-7 col-xs-12" name="pass2" value="">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                    <button type="submit" class="btn btn-success" name="submit" value="Submit"><i class="fa fa-save "></i> Simpan</button>
                    <a href="<?= base_url(); ?>produk"><button type="button" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Kembali</button></a>                    
                  </div>
                </div>

              </div>
            </form>
            <div class="box-footer with-border">
              </div>
          </div>
    </section>
   