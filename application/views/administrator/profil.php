<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12 col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Profil</h3>
                </div>
                <?php echo $this->session->flashdata('pesan') ?>
                <?php echo anchor('administrator/profil/ubah', '<button class="btn btn-sm btn-primary mb-3"><i class="mdi mdi-account-edit me-1"></i> Edit Profil</button>') ?>
            </div> <!-- end col-->
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-condensed table-hovered">
                <?php foreach ($user as $row) : ?>
                    <tr>
                        <th>Username</th>
                        <td><?php echo $row->username; ?></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><?php echo $row->password; ?></td>
                    </tr>
                    <tr>
                        <th>Level</th>
                        <td><?php echo $this->session->userdata('level'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- col-md-12 -->
    </div>
    <!-- /.row -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>