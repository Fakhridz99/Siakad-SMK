<div class="container-fluid m-4">
    <div class="box-header">
        <h3 class="box-title">Form Tambah Tahun Akademik</h3>
    </div>
    <form method="post" action="<?php echo base_url('administrator/semester/input_aksi') ?>">

        <div class="form-group">
            <label>Tahun Akademik</label>
            <input type="text" name="tahun_akademik" placeholder="Masukkan tahun akademik" class="form-control">
            <?php echo form_error('tahun_akademik', '<div class="text-danger small" ml-3>') ?>
        </div>
        <label>Aktif</label>
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
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>