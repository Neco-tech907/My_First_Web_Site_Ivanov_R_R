<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivanov R.R.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6C01i6uLrA9TneNEoa7RxnatzjcDSCmG1WXxSR16AaXEV/DwwykczNPK8W2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icon@d1.5.0/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>
<div class="container">
    <div class="row">
    <div class="col-12 index">
    <h1>Авторизируйтесь!</h1>
    <?php
    if (!isset($_COOKIE['User'])) {
    ?>
    <a href="/registration.php">Зарегистрируйтесь</a> или <a href="/login.php">войдите</a>!
    <?php
    } else {
    // connetc to server
    }
    ?>
    </div>
    </div>
    </body>
    </html>