<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Import</h3>
    </div>
    <form enctype="multipart/form-data" method="post" action="<?php echo base_url('guru/nilai/export_aksi') ?>">
        <input type="hidden" name="id_kelas" id="id_kelas" value="<?php echo $id ?>">
        <button type="submit" class="btn btn-xs btn-success"><i class="fa fa-download"> DOWNLOAD FORMAT</i></button>
    </form>
    <form enctype="multipart/form-data" method="post" action="<?php echo base_url('guru/nilai/import_aksi') ?>">

        <div class="form-group">
            <!-- <br> -->
            <input type="file" name="file" id="file" required accept=".xls,.xlsx">
            <button type="submit" class="btn btn-primary">Import</button>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            $(document).ready(function() {
                // alert("ready");
                load_data();

                function load_data() {
                    $.ajax({
                        'url': "<?php echo base_url('guru/nilai/fetch'); ?>",
                        'method': "POST",
                        success: function(data) {
                            $('#customer_data').html(data);
                        }
                    });
                }

                $('#import_form').on('submit', function(event) {
                    event.preventDefault();
                    $.ajax({
                        'url': "<?php echo base_url('guru/nilai/import'); ?>",
                        method: "POST",
                        //send form data in key value pairs
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $('#file').val('');
                            load_data(); //displays data fresh
                            alert(data);
                        }
                    });
                })
            })
        </script>