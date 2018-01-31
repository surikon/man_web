<?php
    class Controller_Journal extends Controller
    {
        function __construct()
        {
            $this->view = new View();
            $this->model = new Model_Journal();
        }
        function action_index()
        {
            if(isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $result = $this->model->get_marks($id);
                $this->view->generate("journal_view.php", "template_view2.php", $result);
            }
        }
    }