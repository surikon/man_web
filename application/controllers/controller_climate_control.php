<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/13/18
 * Time: 9:40 PM
 */

class Controller_Climate_control extends Controller
{
    function __construct()
    {
        $this->view = new View();
        $this->model = new Model_Climate_control();
    }
    function action_index()
    {
        $result = $this->model->get_data();
        $result['form'] = $this->model->get_name_class($_SESSION['id']);
        $this->view->generate("climate_control_view.php", "template_view2.php", $result);
    }
}