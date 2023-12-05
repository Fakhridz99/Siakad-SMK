<?php
$namasekolah = "SMK Negeri 2 Bangkalan";
$alamatsekolah = "Jl Halim Perdana Kusuma Bangkalan";
$tahunajar = "2022/2023";
?>
<div class="container-fluid">
    <h3 class="box-title ml-3">Form Raport</h3>
    <!-- Identitas -->
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo form_close() ?>
    <form method="post" action="<?php echo base_url('guru/nilai/input_aksi') ?>">
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $temp_jurusan = "";
                $temp_nis = "";
                $temp_kelas = ""; ?>
                <div class="row">
                    <div class="col-lg">
                        <label for="nm_sekolah">Nama Sekolah</label>
                        <input type="text" name="nm_sekolah" id="nm_sekolah" class="form-control" value="<?php echo $namasekolah; ?> " readonly>
                    </div>
                    <div class="col-lg">
                        <label for="alamat">Alamat Sekolah</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $alamatsekolah; ?> " readonly>
                    </div>
                    <div class="col-lg">
                        <label for="nama">Nama Siswa</label>
                        <select class="form-control" name="nama" onchange="myFunction(this.value)" disabled='true'>
                            <?php foreach ($siswa as $row) : ?>
                                <option id="nama_siswa" disabled <?php
                                                                    if ($row->id_siswa == $nilai[0]->id_siswa) {
                                                                        // $temp_nama = $row->nama_siswa;
                                                                        echo 'selected';
                                                                    }
                                                                    $temp_nis = $row->nis;
                                                                    $temp_jurusan = $row->id_jurusan;
                                                                    $temp_idsiswa = $row->id_siswa;
                                                                    $temp_kelas = $row->kelas_jurusan . ' ' . $row->kode_jurusan . ' ' . $row->ruang_jurusan; ?> value="<?= $row->username; ?>,<?= $row->id_jurusan; ?> ">
                                    <?php
                                    if ($nilai[0]->id_siswa == $row->id_siswa) {
                                        echo $row->nama_siswa;
                                    }
                                    ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="hidden" name="id_siswa" id="id_siswa" value="<?= $temp_idsiswa; ?>">
                    <input type="hidden" name="id_jurusan" value="<?= $temp_jurusan; ?>">
                    <div class="col-lg">
                        <label for="nisn">NIS</label>
                        <input type="text" class="form-control" name="nisn" id="nisn" value="<?= $temp_nis; ?>" readonly="readonly">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-lg">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" name="kelas" id="kelas" value="<?= $temp_kelas; ?>" readonly="readonly">
                    </div>
                    <div class="col-lg">
                        <label for="semester">Semester</label>
                        <select name="semester" id="semester" class="form-control">
                            <option value="">--Pilih Semester--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>

                        </select>
                    </div>

                    <div class="col-lg">
                        <label for="tahun_ajar">Tahun Ajar</label>
                        <input type="text" class="form-control" name="tahun_ajar" id="tahun_ajar" value="<?php echo $tahunajar; ?> " readonly>
                    </div>
                </div>
                <br>

                <!-- Page Nilai -->
                <div class="card">
                    <div class="container justify-center">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                    <div class="row">
                                        <div class="col-lg">
                                            <label for="mapel">Mata Pelajaran</label>
                                            <select class="form-control" name="mapel">
                                                <?php foreach ($mapel as $row) : ?>
                                                    <option value="<?= $row->id_mapel; ?>">
                                                        <?= $row->kode_mapel . ' - ' . $row->nama_mapel ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-lg">
                                            <label for="tugas1">Tugas 1</label>
                                            <input type="number" min="0" value="0" class="form-control" name="tugas1" id="tugas1">
                                        </div>

                                        <div class="col-lg">
                                            <label for="tugas2">Tugas 2</label>
                                            <input type="number" min="0" value="0" class="form-control" name="tugas2" id="tugas2">
                                        </div>

                                        <div class="col-lg">
                                            <label for="tugas3">Tugas 3</label>
                                            <input type="number" min="0" value="0" class="form-control" name="tugas3" id="tugas3">
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-lg">
                                            <label for="uts">UTS</label>
                                            <input type="number" min="0" value="0" class="form-control" name="uts" id="uts">
                                        </div>

                                        <div class="col-lg">
                                            <label for="uas">UAS</label>
                                            <input type="number" min="0" value="0" class="form-control" name="uas" id="uas">
                                        </div>

                                        <div class="col-lg">
                                            <label for="nilai_akhir">Nilai Akhir</label>
                                            <input type="number" min="0" value="0" class="form-control" name="nilai_akhir" id="nilai_akhir" readonly="readonly">
                                        </div>
                                    </div><br>

                                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
foreach ($jurusan as $r) {
    // membuat array dengan isi nama jurusan dan id jurusan
    $jur[$r->id_jurusan] = $r->nama_jurusan;
}

foreach ($siswa as $row) {
    $sis[$row->nis] = $row->id_siswa;
}
?>
<script>
    function myFunction(val) {
        var pisah = val.split(",");
        var nis = pisah[0];
        var id_jur = parseInt(pisah[1]);
        document.getElementById("nisn").value = nis;
        // mengubah id_siswa dengan id siswa
        var siswa = <?php echo json_encode($sis); ?>;
        document.getElementById("id_siswa").value = siswa[nis];

        var jur = <?php echo json_encode($jur); ?>;
        document.getElementById("kelas").value = jur[id_jur];
        // mengubah id jurusan menjadi id_jur
        document.getElementById("id_jurusan").value = id_jur;

    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $("#tugas1, #tugas2, #tugas3, #uts, #uas").on('focusout', function() {
        var tugas1 = parseInt($("#tugas1").val());
        var tugas2 = parseInt($("#tugas2").val());
        var tugas3 = parseInt($("#tugas3").val());
        var uts = parseInt($("#uts").val());
        var uas = parseInt($("#uas").val());
        var sumOfValues = ((((tugas1 + tugas2 + tugas3) / 3) * 0.35) + (uts * 0.25) + (uas * 0.4));
        $("#nilai_akhir").val(sumOfValues);
    });
</script>