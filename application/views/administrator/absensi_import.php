<div class="container-fluid m-4">
    <div class="box-header">
        <h3 class="box-title">Form Import</h3>
    </div>
    <form enctype="multipart/form-data" method="post" action="<?php echo base_url('administrator/absensi/input_aksi') ?>">
        <div class="form-group">
            <a class="btn btn-xs btn-success" href="<?php echo base_url('assets\format_excel\format_absen.xlsx') ?>"> <i class="fa fa-download"> DOWNLOAD FORMAT</i> </a>
            <br>
            <br>
            <input type="file" name="file_absensi">

            <button type="submit" class="btn btn-primary">Import</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>