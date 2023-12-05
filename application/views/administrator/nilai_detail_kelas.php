<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<div class="containcer-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Nilai</h3>
    </div>
    <div class="navbar-form navbar-right">
        <div class="row mt-3">
            <div class="col-md-5">
                <?php echo $this->session->flashdata('pesan') ?>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <?php
    foreach ($nilai_detail_kelas as $row) {
        $kelas = $row->kelas_jurusan;
        $jurusan = $row->nama_jurusan;
        $mapel = $row->nama_mapel;
        $guru = $row->nama_guru;
    }
    ?>
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
    <div class="row">
        <div class="col">
            <div class="card shadow-lg bg-white rounded">
                <div class="card-body">
                    <table id="absensi" class="display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Ruang</th>
                                <th>Mata Pelajaran</th>
                                <th>Tugas</th>
                                <th>Ulangan</th>
                                <th>UTS</th>
                                <th>UAS</th>
                                <th>Nilai Akhir</th>
                                <th>Capaian Kompetensi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($nilai_detail_kelas as $row) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row->nis ?></td>
                                    <td><?php echo $row->nama_siswa ?></td>
                                    <td><?php echo $row->kelas_jurusan ?></td>
                                    <td><?php echo $row->kode_jurusan ?></td>
                                    <td><?php echo $row->ruang_jurusan ?></td>
                                    <td><?php echo $row->nama_mapel ?></td>
                                    <td><?php echo $row->tugas ?></td>
                                    <td><?php echo $row->ulangan ?></td>
                                    <td><?php echo $row->uts ?></td>
                                    <td><?php echo $row->uas ?></td>
                                    <td><?php echo $row->nilai_akhir ?></td>
                                    <td><?php echo $row->capaian_kompetensi ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#absensi').DataTable({

        });
    });
</script>