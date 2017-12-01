<form method="POST" action = "" name = "reg_form" class = "reg_form" id = "reg_form">
    <ul>
        <li>
            <h2>Регистрация</h2>
                <?php
                    if($result[1] == "success")
                        echo "<span class='required_notification_success'>*Поздравляю, вы успешно зарегистрированы!</span>";
                    else if($result[1] == "error")
                        echo "<span class='required_notification_error'>*Заполните все поля</span>";
                ?>
            <hr />
        </li>
        <li>
            <label for = "code">Пригласительный код:</label>
            <input type="text" name="code" class="edit_input" required />
            <span class = "required_notification_error"><?php echo $result[2];?></span><br />
        </li>
        <li>
            <label for = "login">Логин:</label>
            <input type="text" name = "login" class = "edit_input" required minlength="5" maxlength="40"/>
            <span class = "required_notification_error"><?php echo $result[3]; ?></span>
        </li>
        <li>
            <label for = "password">Пароль:</label>
            <input type="password" name = "password" class = "edit_input" required  minlength="8" maxlength="60"/>
        </li>
        <li>
            <label for = "repass">Повторите пароль:</label>
            <input type="password" name = "repass" class = "edit_input" required />
            <span class = "required_notification_error"><?php echo $result[4]; ?></span>
        </li><hr />
        <li>
            <button type="submit" class = "submit" name="registration" form="reg_form" value="1" action = "">Отправить</button>
        </li>
    </ul>
</form>
<br />
<br />
