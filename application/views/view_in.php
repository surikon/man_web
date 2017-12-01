<form method="POST" action = "" name = "reg_form" class = "reg_form" id = "reg_form">
    <ul>
        <li>
            <h2>Авторизация</h2>
            <span class="required_notification_error"><?php echo $result[1]; ?></span>
            <hr />
        </li>
        <li>
            <label for = "code">Логин:</label>
            <input type = "text" name = "login" class = "edit_input" required />
            <br />
        </li>
        <li>
            <label for = "password">Пароль:</label>
            <input type = "password" name = "password" class = "edit_input" required/>
        </li><hr />
        <li>
            <button type="submit" class = "submit" name="authorisation" form="reg_form" value="1">Отправить</button>
        </li>
    </ul>
</form>
<br />
