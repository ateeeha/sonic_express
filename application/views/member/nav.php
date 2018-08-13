     <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php if ($this->session->userdata('level') == '1') { ?>
        
      
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="<?= base_url(); ?>admin/">
            <i class="fa fa-home"></i> <span>Fitur 1</span>
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
      <?php } else if ($this->session->userdata('level') == '2') { ?>

      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="<?= base_url(); ?>admin/">
            <i class="fa fa-home"></i> <span>Fitur 2</span>
          </a>
        </li>
       <li>
          <a href="<?= base_url(); ?>admin/">
            <i class="fa fa-home"></i> <span>Fitur 4</span>
          </a>
        </li>
      </ul>
       <?php } ?>
    </section>
