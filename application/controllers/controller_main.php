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
           if(isset($_SESSION['id']) && $_SESSION['out'] != 1)
           {
               if(isset($_GET['update_tasks']))
               {
                    print_r(task);
               }
               $id = $_SESSION['id'];
               $result = $this->model->personal_area($id);
               $this->view->generate('personal_area.php', "template_view2.php", $result);
           }
           else
           {
               session_destroy();
               $result = $this->model->news();
               $this->view->generate('main_view.php', 'template_view1.php', $result);
           }
        }
    }
?>