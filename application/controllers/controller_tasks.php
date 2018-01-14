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
            $result = $this->model->get_tasks($id);

            if(isset($_POST['add']))
            {
                $task_name = $_POST['name'];
                $task_description = $_POST['description'];
                $task_date = $_POST['date'];
                $this->model->add_task($id, $task_name, $task_description, $task_date);
            }

            if(isset($_POST['del']))
            {
                $tasks = $_POST['tasks'];
                $this->model->delete_tasks($tasks);
            }

            $this->view->generate('tasks_view.php', 'template_view2.php', $result);
        }
    }