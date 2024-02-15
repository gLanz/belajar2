<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=base_url()?>assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
           <?=$this->session->userdata('namasession')?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
                <i class="fa fa-user"></i>
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?=$this->session->userdata('namasession')?>
                </h3> 
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?=base_url()?>login/logout" class="dropdown-item">Logout </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?=base_url()?>assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIM PUSKESMAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image text-white">
          <i class="fa fa-user"></i>
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?=$this->session->userdata('namasession')?>
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
           
          <li class="nav-header">Menu</li>
          <li class="nav-item">
            <a href="<?=base_url()?>home" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p class="text">Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url()?>admin" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p class="text">Admin</p>
            </a>
          </li>     


          <li class="nav-item">
            <a href="<?=base_url()?>petugas" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p class="text">Petugas</p>
            </a>
          </li>          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p class="text">Pendaftaran Pasien</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url()?>pasien" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p class="text">Pasien</p>
            </a>
          </li>          


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p class="text">Pemeriksaan</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p class="text">Laporan</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->