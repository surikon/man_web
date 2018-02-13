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

    }
}