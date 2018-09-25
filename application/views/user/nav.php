     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_home)){echo $active_home;}?>">
          <a href="<?= base_url(); ?>user/">
            <i class="fa fa-home"></i> <span>HOME</span>
          </a>
        </li>
        <li class="<?php if(isset($active_ongkir)){echo $active_ongkir;}?>">
          <a href="<?= base_url(); ?>user/ongkir/">
            <i class="fa fa-check"></i> <span>CEK ONGKIR</span>
          </a>
        </li>
        <li class="<?php if(isset($active_cekresi)){echo $active_cekresi;}?>">
          <a href="<?= base_url(); ?>user/cek_resi/">
            <i class="fa fa-check"></i> <span>CEK RESI</span>
          </a>
        </li>
        <li class="<?php if(isset($active_transaksi)){echo $active_transaksi;}?>">
          <a href="<?= base_url(); ?>user/transaksi/">
            <i class="fa fa-money"></i> <span>TRANSAKSI</span>
          </a>
        </li>
        <li class="<?php if(isset($active_list)){echo $active_list;}?>">
          <a href="<?= base_url(); ?>user/list_transaksi/">
            <i class="fa fa-list"></i> <span>LIST TRANSAKSI</span>
          </a>
        </li>
      </ul>
      
    </section>
