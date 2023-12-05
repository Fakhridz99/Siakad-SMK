<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Ubah Guru</h3>
    </div>
    <?php foreach ($guru as $gru) : ?>
        <form method="post" action="<?php echo base_url('administrator/guru/ubah_aksi') ?>">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan Username" class="form-control" value="<?= $gru->username ?>">
                <?php echo form_error('username', '<div class="text-danger small" ml-3>') ?>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
                <?php echo form_error('password', '<div class="text-danger small" ml-3>') ?>
            </div>
            <div class="form-group">
                <label>NIP</label>
                <input type="hidden" name="id_guru" value="<?php echo $gru->id_guru ?>">
                <input type="text" name="NIP" class="form-control" value="<?php echo $gru->nip ?>">
            </div>
            <div class="form-group">
                <label>Nama Guru</label>
                <input type="text" name="nama_guru" class="form-control" value="<?php echo $gru->nama_guru ?>">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $gru->tgl_lahir_guru ?>">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control selectric" name="jenis_kelamin" value="<?php echo $gru->jk_guru ?>">
                    <option <?php if ($gru->jk_guru == 'Pria') echo 'selected' ?> value="Pria">Pria</option>
                    <option <?php if ($gru->jk_guru == 'Wanita') echo 'selected' ?> value="wanita">Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label>No Tlp</label>
                <input type="text" name="no_tlp" class="form-control" value="<?php echo $gru->tlp_guru ?>">
            </div>
            <div class="form-group">
                <label>No Tlp</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $gru->alamat_guru ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>