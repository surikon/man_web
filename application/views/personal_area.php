<center>
    <h2>Личный кабинет</h2></br>
    <div class = "p_ava">
        <div class = "c_ava">
            <div class="thumbs">
                <img src = "<?=$result['ava'];?>" />
                <div class="caption">
                    <span class="title">Ваша аватарка</span>
                    <span class="info"><a href = "/settings" style="font-size: 130%;">Изменить аватрарку</a></span>
                </div>
            </div>
        </div>
        <div class = "c_ava">
                <?php
                    if($result['bt'] == false)
                        echo "<h4>Ура! Нет задач на сегодня.</h4>";
                    else
                        echo $result['tasks'];
                ?>
                <a href = "/tasks">Перейти ко всем задачам</a>
        </div>
    </div>
</center>

<center>
    <br />
    <?php
        if($result['set_mark'] != 0)
        {
            echo "<hr /><h3>Круговая диаграма успеваемости: </h3>";
            echo '<div class = "grf"><canvas id = "myCanvas"></canvas><div id="myLegend"></div></div>';
        }
    ?>
    <br />
    <script>
        var myMarks = {
            <?php
                if($result['mark_2']) echo '"2" : '. $result['mark_2'] . ",";
                if($result['mark_3']) echo '"3" : '. $result['mark_3'] . ",";
                if($result['mark_4']) echo '"4" : '. $result['mark_4'] . ",";
                if($result['mark_5']) echo '"5" : '. $result['mark_5'] . ",";
            ?>
        };
    </script>
    <script src = "/js/diagram.js" type = "text/javascript"></script>
    <hr />
      <br />
</center>