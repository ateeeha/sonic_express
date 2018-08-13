    <section class="content-header">
      <h1>Pendaftaran</h1>
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
            </div>
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Username</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="username" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Nama Lengkap</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="fullname" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Email</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="email" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Password</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <input type="password" class="form-control col-md-7 col-xs-12" name="pass1" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Ketik Ulang Password</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <input type="password" class="form-control col-md-7 col-xs-12" name="pass2" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Level</label>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <select name="level" class="form-control">
                        <option value="" disabled selected>--Pilih--</option>
                        <option value="1">Level 1</option>
                        <option value="2">Level 2</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                    <button type="submit" class="btn btn-success" name="submit" value="Submit"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Kembali</button>                    
                  </div>
                </div>
              </div>
              <div class="box-footer">
              </div>
            </form>
          </div>
    </section>
   