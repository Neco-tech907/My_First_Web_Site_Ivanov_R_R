<?php
$servername = "127.0.0.1";
$username = "root";
$password = "kali";
$dbName = "first";

// Создание подключения
$link = mysqli_connect($servername, $username, $password);
if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Создание БД
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if (!mysqli_query($link, $sql)) {
    die("Ошибка создания БД: " . mysqli_error($link));
}

// Подключение к конкретной БД
$link = mysqli_connect($servername, $username, $password, $dbName);
if (!$link) {
    die("Ошибка подключения к БД: " . mysqli_connect_error());
}

// Создание таблиц
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL  // Изменил pass на password для согласованности
)";

if (!mysqli_query($link, $sql)) {
    die("Ошибка создания таблицы Users: " . mysqli_error($link));
}

$sql = "CREATE TABLE IF NOT EXISTS posts (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    main_text TEXT NOT NULL
)";

if (!mysqli_query($link, $sql)) {
    die("Ошибка создания таблицы posts: " . mysqli_error($link));
}

mysqli_close($link);
