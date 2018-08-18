     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_kurir)){echo $active_kurir;}?>">
          <a href="<?= base_url(); ?>index.php/droppoint/kurir/">
            <i class="fa fa-cube"></i> <span>MANAGE KURIR</span>
          </a>
        </li>
       <li class="<?php if(isset($active_paket)){echo $active_paket;}?>">
          <a href="<?= base_url(); ?>index.php/droppoint/paket/">
            <i class="fa fa-cube"></i> <span>PAKET</span>
          </a>
        </li>
        <li class="<?php if(isset($active_paketditerima)){echo $active_paketditerima;}?>">
          <a href="<?= base_url(); ?>index.php/droppoint/paket_diterima/">
            <i class="fa fa-cube"></i> <span>PAKET DITERIMA</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url(); ?>admin/">
            <i class="fa fa-home"></i> <span>Fitur 4</span>
          </a>
        </li>
      </ul>
      
    </section>
