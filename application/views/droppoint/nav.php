     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
       
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php if(isset($active_home)){echo $active_home;}?>">
          <a href="<?= base_url(); ?>droppoint/">
            <i class="fa fa-user"></i> <span>HOME</span>
          </a>
        </li>
        <li class="<?php if(isset($active_agen)){echo $active_agen;}?>">
          <a href="<?= base_url(); ?>droppoint/agen/">
            <i class="fa fa-cube"></i> <span>MANAGE AGEN</span>
          </a>
        </li>
        <!-- ============Paket Agen============= -->
        <li class="treeview <?php if(isset($active_paket_agen)){echo $active_paket_agen;}?>">
          <a href="#">
            <i class="fa fa-cube"></i> <span>PAKET AGEN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(isset($active_paket)){echo $active_paket;}?>"><a href="<?= base_url(); ?>droppoint/paket_agen/"><i class="fa fa-cube"></i> Paket</a></li>
            <li class="<?php if(isset($active_list_paket_agen)){echo $active_list_paket_agen;}?>"><a href="<?= base_url(); ?>droppoint/list_paket_agen/"><i class="fa fa-list"></i> List</a></li>
            <li class="<?php if(isset($active_list_transaksi_agen)){echo $active_list_transaksi_agen;}?>"><a href="<?= base_url(); ?>droppoint/list_transaksi_agen/"><i class="fa fa-book"></i> Riwayat</a></li>
          </ul>
        </li>
        <!-- ===========End Paket Agen============== -->
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
        <!-- ========================= -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <!-- ========================= -->
      </ul>
    </section>
