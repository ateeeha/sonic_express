    <section class="content-header">
      <h1><i class="fa fa-truck"> <?= $header ?></i></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>user/"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active"><?= $header ?></li>
      </ol>
    </section>
    <section class="content">
        <div class="box box-primary">
          <div class="box-body">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <?php 
                  if ($this->session->flashdata('alert-resi')) {
                    echo '<div class="alert alert-danger alert-message">';
                    echo $this->session->flashdata('alert-resi');
                    echo '</div>';
                  }
                ?>
                  <div class="row">
                    <div class="col-xs-12 col-sm-9 col-md-5">
                      <div class="input-group margin" >
                        <input required type="text" class="form-control" name="no_resi" placeholder="Masukkan Nomor Resi">
                        <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary" name="submit" value="Submit">Lacak</button>                   
                        </div>
                      </div>
                    </div>
                  </div>
                <?php if ($cek=='') {
                      }
                    else { ?>
                <div class="box-body table-responsive">
                  <table class="table table-bordered table-hover dt-responsive nowrap">
                    <thead>
                      <tr>
                        <th style="text-align: center">No Resi</th>
                        <th style="text-align: center">Tanggal</th>
                        <th style="text-align: center">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i = 1;
                        foreach ($cek->result() as $key) {
                      ?>
                      <tr>
                        <td style="text-align: center"><?= $key->no_resi; ?></td>
                        <td style="text-align: center"><?= $key->tanggal; ?></td>
                        <td style="text-align: center"><?= $key->status_tracking; ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>  
                </div>
                <?php } ?>
              </div>
            </form>
          </div>
        </div>
    </section>
