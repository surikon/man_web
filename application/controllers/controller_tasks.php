<?php
    class Controller_Tasks extends Controller
    {
        function __construct()
        {
            $this->view = new View();
            $this->model = new Model_Tasks();
        }
        function action_index()
        {
            $id = $_SESSION['id'];

            if(isset($_POST['add']))
            {
                $task_name = $_POST['name'];
                $task_description = $_POST['description'];
                $task_date = $_POST['date'];
                $status = $_POST['status'];
                $this->model->add_task($id, $task_name, $task_description, $task_date, $status);
            }

            if(isset($_POST['del']) && !empty($_POST['tasks']))
            {
                $tasks = $_POST['tasks'];
                $this->model->delete_tasks($tasks);
            }

            $result = $this->model->get_tasks($id);

            $this->view->generate('tasks_view.php', 'template_view2.php', $result);
        }
    }