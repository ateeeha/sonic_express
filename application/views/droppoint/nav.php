     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_kurir)){echo $active_kurir;}?>">
          <a href="<?= base_url(); ?>index.php/droppoint/kurir/">
            <i class="fa fa-cube"></i> <span>MANAGE KURIR</span>
          </a>
        </li>
       <li class="<?php if(isset($active_paketkurir)){echo $active_paketkurir;}?>">
          <a href="<?= base_url(); ?>index.php/droppoint/paket_kurir/">
            <i class="fa fa-cube"></i> <span>PAKET KURIR</span>
          </a>
        </li>
        <li class="<?php if(isset($active_paketdp)){echo $active_paketdp;}?>">
          <a href="<?= base_url(); ?>index.php/droppoint/paket_dp/">
            <i class="fa fa-cube"></i> <span>PAKET DROPPOINT</span>
          </a>
        </li>
        <li class="<?php if(isset($active_terimakurir)){echo $active_terimakurir;}?>">
          <a href="<?= base_url(); ?>index.php/droppoint/diterima_darikurir/">
            <i class="fa fa-cube"></i> <span>TERIMA KURIR</span>
          </a>
        </li>
        <li class="<?php if(isset($active_terimadp)){echo $active_terimadp;}?>">
          <a href="<?= base_url(); ?>index.php/droppoint/diterima_daridp/">
            <i class="fa fa-cube"></i> <span>TERIMA DROPPOINT</span>
          </a>
        </li>
      </ul>
    </section>
