<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/bootstrap.min.css">
  <!-- Jquery UI-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/jquery-ui.min.css">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Data Tables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/responsive.bootstrap.min.css">  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/skin-black-light.min.css">

</head>
<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">
    <header class="main-header">

    <!-- Logo -->
    <a href="<?= base_url(); ?>user/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SE</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?= ucfirst($this->session->userdata('username_user')); ?></b></span>
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
              <i class="fa fa-gears"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a href="" class="fa fa-user"> Profil</a></li>
              <li><a href="" class="fa fa-edit"> Ubah Kata Sandi</a></li>
              <li class="divider"></li>
              <li><a href="<?= base_url(); ?>login/logout_user/" class="fa fa-sign-out"> Keluar</a></li>
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
    <strong>Copyright &copy; 2018 <a href="">Imkom</a>.</strong>
  </footer>
  <!--end footer-->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/user/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/user/js/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/user/js/bootstrap.min.js"></script>
<!-- Data Tables -->
<script src="<?php echo base_url(); ?>assets/user/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/user/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/user/js/dataTables.responsive.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/user/js/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/user/js/adminlte.min.js"></script>
<script type="text/javascript">
  $(".province").change(function(){
      $( ".city" ).html("<option>-- Menunggu --</option>");
      var data = $(this).val();
      $.get( "<?php echo site_url('user/getkota');?>", { sts: data }, function( data ) {
        $( ".city" ).html( data );
      });
  });

  $(".cek_provinsi_asal").change(function(){
      $( ".cek_kota_asal" ).html("<option>-- Menunggu --</option>");
      var data = $(this).val();
      $.get( "<?php echo site_url('user/getkota');?>", { sts: data }, function( data ) {
        $( ".cek_kota_asal" ).html( data );
      });
    });

  $(".cek_provinsi_tujuan").change(function(){
      $( ".cek_kota_tujuan" ).html("<option>-- Menunggu --</option>");
      var data = $(this).val();
      $.get( "<?php echo site_url('user/getkota');?>", { sts: data }, function( data ) {
        $( ".cek_kota_tujuan" ).html( data );
        $( ".cek_kecamatan_tujuan" ).html("<option>-- Menunggu --</option>");
      });
    });
  $(".cek_kota_tujuan").change(function(){
      $( ".cek_kecamatan_tujuan" ).html("<option>-- Menunggu --</option>");
      var data = $(this).val();
      $.get( "<?php echo site_url('user/getkecamatan');?>", { sts: data }, function( data ) {
        $( ".cek_kecamatan_tujuan" ).html( data );
      });
    });
// ==========
   $(".provinsi_tujuan").change(function(){
      $( ".kota_tujuan" ).html("<option>-- Menunggu --</option>");
      var data = $(this).val();
      $.get( "<?php echo site_url('user/getkota');?>", { sts: data }, function( data ) {
        $( ".kota_tujuan" ).html( data );
        $( "#kecamatan_tujuan" ).html("<option>-- Menunggu --</option>");
        $( "#total_biaya" ).val("");
        $( ".ongkir_detail" ).html("<td colspan='4' style='text-align:center'><i class='fa fa-refresh fa-spin'></i><td/>");
      });
    });

   $(".kota_tujuan").change(function(){
      $( ".kecamatan_tujuan" ).html("<option>-- Menunggu --</option>");
      var data = $(this).val();
      $.get( "<?php echo site_url('user/getkecamatan');?>", { sts: data }, function( data ) {
        $( ".kecamatan_tujuan" ).html( data );
        $( "#total_biaya" ).val("");
        $( ".ongkir_detail" ).html("<td colspan='4' style='text-align:center'><i class='fa fa-refresh fa-spin'></i><td/>");
      });
    });

   $(".kecamatan_tujuan").change(function(){
      $( ".ongkir_detail" ).html("<td colspan='4' style='text-align:center'><i class='fa fa-refresh fa-spin'></i><td/>");
      var berat = $('#berat').val();
      var panjang = $('#panjang').val();
      var lebar = $('#lebar').val();
      var tinggi = $('#tinggi').val();
      var kecamatan = $(this).val();
      var kabupaten = $(".kota_tujuan").val();
      $.get( "<?php echo site_url('user/gettarif');?>", 
        { 
          kec:kecamatan, 
          kab:kabupaten,  
          berat:berat,  
          panjang:panjang,  
          lebar:lebar,  
          tinggi:tinggi  
        }, function( data ) {
        $( ".ongkir_detail" ).html( data );
         $( "#total_biaya" ).val("");
        // $( ".ongkir_pilih" ).val( data );
      }); 
    });

    $("#berat, #panjang, #lebar, #tinggi").keyup(function(){
      $( ".ongkir_detail" ).html("<td colspan='4' style='text-align:center'><i class='fa fa-refresh fa-spin'></i><td/>");
      var berat = $('#berat').val();
      var panjang = $('#panjang').val();
      var lebar = $('#lebar').val();
      var tinggi = $('#tinggi').val();
      var kecamatan = $('.kecamatan_tujuan').val();
      var kabupaten = $(".kota_tujuan").val();
      $.get( "<?php echo site_url('user/gettarif');?>", 
        { 
          kec:kecamatan, 
          kab:kabupaten,  
          berat:berat,  
          panjang:panjang,  
          lebar:lebar,  
          tinggi:tinggi  
        }, function( data ) {
        $( ".ongkir_detail" ).html( data );
         $( "#total_biaya" ).val("");
        // $( ".ongkir_pilih" ).val( data );
      }); 
    });

   function get_totalbiaya(total_biaya){

      // alert(ongkir);
      $("#total_biaya").val(total_biaya);
    };

  $(document).ready(function(){
      $('#datatable').DataTable();
  });
  $('.alert-message').alert().delay(20000).slideUp('slow');
</script>
</body>
</html>       
