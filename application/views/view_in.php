<h1>Войти</h1>
<div class="authorisation_form">
    <form method="POST" action = "">
        <p>Форма авторизации</p>
        <input type = "text" name = "login" class = "edit_input" required placeholder="Ваш логин"/>
        <br /><br />
        <input type="password" name = "password" class = "edit_input" required placeholder="Ваш пароль"/><br /><br />
        <input type="submit" value="Отправить" name="authorisation"/>
    </form>
    <br />
</div>
<br />
<?php
if(!empty($result['authorisation']))
{
    echo "<div class = '" . $result["status"] . "'>" . $result['authorisation'] . "</div>";
}
?>
<br />
