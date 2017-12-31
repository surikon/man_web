<?php
    class Model_Tasks extends Model
    {
        public function get_tasks($user_id)
        {
            $query = 'SELECT * FROM tasks WHERE user_id=?';
            $data = DB::run($query, [$user_id])->fetchAll();
            $count_tasks = count($data);
            $all_tasks_html = "<form method='POST' action='' name = 'delete_task' id = 'delete_task'><table><tr><th>№</th><th>Задача </th><th></th></tr>";
            $today_tasks_html = "<table><tr><th>№</th><th>Задачи на сегодня </th></tr>";
            $template_date = "Y-m-d";
            $now = date($template_date);
            $b1 = false; $b2 = false;

            for($i = 0, $j = 0; $i < $count_tasks; $i++)
            {
                $s = $data[$i]['status'];
                if (!$s) continue;

                $b1 = true;
                $s = ($s == 1 ? "normal" : $s == 2 ? "inf" : "alert");

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
            $all_tasks_html .= "</table><br /><button type = 'submit' class = 'submit' name = 'del' form='delete_task'>Удалить</button></form>";
            $result['today'] = $today_tasks_html;
            $result['all'] = $all_tasks_html;
            $result['all_b'] = $b1;
            $result['today_b'] = $b2;

            return $result;
        }
        public function add_task($user_id, $name, $description, $date)
        {
            $template_date = "Y-m-d";
            $now = date($template_date);
            $query = "INSERT INTO tasks (user_id, date_of_creation, date_of_completion, name, description,status) VALUES (?,?,?,?,?,3)";
            $stmt = DB::run($query, [$user_id, $now, $date, $name, $description]);
        }
        public function delete_task($user_id, $arr_tasks)
        {
            $N = count($arr_tasks);
            for($i = 0; $i < )
            {

            }
        }
    }
?>