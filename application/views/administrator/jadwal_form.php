<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Tambah Jadwal</h3>
    </div>
    <form method="post" action="<?php echo base_url('administrator/jadwal/input_aksi') ?>">
        <div class="form-group">
            <label>Kelas</label>
            <select class="form-control selectric" name="id_jurusan">
                <option value="">Pilih Kelas</option>
                <?php foreach ($jurusan as $row) : ?>
                    <option value="<?php echo $row->id_jurusan ?>">
                        <?php echo $row->kelas_jurusan . ' ' . $row->kode_jurusan . ' ' . $row->ruang_jurusan; ?></option>
                <?php endforeach ?>
            </select>
            <?= form_error('id_jurusan', '<medium class="text-danger">', '</medium>'); ?>
        </div>
        <div class="form-group">
            <label>Mapel</label>
            <select class="form-control selectric" name="id_mapel">
                <option value="">Pilih Mapel</option>
                <?php foreach ($mapel as $row) : ?>
                    <option value="<?php echo $row->id_mapel ?>">
                        <?php echo $row->nama_mapel ?></option>
                <?php endforeach ?>
            </select>
            <?= form_error('id_mapel', '<medium class="text-danger">', '</medium>'); ?>
        </div>
        <label>Hari</label>
        <select class="form-control selectric" name="hari" value="<?php echo $row->hari ?>">
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
        </select>

        <div class="form-group">
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" placeholder="Masukkan jam mulai" class="form-control">
            <?php echo form_error('jam_mulai', '<div class="text-danger small" ml-3>') ?>
        </div>
        <div class="form-group">
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" placeholder="Masukkan jam selesai" class="form-control">
            <?php echo form_error('jam_selesai', '<div class="text-danger small" ml-3>') ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>