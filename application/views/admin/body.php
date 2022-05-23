<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-solid fa-file-contract"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIMOPRO</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= strpos(uri_string(), 'admin/dashboard') > -1 ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php if (in_array($this->authentication->user()->role->name, ['Admin', 'Super Admin'])) : ?>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <li class="nav-item <?= strpos(uri_string(), 'admin/master') > -1 ? 'active' : '' ?>">
                    <a class="nav-link <?= strpos(uri_string(), 'admin/master') > -1 ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="<?= strpos(uri_string(), 'admin/master') > -1 ? 'true' : '' ?>" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Master</span>
                    </a>
                    <div id="collapsePages" class="collapse <?= strpos(uri_string(), 'admin/master') > -1 ? 'show' : '' ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item <?= strpos(uri_string(), 'admin/master/user') > -1 ? 'active' : '' ?>" href="<?= base_url() ?>admin/master/user">User</a>
                            <a class="collapse-item <?= strpos(uri_string(), 'admin/master/role') > -1 ? 'active' : '' ?>" href="<?= base_url() ?>admin/master/role">Role</a>
                            <a class="collapse-item <?= strpos(uri_string(), 'admin/master/pegawai') > -1 ? 'active' : '' ?>" href="<?= base_url() ?>admin/master/pegawai">Pegawai</a>
                        </div>
                    </div>
                </li>
            <?php endif ?>

            
            <?php if ($this->authentication->user()->role->name != 'Admin') : ?>
                <hr class="sidebar-divider">
                
                <!-- Heading -->
                <div class="sidebar-heading">
                    Proyek
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item <?= strpos(uri_string(), 'admin/proyek') > -1 ? 'active' : '' ?>">
                    <a class="nav-link <?= strpos(uri_string(), 'admin/proyek') > -1 ? '' : 'collapsed' ?>" href="#" data-toggle="collapse" data-target="#data_proyek_collapse" aria-expanded="<?= strpos(uri_string(), 'admin/proyek') > -1 ? 'true' : '' ?>" aria-controls="data_proyek_collapse">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Data Proyek</span>
                    </a>
                    <div id="data_proyek_collapse" class="collapse <?= strpos(uri_string(), 'admin/proyek') > -1 ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php if (in_array($this->authentication->user()->role->name, ['Super Admin', 'Manager Proyek', 'Direktur'])) : ?>
                                <a class="collapse-item <?= strpos(uri_string(), 'admin/proyek/data_proyek') > -1 ? 'active' : '' ?>" href="<?= base_url('admin/proyek/data_proyek') ?>">Data Proyek</a>
                            <?php endif ?>
                            <?php if (in_array($this->authentication->user()->role->name, ['Super Admin', 'Direktur'])) : ?>
                                <a class="collapse-item <?= strpos(uri_string(), 'admin/proyek/persetujuan_proyek') > -1 ? 'active' : '' ?>" href="<?= base_url('admin/proyek/persetujuan_proyek') ?>">Persetujuan Proyek</a>
                            <?php endif ?>
                            <?php if (in_array($this->authentication->user()->role->name, ['Super Admin', 'Manager Proyek'])) : ?>
                                <a class="collapse-item <?= strpos(uri_string(), 'admin/proyek/rab_proyek') > -1 ? 'active' : '' ?>" href="<?= base_url('admin/proyek/rab_proyek') ?>">RAB Proyek</a>
                                <a class="collapse-item <?= strpos(uri_string(), 'admin/proyek/schedule_proyek') > -1 ? 'active' : '' ?>" href="<?= base_url('admin/proyek/schedule_proyek') ?>">Schedule Proyek</a>
                            <?php endif ?>
                            <?php if (in_array($this->authentication->user()->role->name, ['Super Admin', 'Manager Lapangan'])) : ?>
                                <a class="collapse-item <?= strpos(uri_string(), 'admin/proyek/laporan') > -1 ? 'active' : '' ?>" href="<?= base_url('admin/proyek/laporan') ?>">Laporan</a>
                                <a class="collapse-item <?= strpos(uri_string(), 'admin/proyek/reschedule') > -1 ? 'active' : '' ?>" href="<?= base_url('admin/proyek/reschedule') ?>">Reschedule</a>
                            <?php endif ?>
                        </div>
                    </div>
                </li>
            <?php endif ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <!-- <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a> -->
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->authentication->user()->username ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url() ?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">