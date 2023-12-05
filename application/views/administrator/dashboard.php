<div class="containcer-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Dashboard</h3>
    </div>
    <h4 class="alert-heading">Selamat Datang!</h4>
    <p>Selamat Datang <strong><?= $this->session->userdata('username') ?></strong> Di Sistem Informasi Akademik SMK Negeri 2 Bangkalan,
        Anda Login Sebagai <Strong><?= $this->session->userdata('level') ?></strong></p>
    <hr>
</div>
<section class="content">

    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $guru['hasil']; ?></h3>

                        <p>Guru</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                        <ion-icon name=""></ion-icon>
                    </div>
                    <a href="<?php echo base_url('administrator/guru') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $siswa['hasil']; ?></h3>

                        <p>Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon far fa-user"></i>
                    </div>
                    <a href="<?php echo base_url('administrator/siswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo $jurusan['hasil']; ?></h3>

                        <p>Kelas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?php echo base_url('administrator/jurusan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $mapel['hasil']; ?></h3>

                        <p>Mata Pelajaran</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon far fa-calendar"></i>
                    </div>
                    <a href="<?php echo base_url('administrator/mapel') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $nilai['hasil']; ?></h3>

                        <p>Nilai Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-file"></i>
                    </div>
                    <a href="<?php echo base_url('administrator/nilai') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $absensi['hasil']; ?></h3>

                        <p>Presensi</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-book"></i>
                    </div>
                    <a href="<?php echo base_url('administrator/absensi') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $jadwal['hasil']; ?></h3>

                        <p>Jadwal Mapel</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon far fa-calendar-alt"></i>
                    </div>
                    <a href="<?php echo base_url('administrator/jadwal') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo $user['hasil']; ?></h3>

                        <p>Pengguna</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-users"></i>
                    </div>
                    <a href="<?php echo base_url('administrator/user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div> <!-- end row -->
    </div>
    </div> <!-- end card-box-->
    </div> <!-- end col-->
    </div>
    <!-- end row-->
</section>
<!-- /.content -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>