<?php
    class Controller_contacts extends Controller
    {
        function __construct()
        {
            $this->view = new View();
            //$this->model = new Model();
        }
        function action_index()
        {
            $this->view->generate("contacts_view.php", "template_view1.php");
        }
    }