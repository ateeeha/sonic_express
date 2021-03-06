    <section class="content-header">
      <h1>Add Admin</h1>
      <ol class="breadcrumb">
        <li><a><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a>Add Admin</a></li>
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
                  </div>
                </div>

              </div>
            </form>
            <div class="box-footer with-border">
              </div>
          </div>
    </section>
   