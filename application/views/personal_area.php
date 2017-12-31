<center>
    <h2>Личный кабинет</h2></br>
    <div class = "p_ava">
        <div class = "c_ava">
            <div class="thumbs">
                <img src = "<?=$result['ava'];?>" width="50%"/>
                <div class="caption">
                    <span class="title">Ваша аватарка</span>
                    <span class="info"><a href = "/settings" style="font-size: 130%;">Здарова</a></span>
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