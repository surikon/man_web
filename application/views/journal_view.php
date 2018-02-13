<?php
    echo "<p style='font-size: 20px;'><b>Оценки из журнала:</b> " . $result['name'] . " " . $result['surname'] . ".</p>";

    echo "<h3> <button>Назад</button> " . $result['quater'] . "-я Четверть " .
            "<button>Вперед</button></h3><hr /><br />";
    if(!empty($result['marks'])) print_r($result['eljur']);
?>