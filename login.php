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
                    <?php
                    if (isset($_POST['submit'])) {
                        if (isset($user_result) && mysqli_num_rows($user_result) == 0) {
                            echo '<div class="error-message">Неверный логин</div>';
                        } elseif (isset($result) && mysqli_num_rows($result) == 0) {
                            echo '<div class="error-message">Неверный пароль</div>';
                        }
                    }
                    ?>
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

    if (!$username || !$password) {
        die('Пожалуйста введите все значения!');
    }

    // Сначала проверяем существует ли пользователь
    $user_check = "SELECT * FROM users WHERE username='$username'";
    $user_result = mysqli_query($link, $user_check);

    if (mysqli_num_rows($user_result) == 0) {
        echo "Неверный логин";
    } else {
        // Если пользователь существует, проверяем пароль
        $sql = "SELECT * FROM users WHERE username='$username' AND pass='$password'";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) == 1) {
            setcookie("User", $username, time() + 7200);
            header('Location: profile.php');
            exit();
        } else {
            echo "Неверный пароль";
        }
    }
}
?>