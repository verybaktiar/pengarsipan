<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 d-flex flex-row pt-5 mt-3">

 <div class="navbar-menu-wrapper d-flex align-items-stretch">
   <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
     <span class="mdi mdi-menu"></span>
   </button>
   <ul class="navbar-nav navbar-nav-right">
     <li class="nav-item nav-profile dropdown">
       <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
         <div class="nav-profile-img">
           <img src="assets/images/faces/face1.jpg" alt="image">
           <span class="availability-status online"></span>
         </div>
         <div class="nav-profile-text">
           <p class="mb-1 text-black"><?php echo strtoupper($user); ?></p>
         </div>
       </a>
       <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
         <a class="dropdown-item" href="#">
           <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
       </div>
     </li>
     <li class="nav-item d-none d-lg-block full-screen-link">
       <a class="nav-link">
         <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
       </a>
     </li>
     <!-- notifikasi -->
     <li class="nav-item dropdown">
       <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
         <i class="mdi mdi-bell-outline"></i>
            <span class="count-symbol bg-danger">
                    <?php
                       $today = date('Y-m-d');
                       $additional = "tanggal_diterima = '$today'";
                       $count_today = $this->model_surat->countdatawithadd('suratmasuk', $additional)->result();
                       foreach ($count_today as $t) {
                           echo $t->total;
                    } ?>
            </span>
       </a>
       <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
         <h6 class="p-3 mb-0"> Surat Masuk Terbaru, <?php echo date('d/m/Y') ?></h6>
         <?php
                $sm_today_add = "tanggal_diterima='$today'";
                $sm_today = $this->model_surat->getdatawithadd('suratmasuk', $sm_today_add)->result();
                foreach ($sm_today as $smt) : ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-success">
                        <i class="mdi mdi-calendar"></i>
                        </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                        <h6 class="preview-subject font-weight-normal mb-1"><?php echo $smt->no_suratmasuk ?> - <?php echo $smt->judul_suratmasuk ?>.</h6>
                        <p class="text-gray ellipsis mb-0"> <?php echo $smt->asal_surat ?> ·
                                            <?php $date = date_create($smt->tanggal_masuk);
                                            echo date_format($date, 'd/m/Y'); ?></div> </p>
                    </div>
                    </a>
                <?php endforeach; ?>
         <div class="dropdown-divider"></div>
         <h6 class="p-3 mb-0 text-center"href="<?= base_url('admin/suratmasuk') ?>">Tampilkan Lebih...</h6>
       </div>
     </li>
     <!-- end notifikasi -->
   </ul>
   <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
     <span class="mdi mdi-menu"></span>
   </button>
 </div>
</nav>