<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<div class="containcer-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Jadwal Mata Pelajaran</h3>
    </div>

    <table id="scroll-horizontal-datatable" class="display nowrap" style="width: 100%;">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelas Jurusan</th>
                <th>Nama Mata Pelajaran</th>
                <th>Guru</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($jadwal as $jdw) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $jdw->kelas_jurusan . ' - ' . $jdw->kode_jurusan; ?></td>
                    <td><?php echo $jdw->nama_mapel ?></td>
                    <td><?php echo $jdw->nama_guru ?></td>
                    <td><?php echo $jdw->hari ?></td>
                    <td><?php echo $jdw->jam_mulai ?></td>
                    <td><?php echo $jdw->jam_selesai ?></td>
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