<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?php echo base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="<?php echo base_url() ?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <div class="p-5">
                            <div class="text-center w-75 m-auto">
                                <h3 class="text-dark-50 text-center pb-0 fw-bold">Login</h3>
                                <h3 class="text-dark-50 text-center pb-0 fw-bold">Sistem Informasi Akademik</h3>
                                <?php echo $this->session->flashdata('pesan') ?>
                            </div>
                            <form method="post" action="<?php echo base_url('administrator/auth/proses_login') ?>" class="user">
                                <div class="mb-3">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input id="password" type="password" placeholder="Password" class="form-control" name="password" required autofocus>
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Pilih User</label>
                                    <select class="form-control selectric" name="level" id="level">
                                        <option>admin</option>
                                        <option>guru</option>
                                        <option>siswa</option>
                                    </select>
                                </div>

                                <button class="btn btn-primary btn-user btn-block">Login</button>
                            </form>

                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <!-- bundle -->
        <script src="<?php echo base_url() ?>assets/js/vendor.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/app.min.js"></script>

</body>

</html>