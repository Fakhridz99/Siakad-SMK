<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<?php
$namasekolah = "SMK Negeri 2 Bangkalan";
$alamatsekolah = "Jl Halim Perdana Kusuma Bangkalan";
$tahunajaran = "2022/2023";
?>
<?php
foreach ($nilai_detail_siswa as $row) {
    $kelas = $row->kelas_jurusan;
    $jurusan = $row->kode_jurusan;
    $ruang = $row->ruang_jurusan;
    $siswa = $row->nama_siswa;
    $nis = $row->nis;
}
?>
<div class="containcer-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Raport</h3>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">

            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-condensed table-hovered">
                    <tr>
                        <th>Nama Siswa</th>
                        <td> : <?= !empty($siswa) ? $siswa : 'Tidak Ada Data';  ?></td>
                    </tr>
                    <tr>
                        <th>NIS </th>
                        <td> : <?= !empty($nis) ? $nis : 'Tidak Ada Data';  ?></td>
                    </tr>
                    <tr>
                        <th>Sekolah</th>
                        <td>:<?php echo $namasekolah; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:<?php echo $alamatsekolah; ?></td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td> : <?= !empty($kelas) ? $kelas . " " . $jurusan . " " . $ruang : 'Tidak Ada Data';  ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Pelajaran</th>
                        <td>:<?php echo $tahunajaran; ?></td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="box-header">
                        <h4 class="box-title">Nilai Akademik</h4>
                    </div>
                    <table id="scroll-horizontal-datatable" class="display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>Nilai Akhir</th>
                                <th>Capaian Kompetensi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($nilai as $row) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row->nama_mapel ?></td>
                                    <td><?php echo $row->nilai_akhir ?></td>
                                    <td><?php echo $row->capaian_kompetensi ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <table style="border: none;">
                        <div class="box-header">
                            <h4 class="box-title">Ketidakhadiran</h4>
                        </div>
                        <?php $no = 1;
                        foreach ($absensi as $row) : ?>
                            <!-- <?php //foreach ($absensi as $row) : 
                                    ?> -->
                            <!-- <tr>
                                <th>Kehadiran</th>
                                <td>: <?php echo $row->hadir; ?></td>
                            </tr> -->
                            <tr>
                                <th>Sakit</th>
                                <td>: <?php echo $row->sakit; ?></td>
                            </tr>
                            <tr>
                                <th>Izin</th>
                                <td>: <?php echo $row->izin; ?></td>
                            </tr>
                            <tr>
                                <th>Tanpa Keterangan</th>
                                <td>: <?php echo $row->alpha; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <!-- <?php // endforeach; 
                                ?> -->
                    </table>
                    <div class="d-flex justify-content-end"><a href="nilai/print_rapot_siswa" target="_blank" class="btn btn-default mt-3"><i class="fa fa-print"></i> Print</a></div>

                </div>
            </div>
        </div>
    </div>

</div>





<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#scroll-horizontal-datatable').DataTable({

        });
    });
</script>