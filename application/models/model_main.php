<?php
    class Model_Main extends Model
    {
        public function get_data_reg($code, $login, $password, $repass)
        {
            $b = false;
            $data = DB::run("SELECT * FROM user WHERE code = ?", [$code])->fetchAll();
            if(is_string($data["login"]))
            {
                $b = true;
                $result = [
                    "registration" => "Вы уже зарегистрированы!",
                    "status" => "error"
                ];
            }
            if(empty($data))
            {
                $b = true;
                $result = [
                    "registration" => "Неправильный пригласительный код",
                    "status" => "error"
                ];
            }
            if(DB::run("SELECT * FROM user WHERE login = ?", [$login])->fetchAll())
            {
                $b = true;
                $result = [
                    "registration" => "Такой логин уже существует",
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
            $data = DB::run("SELECT * FROM user WHERE login = ?", [$login])->fetchAll();
            print_r($data);
            echo "<br />".md5($password)."<br />".$login."<br />";
            if(md5($password) == $data['password'])
            {
                $_SESSION['id'] = $data['id'];
            }
            else {
                $result = [
                    "authorisation" => "Неправильный логин или пароль!",
                    "status" => "error"
                ];
                return $result;
            }
        }

        public function personal_area($id)
        {
            $data = DB::run("SELECT * FROM user WHERE id = ?", [$id])->fetchAll();
            $result = [
                "name" => $data['name'],
                "surname" => $data['surname'],
                "login" => $data['login'],
                "partonymic" => $data['partonymic']
            ];
            return $result;
        }
    }
?>