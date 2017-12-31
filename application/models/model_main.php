<?php
    class Model_Main extends Model
    {
        function personal_area($id)
        {
            $data = DB::run("SELECT * FROM user WHERE id = ?", [$id])->fetch();
            $user_name = $data['name'];
            $user_surname = $data['surname'];
            $user_partonymic = $data['partonymic'];
            $login = $data['login'];
            $prev = $data['avatar'];
            $b = false;

            if($prev == "def")
            {
                $ava_path = "/images/avatars/def.jpg";
            }
            else
            {
                $ava_path = "/images/avatars/" . $login . "." . $prev;
            }

            $template_date = "Y-m-d";
            $now = date($template_date);

            $tasks = DB::run("SELECT * FROM tasks WHERE user_id = ? AND date_of_completion = ?", [$id, $now])->fetchAll();
            $size = count($tasks);

            $table = "<table><tr><th>№</th><th>Задача </th><th></th></tr>";

            for ($i = 0; $i < $size; $i++)
            {
                $s = $tasks[$i]['status'];
                if (!$s) continue;
                $b = true;
                $s = ($s == 1 ? "normal" : $s == 2 ? "inf" : "alert");

                $table .= "<tr><td class = '$s'>" . ($i + 1) . "</td><td class = '$s'>" .
                    $tasks[$i]['name'] . "</td></tr>";
            }

            $table .= "</table><br />";

            $result = [
                "name" => $data['name'],
                "surname" => $data['surname'],
                "login" => $data['login'],
                "partonymic" => $data['partonymic'],
                "ava" => $ava_path,
                "bt" => $b,
                "tasks" => $table
            ];
            return $result;
        }

        function news()
        {
            $query = "SELECT * FROM news WHERE type=?";
            $news = DB::run($query, [1])->fetchAll();
            $size = count($news);
            $result['news'] = "";
            if($size > 0)
            {
                for ($i = 0; $i < $size; $i++)
                {
                    $result['news'] .= "<h3>" . $news[$i]['title'] . "</h3><hr /><br />";
                    $description = explode("~" ,$news[$i]['description']);

                    $result['news'] .= $description[0];
                    $result['news'] .= "<br /><div style='display:none' id='$i'>" . $description[1] . "</div>";

                    $result['news'] .= "<a onclick= " . "collapsElement('$i')" . "><span class = 'show_des' id = i".$i.">Читать далее...</span></a>";
                }
            }
            return $result;
        }
    }
?>