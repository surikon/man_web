<?php
class Controller_Register extends Controller
{
    function __construct()
    {
        $this->view = new View();
        $this->model = new Model_Register();
    }

    function action_index()
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
        $this->view->generate('register_view.php', 'template_view1.php', $result);
    }
}
?>