<div class="container-fluid m-2">
    <div class="box-header">
        <h3 class="box-title">Form Import</h3>
    </div>
    <form enctype="multipart/form-data" method="post" action="<?php echo base_url('administrator/guru/import_aksi') ?>">
        <div class="form-group">
            <a class="btn btn-xs btn-success" href="<?php echo base_url('assets\format_excel\format_guru.xlsx') ?>"> <i class="fa fa-download"> DOWNLOAD FORMAT</i> </a>
            <br>
            <input type="file" name="file" id="file" required accept=".xls,.xlsx">

            <button type="submit" class="btn btn-primary">Import</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        // alert("ready");
        load_data();

        function load_data() {
            $.ajax({
                'url': "<?php echo base_url('administrator/guru/fetch'); ?>",
                'method': "POST",
                success: function(data) {
                    $('#customer_data').html(data);
                }
            });
        }

        $('#import_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                'url': "<?php echo base_url('administrator/guru/import'); ?>",
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