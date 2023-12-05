<div class="container-fluid m-4">
    <div class="box-header">
        <h3 class="box-title">Form Ubah Tahun Akademik</h3>
    </div>
    <?php foreach ($tahun_akademik as $thn) : ?>
        <form method="post" action="<?php echo base_url('administrator/semester/ubah_aksi') ?>">
            <div class="form-group">
                <label>Tahun Akademik</label>
                <input type="text" name="tahun_akademik" class="form-control" value="<?php echo $thn->tahun_akademik ?>">
            </div>
            <label>Aktif</label>
            <input type='hidden' name="id_tahun_akademik" value="<?php echo $thn->id_tahun_akademik ?>">
            <select class="form-control selectric" name="aktif" value="<?php echo $thn->aktif ?>">
                <option value="ya">Ya</option>
                <option value="tidak">Tidak</option>
            </select>
            <label>Semester</label>
            <select class="form-control selectric" name="semester" value="<?php echo $thn->semester ?>">
                <option value="ganjil">Ganjil</option>
                <option value="genap">Genap</option>
            </select>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>