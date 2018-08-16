<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/ionicons.min.css">
  <!-- Data Tables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/responsive.bootstrap.min.css">  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/skin-black-light.min.css">


</head>
<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">
    <header class="main-header">

    <!-- Logo -->
    <a href="<?= base_url(); ?>admin/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>IA</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?= ucfirst($this->session->userdata('username_admin')); ?></b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav navbar-center">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-gear"></i>
            </a>
            <ul class="dropdown-menu">
              <li class="divider"></li>
              <li><a href="<?= base_url(); ?>index.php/login/logout_admin/" class="fa fa-sign-out"> Keluar</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!--nav-->
  <aside class="main-sidebar">
    <?php echo $nav; ?>
  </aside>
  <!--end nav-->

  <!--content-->
  <div class="content-wrapper">
    <?php echo $content; ?>
  </div>
  <!--end content-->

  <!--footer-->
      <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b><?= date(DATE_RSS,time()); ?></b>
    </div>
    <strong>Copyright &copy; 2018 <a href="">Anton Hermawan</a>.</strong>
  </footer>
  <!--end footer-->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>
<!-- Data Tables -->
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/dataTables.responsive.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/admin/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin/js/adminlte.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/admin/js/jquery.slimscroll.min.js"></script>
<!-- ckeditor -->
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript">

   $(".province").change(function(){
      $( ".city" ).html("<option>Loading...</option>");
      var data = $(this).val();
      $.get( "<?php echo site_url('admin/getcity');?>", { sts: data }, function( data ) {
        $( ".city" ).html( data );
      });
    });

  $(document).ready(function(){
      $('#datatable').DataTable();
  });

  $('.alert-message').alert().delay(3000).slideUp('slow');
</script>
</body>
</html>
