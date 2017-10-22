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
                    <div class = "c_con" onclick="goOut('http://localhost')">Главная</div>
					<div class = "c_con" onclick="goOut('http://localhost/about')">О сайте</div>
					<div class = "c_con" onclick="goOut('http://localhost/portfolio')">Портфолио</div>
					<div class = "c_con" onclick="goOut('http://localhost/contacts')">Контакты</div>
			</div>
		</header>
	</center>
    <?php include 'application/views/'.$content_view; ?>
</body>
</html>