<!DOCTYPE html>
<html lang = "ru">
<head>
    <meta charset = "utf-8">
    <title>Surnachev_Nikita</title>
    <link rel = "stylesheet" type = "text/css" href = "/css/personal_area.css" />
    <link rel = "stylesheet" type="text/css" href="/css/ev.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src = "/js/main.js" type = "text/javascript"></script>
</head>
<body>
    <center>
            <div class = "p_con">
                <div class = "c_con"><a href = "http://<?=$_SERVER['SERVER_NAME']; ?>">Кабинет</a></div>
                <div class = "c_con"><a href="http://<?=$_SERVER['SERVER_NAME']; ?>/journal">Журнал</a></div>
                <div class = "c_con"><a href="http://<?=$_SERVER['SERVER_NAME']; ?>/404">Чаты</a></div>
                <div class = "c_con_right"><a href = "http://<?=$_SERVER['SERVER_NAME']; ?>/out">Выйти</a></div>
            </div>

        <div class = "p_logo">
            <div class = "c_logo">
                <img src="/images/logo.png" style="width: 80%"/>
            </div>
            <div class= "c_logo">
                <a href = "http://<?=$_SERVER['SERVER_NAME'];?>/climate_control">Климат-контроль</a>
            </div>
        </div>

        <div class="container">
            <div id="sidebar">
                <ul>
                    <li><a href="http://<?=$_SERVER['SERVER_NAME'];?>/settings">Настройки</a></li>
                    <li><a href="">Портфолио </a></li>
                    <li><a href="">Еще что-то</a></li>
                    <li><a href="">Еще что-то</a></li>
                </ul>
            </div>
            <div class="main-content">
                <div class="swipe-area"></div>
                <a href="#" data-toggle=".container" id="sidebar-toggle">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </a>

                <div class = "body_str">
                    <?php include 'application/views/'.$content_view; ?>
                </div>
            </div>
        </div>
    </center>
</body>
</html>