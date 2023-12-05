<div class="containcer-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Pengguna</h3>
    </div>

    <div class="navbar-form navbar-right">
        <div class="row mt-3">
            <div class="col-md-5">
                <?php echo $this->session->flashdata('pesan') ?>
                <?php echo anchor('administrator/user/input', '<button class="btn btn-sm btn-primary mb-3"><i class="mdi mdi-plus"></i> Tambah Pengguna</button>') ?>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>


    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php $no = 1;
        foreach ($user as $usr) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $usr->username ?></td>
                <td><?php echo $usr->password ?></td>
                <td width="20px"><?php echo anchor('administrator/user/ubah/' . $usr->id_user, '<div class="btn btn-sm btn-primary"><i class="nav-icon fas fa-edit"></i></div>') ?> </td>
                <?php if ($usr->id_user == $this->session->userdata("id_user")) : ?>
                    <td>
                        <div class="btn btn-sm btn-danger" disabled><i class="fas fa-trash"></i></div>
                    </td>
                <?php else : ?>
                    <td width="20px"><?php echo anchor('administrator/user/hapus/' . $usr->id_user, '<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>') ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>