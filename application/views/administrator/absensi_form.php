<div class="container-fluid m-4">
    <div class="box-header">
        <h3 class="box-title">Form Tambah Presensi</h3>
    </div>
    <form method="post" action="<?php echo base_url('administrator/absensi/input_aksi') ?>">
        <div class="form-group">
            <label>Mapel</label>
            <select class="form-control selectric" name="id_mapel">
                <?php foreach ($mapel as $row) : ?>
                    <option value="<?php echo $row->id_mapel ?>"><?php echo $row->nama_mapel ?></option>
                <?php endforeach ?>
            </select>
            <?= form_error('id_mapel', '<medium class="text-danger">', '</medium>'); ?>
        </div>
        <div class="form-group">
            <label>Siswa</label>
            <select class="form-control selectric" name="id_siswa">
                <?php foreach ($siswa as $row) : ?>
                    <option value="<?php echo $row->id_siswa ?>">
                        <?php echo $row->nama_siswa . " | " . $row->kelas_jurusan . " | " . $row->kode_jurusan . " | " . $row->ruang_jurusan; ?></option>
                <?php endforeach ?>
            </select>
            <?= form_error('id_siswa', '<medium class="text-danger">', '</medium>'); ?>
        </div>
        <div class="form-group">
            <label>Jumlah Hadir</label>
            <input type="number" min="0" value="0" name="hadir" placeholder="Masukkan jumlah hadir" class="form-control">
            <?php echo form_error('hadir', '<div class="text-danger small" ml-3>') ?>
        </div>
        <div class="form-group">
            <label>Jumlah Izin</label>
            <input type="number" min="0" value="0" name="izin" placeholder="Masukkan jumlah izin" class="form-control">
            <?php echo form_error('izin', '<div class="text-danger small" ml-3>') ?>
        </div>
        <div class="form-group">
            <label>Jumlah Sakit</label>
            <input type="number" min="0" value="0" name="sakit" placeholder="Masukkan jumlah sakit" class="form-control">
            <?php echo form_error('sakit', '<div class="text-danger small" ml-3>') ?>
        </div>
        <div class="form-group">
            <label>Jumlah Alpha</label>
            <input type="number" min="0" value="0" name="alpha" placeholder="Masukkan jumlah alpha" class="form-control">
            <?php echo form_error('alpha', '<div class="text-danger small" ml-3>') ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>