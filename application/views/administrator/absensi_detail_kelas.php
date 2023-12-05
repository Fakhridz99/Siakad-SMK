<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<div class="containcer-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Presensi</h3>
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
    foreach ($absensi_detail_kelas as $row) {
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
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <table id="absensi" class="display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Hadir</th>
                                <th>Izin</th>
                                <th>Sakit</th>
                                <th>Alpha</th>
                                <!-- <th>Hapus</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($absensi_detail_kelas as $row) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row->nis ?></td>
                                    <td><?php echo $row->nama_siswa ?></td>
                                    <td><?= $row->hadir; ?></td>
                                    <td><?= $row->izin; ?></td>
                                    <td><?= $row->sakit; ?></td>
                                    <td><?= $row->alpha; ?></td>
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