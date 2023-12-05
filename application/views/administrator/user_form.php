<div class="container-fluid m-4">
    <div class="box-header">
        <h3 class="box-title">Form Tambah Pengguna</h3>
    </div>
    <form method="post" action="<?php echo base_url('administrator/user/input_aksi') ?>">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
            <?php echo form_error('username', '<div class="text-danger small" ml-3>') ?>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
            <?php echo form_error('password', '<div class="text-danger small" ml-3>') ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>