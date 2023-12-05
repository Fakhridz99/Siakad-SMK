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
    <div class="row">
        <div class="col">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <table id="nilai" class="display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Jurusan</th>
                                <th>Kelas</th>
                                <th>Nama Jurusan</th>
                                <th>Ruang</th>
                                <th>Aksi</th>

                                <!-- <th>Hapus</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($nilai_jurusan as $row) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row->id_jurusan ?></td>
                                    <td><?php echo $row->kelas_jurusan ?></td>
                                    <td><?= $row->nama_jurusan; ?></td>
                                    <td><?php echo $row->ruang_jurusan ?></td>
                                    <td width="20px"><?= anchor('administrator/nilai/detail_jurusan/' . $row->id_jurusan, '<div class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></div>') ?></td>
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
        $('#nilai').DataTable({

        });
    });
</script>