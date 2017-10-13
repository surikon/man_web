<?php
    class Model_Main extends Model
    {
        public function get_data()
        {
            $data = DB::run("SELECT * FROM user");
            return $data;
        }
        public function update_user($code, $login, $password)
        {
            DB::run("UPDATE user SET login=? WHERE code=?", [$login, $code]);
            DB::run("UPDATE user SET password=? WHERE code=?", [$password, $code]);
        }
    }
?>