<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main" data-color='primary'>
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#">
        <center>
            <span class="font-weight-bold"><h6>Sistem Kesehatan Taruna</h6></span>
        </center>
      </a>
    </div>
   
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-75">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link   <?php echo ($page == "Dashboard" ? "active" : '' ); ?>" href="<?= 'home' ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == "Keluhan" ? "active" : '' ); ?> " href="<?= 'keluhan_page' ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Input Keluhan</span>
          </a>
        </li>

          <?php if ($users['id_role'] == "2"){ ?>
          
          <li class="nav-item">
          <a class="nav-link <?php echo ($page == "Infografis" ? "active" : '' ); ?> " href="<?= 'keluhan_page' ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-coffee text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Input Infografis</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laporan Kesehatan</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($page == "Data Keluhan" ? "active" : '' ); ?> " href="<?= 'data_keluhan_page' ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-table text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Keluhan Taruna</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/profile.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-table text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Infografis Kesehatan</span>
          </a>
        </li>

        <?php } ?>
      

        
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Akun Saya</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/profile.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profil</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link " href="<?= 'auth/logout' ?>">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Keluar</span>
          </a>
        </li>
      </ul>
    </div>
   
  </aside>