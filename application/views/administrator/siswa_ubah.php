<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Ubah Siswa</h3>
    </div>
    <?php foreach ($siswa as $ssw) : ?>
        <form method="post" action="<?php echo base_url('administrator/siswa/ubah_aksi') ?>">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan Username" class="form-control" value="<?= $ssw->username ?>">
                <?php echo form_error('username', '<div class="text-danger small" ml-3>') ?>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
                <?php echo form_error('password', '<div class="text-danger small" ml-3>') ?>
            </div>

            <div class="form-group">
                <label>NIS</label>
                <input type="hidden" name="id_siswa" value="<?php echo $ssw->id_siswa ?>">
                <input type="text" name="NIS" class="form-control" value="<?php echo $ssw->nis ?>">
            </div>
            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" name="nama_siswa" class="form-control" value="<?php echo $ssw->nama_siswa ?>">
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <select class="form-control selectric" name="id_jurusan_siswa">
                    <?php foreach ($jurusan as $jrs) : ?>
                        <option <?php if ($jrs->id_jurusan == $ssw->id_jurusan) echo 'selected' ?> value="<?php echo $jrs->id_jurusan ?>">
                            <?php echo $jrs->kelas_jurusan . " " . $jrs->kode_jurusan . " " . $jrs->ruang_jurusan; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $ssw->tgl_lahir_siswa ?>">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control selectric" name="jenis_kelamin" value="<?php echo $ssw->jk_siswa ?>">
                    <option <?php if ($ssw->jk_siswa == 'Pria') echo 'selected' ?> value="Pria">Pria</option>
                    <option <?php if ($ssw->jk_siswa == 'Wanita') echo 'selected' ?> value="wanita">Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label>No Tlp</label>
                <input type="text" name="no_tlp" class="form-control" value="<?php echo $ssw->tlp_siswa ?>">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $ssw->alamat_siswa ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>