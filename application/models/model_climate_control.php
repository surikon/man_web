<?php

class Model_Climate_control extends Model
{
    public function get_data()
    {
        $file = file_get_contents('log/log_climate_control.txt', true);
        $data = explode('~', $file);
        $result['data'] = "";

        foreach ($data as $K => $substr)
        {
            $inf = explode(';', $substr);
            foreach ($inf as $Y => $val)
            {
                $result['data'] .= $val . " ";
            }
            $result['data'] .= "<br />";
        }

        return $result;
    }
}