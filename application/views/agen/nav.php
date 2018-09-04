     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_home)){echo $active_home;}?>">
          <a href="<?= base_url(); ?>agen/">
            <i class="fa fa-cube"></i> <span>HOME</span>
          </a>
        </li>
       <li class="<?php if(isset($active_paketkurir)){echo $active_paketkurir;}?>">
          <a href="<?= base_url(); ?>agen/paket_kurir/">
            <i class="fa fa-cube"></i> <span>PAKET KURIR</span>
          </a>
        </li>
        <li class="<?php if(isset($active_paketdp)){echo $active_paketdp;}?>">
          <a href="<?= base_url(); ?>agen/paket_dp/">
            <i class="fa fa-cube"></i> <span>PAKET DROPPOINT</span>
          </a>
        </li>
        <li class="<?php if(isset($active_terimakurir)){echo $active_terimakurir;}?>">
          <a href="<?= base_url(); ?>agen/diterima_darikurir/">
            <i class="fa fa-cube"></i> <span>TERIMA KURIR</span>
          </a>
        </li>
        <li class="<?php if(isset($active_terimadp)){echo $active_terimadp;}?>">
          <a href="<?= base_url(); ?>droppoint/diterima_daridp/">
            <i class="fa fa-cube"></i> <span>TERIMA DROPPOINT</span>
          </a>
        </li>
      </ul>
    </section>
