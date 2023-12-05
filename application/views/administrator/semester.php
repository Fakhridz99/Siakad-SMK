<div class="containcer-fluid m-4">
    <div class="box-header">
        <h3 class="box-title">Tahun Akademik</h3>
    </div>

    <div class="navbar-form navbar-right">
        <div class="row mt-3">
            <div class="col-md-5">
                <?php echo $this->session->flashdata('pesan') ?>
                <?php echo anchor('administrator/semester/input', '<button class="btn btn-sm btn-primary mb-3"><i class="mdi mdi-plus"></i> Tambah Tahun Akademik</button>') ?>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>


    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Tahun Akademik</th>
            <th>Aktif</th>
            <th>Semester</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php $no = 1;
        foreach ($tahun_akademik as $thn) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $thn->tahun_akademik ?></td>
                <td><?php echo $thn->aktif ?></td>
                <td><?php echo $thn->semester ?></td>
                <td width="20px"><?php echo anchor('administrator/semester/ubah/' . $thn->id_tahun_akademik, '<div class="btn btn-sm btn-primary"><i class="nav-icon fas fa-edit"></i></div>') ?> </td>
                <td width="20px"><?php echo anchor('administrator/semester/hapus/' . $thn->id_tahun_akademik, '<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>