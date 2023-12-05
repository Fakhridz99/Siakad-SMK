<?php
// $namasekolah = "SMK Negeri 2 Bangkalan";
// $alamatsekolah = "Jl Halim Perdana Kusuma Bangkalan";
$tahunajaran = "2022/2023";
?>
<?php
foreach ($absensi_detail_kelas as $row) {
    $kelas = $row->kelas_jurusan;
    $jurusan = $row->nama_jurusan;
    $mapel = $row->nama_mapel;
    $guru = $row->nama_guru;
}
?>
<div class="containcer-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Presensi</h3>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="box-body">
                <table class="table table-bordered table-condensed table-hovered">
                    <tr>
                        <th>Kelas</th>
                        <td>: <?= !empty($kelas) ? $kelas : 'Tidak Ada Data';  ?></td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td>: <?= !empty($jurusan) ? $jurusan : 'Tidak Ada Data'; ?></td>
                    </tr>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <td>: <?= !empty($mapel) ? $mapel : 'Tidak Ada Data'; ?></td>
                    </tr>
                    <tr>
                        <th>Guru Pengajar</th>
                        <td>: <?= !empty($guru) ? $guru : 'Tidak Ada Data'; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="navbar-form navbar-right">
        <div class="row mt-3">
            <div class="col-md-5">
                <?php echo $this->session->flashdata('pesan') ?>
                <?php echo anchor('guru/absensi/import/' . $id, '<button class="btn btn-sm btn-primary mb-3"><i class="mdi mdi-plus"></i> Import</button>') ?>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>

    <!-- <form method="post" action="<?php echo base_url('guru/nilai/input_aksi') ?>">
        <div class="row">
            <div class="col-lg">
                <label for="nm_sekolah">Nama Sekolah</label>
                <input type="text" name="nm_sekolah" id="nm_sekolah" class="form-control" value="<?php echo $namasekolah; ?> " readonly>
            </div>
            <div class="col-lg">
                <label for="alamat">Alamat Sekolah</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $alamatsekolah; ?> " readonly>
            </div>
        </div>

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
                <input type="text" name="tahunajar" id="tahunajar" class="form-control" value="<?php echo $tahunajar; ?> " readonly>
            </div>
        </div> -->

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <!-- <th>Hadir</th> -->
                <th>Izin</th>
                <th>Sakit</th>
                <th>Tanpa Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($absensi as $row) : ?>
                <tr>
                    <form method="post" action="<?php echo base_url('guru/absensi/tambah_absen') ?>">
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row->nis ?></td>
                        <td><?php echo $row->nama_siswa ?></td>
                        <input type="hidden" name="id_mapel" value="<?php echo $row->id_mapel ?>">
                        <input type="hidden" name="id_jurusan" value="<?php echo $row->id_jurusan ?>">
                        <input type="hidden" name="id_siswa" value="<?php echo $row->id_siswa ?>">
                        <!-- <td> <select class="form-control selectric" name="presensi1" value="<?php echo $row->presensi1 ?>">
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select> </td>
                        <td> <select class="form-control selectric" name="presensi2" value="<?php echo $row->presensi2 ?>">
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select> </td>
                        <td> <select class="form-control selectric" name="presensi3" value="<?php echo $row->presensi3 ?>">
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select> </td>
                        <td> <select class="form-control selectric" name="presensi4" value="<?php echo $row->presensi4 ?>">
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select> </td>
                        <td> <select class="form-control selectric" name="presensi5" value="<?php echo $row->presensi5 ?>">
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select> </td>
                        <td> <select class="form-control selectric" name="presensi6" value="<?php echo $row->presensi6 ?>">
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select> </td>
                        <td> <select class="form-control selectric" name="presensi7" value="<?php echo $row->presensi7 ?>">
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select> </td>
                        <td> <select class="form-control selectric" name="presensi8" value="<?php echo $row->presensi8 ?>">
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select> </td>
                        <td> <select class="form-control selectric" name="presensi9" value="<?php echo $row->presensi9 ?>">
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select> </td>
                        <td> <select class="form-control selectric" name="presensi10" value="<?php echo $row->presensi10 ?>">
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select> </td>
                        <td> <select class="form-control selectric" name="presensi11" value="<?php echo $row->presensi11 ?>">
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpha">Alpha</option>
                            </select> </td> -->

                        <!-- <td><input type="number" min="0" max="22" value="<?php echo $row->hadir ?>" class="form-control" name="hadir" id="hadir"></td> -->
                        <td><input type="number" min="0" max="22" value="<?php echo $row->izin ?>" class="form-control" name="izin" id="izin"></td>
                        <td><input type="number" min="0" max="22" value="<?php echo $row->sakit ?>" class="form-control" name="sakit" id="sakit"></td>
                        <td><input type="number" min="0" max="22" value="<?php echo $row->alpha ?>" class="form-control" name="alpha" id="alpha"></td>
                        <td><button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></td>
                        <!-- <td></button> <a href="<?php echo base_url('guru/absensi/delete_absen/' . $row->id_siswa . '/' . $row->id_mapel . '/' . $row->id_jurusan) ?>" class="btn btn-danger"><i class="nav-icon fas fa-trash-alt"></td> -->
                    </form>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#scroll-horizontal-datatable').DataTable({
            columnDefs: [{
                "className": "dt-center",
                "targets": "_all"
            }],
            scrollX: true,
            dom: 'Bfrtip',
            dom: 'Bfrtip',
            buttons: [{
                extend: 'print',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                },
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend(
                            '<img src="<?= base_url() ?>assets/dist/img/SMK.png" style="width: 500px; height 500px; top:0; margin-left:auto; margin-right:auto; display: block; margin-bottom: 50px" />'
                        );

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }]
        });
    });
</script>