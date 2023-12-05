<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Tambah Mata Pelajaran</h3>
    </div>
    <form method="post" action="<?php echo base_url('administrator/mapel/input_aksi') ?>">
        <div class="form-group">
            <label>Guru pengajar</label>
            <select class="form-control selectric" name="id_guru">
                <option value="">Pilih Guru</option>
                <?php foreach ($guru as $row) : ?>
                    <option value="<?php echo $row->id_guru ?>">
                        <?php echo $row->nama_guru ?></option>
                <?php endforeach ?>
            </select>
            <?= form_error('id_guru', '<medium class="text-danger">', '</medium>'); ?>
        </div>
        <div class="form-group">
            <label>Kode Mata Pelajaran</label>
            <input type="text" name="kode_matapelajaran" placeholder="Masukkan kode mata pelajaran" class="form-control">
            <?php echo form_error('kode_matapelajaran', '<div class="text-danger small" ml-3>') ?>
        </div>
        <div class="form-group">
            <label>Nama Mata Pelajaran</label>
            <input type="text" name="nama_matapelajaran" placeholder="Masukkan nama mata pelajaran" class="form-control">
            <?php echo form_error('nama_matapelajaran', '<div class="text-danger small" ml-3>') ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>