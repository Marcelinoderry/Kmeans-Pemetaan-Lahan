<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>

    <h2>Login</h2>

    <?= form_open('auth/check_validation') ?>
        <table>
            <tr>
                <td>Username</td>
                <td> 
                    <?= form_input( array('name' => 'username', 'id' => 'username') ) ?>
                    <?= form_error('username', '<div class="error">', '</div>') ?>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td> 
                    <?= form_password( array('name' => 'password', 'id' => 'password') ) ?> 
                    <?= form_error('password', '<div class="error">', '</div>') ?>
                </td>
            </tr>
            <tr>
                <td> <?= form_input( array('type' => 'submit', 'name' => 'login', 'value' => 'Login', 'id' => 'login') ) ?> </td>
            </tr>
        </table>
    <?= form_close() ?>
    
</body>
</html>