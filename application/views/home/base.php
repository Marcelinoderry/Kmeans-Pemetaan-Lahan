<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- begin:: css universal -->

    <!-- end:: css universal -->

    <!-- begin:: css local -->
    <?php empty($css) ? '' : $this->load->view($css); ?>
    <!-- end:: css local -->
</head>

<body>
    <ul>
        <li><a href="#">Test 1</a></li>
        <li><a href="#">Test 2</a></li>
        <li><a href="#">Test 3</a></li>
        <li><a href="<?= login_url() ?>">Login</a></li>
    </ul>
    <!-- begin:: content -->
    <?php $this->load->view($content); ?>
    <!-- end:: content -->

    <!-- begin:: js universal -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- end:: js universal -->

    <!-- begin:: js local -->
    <?php empty($js) ? '' : $this->load->view($js); ?>
    <!-- end:: js local -->
</body>

</html>