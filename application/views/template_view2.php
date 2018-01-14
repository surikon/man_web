<!DOCTYPE html>
<html lang = "ru">
<head>
    <meta charset = "utf-8">
    <title>Surnachev_Nikita</title>
    <link rel = "stylesheet" type = "text/css" href = "/css/personal_area.css" />
    <link rel = "stylesheet" type="text/css" href="/css/ev.css" />
    <script src = "/js/main.js" type = "text/javascript"></script>
</head>
<body>
    <center>
            <div class = "p_con">
                <div class = "c_con"><a href = "http://<?=$_SERVER['SERVER_NAME']; ?>">Кабинет</a></div>
                <div class = "c_con"><a href="http://<?=$_SERVER['SERVER_NAME']; ?>/journal">Успеваемость</a></div>
                <div class = "c_con"><a href="http://<?=$_SERVER['SERVER_NAME']; ?>/404">Чаты</a></div>
                <div class = "c_con_right"><a href = "http://<?=$_SERVER['SERVER_NAME']; ?>/out">Выйти</a></div>
            </div>

        <div class = "p_logo">
            <div class = "c_logo">
                <span class = "logo">Smart School</span>
            </div>
        </div>
        <div class = "body_str">
            <?php include 'application/views/'.$content_view; ?>
        </div>
    </center>
</body>
</html>