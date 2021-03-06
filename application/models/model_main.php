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

            $ipupil = DB::run("SELECT * FROM pupil WHERE pupil_id = ?", [$id])->fetch();
            $form = mb_strtoupper($ipupil['form']);

            if(strlen($form) == 3)
            {
                $name_form = $form[0] . $form[1] . '-' . $form[2];
            }
            else
            {
                $name_form = $form[0] . '-' . $form[1];
            }

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

            $table = "<table><tr><th>№</th><th>Напоминания </th></tr>";

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

            $marks = DB::run("SELECT * FROM journal WHERE mark_id = ? AND pupil_id = ?", [5, $id])->fetchAll();
            $mark_5 = count($marks);
            $marks = DB::run("SELECT * FROM journal WHERE mark_id = ? AND pupil_id = ?", [4, $id])->fetchAll();
            $mark_4 = count($marks);
            $marks = DB::run("SELECT * FROM journal WHERE mark_id = ? AND pupil_id = ?", [3, $id])->fetchAll();
            $mark_3 = count($marks);
            $marks = DB::run("SELECT * FROM journal WHERE mark_id = ? AND pupil_id = ?", [2, $id])->fetchAll();
            $mark_2 = count($marks);
            $marks = DB::run("SELECT * FROM journal WHERE mark_id = ? AND pupil_id = ?", [1, $id])->fetchAll();
            $mark_1 = count($marks);

            $set_mark = $mark_1 + $mark_2 + $mark_3 + $mark_4 + $mark_5;

            $result = [
                "name" => $data['name'],
                "surname" => $data['surname'],
                "login" => $data['login'],
                "partonymic" => $data['partonymic'],
                "ava" => $ava_path,
                "bt" => $b,
                "tasks" => $table,
                "mark_5" => $mark_5,
                "mark_4" => $mark_4,
                "mark_3" => $mark_3,
                "mark_2" => $mark_2,
                "mark_1" => $mark_1,
                "set_mark" => $set_mark,
                "form" => $name_form,
                "rating" => $this->get_rating($id)
            ];

            return $result;
        }

        function news()
        {
            $query = "SELECT * FROM news WHERE type = ?";
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

        private function get_rating($id)
        {
            $query = "SELECT * FROM pupil WHERE pupil_id = ?";
            $i_pupil = DB::run($query, [$id])->fetch();

            $query = "SELECT * FROM pupil WHERE form = ?";
            $pupils = DB::run($query, [$i_pupil['form']])->fetchAll();
            $cnt = count($pupils);
            $raiting = "<table><tr><th>№</th><th>Имя </th><th>Баллы</th></tr>";

            for($i = 0; $i < $cnt; $i++)
            {
                $tmp_pupil_id = $pupils[$i]['pupil_id'];
                $tmp_pupil_rait = $pupils[$i]['rating'];
                $query = "SELECT * FROM user WHERE id = ?";
                $tmp_pupil = DB::run($query, [$tmp_pupil_id])->fetch();

                if($tmp_pupil_id == $id) $s = "normal";
                else $s = "inf";

                if($cnt < 5 || $tmp_pupil_id == $id) {
                    $raiting .= "<tr><td class='$s'>" .($i + 1) . " </td><td class='$s'>" . $tmp_pupil["name"] . " " . $tmp_pupil['surname'] .
                        "</td><td class='$s'>$tmp_pupil_rait</td></tr>";
                }

                if($s)
                    break;
            }
            $raiting .= "</table>";
            return $raiting;
        }
    }
?>