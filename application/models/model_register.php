<?php
    require_once ("application/lib/captcha.php");

    class Model_Register extends Model
    {
        public function get_data_reg($code, $login, $password, $repass)
        {
            $b = false;
            $result[] = array("", "", "", "", "");
            $data = DB::run("SELECT * FROM user WHERE code = ?", [$code])->fetch(); //fetchAll ????

            $secret = "6LcxQE4UAAAAALYiXDK3seJmvZu-YMZpozU-ndjM";
            $response = null;
            $reCaptcha = new ReCaptcha($secret);

            // if submitted check response
            if ($_POST["g-recaptcha-response"]) {
                $response = $reCaptcha->verifyResponse(
                    $_SERVER["REMOTE_ADDR"],
                    $_POST["g-recaptcha-response"]
                );
            }

            if ($response != null && $response->success) {
                if (!empty($data['status'])) {
                    $b = true;
                    $result[2] = "Вы уже зарегистрированны";
                } else {
                    if (empty($data)) {
                        $b = true;
                        $result[2] = "Неправильный пригласительный код";
                    }
                    if (DB::run("SELECT * FROM user WHERE login = ?", [$login])->fetch()) {
                        $b = true;
                        $result[3] = "Такой логин уже существует";
                    }
                    if ($repass != $password) {
                        $b = true;
                        $result[4] = "Пароли не совпадают";
                    }
                }

                if (!$b) {
                    $password = md5($password);
                    DB::run("UPDATE user SET login=? WHERE code=?", [$login, $code]);
                    DB::run("UPDATE user SET password=? WHERE code=?", [$password, $code]);
                    DB::run("UPDATE user SET status=? WHERE code=?", [1, $code]);
                    $result[1] = "success";
                } else $result[1] = "error";
            }
            else {
                $result[1] = "error";
                $result[5] = "Введите каптчу!";
            }
            return $result;
        }
    }
?>