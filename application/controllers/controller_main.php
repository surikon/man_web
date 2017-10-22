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
            if(!isset($_SESSION['id']))
            {
                if (!empty($_POST['registration']))
                {
                    $result = [];
                    $code = $_POST['code'];
                    $login = $_POST['login'];
                    $password = $_POST['password'];
                    $repass = $_POST['repass'];
                    $result = $this->model->get_data_reg($code, $login, $password, $repass);
                }
                else if (!empty($_POST['authorisation']))
                {
                    $login = $_POST['login'];
                    $password = $_POST['password'];
                    $result = $this->model->get_data_aut($login, $password);
                }
                $this->view->generate('main_view.php', 'template_view1.php', $result);
            }
            else
            {
                echo "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
                $id = $_SESSION['id'];
                $result = $this->model->personal_area($id);
                $this->view->generate('personal_area.php', "template_view2.php", $result);
            }
        }
    }
?>