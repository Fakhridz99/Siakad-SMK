<div class="containcer-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Mata Pelajaran</h3>
    </div>

    <div class="navbar-form navbar-right">
        <div class="row mt-3">
            <div class="col-md-5">
                <?php echo $this->session->flashdata('pesan') ?>
                <?php echo anchor('administrator/mapel/input', '<button class="btn btn-sm btn-primary mb-3"><i class="mdi mdi-plus"></i> Tambah Mapel</button>') ?>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>


    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Guru Pengajar</th>
            <th>Kode Mata Pelajaran</th>
            <th>Nama Mata Pelajaran</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php $no = 1;
        foreach ($mapel as $mpl) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $mpl->nama_guru ?></td>
                <td><?php echo $mpl->kode_mapel ?></td>
                <td><?php echo $mpl->nama_mapel ?></td>
                <td width="20px"><?php echo anchor('administrator/mapel/ubah/' . $mpl->id_mapel, '<div class="btn btn-sm btn-primary"><i class="nav-icon fas fa-edit"></i></div>') ?> </td>
                <td width="20px"><?php echo anchor('administrator/mapel/hapus/' . $mpl->id_mapel, '<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>