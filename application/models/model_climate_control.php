<?php

class Model_Climate_control extends Model
{
    public function get_data()
    {
        $file = file_get_contents('log/log_climate_control.txt', true);
        $data = explode('~', $file);
        $cnt = count($data);

        if($cnt > 0)
        {
            $last_inf = $data[$cnt - 3];

            $last_inf = explode(';', $last_inf);
            $result['data'] = "<b>Текущая температура: </b>" . $last_inf[0] . "&#176C<br />" . "<b>Текущая влажность: </b>" . $last_inf[1] . "%<br />";
            $result['data'] .= "<b>Текущее освещение: </b>";

            if($last_inf[2] > 500)
                $result['data'] .= "плохое";
            else $result['data'] .= "хорошее";
        }

        return $result;
    }
    public function get_name_class($id)
    {
        $query = "SELECT * FROM pupil WHERE pupil_id = ?";
        $data = DB::run($query, [$id])->fetch();
        $form = mb_strtoupper($data['form']);

        if(strlen($form) == 3)
            $name_form = $form[0] . $form[1] . '-' . $form[2];
        else
            $name_form = $form[0] . '-' . $form[1];

        return $name_form;
    }
}