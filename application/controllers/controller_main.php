<?php
    class Controller_Main extends Controller
    {
        function __construct()
        {
            $this->view = new View();
            $this->model = new Model_Main();
        }

        function action_index()
        {
            $data = $this->model->get_data();

            if(isset($_POST['registration']))
            {
                $code = $_POST['code'];
                $login = $_POST['login'];
                $password = $_POST['password'];
                $repass = $_POST['repass'];
                $b = false;
                while ($row = $data->fetch(PDO::FETCH_LAZY))
                {
                    if($code == $row['code'])
                    {
                        if(!isset($login))
                        {
                            $b = true;
                        }
                        else
                        {
                            $result = "Вы уже заригестрированы!";
                        }
                    }
                }
                if($b && $password == $repass)
                {
                    $this->model->update_user($code, $login, $password);
                    if(empty($result))
                    {
                        $result = "Поздравляю! Вы успешно зарегистрировались!";
                    }
                }
                else
                {
                    if(empty($result))
                    {
                        $result = "Ошибка! Неправильный пароль, или пригласительный код.";
                    }
                }
            }

            $this->view->generate('main_view.php', 'template_view1.php', $result);
        }


    }
?>