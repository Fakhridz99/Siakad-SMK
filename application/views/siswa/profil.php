<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12 col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Profil</h3>
                </div>
                <?php echo $this->session->flashdata('pesan') ?>
                <?php echo anchor('siswa/profil/ubah', '<button class="btn btn-sm btn-primary mb-3"><i class="mdi mdi-account-edit me-1"></i> Edit Profil</button>') ?>
            </div> <!-- end col-->
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-condensed table-hovered">
                    <?php foreach ($siswa as $row) : ?>
                        <tr>
                            <th>Username</th>
                            <td><?php echo $row->username; ?></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td><?php echo $row->password; ?></td>
                        </tr>
                        <tr>
                            <th>NIS</th>
                            <td><?php echo $row->nis; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Siswa</th>
                            <td><?php echo $row->nama_siswa; ?></td>
                        </tr>
                        <tr>
                            <th>Tgl Lahir</th>
                            <td><?php echo $row->tgl_lahir_siswa; ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin Siswa</th>
                            <td><?php echo $row->jk_siswa; ?></td>
                        </tr>
                        <tr>
                            <th>Telepon Siswa</th>
                            <td><?php echo $row->tlp_siswa; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Siswa</th>
                            <td><?php echo $row->alamat_siswa; ?></td>
                        </tr>
                        <tr>
                            <th>Kelas Jurusan</th>
                            <td><?php echo $row->kelas_jurusan; ?></td>
                        </tr>
                        <tr>
                            <th>Kode Jurusan</th>
                            <td><?php echo $row->kode_jurusan; ?></td>
                        </tr>
                        <tr>
                            <th>Nama Jurusan</th>
                            <td><?php echo $row->nama_jurusan; ?></td>
                        </tr>
                        <tr>
                            <th>Ruang Jurusan</th>
                            <td><?php echo $row->ruang_jurusan; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- col-md-12 -->
    </div>
    <!-- /.row -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>