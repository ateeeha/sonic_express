     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_user)){echo $active_user;}?>">
          <a href="<?= base_url(); ?>index.php/kurir/">
            <i class="fa fa-cube"></i> <span>MANAGE USER</span>
          </a>
        </li>
        <li class="<?php if(isset($active_transaksi)){echo $active_transaksi;}?>">
          <a href="<?= base_url(); ?>index.php/kurir/transaksi/">
            <i class="fa fa-cube"></i> <span>INPUT TRANSAKSI</span>
          </a>
        </li>
        <li class="<?php if(isset($active_paket)){echo $active_paket;}?>">
          <a href="<?= base_url(); ?>index.php/kurir/paket/">
            <i class="fa fa-cube"></i> <span>AMBIL PAKET</span>
          </a>
        </li>
       <li class="<?php if(isset($active_dijemput)){echo $active_dijemput;}?>">
          <a href="<?= base_url(); ?>index.php/kurir/paket_dijemput/">
            <i class="fa fa-money"></i> <span>PAKET DIJEMPUT</span>
          </a>
        </li>
        <li class="<?php if(isset($active_diterima)){echo $active_diterima;}?>">
          <a href="<?= base_url(); ?>index.php/kurir/paket_diterima/">
            <i class="fa fa-money"></i> <span>PAKET DITERIMA</span>
          </a>
        </li>
      </ul>
      
    </section>
