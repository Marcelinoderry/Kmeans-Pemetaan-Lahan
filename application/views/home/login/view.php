<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Pendukung Keputusan Puskesmas</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>admin/bower_components/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>admin/assets/icon/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>admin/assets/icon/icofont/css/icofont.css">
    <link rel="stylesheet" type="text/css" href="<?= assets_url() ?>admin/assets/css/style.css">

    <style>
        .error {
            color: red;
        }
    </style>

    <script type="text/javascript" src="<?= assets_url() ?>admin/bower_components/jquery/js/jquery.min.js"></script>
</head>

<body class="fix-menu">
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>

    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?= form_open('auth/check_validation', array('id' => 'form-login', 'class' => 'md-float-material form-material', 'method' => 'post')) ?>
                    <div class="text-center">
                        <h2 style="color: white; font-weight: bold;">Sistem Informasi </h2>
                        <h4 style="color: white; font-weight: bold;">Komoditasi dan Pemetaan Perkebunan</h4>
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <!-- untuk validasi akun -->

                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">Login</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <?= form_input(array('name' => 'username', 'id' => 'username', 'class' => 'form-control', 'placeholder' => 'Username')) ?>
                                <?= form_error('username', '<div class="error">', '</div>') ?>
                            </div>
                            <div class="form-group form-primary">
                                <?= form_password(array('name' => 'password', 'id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password')) ?>
                                <?= form_error('password', '<div class="error">', '</div>') ?>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <?= form_input(array('type' => 'submit', 'name' => 'login', 'value' => 'Login', 'id' => 'login', 'class' => 'btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20')) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="<?= assets_url() ?>admin/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/assets/js/SmoothScroll.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/assets/js/pcoded.min.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/assets/js/vartical-layout.min.js"></script>
    <script type="text/javascript" src="<?= assets_url() ?>admin/assets/js/script.min.js"></script>
    <!-- cdn -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');

        var untukTambahData = function() {
            $('#form-login').parsley();

            $('#form-login').submit(function(e) {
                e.preventDefault();

                $('#username').attr('required', 'required');
                $('#password').attr('required', 'required');

                if ($('#form-login').parsley().isValid() == true) {
                    $.ajax({
                        method: $(this).attr('method'),
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        dataType: 'json',
                        beforeSend: function() {
                            $('#login').val('Wait');
                        },
                        success: function(data) {
                            if (data.status == true) {
                                window.location = data.link;
                            } else {
                                $('#login').val('Login');

                                swal({
                                    title: data.title,
                                    text: data.text,
                                    icon: data.type,
                                    button: data.button,
                                });
                            }
                        }
                    })
                }
            });
        }();
    </script>

</body>
</html>