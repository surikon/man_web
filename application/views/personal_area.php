<center>
    <h2>Личный кабинет</h2></br>
    <div class = "p_ava">
        <div class = "c_ava">
            <div class = "poster">
                <img src = <?=$result['ava'];?> width = "90%"/>
                <div class = "message">
                    <b>Загрузка новой фотографии</b>
                    <p>Чтобы изменить свою фотографию, перейдите в раздел <a href="http://<?=$_SERVER['SERVER_NAME']?>/settings">
                            настройки</a></p>
                </div>
            </div>
        </div>
        <div class = "c_ava">
            <form method="POST" action="" name = "tasks">
                <table>
                    <tr>
                        <th>№</th>
                        <th>Задача </th>
                        <th></th>
                    </tr>
                <?php
                    if(empty($result['tasks']))
                        echo "<h4>Нет запланированных задач</h4>";
                    else
                        echo $result['tasks'];
                ?>
                </table>
                <br />
                <button type = "submit" class = "submit" name = "update_tasks" form="tasks">Обновить</button>

                <a href = "http:// <?=$_SERVER['SERVER_NAME']?>/tasks">Перейти ко всем задачам</a>
            </form>
        </div>
    </div>
</center>