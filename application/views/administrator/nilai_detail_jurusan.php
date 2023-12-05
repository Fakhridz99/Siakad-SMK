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
    foreach ($nama_jurusan as $row) {
        $jurusan = $row->nama_jurusan;
        $kelas = $row->kelas_jurusan;
    }
    ?>
    <!-- kelas 10 -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="card-header text-white bg-info mb-3">
                        <h2 class="text-center">Kelas <?= $kelas; ?> <?= $jurusan; ?></h2>
                    </div>
                    <table id="jurusan" class="display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Mata Pelajaran</th>
                                <th>Mata Pelajaran</th>
                                <th>Guru</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                                <!-- <th>Hapus</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($absensi_detail_jadwal as $row) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?= $row->kode_mapel; ?></td>
                                    <td><?php echo $row->nama_mapel ?></td>
                                    <td><?php echo $row->nama_guru ?></td>
                                    <td><?php echo $row->kelas_jurusan ?></td>
                                    <td><?php echo $row->nama_jurusan ?></td>
                                    <td width="20px"><?php echo anchor('administrator/nilai/detail_kelas/' . $row->id_mapel, '<div class="btn btn-sm btn-info"><i class="fas fa-eye"></i></div>') ?></td>
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
        $('#jurusan').DataTable({
            pageLength: 5,
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'All']
            ]
        });
    });
</script>