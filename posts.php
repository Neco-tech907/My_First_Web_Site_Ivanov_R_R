<?php
$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'db_kali');
$id = $_GET['id'] ?? 0;
$sql = "SELECT * FROM posts WHERE id=$id";
$res = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($res);
$title = $rows['title'];
$main_text = $rows['main_text'];
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivanov R.R.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-TSc6GJ16uL7A9TneNEoa7RxnatxjcDSCmGIMXxSR1GAsXEV/Dwwykc2NPK8M2HW" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icon#81.5.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    echo "<h1> $title </h1>";
    echo "<p> $main_text </p>";
    ?>
</body>

</html>