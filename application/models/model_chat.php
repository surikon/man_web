<?php

class Model_Chat extends Model
{
    public function get_all_chat($id)
    {
        $query = "SELECT * FROM pupil WHERE pupil_id = ?";
        $file_name = "chats/" . DB::run($query, [$id])->fetch()['form'] . ".txt";
        $file_text = file_get_contents($file_name, FILE_USE_INCLUDE_PATH);
        $messages = explode("*", $file_text);

        $template_date = "d.m.Y";
        $now = date($template_date);

        $last_date_message = "";

        $result['html'] = "";

        if(empty($file_text))
            return $result;

        if(count($messages) > 20)
            $start_index = count($messages) - 10;
        else
            $start_index = 0;

        for($i = $start_index; $i < count($messages); $i++)
        {
            $m = explode("~", $messages[$i]);
            $name_sender = $m[0];
            $tmessage = $m[1];
            $date_message = date("d.m.Y", strtotime($m[2]));
            $pupil_chat_id = $m[3];

            $text1 = $tmessage;

            if($text1 > 40)
            {
                $tmessage = "";
                $last_index = 0;
                for($i = 40; $i < strlen($text1); $i+=40) {
                    $tmessage .= substr($text1, $last_index, $i) . "<br />";
                    $last_index = $i;
                }
                if($last_index < strlen($text1) - 1)
                    $tmessage .= substr($text1, $last_index, strlen($text1));
            }

            if($last_date_message != $date_message)
            {
                if($date_message == $now)
                {
                    $result['html'] .= '<p align="center"> сегодня </p><hr />';
                    $last_date_message = $date_message;
                }
                else {
                    $last_date_message = $date_message;
                    $result['html'] .= '<p align="center">' . $date_message . '</p><hr />';
                }
            }

            $result['html'] .= "<div class = 'chat_message'>";

            if($pupil_chat_id == $id)
                $result['html'] .= "<div class = 'mycloud'>";
            else
                $result['html'] .= "<div class = 'cloud'>";

            $result['html'] .= "<span class = 'text_chat_name'>" . $name_sender . ": </span><br />
            <br /><span class = 'text_chat_message'>" . $tmessage . "</span></div></div>";
        }
        return $result;
    }
    public function  set_data($id, $text)
    {
        $query = "SELECT * FROM user WHERE id = ?";
        $user = DB::run($query, [$id])->fetch();

        $nf = $user['name'] . " " . $user['surname'];

        $template_date = "Y-m-d";
        $now = date($template_date);

        $text1 = $text;

        if($text1 > 40)
        {
            $text = "";
            $last_index = 0;
            for($i = 40; $i < strlen($text1); $i+=40) {
                $text .= substr($text1, $last_index, $i) . "<br />";
                $last_index = $i;
            }
            if($last_index < strlen($text1) - 1)
                $text .= substr($text1, $last_index, strlen($text1));
        }

        $query = "SELECT * FROM pupil WHERE pupil_id = ?";
        $file_path = "chats/" . DB::run($query, [$id])->fetch()['form'] . ".txt";
        $file_text = '*' . $nf . '~' . $text     . '~' . $now . '~' . $id;

        file_put_contents($file_path, $file_text, FILE_APPEND | LOCK_EX);
        $result['add_html'] = "<div class = 'chat_message'><div class = 'mycloud'><span class = 'text_chat_name'>" . $nf . ": </span><br />
        <br /><span class = 'text_chat_message'>" . $text . "</span></div></div>";
        return $result;
    }

    public function get_necessary_info($id)
    {
        $query = "SELECT * FROM pupil WHERE pupil_id = ?";
        $form = mb_strtoupper(DB::run($query, [$id])->fetch()['form']);

        if(strlen($form) == 3)
        {
            $result['form'] = $form[0] . $form[1] . '-' . $form[2];
        }
        else
        {
            $result['form'] = $form[0] . '-' . $form[1];
        }

        return $result;
    }
}