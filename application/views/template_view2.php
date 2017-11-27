<!DOCTYPE html>
<html lang = "ru">
<head>
    <meta charset = "utf-8">
    <title>Surnachev_Nikita</title>
    <link rel = "stylesheet" type = "text/css" href = "/css/style.css" />
    <link rel = "stylesheet" type = "text/css" href = "/css/personal_area.css" />
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/core.js" type = "text/javascript"></script>
    <script src = "/js/main.js" type = "text/javascript"></script>
</head>
<body>
    <center>
        <header>
            <div class = "p_con">
                <div class = "c_con"><a href = "http://localhost">Личный кабинет</a></div>
                <div class = "c_con"><a href="http://localhost/404">Успеваемость</a></div>
                <div class = "c_con"><a href="http://localhost/404">Чат класса</a></div>
                <div class = "c_con"><a href = "http://localhost/404">Письма учителям</a></div>
                <div class = "c_con_right"><a href = "http://localhost/out">Выйти</a></div>
            </div>
        </header>
        <div class = "p_logo">
            <div class = "c_logo">
                <a href = "http://localhost/404">Система "Умная школа"</a>
            </div>
        </div>
        <div class = "body_str">
            <?php include 'application/views/'.$content_view; ?>
        </div>
    </center>
</body>
</html>