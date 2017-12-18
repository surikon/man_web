<?php
    class Controller_Settings extends Controller
    {
        function __construct()
        {
            $this->view = new View();
            $this->model = new Model_Settings();
        }

        function action_index()
        {
            $id = $_SESSION['id'];


            if(isset($_POST['update_ava']))
            {
                $file = $_FILES['file'];
                $result = $this->model->settings($id, $file);
            }
            else
            {
                $result = $this->model->settings($id);
            }

            $this->view->generate("settings_view.php", "template_view2.php", $result);
        }
    }
?>