<!DOCTYPE html>
<html lang = "ru">
<head>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <meta charset = "utf-8">
    <title>Surnachev_Nikita</title>
    <link rel = "stylesheet" type = "text/css" href = "/css/land_page.css" />
    <link rel = "stylesheet" type="text/css" href = "/css/ev.css">
    <script src = "/js/main.js" type = "text/javascript"></script>
    <script>
        function collapsElement(id) {
            if ( document.getElementById(id).style.display != "none" ) {
                document.getElementById(id).style.display = 'none';
            }
            else {
                document.getElementById(id).style.display = '';
            }

            if(document.getElementById("i" + id).innerHTML == "Читать далее...")
            {
                document.getElementById("i" + id).innerHTML = "Свернуть";
            }
            else
            {
                document.getElementById("i" + id).innerHTML = "Читать далее...";
            }
        }
    </script>
</head>
<body>
    <center>
		<header>
			<div class = "p_con">
                <div class = "c_con"><a href = "http://<?php echo $_SERVER['SERVER_NAME']; ?>">Главная</a></div>
                <div class = "c_con"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/in">Вход</a></div>
                <div class = "c_con"><a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/register">Регистрация</a></div>
			</div>
		</header>
        <div class = "p_logo">
            <div class = "c_logo">
                <img src="/images/logo.png" style="width: 50%"/>
            </div>
            <div class= "c_logo">
                <p>Поддержка: nikita.surnachev03@gmail.com</p><p>или +79782568334</p>
            </div>
            <div class = "c_logo"></div>
            <div class = "c_logo"></div>
            <div class = "c_logo">
                <img src="/images/icons/facebook.png" style="width: 12%">
                <img src="/images/icons/vk.png" style="width: 12%">
                <img src="/images/icons/skype.png" style="width: 12%">
                <img src="/images/icons/telegram.png" style="width: 12%">
            </div>
        </div>
    <div class = "body_str">
        <?php include 'application/views/'.$content_view; ?>
    </div>
    </center>
</body>
</html>