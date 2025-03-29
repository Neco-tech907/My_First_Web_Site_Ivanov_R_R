<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ivanov R.R.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6C01i6uLrA9TneNEoa7RxnatzjcDSCmG1WXxSR16AaXEV/DwwykczNPK8W2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icon@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>
    <div class="auth-container">
        <h1 class="auth-title">Авторизируйтесь!</h1>
        <?php if (!isset($_COOKIE['User'])): ?>
            <div class="auth-links">
                <a href="registration.php" class="auth-link">Зарегистрируйтесь</a>
                <span class="auth-link-divider">|</span>
                <a href="login.php" class="auth-link">Войти</a>
            </div>
        <?php else:
            $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'db_kali');
            $sql = "SELECT * FROM posts";
            $res = mysqli_query($link, $sql);
            if (mysqli_num_rows($res) >  0) {
                while ($post = mysqli_fetch_array($res)) {
                    echo "<a href='/posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a>\n";
                }
            } else {
                echo "Записей пока нет";
            }
        ?>
    </div>
</body>

</html>