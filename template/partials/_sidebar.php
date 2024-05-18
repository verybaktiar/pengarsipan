<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="assets/images/faces/face1.jpg" alt="profile">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
      
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('admin') ?>">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item
      <?php if (current_url() == base_url('admin/suratmasuk') or current_url() == base_url('admin/suratkeluar')) {
          echo 'active';
      } ?>">
          <a class="nav-link" data-bs-toggle="collapse " href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-title">Data Master</span>
            <i class="menu-arrow"></i>
            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
          </a>
          <div class="collapse <?php if (current_url() == base_url('admin/suratmasuk') or current_url() == base_url('admin/suratkeluar')) {
            echo 'show';
        } ?>" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link  <?php if (current_url() == base_url('admin/suratmasuk')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('admin/suratmasuk') ?>">Surat Masuk</a></li>
              <li class="nav-item"> <a class="nav-link <?php if (current_url() == base_url('admin/suratkeluar')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('admin/suratkeluar') ?>">Surat Keluar</a></li>
            </ul>
          </div>

    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('program') ?>">
        <span class="menu-title">Charts</span>
        <i class="mdi mdi-chart-bar menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('jadwal') ?>">
        <span class="menu-title">Jadwal</span>
        <i class="mdi mdi-table-large menu-icon"></i>
      </a>
    </li>
    <li class="nav-item
    <?php if (current_url() == base_url('admin/indeks') OR current_url() == base_url('admin/users') OR current_url() == base_url('admin/profil')) {
        echo 'active';
    } ?>">
      <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
        <span class="menu-title">Pengaturan</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-medical-bag menu-icon"></i>
      </a>
      <div class="collapse 
        <?php if (current_url() == base_url('admin/indeks') or current_url() == base_url('admin/users') or current_url() == base_url('admin/profil')) {
              echo 'show';
        } ?>" id="general-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link <?php if($user == 'superadmin'): ?>
                      <?php if (current_url() == base_url('admin/indeks')) {
                          echo 'active';
                      } ?>" href="<?php echo base_url('admin/indeks') ?>"> Indeks </a></li>
            <li class="nav-item"> <a class="nav-link <?php if (current_url() == base_url('admin/users')) {
                          echo 'active';
                      } ?>" href="<?php echo base_url('admin/users') ?>"> Users </a></li>
            <li class="nav-item"> <a class="nav-link <?php if (current_url() == base_url('admin/profil')) {
                      echo 'active';
                  } ?>" href="<?php echo base_url('admin/profil') ?>"> Profil </a></li>
          </ul>
      </div>
    </li>
    <li class="nav-item
    <?php if (current_url() == base_url('admin/laporan_suratmasuk') or current_url() == base_url('admin/laporan_suratkeluar')) {
        echo 'active';
    } ?>">
          <a class="nav-link" data-bs-toggle="collapse " href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-title">Laporan</span>
            <i class="menu-arrow"></i>
            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
          </a>
          <div class="collapse  <?php if (current_url() == base_url('admin/laporan_suratmasuk') or current_url() == base_url('admin/laporan_suratkeluar')) {
            echo 'show';
        } ?>" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link  <?php if (current_url() == base_url('admin/laporan_suratmasuk')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('admin/laporan_suratmasuk') ?>">Laporan Surat Masuk</a></li>
              <li class="nav-item"> <a class="nav-link  <?php if (current_url() == base_url('admin/laporan_suratkeluar')) {
                    echo 'active';
                } ?>" href="<?php echo base_url('admin/laporan_suratkeluar') ?>">Laporan Surat Keluar</a></li>
            </ul>
          </div>

    </li>
  </ul>
</nav>