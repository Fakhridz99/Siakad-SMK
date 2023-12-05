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
                <?php echo anchor('guru/profil/ubah', '<button class="btn btn-sm btn-primary mb-3"><i class="mdi mdi-account-edit me-1"></i> Edit Profil</button>') ?>
            </div> <!-- end col-->
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-condensed table-hovered">
                    <?php foreach ($guru as $row) : ?>
                    <tr>
                        <th>Username</th>
                        <td><?php echo $row->username; ?></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><?php echo $row->password; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Guru</th>
                        <td><?php echo $row->nama_guru; ?></td>
                    </tr>
                    <tr>
                        <th>NIP</th>
                        <td><?php echo $row->nip; ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin Guru</th>
                        <td><?php echo $row->jk_guru; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td><?php echo $row->tgl_lahir_guru; ?></td>
                    </tr>
                    <tr>
                        <th>Telpon Guru</th>
                        <td><?php echo $row->tlp_guru; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Guru</th>
                        <td><?php echo $row->alamat_guru; ?></td>
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