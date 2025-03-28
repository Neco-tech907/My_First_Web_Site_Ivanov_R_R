<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Иванов Р.Р.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoI6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAaXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="css/style2.css"> -->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Регистрация</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="registration.php">
                    <div class="row form_reg">
                        <input class="form" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="row form_reg">
                        <input class="form" type="text" name="login" placeholder="Login">
                    </div>
                    <div class="row form_reg">
                        <input class="form" type="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn_red btn__reg" name="submit">продолжить</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'first');

    $email = mysqli_real_escape_string($link, $_POST['email']);
    $username = mysqli_real_escape_string($link, $_POST['login']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (empty($email) || empty($username) || empty($_POST['password'])) {
        die('Пожалуйста, заполните все поля!');
    }

    $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

    if (mysqli_query($link, $sql)) {
        header('Location: login.php'); // Перенаправление после успешной регистрации
        exit;
    } else {
        $error = "Ошибка регистрации: " . mysqli_error($link);
    }

    mysqli_close($link);
}
?>