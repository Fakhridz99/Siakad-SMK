<div class="containcer-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Siswa</h3>
    </div>
    <div class="navbar-form navbar-right">
        <div class="row mt-3">
            <div class="col-md-5">
                <?php echo $this->session->flashdata('pesan') ?>
                <?php echo anchor('administrator/siswa/input', '<button class="btn btn-sm btn-primary mb-3"><i class="mdi mdi-plus"></i> Tambah Siswa</button>') ?>
                <?php echo anchor('administrator/siswa/import', '<button class="btn btn-sm btn-primary mb-3"><i class="mdi mdi-plus"></i> Import</button>') ?>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-striped table-hover">

        <tr>
            <th>No</th>
            <th>Username</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Ruang</th>
            <th colspan="3">Aksi</th>
        </tr>

        <?php $no = 1;
        foreach ($siswa as $ssw) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $ssw->username ?></td>
                <td><?php echo $ssw->nis ?></td>
                <td><?php echo $ssw->nama_siswa ?></td>
                <td><?php echo $ssw->kelas_jurusan ?></td>
                <td><?php echo $ssw->kode_jurusan ?></td>
                <td><?php echo $ssw->ruang_jurusan ?></td>

                <td width="20px"><?php echo anchor('administrator/siswa/lihat/' . $ssw->id_siswa, '<div class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></div>') ?></td>
                <td width="20px"><?php echo anchor('administrator/siswa/ubah/' . $ssw->id_siswa, '<div class="btn btn-sm btn-primary"><i class="nav-icon fas fa-edit"></i></div>') ?></td>
                <td width="20px"><?php echo anchor('administrator/siswa/hapus/' . $ssw->id_siswa, '<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>') ?></td>
            </tr>

        <?php endforeach; ?>
    </table>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>