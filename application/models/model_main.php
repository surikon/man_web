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

            $template_date = "Y-m-d G-i-s";
            $now = date($template_date);

            $tasks = DB::run("SELECT * FROM tasks WHERE user_id = ?", [$id])->fetchAll();
            //Проверка, истекла дата выполнения задачи
            $size = count($tasks);
            for ($i = 0; $i < $size; $i++)
            {
                if($tasks[$i]['date_of_completion'] <= $now)
                {
                    $task_id = $tasks[$i]['task_id'];
                    DB::run("UPDATE tasks SET status=? WHERE task_id=?", [3, $task_id]);
                }
            }

            $result = [
                "name" => $data['name'],
                "surname" => $data['surname'],
                "login" => $data['login'],
                "partonymic" => $data['partonymic'],
                "tasks" => $tasks
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