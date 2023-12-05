<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Tambah Presensi</h3>
    </div>
    <form method="post" action="<?php echo base_url('guru/absensi/input_aksi') ?>">
        <?php
        $temp_guru = "";
        $temp_nis = "";
        $temp_jurusan = ""; ?>
        <div class="form-group">
            <label>Mapel</label>
            <select class="form-control selectric" name="id_mapel">
                <?php foreach ($mapel as $row) : ?>
                    <option <?php $temp_guru = $row->nama_guru ?> value="<?php echo $row->id_mapel ?>">
                        <?php echo $row->nama_mapel ?></option>
                <?php endforeach ?>
            </select>
            <?= form_error('id_mapel', '<medium class="text-danger">', '</medium>'); ?>
        </div>
        <div class="form-group">
            <label for="guru">Guru Mata Pelajaran</label>
            <input type="text" class="form-control" name="guru" id="guru" value="<?= $temp_guru; ?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="nama">Nama Siswa</label>
            <select class="form-control" name="nama" onchange="myFunction(this.value)">
                <?php foreach ($siswa as $row) : ?>
                    <option id="nama_siswa" <?php $temp_nis = $row->nis;
                                            $temp_jurusan = $row->id_jurusan;
                                            $temp_idsiswa = $row->id_siswa;
                                            $temp_kelas = $row->kelas_jurusan . ' | ' . $row->nama_jurusan . ' | ' . $row->ruang_jurusan; ?> value="<?= $row->username; ?>,<?= $row->id_jurusan; ?> ">
                        <?= $row->nama_siswa ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="hidden" name="id_siswa" id="id_siswa" value="<?= $temp_idsiswa; ?>">
        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" class="form-control" name="nisn" id="nisn" value="<?= $temp_nis; ?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="kelas">Jurusan</label>
            <input type="text" class="form-control" name="kelas" id="kelas" value="<?= $temp_kelas; ?>" readonly="readonly">
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
<?php
foreach ($jurusan as $r) {
    // membuat array dengan isi nama jurusan dan id jurusan
    $jur[$r->id_jurusan] = $r->nama_jurusan;
}

//foreach ($siswa as $row) {
foreach ($siswa as $row) {
    // membuat array dengan isi nis dengan value id siswa
    $siswa[$row->nis] = $row->id_siswa;
}
?>
<script>
    function myFunction(val) {
        var pisah = val.split(",");
        var nis = pisah[0];
        var id_jur = parseInt(pisah[1]);

        document.getElementById("nisn").value = nis;

        // mengubah id siswa menjadi id_siswa
        var siswa = <?php echo json_encode($siswa); ?>;
        document.getElementById("id_siswa").value = siswa[nis];

        var jur = <?php echo json_encode($jur); ?>;
        document.getElementById("kelas").value = jur[id_jur];
        // mengubah id jurusan menjadi id_jur
        document.getElementById("id_jurusan").value = id_jur;

    }
</script>