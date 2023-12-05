<div class="containcer-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Tambah Guru</h3>
    </div>
    <form method="post" action="<?php echo base_url('administrator/guru/input_aksi') ?>">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
            <?php echo form_error('username', '<div class="text-danger small" ml-3>') ?>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
            <?php echo form_error('password', '<div class="text-danger small" ml-3>') ?>

            <label>NIP</label>
            <input type="text" name="NIP" placeholder="Masukkan NIP" class="form-control">
            <?php echo form_error('NIP', '<div class="text-danger small" ml-3>') ?>

            <label>Nama Guru</label>
            <input type="text" name="nama_guru" placeholder="Masukkan Nama Guru" class="form-control">
            <?php echo form_error('nama_guru', '<div class="text-danger small" ml-3>') ?>

            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
            <?php echo form_error('tanggal_lahir', '<div class="text-danger small" ml-3>') ?>

            <label>Jenis Kelamin</label>
            <select class="form-control selectric" name="jenis_kelamin" value="<?php echo $gru->jenis_kelamin ?>">
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>

            <label>No Tlp</label>
            <input type="text" name="no_tlp" placeholder="Masukkan No tlp" class="form-control">
            <?php echo form_error('no_tlp', '<div class="text-danger small" ml-3>') ?>

            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control">
            <?php echo form_error('alamat', '<div class="text-danger small" ml-3>') ?>

            <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>