     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php if ($this->session->userdata('level') == 'superadmin') { ?>
        
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_home)){echo $active_home;}?>">
          <a href="<?= base_url(); ?>admin/">
            <i class="fa fa-user"></i> <span>HOME</span>
          </a>
        </li>
       <li class="<?php if(isset($active_ongkir)){echo $active_ongkir;}?>">
          <a href="<?= base_url(); ?>admin/ongkir">
            <i class="fa fa-user"></i> <span>MANAGE ONGKIR</span>
          </a>
        </li>
        <li class="<?php if(isset($active_admin)){echo $active_admin;}?>">
          <a href="<?= base_url(); ?>admin/">
            <i class="fa fa-user"></i> <span>MANAGE ADMIN</span>
          </a>
        </li>
        <li class="<?php if(isset($active_dp)){echo $active_dp;}?>">
          <a href="<?= base_url(); ?>admin/droppoint/">
            <i class="fa fa-cube"></i> <span>MANAGE DROP POINT</span>
          </a>
        </li>
        <li class="<?php if(isset($active_kurir)){echo $active_kurir;}?>">
          <a href="<?= base_url(); ?>admin/kurir/">
            <i class="fa fa-truck"></i> <span>MANAGE KURIR</span>
          </a>
        </li>
       <li class="<?php if(isset($active_user)){echo $active_user;}?>">
          <a href="<?= base_url(); ?>admin/user/">
            <i class="fa fa-user"></i> <span>MANAGE USER</span>
          </a>
        </li>
      </ul>
      <?php } else if ($this->session->userdata('level') == 'admin') { ?>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_home)){echo $active_home;}?>">
          <a href="<?= base_url(); ?>admin/">
            <i class="fa fa-home"></i> <span>HOME</span>
          </a>
        </li>
        <li class="<?php if(isset($active_dp)){echo $active_dp;}?>">
          <a href="<?= base_url(); ?>admin/droppoint/">
            <i class="fa fa-cube"></i> <span>MANAGE DROP POINT</span>
          </a>
        </li>
        <li class="<?php if(isset($active_kurir)){echo $active_kurir;}?>">
          <a href="<?= base_url(); ?>admin/kurir/">
            <i class="fa fa-truck"></i> <span>MANAGE KURIR</span>
          </a>
        </li>
       <li class="<?php if(isset($active_user)){echo $active_user;}?>">
          <a href="<?= base_url(); ?>admin/user/">
            <i class="fa fa-user"></i> <span>MANAGE USER</span>
          </a>
        </li>
      </ul>
       <?php } ?>
    </section>
