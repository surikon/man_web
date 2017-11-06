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
           if(isset($_SESSION['id']))
           {
               $id = $_SESSION['id'];
               $result = $this->model->personal_area($id);
               $this->view->generate('personal_area.php', "template_view2.php", $result);
           }
           else
           {
               $result = $this->model->news();
               $this->view->generate('main_view.php', 'template_view1.php', $result);
           }
        }
    }
?>