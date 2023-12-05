<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Ubah Kelas Jurusan</h3>
    </div>
    <?php foreach ($jurusan as $jrs) : ?>
        <form method="post" action="<?php echo base_url('administrator/jurusan/ubah_aksi') ?>">
            <label>Kelas</label>
            <input type='hidden' name="id_jurusan" value="<?php echo $jrs->id_jurusan ?>">
            <select class="form-control selectric" name="kelas_jurusan" value="<?php echo $jrs->kelas_jurusan ?>">
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>
            <div class="form-group">
                <label>Kode Jurusan</label>
                <input type="text" name="kode_jurusan" class="form-control" value="<?php echo $jrs->kode_jurusan ?>">
            </div>
            <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" name="nama_jurusan" class="form-control" value="<?php echo $jrs->nama_jurusan ?>">
            </div>
            <div class="form-group">
                <label>Ruang Jurusan</label>
                <input type="text" name="ruang_jurusan" class="form-control" value="<?php echo $jrs->ruang_jurusan ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    <?php endforeach; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>