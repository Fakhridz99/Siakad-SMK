<div class="container-fluid">
    <div class="box-header">
        <h3 class="box-title">Form Ubah profil</h3>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <form method="post" action="<?php echo base_url('administrator/profil/ubah_aksi') ?>">
    <?php foreach ($user as $row) : ?>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $row->username ?>" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <?php endforeach; ?>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>