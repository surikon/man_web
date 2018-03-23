<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/31/18
 * Time: 8:11 PM
 */

class Controller_Admin extends Controller
{
    function __construct()
    {
        $this->model = new Model_Admin();
        $this->view = new View();
    }
    function action_index()
    {

    }
}