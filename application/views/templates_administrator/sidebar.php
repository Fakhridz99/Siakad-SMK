<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url() ?>assets/dist/img/SMK.png" alt="SMK Negeri 2 Bangkalan" height="241" width="768">
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- /.navbar -->
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('administrator/dashboard') ?>" class="brand-link">
                <img src="<?php echo base_url() ?>assets/dist/img/logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SMKN 2 Bangkalan</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <!-- nav admin-->
                        <?php if ($this->session->userdata('level') == "admin") { ?>
                            <li class="nav-item">
                                <a href="<?= base_url('administrator/dashboard') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Master Data
                                        <i class="fas fa-angle-left right"></i>
                                        <span class="badge badge-info right">4</span>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('administrator/guru') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Guru</p>
                                        </a>
                                        <a href="<?php echo base_url('administrator/siswa') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Siswa</p>
                                        </a>
                                        <a href="<?php echo base_url('administrator/jurusan') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Kelas Jurusan</p>
                                        </a>
                                        <a href="<?php echo base_url('administrator/mapel') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Mata Pelajaran</p>
                                        </a>
                                        <!-- <a href="<?php echo base_url('administrator/semester') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Tahun Akademik</p>
                                        </a> -->
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('administrator/absensi') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>Presensi Siswa</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="<?= base_url('administrator/jadwal') ?>" class="nav-link">
                                    <i class="nav-icon far fa-calendar-alt"></i>
                                    <p>Jadwal Mata Pelajaran</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url('administrator/nilai') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Laporan Nilai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('administrator/user') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Pengguna</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url('administrator/profil') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-user-check"></i>
                                    <p>Profil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('administrator/dashboard/logout') ?>" class="nav-link">
                                    <i class="ion-ion ion-log-out"></i>
                                    <p>Log Out</p>
                                </a>
                            </li>
                        <?php } else if ($this->session->userdata('level') == "guru") { ?>
                            <li class="nav-item">
                                <a href="<?= base_url('guru/dashboard') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('guru/jadwal') ?>" class="nav-link">
                                    <i class="nav-icon far fa-calendar-alt"></i>
                                    <p>Jadwal Mengajar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('guru/nilai') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Laporan Nilai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('guru/absensi') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>Presensi Siswa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('guru/profil') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-user-check"></i>
                                    <p>Profil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('guru/dashboard/logout') ?>" class="nav-link">
                                    <i class="ion-ion ion-log-out"></i>
                                    <p>Log Out</p>
                                </a>
                            </li>
                        <?php } else if ($this->session->userdata('level') == "siswa") { ?>
                            <li class="nav-item">
                                <a href="<?= base_url('siswa/dashboard') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('siswa/jadwal') ?>" class="nav-link">
                                    <i class="nav-icon far fa-calendar-alt"></i>
                                    <p>Jadwal Mata Pelajaran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('siswa/nilai') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Raport</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="<?= base_url('siswa/absensi') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>Presensi Siswa</p>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a href="<?php echo base_url('siswa/profil') ?>" class="nav-link">
                                    <i class="nav-icon fas fa-user-check"></i>
                                    <p>Profil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('siswa/dashboard/logout') ?>" class="nav-link">
                                    <i class="ion-ion ion-log-out"></i>
                                    <p>Log Out</p>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- /.content-header -->