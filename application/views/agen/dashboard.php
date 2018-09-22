<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agen | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/user/css/bootstrap.min.css">
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
    <a href="<?= base_url(); ?>admin/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>IA</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?= ucfirst($this->session->userdata('username_agen')); ?></b></span>
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
              <li><a href="<?= base_url(); ?>login/logout_agen/" class="fa fa-sign-out"> Keluar</a></li>
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
<script src="<?php echo base_url(); ?>assets/user/js/jquery.min.js"></script>
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
  $(document).ready(function(){
      $('#datatable').DataTable();
  });
  //select all checkboxes
  $("#check-all").change(function(){  //"select all" change 
      var status = this.checked; // "select all" checked status
      $('.check-item').each(function(){ //iterate all listed checkbox items
          this.checked = status; //change ".checkbox" checked status
      });
  });

  $('.check-item').change(function(){ //".checkbox" change 
      //uncheck "select all", if one of the listed checkbox item is unchecked
      if(this.checked == false){ //if this item is unchecked
          $("#check-all")[0].checked = false; //change "select all" checked status to false
      }
      
      //check "select all" if all checkbox items are checked
      if ($('.check-item:checked').length == $('.check-item').length ){ 
          $("#check-all")[0].checked = true; //change "select all" checked status to true
      }
  });
  
  // ==========
   $(".provinsi_tujuan").change(function(){
      $( ".kota_tujuan" ).html("<option>-- Menunggu --</option>");
      var data = $(this).val();
      $.get( "<?php echo site_url('agen/getkota');?>", { sts: data }, function( data ) {
        $( ".kota_tujuan" ).html( data );
        $( "#kecamatan_tujuan" ).html("<option>-- Menunggu --</option>");
        $( "#total_biaya" ).val("");
        $( ".ongkir_detail" ).html("<td colspan='4' style='text-align:center'><i class='fa fa-refresh fa-spin'></i><td/>");
      });
    });

   $(".kota_tujuan").change(function(){
      $( ".kecamatan_tujuan" ).html("<option>-- Menunggu --</option>");
      var data = $(this).val();
      $.get( "<?php echo site_url('agen/getkecamatan');?>", { sts: data }, function( data ) {
        $( ".kecamatan_tujuan" ).html( data );
        $( "#total_biaya" ).val("");
        $( ".ongkir_detail" ).html("<td colspan='4' style='text-align:center'><i class='fa fa-refresh fa-spin'></i><td/>");
      });
    });

   $(".kecamatan_tujuan").change(function(){
      $( ".ongkir_detail" ).html("<td colspan='4' style='text-align:center'><i class='fa fa-refresh fa-spin'></i><td/>");
      var origin = $('#origin').val();
      var berat = $('#berat').val();
      var panjang = $('#panjang').val();
      var lebar = $('#lebar').val();
      var tinggi = $('#tinggi').val();
      var kecamatan = $(this).val();
      var kabupaten = $(".kota_tujuan").val();
      $.get( "<?php echo site_url('agen/gettarif');?>", 
        { 
          origin:origin, 
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
      var origin = $('#origin').val();
      var berat = $('#berat').val();
      var panjang = $('#panjang').val();
      var lebar = $('#lebar').val();
      var tinggi = $('#tinggi').val();
      var kecamatan = $('.kecamatan_tujuan').val();
      var kabupaten = $(".kota_tujuan").val();
      $.get( "<?php echo site_url('agen/gettarif');?>", 
        { 
          origin:origin, 
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

    $("#email").keyup(function(){
      $("#labelnama").html("Nama * <i class='fa fa-refresh fa-spin'>");
      $("#labelalamat").html("Alamat * <i class='fa fa-refresh fa-spin'>");
      $("#labelorigin").html("Origin * <i class='fa fa-refresh fa-cross'>");

      var email = $('#email').val();
      $.get( "<?php echo site_url('agen/getorigin');?>", 
        { 
          email:email 

        }, 

        function( data ) {
          if(data === 'tidak ada'){
            
            $("#labelnama").html("Nama * <i class='fa fa-times'>");
            $("#labelalamat").html("Alamat * <i class='fa fa-times'>");
            $("#labelorigin").html("Origin * <i class='fa fa-times'>");

            $( "#nama" ).val( '' );
            $( "#alamat" ).val( '' );
            $( "#origin" ).val( '' );
            $("#total_biaya").val( '' );
            $( ".ongkir_detail" ).html("<td colspan='4' style='text-align:center'><i class='fa fa-refresh fa-spin'></i><td/>");



          }else{
            var result = data.split('|');
            $( "#nama" ).val( result[0] );
            $( "#alamat" ).val( result[1] );
            $( "#origin" ).val( result[2] );

            $("#labelnama").html("Nama * <i class='fa fa-check'>");
            $("#labelalamat").html("Alamat * <i class='fa fa-check'>");
            $("#labelorigin").html("Origin * <i class='fa fa-check'>");

          }
      }); 
    });


   function get_totalbiaya(total_biaya){

      // alert(ongkir);
      $("#total_biaya").val(total_biaya);
    };
  $('.alert-message').alert().delay(3000).slideUp('slow');
</script>
</body>
</html>
