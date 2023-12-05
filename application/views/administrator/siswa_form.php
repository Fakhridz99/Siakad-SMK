<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Tambah Siswa</h3>
    </div>
    <form method="post" action="<?php echo base_url('administrator/siswa/input_aksi') ?>">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" class="form-control">
            <?php echo form_error('username', '<div class="text-danger small" ml-3>') ?>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
            <?php echo form_error('password', '<div class="text-danger small" ml-3>') ?>

            <label>NIS</label>
            <input type="text" name="NIS" placeholder="Masukkan NIS" class="form-control">
            <?php echo form_error('NIS', '<div class="text-danger small" ml-3>') ?>

            <label>Nama Siswa</label>
            <input type="text" name="nama_siswa" placeholder="Masukkan Nama Siswa" class="form-control">
            <?php echo form_error('nama_siswa', '<div class="text-danger small" ml-3>') ?>

            <div class="form-group">
                <label>Jurusan</label>
                <select class="form-control selectric" name="id_jurusan_siswa">
                    <option value="">Pilih Jurusan</option>
                    <?php foreach ($jurusan as $jrs) : ?>
                        <option value="<?php echo $jrs->id_jurusan ?>">
                            <?php echo $jrs->kelas_jurusan . " " . $jrs->kode_jurusan . " " . $jrs->ruang_jurusan; ?></option>
                    <?php endforeach ?>
                </select>
                <?= form_error('id_jurusan_siswa', '<medium class="text-danger">', '</medium>'); ?>
            </div>

            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">
            <?php echo form_error('tanggal_lahir', '<div class="text-danger small" ml-3>') ?>

            <label>Jenis Kelamin</label>
            <select class="form-control selectric" name="jenis_kelamin" value="<?php echo $ssw->jenis_kelamin ?>">
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