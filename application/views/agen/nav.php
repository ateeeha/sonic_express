     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_home)){echo $active_home;}?>">
          <a href="<?= base_url(); ?>agen/">
            <i class="fa fa-cube"></i> <span>HOME</span>
          </a>
        </li>
        <li class="<?php if(isset($active_kurir)){echo $active_kurir;}?>">
          <a href="<?= base_url(); ?>agen/kurir/">
            <i class="fa fa-cube"></i> <span>MANAGE KURIR</span>
          </a>
        </li>
       <li class="<?php if(isset($active_paket_kurir)){echo $active_paket_kurir;}?>">
          <a href="<?= base_url(); ?>agen/paket_kurir/">
            <i class="fa fa-cube"></i> <span>PAKET KURIR</span>
          </a>
        </li>
        <li class="<?php if(isset($active_paket_dp)){echo $active_paket_dp;}?>">
          <a href="<?= base_url(); ?>agen/paket_dp/">
            <i class="fa fa-cube"></i> <span>PAKET DROPPOINT</span>
          </a>
        </li>
        <li class="<?php if(isset($active_list_paket_kurir)){echo $active_list_paket_kurir;}?>">
          <a href="<?= base_url(); ?>agen/list_paket_kurir/">
            <i class="fa fa-cube"></i> <span>LIST PAKET (KURIR)</span>
          </a>
        </li>
        <li class="<?php if(isset($active_list_paket_dp)){echo $active_list_paket_dp;}?>">
          <a href="<?= base_url(); ?>agen/list_paket_dp/">
            <i class="fa fa-cube"></i> <span>LIST PAKET (DROPPOINT)</span>
          </a>
        </li>
        <li class="<?php if(isset($active_list_jemput_paket)){echo $active_list_jemput_paket;}?>">
          <a href="<?= base_url(); ?>agen/list_jemput_paket/">
            <i class="fa fa-cube"></i> <span>LIST PENJEMPUTAN</span>
          </a>
        </li>
      </ul>
    </section>
