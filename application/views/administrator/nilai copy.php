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
                <!--                <?php echo anchor('administrator/nilai/input', '<button class="btn btn-sm btn-primary mb-3"><i class="mdi mdi-plus"></i> Tambah Nilai</button>') ?> -->
            </div>
        </div>
    </div>

    <table id="scroll-horizontal-datatable" class="display" style="width: 100%;">
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
                <!-- <th>Tugas 3</th> -->
                <th>UTS</th>
                <th>UAS</th>
                <th>Nilai Akhir</th>
                <!-- <th>Hapus</th> -->
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($nilai as $row) : ?>
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
                    <!-- <td><?php echo $row->tugas3 ?></td> -->
                    <td><?php echo $row->uts ?></td>
                    <td><?php echo $row->uas ?></td>
                    <td><?php echo $row->nilai_akhir ?></td>
                    <!-- <td width="20px"><?php echo anchor('administrator/nilai/hapus/' . $row->id_nilai, '<div class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></div>') ?></td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
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