     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_agen)){echo $active_agen;}?>">
          <a href="<?= base_url(); ?>droppoint/agen/">
            <i class="fa fa-cube"></i> <span>MANAGE AGEN</span>
          </a>
        </li>
       <li class="<?php if(isset($active_paket_agen)){echo $active_paket_agen;}?>">
          <a href="<?= base_url(); ?>droppoint/paket_agen/">
            <i class="fa fa-cube"></i> <span>PAKET (Agen)</span>
          </a>
        </li>
        <li class="<?php if(isset($active_paket_dp)){echo $active_paket_dp;}?>">
          <a href="<?= base_url(); ?>droppoint/paket_dp/">
            <i class="fa fa-cube"></i> <span>PAKET (Droppoint)</span>
          </a>
        </li>
        <li class="<?php if(isset($active_list_penjemputan)){echo $active_list_penjemputan;}?>">
          <a href="<?= base_url(); ?>droppoint/list_penjemputan/">
            <i class="fa fa-cube"></i> <span>LIST PENJEMPUTAN</span>
          </a>
        </li>
        <li class="<?php if(isset($active_list_paket_agen)){echo $active_list_paket_agen;}?>">
          <a href="<?= base_url(); ?>droppoint/list_paket_agen/">
            <i class="fa fa-cube"></i> <span>LIST PAKET (Agen)</span>
          </a>
        </li>
        <li class="<?php if(isset($active_list_paket_dp)){echo $active_list_paket_dp;}?>">
          <a href="<?= base_url(); ?>droppoint/list_paket_dp/">
            <i class="fa fa-cube"></i> <span>LIST PAKET (Droppoint)</span>
          </a>
        </li>
        <li class="<?php if(isset($active_list_transaksi_dp)){echo $active_list_transaksi_dp;}?>">
          <a href="<?= base_url(); ?>droppoint/list_transaksi_dp/">
            <i class="fa fa-cube"></i> <span>RIWAYAT DP</span>
          </a>
        </li>
        <li class="<?php if(isset($active_list_transaksi_agen)){echo $active_list_transaksi_agen;}?>">
          <a href="<?= base_url(); ?>droppoint/list_transaksi_agen/">
            <i class="fa fa-cube"></i> <span>RIWAYAT AGEN</span>
          </a>
        </li>
      </ul>
    </section>
