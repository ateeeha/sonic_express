     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_agen)){echo $active_agen;}?>">
          <a href="<?= base_url(); ?>droppoint/agen/">
            <i class="fa fa-cube"></i> <span>MANAGE AGEN</span>
          </a>
        </li>
       <li class="<?php if(isset($active_paketagen)){echo $active_paketagen;}?>">
          <a href="<?= base_url(); ?>droppoint/paket_agen/">
            <i class="fa fa-cube"></i> <span>PAKET AGEN</span>
          </a>
        </li>
        <li class="<?php if(isset($active_paketdp)){echo $active_paketdp;}?>">
          <a href="<?= base_url(); ?>droppoint/paket_dp/">
            <i class="fa fa-cube"></i> <span>PAKET DROPPOINT</span>
          </a>
        </li>
        <li class="<?php if(isset($active_terimakurir)){echo $active_terimakurir;}?>">
          <a href="<?= base_url(); ?>droppoint/diterima_darikurir/">
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
