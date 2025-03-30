<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Иванов Р.Р.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoI6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAaXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>
    <div class="container auth-container">
        <div class="row">
            <div class="col-12">
                <h1>Вход</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="login.php">
                    <div class="row form_reg">
                        <input class="form" type="text" name="login" placeholder="Login">
                    </div>
                    <div class="row form_reg">
                        <input class="form" type="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn_red btn__reg" name="submit">войти</button>
                    <?php if (isset($error)): ?>
                        <div class="error-message"><?php echo $error; ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'db_kali');

if (isset($_POST['submit'])) {
    $username = $_POST['login'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        die('Пожалуйста введите все значения!');
    }

    $user_check = mysqli_prepare($link, "SELECT username FROM users WHERE username = ?");
    mysqli_stmt_bind_param($user_check, "s", $username);
    mysqli_stmt_execute($user_check);
    mysqli_stmt_store_result($user_check);
    $user_exists = (mysqli_stmt_num_rows($user_check) > 0);
    mysqli_stmt_close($user_check);

    if ($user_exists) {
        $auth_check = mysqli_prepare($link, "SELECT username FROM users WHERE username = ? AND pass = ?");
        mysqli_stmt_bind_param($auth_check, "ss", $username, $password);
        mysqli_stmt_execute($auth_check);
        mysqli_stmt_store_result($auth_check);
        $auth_valid = (mysqli_stmt_num_rows($auth_check) > 0);
        mysqli_stmt_close($auth_check);

        if ($auth_valid) {
            setcookie("User", $username, time()+7200);
            header('Location: profile.php');
            exit();
        } else {
            $error = "Неверный пароль";
        }
    } else {
        $error = "Неверные учетные данные"; 
    }
}
?>