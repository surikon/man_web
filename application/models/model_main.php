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

            $table = "";

            for ($i = 0; $i < $size; $i++)
            {
                $s = $tasks[$i]['status'];
                if (!$s) continue;
                $s = ($s == 1 ? "normal" : $s == 2 ? "inf" : "alert");

                $table .= "<tr><td class = '$s'>" . ($i + 1) . "</td><td class = '$s'>" .
                    $tasks[$i]['name'] . "</td><td  class = '$s'><input type='checkbox' name = 'task' 
                    id = '" . $tasks[$i]['task_id'] . "'></td></tr>";
            }

            $result = [
                "name" => $data['name'],
                "surname" => $data['surname'],
                "login" => $data['login'],
                "partonymic" => $data['partonymic'],
                "ava" => $ava_path,
                "tasks" => $table
            ];
            return $result;
        }

        function news()
        {
            $result = ["1" => "1"];
            return $result;
        }
    }
?>