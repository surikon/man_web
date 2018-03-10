<center>
   <div class = "p_ava">
        <div class = "c_ava" style = "padding: 1%">
            <?php
                if($result['all_b']) {
                    echo $result['all'];
                }
                else{
                    echo "<h4>Нет напоминаний!</h4>";
                }
            ?>
        </div>
        <div class = "c_ava" style = "padding: 1%">
            <?php
                if($result['today_b']) {
                    echo $result['today'];
                }
                else{
                    echo "<h4>Нет напоминаний на сегодня!</h4>";
                }
            ?>
        </div>
    </div>
    <br />

    <form method="POST" action = "" name = "add_tasks" class = "reg_form" id = "add_tasks">
        <ul>
            <li>
                <h4>Добавить напоминание:</h4>
                <hr />
            </li>
            <li>
                <label for = "code">Заголовок: </label>
                <input type = "text" name = "name" class = "edit_input" required />
                <br />
            </li>
            <li>
                <label for = "password">Описание: </label>
                <textarea rows = "5" cols = "27" class = "edit_input" name = "description"></textarea>
            </li>
            <li>
                <label for = "date">Дата выполнения: </label>
                <input type="date" name = "date" class = "edit_input" />
            </li>
            <hr />
            <li>
                <button type="submit" class = "submit" name="add" form="add_tasks" value="1">Отправить</button>
            </li>
        </ul>
    </form>
</center>
