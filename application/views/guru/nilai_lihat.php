<?php
// $namasekolah = "SMK Negeri 2 Bangkalan";
// $alamatsekolah = "Jl Halim Perdana Kusuma Bangkalan";
$tahunajaran = "2022/2023";
?>
<?php
foreach ($nilai_detail_kelas_guru as $row) {
    $kelas = $row->kelas_jurusan;
    $jurusan = $row->nama_jurusan;
    $mapel = $row->nama_mapel;
    $guru = $row->nama_guru;
}
?>
<div class="containcer-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Nilai</h3>
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
                <?php echo anchor('guru/nilai/import/' . $id, '<button class="btn btn-sm btn-primary mb-3"><i class="mdi mdi-plus"></i> Import</button>') ?>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Tugas</th>
                <th>Ulangan</th>
                <!-- <th>Tugas 3</th> -->
                <th>UTS</th>
                <th>UAS</th>
                <th>Nilai Akhir</th>
                <th>Capaian Kompetensi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($nilai as $row) : ?>
                <tr>
                    <form method="post" action="<?php echo base_url('guru/nilai/tambah_nilai') ?>">
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row->nis ?></td>
                        <td><?php echo $row->nama_siswa ?></td>
                        <input type="hidden" name="id_mapel" value="<?php echo $row->id_mapel ?>">
                        <input type="hidden" name="id_jurusan" value="<?php echo $row->id_jurusan ?>">
                        <input type="hidden" name="id_siswa" value="<?php echo $row->id_siswa ?>">
                        <td><input type="number" min="0" max="100" value="<?php echo $row->tugas ?>" class="form-control" name="tugas" id="tugas"></td>
                        <td><input type="number" min="0" max="100" value="<?php echo $row->ulangan ?>" class="form-control" name="ulangan" id="ulangan"></td>
                        <!-- <td><input type="number" min="0" value="<?php echo $row->tugas3 ?>" class="form-control" name="tugas3" id="tugas3"></td> -->
                        <td><input type="number" min="0" max="100" value="<?php echo $row->uts ?>" class="form-control" name="uts" id="uts"></td>
                        <td><input type="number" min="0" max="100" value="<?php echo $row->uas ?>" class="form-control" name="uas" id="uas"></td>
                        <td><input type="number" min="0" max="100" value="<?php echo $row->nilai_akhir ?>" class="form-control" name="nilai_akhir" id="nilai_akhir" readonly="readonly"></td>
                        <!-- <td><input type="text" value="<?php echo $row->capaian_kompetensi ?>" class="form-control" name="capaian_kompetensi" placeholder="Masukkan Capaian Kompetensi"></td> -->
                        <td> <input type="text" name="capaian_kompetensi" value="<?php
                                                                                    if ($row->capaian_kompetensi == '0') {
                                                                                        echo '';
                                                                                    } else {
                                                                                        echo $row->capaian_kompetensi;
                                                                                    }

                                                                                    ?>" placeholder="Masukkan Capaian Kompetensi" class="form-control"></td>

                        <td><button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i></button></td>
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
<!-- <script>
    $("#tugas1, #tugas2, #tugas3, #uts, #uas").on('focusout', function() {
        var tugas1 = parseInt($("#tugas1").val());
        var tugas2 = parseInt($("#tugas2").val());
        var tugas3 = parseInt($("#tugas3").val());
        var uts = parseInt($("#uts").val());
        var uas = parseInt($("#uas").val());
        var sumOfValues = ((((tugas1 + tugas2 + tugas3) / 3) * 0.35) + (uts * 0.25) + (uas * 0.4));
        $("#nilai_akhir").val(sumOfValues);
    });
</script> -->
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