  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php blink('assets/AdminLTE/dist/img/user.png')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $username ?></p>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php if($level_user == 0) { ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><i class="fa fa-database"></i> Data Master</li>
        <li>
          <a href="<?php blink('Admin') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('Admin/Dosen'); ?>">
            <i class="fa fa-users"></i> <span>Data Dosen</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('Admin/User'); ?>">
            <i class="fa fa-user"></i> <span>Data Pengguna</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('Admin/Pertanyaan'); ?>">
            <i class="fa fa-question-circle"></i> <span>Data Pertanyaan</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('admin/chart'); ?>">
            <i class="fa fa-pie-chart"></i> <span>Chart</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('Admin/pilihDosen'); ?>">
            <i class="fa fa-file-excel-o"></i> <span>Eksport</span>
          </a>
        </li>
      </ul>
      <?php } ?>

      <?php if($level_user == 2) { ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><i class="fa fa-database"></i> Kuesioner UBL</li>
        <li>
          <a href="<?php echo site_url('Mahasiswa'); ?>">
            <i class="fa fa-question-circle"></i> <span>Isi Kuesioner</span>
          </a>
        </li>
      </ul>
      <?php } ?>

      <?php if($level_user == 1) { ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><i class="fa fa-database"></i> Kuesioner UBL</li>
        <li>
          <a href="<?php echo site_url('Dosen'); ?>">
            <i class="fa fa-question-circle"></i> <span>Hasil Kuesioner</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('Dosen/Eksport'); ?>">
            <i class="fa fa-pie-chart"></i> <span>Chart Dan Eksport</span>
          </a>
        </li>
      </ul>
      <?php } ?>

    </section>

    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
