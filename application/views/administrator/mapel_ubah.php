<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Ubah Mata Pelajaran</h3>
    </div>
    <?php foreach ($mapel as $mpl) : ?>
        <form method="post" action="<?php echo base_url('administrator/mapel/ubah_aksi') ?>">
            <div class="form-group">
                <label>Guru pengajar</label>
                <select class="form-control selectric" name="id_guru">
                    <option value="">Pilih Guru</option>
                    <?php foreach ($guru as $row) : ?>
                        <option <?php if ($row->id_guru == $mpl->id_guru) echo 'selected' ?> value="<?php echo $row->id_guru ?>">
                            <?php echo $row->nama_guru ?> </option>
                    <?php endforeach ?>
                </select>
                <?= form_error('id_guru', '<medium class="text-danger">', '</medium>'); ?>
            </div>

            <div class="form-group">
                <label>Kode Mata Pelajaran</label>
                <input type="hidden" name="id_matapelajaran" value="<?php echo $mpl->id_mapel ?>">
                <input type="text" name="kode_matapelajaran" class="form-control" value="<?php echo $mpl->kode_mapel ?>">
            </div>
            <div class="form-group">
                <label>Nama Mata Pelajaran</label>
                <input type="text" name="nama_matapelajaran" class="form-control" value="<?php echo $mpl->nama_mapel ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>