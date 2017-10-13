<center>
    <div class = "body_str">
        <h1>Главная</h1>
        <div class="authorisation_form">
            <form method="POST" action = "#">
                <p>Войти</p>
                    <input type = "text" name = "login" class = "edit_input" required placeholder="Ваш логин"/>
                    <br /><br />
                    <input type="password" name = "password" class = "edit_input" required placeholder="Ваш пароль"/><br /><br />
                    <input type="submit" value="Отправить" name="authorisation"/>
            </form>
            <br />
        </div>
        <br />
        <hr />
        <br />
        <div class="authorisation_form">
            <p>Зарегистрироваться</p>
            <form method="POST" action = "">
                <input type="text" name="code" class="edit_input" required placeholder="Ваш пригласительный код"/><br /><br />
                <input type="text" name = "login" calss = "edit_input" required placeholder="Ваш логин"/><br /><br />
                <input type="password" name = "password" calss = "edit_input" required placeholder="Ваш пароль"/><br /><br />
                <input type="password" name = "repass" calss = "edit_input" required placeholder="Повторите пароль"/><br /><br />
                <input type="submit" value="Отправить" name = "registration"/>
            </form>
            <br />
        </div>
        <?php
            echo "<p>".$result."</p>";
        ?>
    </div>
</center>
