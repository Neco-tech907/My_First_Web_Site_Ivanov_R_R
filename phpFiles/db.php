<?php
$servername = "127.0.0.1";
$username = "your_user_name";
$password = "password";
$dbName = "first";

$link = mysqli_connect($servername, $username, $password);

if (!$link) {
    die("Connection error: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if (!mysqli_query($link, $sql)) {
    die("Failed to create a database: " . mysqli_error($link));
}

mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $dbName);
if (!$link) {
    die("Error connecting to the database: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(255) NOT NULL
)";

if (!mysqli_query($link, $sql)) {
    echo "Couldn't create Users table: " . mysqli_error($link);
}

$sql = "CREATE TABLE IF NOT EXISTS posts (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    main_text TEXT NOT NULL
)";

if (!mysqli_query($link, $sql)) {
    echo "Couldn't create posts table: " . mysqli_error($link);
}

mysqli_close($link);
echo "Operations completed successfully";
