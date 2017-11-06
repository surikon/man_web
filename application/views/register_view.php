<center>
    <h1></h1>
    <div class="authorisation_form">
        <p>Войти</p>
        <form method="POST" action = "">
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
    <hr />
    <br />
    <div class="authorisation_form">
        <p>Зарегистрироваться</p>
        <form method="POST" action = "">
            <input type="text" name="code" class="edit_input" required placeholder="Ваш пригласительный код"/><br /><br />
            <input type="text" name = "login" class = "edit_input" required placeholder="Ваш логин" minlength="5" maxlength="40"/><br /><br />
            <input type="password" name = "password" class = "edit_input" required placeholder="Ваш пароль" minlength="8" maxlength="60"/><br /><br />
            <input type="password" name = "repass" class = "edit_input" required placeholder="Повторите пароль"/><br /><br />
            <input type="submit" value="Отправить" name = "registration"/>
        </form>
        <br />
    </div>

    <br />
    <?php
    if(!empty($result['registration']))
    {
        echo "<div class = '" . $result["status"] . "'>" . $result['registration'] . "</div>";
    }
    ?>
    <br />
</center>
