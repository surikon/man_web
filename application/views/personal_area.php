<center>
    <h2>Личный кабинет</h2></br>
    <div class = "p_ava">
        <div class = "c_ava">
            <div class = "poster">
                <img src = "/images/temlate_ava.jpg"/>
                <div class = "message">
                    <b>Загрузка новой фотографии</b>
                    <p>Чтобы изменить свою фотографию, перейдите в раздел <a href="http://localhost/settings">настройки</a></p>
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
                    $size = count($result['tasks']);
                    for ($i = 0; $i < $size; $i++)
                    {
                        $s = $result['tasks'][$i]['status'];
                        if(!$s) continue;
                        $s = ($s == 1 ? "normal" : $s == 2 ? "inf" : "alert");

                        echo "<tr><td class = '$s'>".($i + 1)."</td><td class = '$s'>".
                        $result['tasks'][$i]['name']."</td><td  class = '$s'><input type='checkbox' name = 'task' 
                        id = '".$result['tasks'][$i]['task_id']."'></td></tr>";
                    }
                ?>
                </table>
                <br />
                <button type = "submit" class = "submit" name = "update_tasks" form="tasks">Обновить</button>
                <a href = "http://localhost/tasks">Перейти ко всем задачам</a>
            </form>
        </div>
    </div>
</center>