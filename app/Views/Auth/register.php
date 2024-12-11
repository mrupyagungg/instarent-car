<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ThemeMakker">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>:: INSTARENT :: Register</title>
    <link rel="stylesheet" href="<?= base_url('assets/vendor/themify-icons/themify-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>" type="text/css">
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="<?= base_url('assets/images/brand/icon_black.svg') ?>" width="48" height="48" alt="ArrOw"></div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="top">
                        <img src="<?= base_url('assets/images/brand/icon_black.svg') ?>" alt="Lucid">
                        <strong>INSTARENT</strong> <span></span>
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">Create an account</p>
                        </div>
                        <div class="body pt-0 mt-0">
                            <?php if (session()->getFlashdata('msg')) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                            <?php endif; ?>
                            <form class="custom-form mt-4 pt-2" action="<?= base_url('register/save') ?>" method="post">
                                <div class="form-group">
                                    <label for="register-username" class="control-label sr-only">Username</label>
                                    <input type="text" name="username" class="form-control" value="<?= set_value('username') ?>" placeholder="Enter username" required>
                                </div>
                                <div class="form-group">
                                    <label for="register-email" class="control-label sr-only">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>" placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label for="register-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Enter password" aria-label="Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="register-conf-password" class="control-label sr-only">Confirm Password</label>
                                    <input type="password" class="form-control" name="confpassword" placeholder="Confirm password" aria-label="Confirm Password" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">REGISTER</button>
                                <div class="footer">
                                    <p class="text-center">Already have an account? <a href="<?= base_url('login') ?>">Login here</a></p>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->

    <!-- Core -->
    <script src="<?= base_url('assets/bundles/libscripts.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/bundles/vendorscripts.bundle.js') ?>"></script>
    <script src="<?= base_url('assets/js/theme.js') ?>"></script>
</body>

</html>
