    <section class="content-header">
      <h1><i class="fa fa-truck"> <?= $header ?></i></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>admin/"><i class="fa fa-home"></i> Dashboard</a></li>
      </ol>
    </section>

    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover dt-responsive nowrap" id="datatable">
                <thead>
                  <tr>
                    <th style="text-align: center">#</th>
                    <th style="text-align: center">#</th>
                    <th style="text-align: center">#</th>
                    <th style="text-align: center">#</th>
                    <th style="text-align: center">#</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center"></td>
                    <td style="text-align: center"></td>
                    <td style="text-align: center"></td>
                    <td style="text-align: center"></td>
                    <td style="text-align: center"></td>
                  </tr>
              </table>
                </div>
            <!-- /.box-body -->
              <div class="box-footer with-border">
                <p class="help-text">* Button <label class="label label-primary" style="padding:3px 5px;">Aktif</label> untuk menonaktifkan member, button <label class="label label-danger" style="padding:3px 5px;">Tidak Aktif</label> untuk mengaktifkan member</p>
              </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
        <!--/.col (right) -->