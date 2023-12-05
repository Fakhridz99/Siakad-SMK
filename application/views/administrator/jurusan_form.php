<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Tambah Kelas Jurusan</h3>
    </div>
    <form method="post" action="<?php echo base_url('administrator/jurusan/input_aksi') ?>">

        <label>Kelas</label>
        <select class="form-control selectric" name="kelas_jurusan" value="<?php echo $jrs->kelas_jurusan ?>">
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
        </select>
        <div class="form-group">
            <label>Kode Jurusan</label>
            <input type="text" name="kode_jurusan" placeholder="Masukkan kode jurusan" class="form-control">
            <?php echo form_error('kode_jurusan', '<div class="text-danger small" ml-3>') ?>
        </div>
        <div class="form-group">
            <label>Nama Jurusan</label>
            <input type="text" name="nama_jurusan" placeholder="Masukkan nama jurusan" class="form-control">
            <?php echo form_error('nama_jurusan', '<div class="text-danger small" ml-3>') ?>
        </div>
        <div class="form-group">
            <label>Ruang Jurusan</label>
            <input type="text" name="ruang_jurusan" placeholder="Masukkan ruang jurusan" class="form-control">
            <?php echo form_error('ruang_jurusan', '<div class="text-danger small" ml-3>') ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>