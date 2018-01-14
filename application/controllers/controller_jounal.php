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
            $this->view->generate('register_view.php', 'template_view1.php');
        }
    }
?>