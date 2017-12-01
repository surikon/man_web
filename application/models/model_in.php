<?php
    class Model_In extends Model
    {
        public function get_data_aut($login, $password)
        {
            $data = DB::run("SELECT * FROM user WHERE login = ?", [$login])->fetch();
            if(md5($password) == $data['password'])
            {
                $_SESSION['id'] = $data['id'];
                header("Location: http://localhost"); exit;
            }
            else {
                $result[1] = "Неправильный логин или пароль!";
                return $result;
            }
        }
    }
?>