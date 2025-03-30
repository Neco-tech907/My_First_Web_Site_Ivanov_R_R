<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Иванов Р.Р.</title>

  <!-- Подключение Bootstrap -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet" />

  <!-- Основные стили (внешние) -->
  <link
    rel="stylesheet"
    href="css/style.css"
    media="print"
    onload="this.media='all'" />
  <noscript>
    <link rel="stylesheet" href="css/style.css" />
  </noscript>
</head>

<body class="visible">
  <!-- Ваш контент без изменений -->
  <div class="container nav_bar">
    <div class="row">
      <div class="row">
        <div class="col-3 nav_logo"></div>
        <div class="col-9">
          <div class="nav_text">Информация о Иванове Р.Р!</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-8">
        <h2>
          Обучаюсь в МИРЭА на факультете кибербезопасности и цифровых
          технологий.Прохожу курс PT Start, в свободной время занимаюсь в
          качестве хобби разработкой игр на unity, на 1-2 курсах разработал 2
          VR и AR игры. Нравится участвовать в различных хакатонах и других
          соревновательных мероприятиях,также нравится играть в волейбол.
          Сейчас активно учусь чтобы стать специалистом по кибербезопасности
        </h2>
      </div>
      <div class="col-4"></div>
      <div class="row_photo"></div>
      <div class="row">
        <p class="tittle_photo">Иванов Р.Р.</p>
      </div>
    </div>
  </div>
  <!-- Контейнер для кнопки и изображения -->
  <div class="container" id="button-container">
    <button id="toggle-button">Показать фото</button>
    <div id="image-container"></div>
  </div>


  <div class="container form-container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1 class="helo text-center mb-4">Привет, <?php echo $_COOKIE['User']; ?></h1>
        <form method="POST" action="profile.php" class="styled-form" enctype="multipart/form-data" name="upload">
          <div class="mb-3">
            <input class="form-control form-input" type="text" name="title" placeholder="Заголовок вашего поста">
          </div>
          <div class="mb-3">
            <textarea class="form-control form-textarea" name="text" rows="6" placeholder="Введите текст вашего поста"></textarea>
          </div>
          <input type="file" name="file" />
          <button type="submit" class="btn-red visible" name="submit">Сохранить пост</button>
        </form>
      </div>
    </div>
  </div>
  <script src="js/button.js"></script>
</body>

</html>

<?php
require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'db_kali');

// Обработка формы
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if (!mysqli_query($link, $sql)) die("Не удалось добавить пост");
}

if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
?>