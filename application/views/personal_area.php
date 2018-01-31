<center>
    <h2>Личный кабинет</h2></br>
    <div class = "p_ava">
        <div class = "c_ava">
            <img src = "<?=$result['ava'];?>" style="width: 50%"/>
        </div>
        <div class = "c_ava">
                <?php
                    if($result['bt'] == false)
                        echo "<h4>Ура! Нет задач на сегодня.</h4>";
                    else
                        echo $result['tasks'];
                ?>
                <a href = "/tasks">Перейти ко всем напоминаниям</a>
        </div>
    </div>
</center>


    <br />
    <?php
        if($result['set_mark'] != 0)
        {
            echo "<hr /><center><h3>Рейтинги: </h3></center>";
            echo '<div class = "grf"><canvas id = "myCanvas"></canvas><div id="myLegend"></div></div>';
        }
    ?>
    <br />
    <script>
        var myMarks = {
            <?php
                if($result['mark_2']) echo '"<b>2</b>" : '. $result['mark_2'] . ",";
                if($result['mark_3']) echo '"<b>3</b>" : '. $result['mark_3'] . ",";
                if($result['mark_4']) echo '"<b>4</b>" : '. $result['mark_4'] . ",";
                if($result['mark_5']) echo '"<b>5</b>" : '. $result['mark_5'] . ",";
            ?>
        };
    </script>
    <script src = "/js/diagram.js" type = "text/javascript"></script>
      <br />
