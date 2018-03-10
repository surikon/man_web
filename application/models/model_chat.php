<?php

class Model_Chat extends Model
{
    public function get_all_chat($id)
    {
        $query = "SELECT * FROM pupil WHERE pupil_id = ?";
        $file_name = "chats/" . DB::run($query, [$id])->fetch()['form'] . ".txt";
        $file_text = file_get_contents($file_name, FILE_USE_INCLUDE_PATH);
        $messages = explode("*", $file_text);

        $result['html'] = "";

        if(empty($file_text))
            return $result;

        for($i = 0; $i < count($messages); $i++)
        {
            $m = explode("~", $messages[$i]);
            $name_sender = $m[0];
            $text_message = $m[1];
            $date_message = $m[2];

            $result['html'] .= "<div class = 'chat_message'><span class = 'text_chat_name'>" . $name_sender . ": </span></b>
            <span class = 'text_chat_message'>" . $text_message . "</span></div><br />";
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

        $query = "SELECT * FROM pupil WHERE pupil_id = ?";
        $file_path = "chats/" . DB::run($query, [$id])->fetch()['form'] . ".txt";
        $file_text = '*' . $nf . '~' . $text . '~' . $now;

        file_put_contents($file_path, $file_text, FILE_APPEND | LOCK_EX);
        $result['add_html'] = "<b>" . $nf . ": </b>" . $text . "<br />";
        return $result;
    }
}