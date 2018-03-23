<center>
    <p style="font-size: 20px; font-weight: 500"><?=$result['name'] . " " . $result['surname'];?></p>
    <br /><br />
    <div class = "p_ava">
        <div class = "c_ava">
            <div class = "image_view">
                <img src = "<?=$result['ava'];?>" style="width: 50%"/>
            </div>
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
            echo "<hr /><center><p style='font-size: 20px; font-weight: 500'>Рейтинги: </p></center><div class = 'p_ava'>";
            echo '<div class = "c_ava" style = "width:45%"><div class = "grf"><canvas id = "myCanvas"></canvas><div id="myLegend"></div></div></div>';
        }
        else
        {
            echo '<div class = "c_ava">Нет оценок!</div>';
        }
    ?>

    <div class = "c_ava">
        <?php
            echo "<b>Рейтинг класса " . $result['form'] . "</b><br /><br />";
            echo $result['rating'];
        ?>
    </div>
   </div>
    <script>
        var myMarks = {
            <?php
                if($result['mark_2']) echo '"Оценка: <b>2</b>" : '. $result['mark_2'] . ",";
                if($result['mark_3']) echo '"Оценка: <b>3</b>" : '. $result['mark_3'] . ",";
                if($result['mark_4']) echo '"Оценка: <b>4</b>" : '. $result['mark_4'] . ",";
                if($result['mark_5']) echo '"Оценка: <b>5</b>" : '. $result['mark_5'] . ",";
            ?>
        };
    </script>
    <script src = "/js/diagram.js" type = "text/javascript"></script>
      <br />
