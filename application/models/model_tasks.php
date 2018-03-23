<?php
    class Model_Tasks extends Model
    {
        public function get_tasks($user_id)
        {
            $query = 'SELECT * FROM tasks WHERE user_id=?';
            $data = DB::run($query, [$user_id])->fetchAll();
            $count_tasks = count($data);
            $all_tasks_html = "<form method='POST' action='' name = 'delete_task' id = 'delete_task'><table><tr><th>№</th><th>Напоминания </th><th></th></tr>";
            $today_tasks_html = "<table><tr><th>№</th><th>Напоминания на сегодня </th></tr>";
            $template_date = "Y-m-d";
            $now = date($template_date);
            $b1 = false; $b2 = false;

            for($i = 0, $j = 0; $i < $count_tasks; $i++)
            {
                $s = $data[$i]['status'];
                if (!$s) continue;

                $b1 = true;

                if($s == 1)
                    $s = "inf";
                else if($s == 2)
                    $s = "normal";
                else if($s == 3)
                    $s = "alert";

                if($data[$i]['date_of_completion'] == $now)
                {
                    $b2 = true;
                    $today_tasks_html .= "<tr><td class = '$s'>" . ($j + 1) . "</td><td class = '$s'>" .
                        $data[$i]['name'] . "</td></tr>";
                    $j++;
                }

                $all_tasks_html .= "<tr><td class = '$s'>" . ($i + 1) . "</td><td class = '$s'>" .
                $data[$i]['name'] . "</td><td  class = '$s'><input type='checkbox' name = 'tasks[]' 
                value = '" . $data[$i]['task_id'] . "'></td></tr>";

            }

            $today_tasks_html .= "</table><br />";
            $all_tasks_html .= "</table><br /><button type = 'submit' class = 'submit' name = 'del' form='delete_task' value='1'>Удалить</button></form>";
            $result['today'] = $today_tasks_html;
            $result['all'] = $all_tasks_html;
            $result['all_b'] = $b1;
            $result['today_b'] = $b2;

            return $result;
        }
        public function add_task($user_id, $name, $description, $date, $status)
        {
            $template_date = "Y-m-d";
            $now = date($template_date);

            if(empty($status)) $status = 1;

            $query = "INSERT INTO tasks (user_id, date_of_creation, date_of_completion, name, description, status) VALUES (?,?,?,?,?,?)";
            $stmt = DB::run($query, [$user_id, $now, $date, $name, $description, $status]);
        }
        public function delete_tasks($tasks)
        {
            $c = count($tasks);
            for($i = 0; $i < $c; $i++)
            {
                DB::run("DELETE FROM tasks WHERE task_id = ?", [$tasks[$i]]);
            }
        }
    }
?>