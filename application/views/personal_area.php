<center>
    <h2>Личный кабинет</h2></br>
    <div class = "p_ava">
        <div class = "c_ava">
            <img src = "/images/temlate_ava.jpg"/>
        </div>
        <div class = "c_ava">
            <span class = "head1"> Задачи на сегодня: </span><br /><br />
            <form method="POST" action="">
                <table>
                    <tr>
                        <th>№</th>
                        <th>Задача </th>
                        <th>Дата выполнения</th>
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
                        $result['tasks'][$i]['name']."</td><td class = '$s'>".
                        $result['tasks'][$i]['date_of_completion']."</td><td  class = '$s'><input type='checkbox' name = 'task' 
                        id = '".$result['tasks'][$i]['task_id']."'></td></tr>";
                    }
                ?>
                </table>
                <br />
                <input type="submit" name = "update_tasks">
            </form>
        </div>
    </div>
</center>