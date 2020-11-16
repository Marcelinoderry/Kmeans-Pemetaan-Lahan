<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/map.png">

    <!-- begin:: css universal -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- end:: css universal -->

    <!-- begin:: css local -->
    <?php empty($css) ? '' : $this->load->view($css); ?>
    <!-- end:: css local -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body>
    <ul>
        <li> <a href="<?= admin_url() ?>dashboard">Dashboard</a> </li>
        <li> <a href="<?= admin_url() ?>kecamatan">Kecamatan</a> </li>
        <li> <a href="<?= admin_url() ?>peta">Peta</a> </li>
        <li> <a href="<?= logout_url() ?>">Keluar</a> </li>
    </ul>

    <!-- begin:: content -->
    <?php $this->load->view($content); ?>
    <!-- end:: content -->

    <!-- begin:: js universal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- end:: js universal -->

    <!-- begin:: js local -->
    <?php empty($js) ? '' : $this->load->view($js); ?>
    <!-- end:: js local -->
</body>

</html>