<?php
    require_once ("application/lib/captcha.php");

    class Model_In extends Model
    {
        public function get_data_aut($login, $password)
        {
            $data = DB::run("SELECT * FROM user WHERE login = ?", [$login])->fetch();

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

            if ($response != null && $response->success)
            {
                if (md5($password) == $data['password']) {
                    $_SESSION['id'] = $data['id'];
                    header("Location: http://" . $_SERVER['SERVER_NAME']);
                    exit;
                } else {
                    $result[1] = "Неправильный логин или пароль!";
                }
            }
            else
            {
                $result[1] = 'Введите капчу!';
            }

            return $result;
        }
    }
?>