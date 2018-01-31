<?php
    class Model_Journal extends Model
    {
        public function get_marks($user_id)
        {
            $query = "SELECT * FROM pupil WHERE pupil_id = ?";
            $pupil = DB::run($query, [$user_id])->fetch();
            $form = $pupil['form'];

            $query = "SELECT * FROM subject WHERE form = ?";
            $subjects = DB::run($query, [$form])->fetchAll();

            $size = count($subjects);
            $query = "SELECT * FROM journal WHERE subject_id = ?";

            $header = '<div class = "journal"><table class= "tbl_journal"><tr><th></th>';
            $eljur = "";
            $allmarks = 0;

            $max_marks = 0;

            for($i = 0; $i < $size; $i++)
            {
                $marks = DB::run($query, [$subjects[$i]['id']])->fetchAll();
                $marks_n = count($marks);
                $max_marks = max($max_marks, $marks_n);

                if(empty($marks_n)) continue;

                $allmarks += $marks_n; //количество ВСЕХ оценок за все предметы
                $sum_marks = $y = 0;
                $subject_marks = "";

              //  for($j = 0; $j < )
            }


            for($i = 0; $i < $size; $i++)
            {
                $marks = DB::run($query, [$subjects[$i]['id']])->fetchAll();
                $marks_n = count($marks);
                $max_marks = max($max_marks, $marks_n);

                if(empty($marks_n)) continue;

                $allmarks += $marks_n;
                $sum_marks = $y = 0;
                $subject_marks = "";

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
                        $sum_marks += $marks[$j]['mark_id'];
                    }

                    $header .= '<th></th>';
                    $subject_marks .= '<td> <div class="tooltip">' . $marks[$j]['mark_id'] . $mark_type . '<span class="tooltiptext">'
                        . $marks[$j]['date'] . '</span></div></td>';
                }

                $eljur .= '<tr><td>' . $subjects[$i]['name'] . ' (' . $sum_marks / $y . ')</td>';
                $eljur .= $subject_marks;
                $eljur .= '</tr>';
            }

            $header .= '</tr>';
            $eljur .= '</table></div>';

            $eljur = $header . $eljur;

            $result['eljur'] = $eljur;
            $result['marks'] = $allmarks;

            return $result;
        }
    }
?>