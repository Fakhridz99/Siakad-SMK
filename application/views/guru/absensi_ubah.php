<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Ubah Presensi</h3>
    </div>
    <?php foreach ($absensi as $abs) : ?>
        <form method="post" action="<?php echo base_url('guru/absensi/ubah_aksi') ?>">
            <?php
            $temp_guru = "";
            $temp_nis = "";
            $temp_jurusan = ""; ?>
            <input type="hidden" value="<?= $abs->id_absen_siswa; ?>" name="id_absen_siswa">
            <div class="form-group">
                <label>Mapel</label>
                <select class="form-control selectric" name="id_mapel">
                    <?php foreach ($mapel as $row) : ?>
                        <option <?php $temp_guru = $row->nama_guru;
                                if ($row->id_mapel == $abs->id_mapel) echo 'selected' ?> value="<?php echo $row->id_mapel ?>">
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
                <select class="form-control" name="nama" onchange="myFunction(this.value)" disabled='true'>
                    <?php foreach ($siswa as $row) : ?>
                        <option id="nama_siswa" disabled <?php
                                                            if ($row->id_siswa == $absensi[0]->id_siswa) {
                                                                // $temp_nama = $row->nama_siswa;
                                                                echo 'selected';
                                                            }
                                                            $temp_nis = $row->nis;
                                                            $temp_jurusan = $row->id_jurusan;
                                                            $temp_idsiswa = $row->id_siswa;
                                                            $temp_kelas = $row->kelas_jurusan . ' | ' . $row->nama_jurusan . ' | ' . $row->ruang_jurusan; ?> value="<?= $row->username; ?>,<?= $row->id_jurusan; ?> ">

                            <?php
                            if ($absensi[0]->id_siswa == $row->id_siswa) {
                                echo $row->nama_siswa;
                            }
                            // foreach($absensi as $abs){
                            //     if($abs->id_siswa == $row->id_siswa){
                            //         echo $row->nama_siswa;
                            //     }
                            // }
                            ?>

                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="id_siswa" value="<?= $temp_idsiswa; ?>">
            <input type="hidden" name="id_jurusan" value="<?= $temp_jurusan; ?>">
            <div class="form-group">
                <label for="nisn">NIS</label>
                <input type="text" class="form-control" name="nisn" id="nisn" value="<?= $temp_nis; ?>" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" class="form-control" name="kelas" id="kelas" value="<?= $temp_kelas; ?>" readonly="readonly">
            </div>
            <div class="form-group">
                <label>Jumlah Hadir</label>
                <input type="number" min="0" value="<?= $abs->hadir; ?>" name="hadir" placeholder="Masukkan jumlah hadir" class="form-control">
                <?php echo form_error('hadir', '<div class="text-danger small" ml-3>') ?>
            </div>
            <div class="form-group">
                <label>Jumlah Izin</label>
                <input type="number" min="0" value="<?= $abs->izin; ?>" name="izin" placeholder="Masukkan jumlah izin" class="form-control">
                <?php echo form_error('izin', '<div class="text-danger small" ml-3>') ?>
            </div>
            <div class="form-group">
                <label>Jumlah Sakit</label>
                <input type="number" min="0" value="<?= $abs->sakit; ?>" name="sakit" placeholder="Masukkan jumlah sakit" class="form-control">
                <?php echo form_error('sakit', '<div class="text-danger small" ml-3>') ?>
            </div>
            <div class="form-group">
                <label>Jumlah Alpha</label>
                <input type="number" min="0" value="<?= $abs->alpha; ?>" name="alpha" placeholder="Masukkan jumlah alpha" class="form-control">
                <?php echo form_error('alpha', '<div class="text-danger small" ml-3>') ?>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>
<?php
foreach ($jurusan as $r) {
    // membuat array dengan isi nama jurusan dan id jurusan
    $jur[$r->id_jurusan] = $r->nama_jurusan;
}
?>
<script>
    function myFunction(val) {
        var pisah = val.split(",");
        var nis = pisah[0];
        var id_jur = parseInt(pisah[1]);
        document.getElementById("nisn").value = nis;
        var jur = <?php echo json_encode($jur); ?>;
        document.getElementById("kelas").value = jur[id_jur];
        // mengubah id jurusan menjadi id_jur
        document.getElementById("id_jurusan").value = id_jur;

    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>