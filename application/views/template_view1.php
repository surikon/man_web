<!DOCTYPE html>
<html lang = "ru">
<head>
    <meta charset = "utf-8">
    <title>Surnachev_Nikita</title>
    <link rel = "stylesheet" type = "text/css" href = "/css/style.css" />
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/core.js" type = "text/javascript"></script>
    <script src = "/js/main.js" type = "text/javascript"></script>
</head>
<body>
    <center>
		<header>
			<div class = "p_con">
                <div class = "c_con"><a href = "http://localhost">Главная</a></div>
                <div class = "c_con"><a href="http://localhost/in">Войти</a></div>
                <div class = "c_con"><a href="http://localhost/register">Зарегистрироваться</a></div>
			</div>
		</header>
        <div class = "p_logo">
            <div class = "c_logo">
                <p> Тех.поддержка: тел. +79782568334, почта: suriknik@bk.com </p>
            </div>
        </div>
    <div class = "body_str">
        <?php include 'application/views/'.$content_view; ?>
    </div>
    </center>
</body>
</html>