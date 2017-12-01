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

            $template_date = "Y-m-d";
            $now = date($template_date);

            $tasks = DB::run("SELECT * FROM tasks WHERE user_id = ? AND date_of_completion = ?", [$id, $now])->fetchAll();
            //Проверка, истекла дата выполнения задачи
            $size = count($tasks);

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