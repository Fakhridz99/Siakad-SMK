<div class="container-fluid m-4">
    <div class="box-header">
        <h3 class="box-title">Form Ubah Pengguna</h3>
    </div>
    <?php echo $this->session->flashdata('pesan') ?>
    <?php foreach ($user as $usr) : ?>
        <form method="post" action="<?php echo base_url('administrator/user/ubah_aksi') ?>">
            <div class="form-group">
                <label>Username</label>
                <input type="hidden" name="id" value="<?php echo $usr->id_user ?>">
                <input type="text" name="username" class="form-control" value="<?php echo $usr->username ?>" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>