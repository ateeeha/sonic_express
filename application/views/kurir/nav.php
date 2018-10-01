     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_home)){echo $active_home;}?>">
          <a href="<?= base_url(); ?>kurir/">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
        <!-- ============Paket user============= -->
        <li class="treeview <?php if(isset($active_menu_user)){echo $active_menu_user;}?>">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Paket User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(isset($active_paket_user)){echo $active_paket_user;}?>"><a href="<?= base_url(); ?>kurir/paket_user/"><i class="fa fa-cube"></i> Paket</a></li>
            <li class="<?php if(isset($active_dijemput)){echo $active_dijemput;}?>"><a href="<?= base_url(); ?>kurir/paket_dijemput/"><i class="fa fa-truck"></i> Jemput</a></li>
            <li class="<?php if(isset($active_diterima)){echo $active_diterima;}?>">
              <a href="<?= base_url(); ?>kurir/paket_diterima/">
            <i class="fa fa-list"></i> <span>List</span>
          </a>
        </li>
          </ul>
        </li>
        <!-- ===========End Paket User============== -->
        <!-- ============Paket Agen============= -->
        <li class="treeview <?php if(isset($active_menu_agen)){echo $active_menu_agen;}?>">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Paket Agen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(isset($active_paket_agen)){echo $active_paket_agen;}?>"><a href="<?= base_url(); ?>kurir/paket_agen/"><i class="fa fa-cube"></i> Paket</a></li>
            <li class="<?php if(isset($active_diantar)){echo $active_diantar;}?>"><a href="<?= base_url(); ?>kurir/paket_diantar/"><i class="fa fa-truck"></i> Antar</a></li>
            <li class="<?php if(isset($active_selesai)){echo $active_selesai;}?>">
              <a href="<?= base_url(); ?>kurir/paket_selesai/">
            <i class="fa fa-history"></i> <span>Riwayat</span>
          </a>
        </li>
          </ul>
        </li>
        <!-- ===========End Paket Agen============== -->
      </ul>
      
    </section>
