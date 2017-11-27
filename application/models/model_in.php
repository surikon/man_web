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
                $result = [
                    "authorisation" => "Неправильный логин или пароль!",
                    "status" => "error"
                ];
                return $result;
            }
        }
    }
?>