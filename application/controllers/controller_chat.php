<?php

class Controller_Chat extends Controller
{
    function __construct()
    {
        $this->view = new View();
        $this->model = new Model_Chat();
    }

    function action_index()
    {
        $id = $_SESSION['id'];
        $result = $this->model->get_necessary_info($id);
        $this->view->generate("chat_view.php", "template_view2.php", $result);
    }

    function action_get_all_messages()
    {
        $id = $_SESSION['id'];
        $result = $this->model->get_all_chat($id);
        print_r($result['html']);
    }

    function action_put_message()
    {
        $id = $_SESSION['id'];
        $message = htmlspecialchars(strip_tags($_POST['message']));

        if(trim($message) == "")
            return;

        $result = $this->model->set_data($id, $message);
        print_r($result['add_html']);
    }
}
?>
