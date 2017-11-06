<?php
    class Model_Register extends Model
    {
        public function get_data_reg($code, $login, $password, $repass)
        {
            $b = false;
            $data = DB::run("SELECT * FROM user WHERE code = ?", [$code])->fetch(); //fetchAll ????
            if(empty($data))
            {
                $b = true;
                $result = [
                    "registration" => "Неправильный пригласительный код",
                    "status" => "error"
                ];
            }
            if(DB::run("SELECT * FROM user WHERE login = ?", [$login])->fetch())
            {
                $b = true;
                $result = [
                    "registration" => "Такой логин уже существует",
                    "status" => "error"
                ];
            }
            if(!empty($data['status']))
            {
                $b = true;
                $result = [
                    "registration" => "Вы уже зарегистрированы!",
                    "status" => "error"
                ];
            }
            if($repass != $password)
            {
                $b = true;
                $result = [
                    "registration" => "Пароли не совпадают!",
                    "status" => "error"
                ];
            }

            if(!$b)
            {
                $password = md5($password);
                DB::run("UPDATE user SET login=? WHERE code=?", [$login, $code]);
                DB::run("UPDATE user SET password=? WHERE code=?", [$password, $code]);
                DB::run("UPDATE user SET status=? WHERE code=?", [1, $code]);
                $result = [
                    "registration" => "Поздравляю! Вы успешно зарегистрировались. Для входа в личный кабинет,
                                 используйте 'Войти'",
                    "status" => "info"
                ];
            }
            return $result;
        }

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