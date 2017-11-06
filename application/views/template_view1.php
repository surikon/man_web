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
                <div class = "c_con"><a href="http://localhost/register">Войти</a></div>
			</div>
            <div class = "p_logo">
                <div class = "c_logo">
                    <img src="../../images/logo.png" width = 10%>
                    <span class="logo">Surik production</span>
                </div>
                <div class = "c_logo">
                    <div
                </div>
            </div>
		</header>
    <div class = "body_str">
        <?php include 'application/views/'.$content_view; ?>
    </div>
    </center>
</body>
</html>