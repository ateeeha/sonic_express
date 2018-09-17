     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_home)){echo $active_home;}?>">
          <a href="<?= base_url(); ?>agen/">
            <i class="fa fa-home"></i> <span>HOME</span>
          </a>
        </li>
        <li class="<?php if(isset($active_transaksi)){echo $active_transaksi;}?>">
          <a href="<?= base_url(); ?>agen/transaksi/">
            <i class="fa fa-edit"></i> <span>TRANSAKSI</span>
          </a>
        </li>
        <li class="<?php if(isset($active_user)){echo $active_user;}?>">
          <a href="<?= base_url(); ?>agen/user/">
            <i class="fa fa-users"></i> <span>MANAGE USER</span>
          </a>
        </li>
        <li class="<?php if(isset($active_kurir)){echo $active_kurir;}?>">
          <a href="<?= base_url(); ?>agen/kurir/">
            <i class="fa fa-users"></i> <span>MANAGE KURIR</span>
          </a>
        </li>
        <!-- ============Paket Kurir============= -->
        <li class="treeview <?php if(isset($active_menu_kurir)){echo $active_menu_kurir;}?>">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>PAKET KURIR</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(isset($active_paket_kurir)){echo $active_paket_kurir;}?>"><a href="<?= base_url(); ?>agen/paket_kurir/"><i class="fa fa-cube"></i> Paket</a></li>
            <li class="<?php if(isset($active_list_paket_kurir)){echo $active_list_paket_kurir;}?>"><a href="<?= base_url(); ?>agen/list_paket_kurir/"><i class="fa fa-list"></i> List</a></li>
            <li class="<?php if(isset($active_list_jemput_paket)){echo $active_list_jemput_paket;}?>">
              <a href="<?= base_url(); ?>agen/list_jemput_paket/">
            <i class="fa fa-history"></i> <span>Riwayat</span>
          </a>
        </li>
          </ul>
        </li>
        <!-- ===========End Paket Kurir============== -->
        <!-- ============Paket Droppoint============= -->
        <li class="treeview <?php if(isset($active_menu_dp)){echo $active_menu_dp;}?>">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>PAKET DROPPOINT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(isset($active_paket_dp)){echo $active_paket_dp;}?>"><a href="<?= base_url(); ?>agen/paket_dp/"><i class="fa fa-cube"></i> Paket</a></li>
            <li class="<?php if(isset($active_list_paket_dp)){echo $active_list_paket_dp;}?>"><a href="<?= base_url(); ?>agen/list_paket_dp/"><i class="fa fa-list"></i> List</a></li>
          </ul>
        </li>
        <!-- ===========End Paket Droppoint============== -->
        
      </ul>
    </section>
