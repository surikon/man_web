<?php
    class Controller_404 extends Controller
    {
        function __construct()
        {
            $this->view = new View();
        }
        function action_index()
        {
            if(isset($_SESSION['id']))
                $template = "template_view2.php";
            else $template = "template_view1";
            $this->view->generate("404_view.php", $template);
        }
    }
?>