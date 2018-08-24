     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_user)){echo $active_user;}?>">
          <a href="<?= base_url(); ?>kurir/">
            <i class="fa fa-cube"></i> <span>MANAGE USER</span>
          </a>
        </li>
        <li class="<?php if(isset($active_transaksi)){echo $active_transaksi;}?>">
          <a href="<?= base_url(); ?>kurir/transaksi/">
            <i class="fa fa-cube"></i> <span>INPUT TRANSAKSI</span>
          </a>
        </li>
        <li class="<?php if(isset($active_paketuser)){echo $active_paketuser;}?>">
          <a href="<?= base_url(); ?>kurir/paket_user/">
            <i class="fa fa-cube"></i> <span>PAKET DARI USER</span>
          </a>
        </li>
        <li class="<?php if(isset($active_paketdp)){echo $active_paketdp;}?>">
          <a href="<?= base_url(); ?>kurir/paket_dp/">
            <i class="fa fa-cube"></i> <span>PAKET DARI DROPPOINT</span>
          </a>
        </li>
       <li class="<?php if(isset($active_dijemput)){echo $active_dijemput;}?>">
          <a href="<?= base_url(); ?>kurir/paket_dijemput/">
            <i class="fa fa-money"></i> <span>PAKET DIJEMPUT</span>
          </a>
        </li>
        <li class="<?php if(isset($active_diterima)){echo $active_diterima;}?>">
          <a href="<?= base_url(); ?>kurir/paket_diterima/">
            <i class="fa fa-money"></i> <span>PAKET DITERIMA</span>
          </a>
        </li>
        <li class="<?php if(isset($active_diantar)){echo $active_diantar;}?>">
          <a href="<?= base_url(); ?>kurir/paket_diantar/">
            <i class="fa fa-money"></i> <span>PAKET DIANTAR</span>
          </a>
        </li>
        <li class="<?php if(isset($active_selesai)){echo $active_selesai;}?>">
          <a href="<?= base_url(); ?>kurir/paket_selesai/">
            <i class="fa fa-money"></i> <span>SELESAI</span>
          </a>
        </li>
      </ul>
      
    </section>
