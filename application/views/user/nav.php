     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_cekongkir)){echo $active_cekongkir;}?>">
          <a href="<?= base_url(); ?>index.php/user/cek_ongkir/">
            <i class="fa fa-money"></i> <span>CEK ONGKIR</span>
          </a>
        </li>
       <li class="<?php if(isset($active_transaksi)){echo $active_transaksi;}?>">
          <a href="<?= base_url(); ?>index.php/user/transaksi/">
            <i class="fa fa-money"></i> <span>TRANSAKSI</span>
          </a>
        </li>
      </ul>
      
    </section>
