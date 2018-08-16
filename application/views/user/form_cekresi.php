    <section class="content-header">
      <h1><i class="fa fa-money"> Cek Resi</i></h1>
    </section>

    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">

            <!-- /.box-header -->
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <?php 
                  if ($this->session->flashdata('alert')) {
                    echo '<div class="alert alert-danger alert-message">';
                    echo $this->session->flashdata('alert');
                    echo '</div>';
                  }
                  if ($this->session->flashdata('success')) {
                    echo '<div class="alert alert-success alert-message">';
                    echo $this->session->flashdata('success');
                    echo '</div>';
                  }
                ?>
                <div class="form-group">
                  <label class="col-md-2 col-sm-2 col-xs-12 control-label">KODE RESI</label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="no_resi" value="">
                  </div>
                  <div >
                    <button type="submit" class="btn btn-success" name="submit" value="Submit"><i class="fa fa-check "></i> CEK</button>                   
                  </div>
                </div>

              </div>
            </form>
            <div class="box-body table-responsive">
            <?php if ($cek=='') {
                    
                    }
                  else { ?>
              <table class="table table-bordered table-hover dt-responsive nowrap">
                <thead>
                  <tr>
                    <th style="text-align: center">id_tracking</th>
                    <th style="text-align: center">no_resi</th>
                    <th style="text-align: center">tanggal</th>
                    <th style="text-align: center">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $i = 1;
                    foreach ($cek->result() as $key) {
                  ?>
                  <tr>
                    <td><?= $key->id_tracking; ?></td>
                    <td><?= $key->no_resi; ?></td>
                    <td><?= $key->tanggal; ?></td>
                    <td><?= $key->status_tracking; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
                  <!--  -->
              </table>
              <?php } ?>
                </div>
              <div class="box-footer with-border">
              </div>
          </div>

          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
        <!--/.col (right) -->