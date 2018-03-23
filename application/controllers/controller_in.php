<?php
    class Controller_In extends Controller
    {
        function __construct()
        {
            $this->view = new View();
            $this->model = new Model_In();
        }
        function action_index()
        {
            if (!empty($_POST['authorisation']))
            {
                $login = $_POST['login'];
                $password = $_POST['password'];
                $result = $this->model->get_data_aut($login, $password);
            }
            if(!empty($result))
            {
                $this->view->generate('view_in.php', 'template_view1.php', $result);
            }
            else
            {
                $this->view->generate('view_in.php', 'template_view1.php');
            }
        }
    }
?>