     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_mkurir)){echo $active_mkurir;}?>">
          <a href="<?= base_url(); ?>index.php/droppoint/kurir/">
            <i class="fa fa-cube"></i> <span>MANAGE KURIR</span>
          </a>
        </li>
       <li>
          <a href="<?= base_url(); ?>admin/">
            <i class="fa fa-home"></i> <span>Fitur 2</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url(); ?>admin/">
            <i class="fa fa-home"></i> <span>Fitur 3</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url(); ?>admin/">
            <i class="fa fa-home"></i> <span>Fitur 4</span>
          </a>
        </li>
      </ul>
      
    </section>
