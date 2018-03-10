<?php
    class Model_Journal extends Model
    {
        public function get_marks($user_id)
        {
            $template_date = "Y-m-d";
            $now = date($template_date);

            $query = "SELECT * FROM user WHERE id = ?";
            $user = DB::run($query, [$user_id])->fetch();
            $result['name'] = $user['name'];
            $result['surname'] = $user['surname'];

            $query = "SELECT * FROM quater WHERE start < ? AND ending > ?";
            $quater = DB::run($query, [$now, $now])->fetch();

            $query = "SELECT * FROM pupil WHERE pupil_id = ?";
            $pupil = DB::run($query, [$user_id])->fetch();
            $form = $pupil['form'];

            $query = "SELECT * FROM subject WHERE form = ?";
            $subjects = DB::run($query, [$form])->fetchAll();

            $size = count($subjects);
            $query = "SELECT * FROM journal WHERE subject_id = ? AND date < ? AND date > ?";

            $header = '<div class = "journal"><table class= "tbl_journal"><tr><th></th>';
            $allmarks = 0;
            $isHeader = false;

            $max_marks = 0;

            for($i = 0; $i < $size; $i++)
            {
                $marks = DB::run($query, [$subjects[$i]['id'], $quater['ending'], $quater['start']])->fetchAll();
                $marks_n = count($marks);
                $max_marks = max($max_marks, $marks_n);

                if(empty($marks_n))
                {
                    $sr[$subjects[$i]['id']] = "";
                    $arr[$subjects[$i]['id']] = 0;
                    continue;
                }

                $allmarks += $marks_n; //количество ВСЕХ оценок за все предметы
                $sum_marks = $y = 0;
                $subject_marks = " ";

                for($j = 0; $j < $marks_n; $j++)
                {
                    if($marks[$j]['mark_type'] == 2)
                    {
                        $sum_marks += $marks[$j]['mark_id'] * 2;
                        $y += 2;
                        $mark_type = "x2";
                    }
                    else if($marks[$j]['mark_type'] == 3)
                    {
                        $sum_marks += $marks[$j]['mark_id'] * 3;
                        $y += 3;
                        $mark_type = "x3";
                    }
                    else
                    {
                        $y++;
                        $mark_type = "";
                        $sum_marks += $marks[$j]['mark_id'];
                    }

                    $arr[$subjects[$i]['id']][$j]['mark'] = $marks[$j]['mark_id'] . $mark_type;
                    $arr[$subjects[$i]['id']][$j]['date'] = $marks[$j]['date'];
                }
                $sr[$subjects[$i]['id']] = $sum_marks / $y;
            }

    //****************************************************************************************************************
            $size = count($subjects);
            $subject_marks = "";

            for($i = 0; $i < $size; $i++)
            {
               // if(empty($arr[$subjects[$i]['id']])) continue;

                $subject_marks .= '<tr><td>' . $subjects[$i]['name'] . ' (' . $sr[$subjects[$i]['id']] . ')</td>';

                for($j = 0; $j < $max_marks; $j++)
                {
                    if(!$isHeader)
                    {
                        $header .= "<th></th>";
                    }
                    if($j >= count($arr[$subjects[$i]['id']]))
                    {
                        $subject_marks .= '<td></td>';
                    }
                    else
                    {
                        $subject_marks .= '<td> <div class="tooltip">' . $arr[$subjects[$i]['id']][$j]['mark'] . '<span class="tooltiptext">'
                            . $arr[$subjects[$i]['id']][$j]['date'] . '</span></div></td>';
                    }
                }
                $isHeader = true;
                $header .= '</tr>';
                $subject_marks .= '</tr>';
            }

            $result['eljur'] = $header . $subject_marks . '</table></div>';
            $result['marks'] = $allmarks;
            $result['quater'] = $quater['number'];
            return $result;
        }
    }
?>