<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Detail Guru</h3>
    </div>
    <?php foreach ($guru as $gru) : ?>
        <?php echo anchor('administrator/guru/ubah/' . $gru->id_guru, '<div class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i> Edit Guru</div>') ?>
        <form method="post" action="<?php echo base_url('administrator/siswa/lihat') ?>">
            <div class="box-body">
                <table class="table table-bordered table-condensed table-hovered">
                    <tr>
                        <th>Username :</th>
                        <td><?php echo $gru->username ?></td>
                    </tr>
                    <tr>
                        <th>NIP :</th>
                        <td><?php echo $gru->nip ?></td>
                    </tr>
                    <tr>
                        <th>Nama Guru :</th>
                        <td><?php echo $gru->nama_guru ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir :</th>
                        <td><?php echo $gru->tgl_lahir_guru ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin :</th>
                        <td><?php echo $gru->jk_guru ?></td>
                    </tr>
                    <tr>
                        <th>No Tlp :</th>
                        <td><?php echo $gru->tlp_guru ?></td>
                    </tr>
                    <tr>
                        <th>Alamat :</th>
                        <td><?php echo $gru->alamat_guru ?></td>
                    </tr>
                </table>
            </div>
        </form>
    <?php endforeach; ?>
</div>

<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Jadwal Guru</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-condensed table-hovered">
            <thead>
                <tr>
                    <th>Kelas Jurusan</th>
                    <th>Ruang Jurusan</th>
                    <th>Nama Mapel</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jadwal as $row) : ?>
                    <tr>
                        <td><?php echo $row->kelas_jurusan . ' - ' . $row->nama_jurusan ?></td>
                        <td><?php echo $row->ruang_jurusan ?></td>
                        <td><?php echo $row->nama_mapel ?></td>
                        <td><?php echo $row->hari ?></td>
                        <td><?php echo $row->jam_mulai ?></td>
                        <td><?php echo $row->jam_selesai ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>