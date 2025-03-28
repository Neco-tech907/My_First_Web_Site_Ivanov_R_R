<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivanov R.R.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoI6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAaXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body class="container">
    <div class="row mt-5">
        <div class="col-12 text-center">
            <h1>Регистрация</h1>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-6 col-12">
            <form method="POST" action="registration.php" class="needs-validation" novalidate>
                <div class="mb-3">
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="login" placeholder="Login" required>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" name="submit">Продолжить</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
require_once('db.php');
$link = mysqli_connect('127.0.0.1', 'root', 'password', 'name_db');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
}

if (!$email || !$username || !$password) die('Пожалуйста введите все значения!');

$sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

if (!mysqli_query($link, $sql)) {
    echo "Не удалось добавить пользователя";
}
?>