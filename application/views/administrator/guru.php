<div class="containcer-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Guru</h3>
    </div>
    <div class="navbar-form navbar-right">
        <div class="row mt-3">
            <div class="col-md-5">
                <?php echo $this->session->flashdata('pesan') ?>
                <?php echo anchor('administrator/guru/input', '<button class="btn btn-sm btn-primary mb-3"><i class="mdi mdi-plus"></i> Tambah Guru</button>') ?>
                <?php echo anchor('administrator/guru/import', '<button class="btn btn-sm btn-primary mb-3"><i class="mdi mdi-plus"></i> Import</button>') ?>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>NIP</th>
            <th>Nama Guru</th>
            <!-- <th>Tanggal Lahir</th> -->
            <th>Jenis Kelamin</th>
            <th>No Tlp</th>
            <th>Alamat</th>
            <th colspan="3">Aksi</th>
        </tr>

        <?php $no = 1;
        foreach ($guru as $gru) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $gru->username ?></td>
                <td><?php echo $gru->nip ?></td>
                <td><?php echo $gru->nama_guru ?></td>
                <!-- <td><?php echo $gru->tgl_lahir_guru ?></td> -->
                <td><?php echo $gru->jk_guru ?></td>
                <td><?php echo $gru->tlp_guru ?></td>
                <td><?php echo $gru->alamat_guru ?></td>

                <td width="20px"><?php echo anchor('administrator/guru/lihat/' . $gru->id_guru, '<div class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></div>') ?></td>
                <td width="20px"><?php echo anchor('administrator/guru/ubah/' . $gru->id_guru, '<div class="btn btn-sm btn-primary"><i class="nav-icon fas fa-edit"></i></div>') ?> </td>
                <td width="20px"><?php echo anchor('administrator/guru/hapus/' . $gru->id_guru, '<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>