<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Detail Siswa</h3>
    </div>
    <?php foreach ($siswa as $ssw) : ?>
        <?php echo anchor('administrator/siswa/ubah/' . $ssw->id_siswa, '<div class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i> Edit Siswa</div>') ?>
        <form method="post" action="<?php echo base_url('administrator/siswa/lihat') ?>">
            <div class="box-body">
                <table class="table table-bordered table-condensed table-hovered">
                    <tr>
                        <th>Username :</th>
                        <td><?php echo $ssw->username ?></td>
                    </tr>
                    <tr>
                        <th>NIS :</th>
                        <td><?php echo $ssw->nis ?></td>
                    </tr>
                    <tr>
                        <th>Nama Siswa :</th>
                        <td><?php echo $ssw->nama_siswa ?></td>
                    </tr>
                    <tr>
                        <th>Kelas :</th>
                        <td> <?php echo $ssw->kelas_jurusan ?> </td>
                    </tr>
                    <tr>
                        <th>Jurusan :</th>
                        <td> <?php echo $ssw->nama_jurusan ?> </td>
                    </tr>
                    <tr>
                        <th>Ruang :</th>
                        <td> <?php echo $ssw->ruang_jurusan ?> </td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir :</th>
                        <td><?php echo $ssw->tgl_lahir_siswa ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin :</th>
                        <td><?php echo $ssw->jk_siswa ?></td>
                    </tr>
                    <tr>
                        <th>No Tlp :</th>
                        <td><?php echo $ssw->tlp_siswa ?></td>
                    </tr>
                    <tr>
                        <th>Alamat :</th>
                        <td><?php echo $ssw->alamat_siswa ?></td>
                    </tr>
                </table>
            </div>
        </form>
    <?php endforeach; ?>
</div>

<div class="container-fluid m-4">
    <div class="box-header">
        <h3 class="box-title">Jadwal</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-condensed table-hovered">
            <thead>
                <tr>
                    <th>NIP Guru</th>
                    <th>Nama Guru</th>
                    <th>Nama Mapel</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jadwal as $row) : ?>
                    <tr>
                        <td><?php echo $row->nip ?></td>
                        <td><?php echo $row->nama_guru ?></td>
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

<div class="container-fluid m-4">
    <div class="box-header">
        <h3 class="box-title">Absensi</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-condensed table-hovered">
            <thead>
                <tr>
                    <th>Nama Guru</th>
                    <th>Nama Mapel</th>
                    <th>Hadir</th>
                    <th>Izin</th>
                    <th>Sakit</th>
                    <th>Alpha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($absensi as $row) : ?>
                    <tr>
                        <td><?php echo $row->nama_guru ?></td>
                        <td><?php echo $row->nama_mapel ?></td>
                        <td><?php echo $row->hadir ?></td>
                        <td><?php echo $row->izin ?></td>
                        <td><?php echo $row->sakit ?></td>
                        <td><?php echo $row->alpha ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container-fluid m-4">
    <div class="box-header">
        <h3 class="box-title">Nilai</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-condensed table-hovered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>Tugas 1</th>
                    <th>Tugas 2</th>
                    <th>Tugas 3</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Nilai Akhir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($nilai as $row) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row->nama_mapel ?></td>
                        <td><?php echo $row->tugas1 ?></td>
                        <td><?php echo $row->tugas2 ?></td>
                        <td><?php echo $row->tugas3 ?></td>
                        <td><?php echo $row->uts ?></td>
                        <td><?php echo $row->uas ?></td>
                        <td><?php echo $row->nilai_akhir ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>