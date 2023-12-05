<?php
$namasekolah = "SMK Negeri 2 Bangkalan";
$alamatsekolah = "Jl Halim Perdana Kusuma Bangkalan";
?>
<div class="container-fluid">
    <h3 class="box-title ml-3">Form Raport</h3>
    <!-- Identitas -->
    <form method="post" action="<?php echo base_url('administrator/nilai/input_aksi') ?>">
        <div class="card-body">
            <div class="table-responsive">
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
                        <select class="form-control" name="nama">
                            <?php foreach ($siswa as $row) : ?>
                                <option <?php $temp_nis = $row->nis;
                                        $temp_jurusan = $row->id_jurusan;
                                        $temp_kelas = $row->kelas_jurusan . ' - ' . $row->nama_jurusan; ?> value="<?= $row->id_siswa; ?>">
                                    <?= $row->nama_siswa . " | " . $row->kelas_jurusan . " | " . $row->kode_jurusan . " | " . $row->ruang_jurusan; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="hidden" name="id_jurusan" value="<?= $temp_jurusan; ?>">
                </div><br>
                <div class="row">
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
                        <input type="text" class="form-control" name="tahun_ajar" id="tahun_ajar">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $("#tugas1, #tugas2, #tugas3, #uts, #uas").on('focusout', function() {
        var tugas1 = parseInt($("#tugas1").val());
        var tugas2 = parseInt($("#tugas2").val());
        var tugas3 = parseInt($("#tugas3").val());
        var uts = parseInt($("#uts").val());
        var uas = parseInt($("#uas").val());
        var sumOfValues = (tugas1 + tugas2 + tugas3 + uts + uas) / 5;
        $("#nilai_akhir").val(sumOfValues);
    });
</script>