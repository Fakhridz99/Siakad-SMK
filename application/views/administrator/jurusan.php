<div class="containcer-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Kelas Jurusan</h3>
    </div>

    <div class="navbar-form navbar-right">
        <div class="row mt-3">
            <div class="col-md-5">
                <?php echo $this->session->flashdata('pesan') ?>
                <?php echo anchor('administrator/jurusan/input', '<button class="btn btn-sm btn-primary mb-3"><i class="mdi mdi-plus"></i> Tambah Kelas Jurusan</button>') ?>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>


    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>Kode Jurusan</th>
            <th>Nama Jurusan</th>
            <th>Ruang</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php $no = 1;
        foreach ($jurusan as $jrs) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $jrs->kelas_jurusan ?></td>
                <td><?php echo $jrs->kode_jurusan ?></td>
                <td><?php echo $jrs->nama_jurusan ?></td>
                <td><?php echo $jrs->ruang_jurusan ?></td>
                <td width="20px"><?php echo anchor('administrator/jurusan/ubah/' . $jrs->id_jurusan, '<div class="btn btn-sm btn-primary"><i class="nav-icon fas fa-edit"></i></div>') ?> </td>
                <td width="20px"><?php echo anchor('administrator/jurusan/hapus/' . $jrs->id_jurusan, '<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>