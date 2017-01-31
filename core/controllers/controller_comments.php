<?php


    class Controller_comments extends Controller
    {
        function __construct()
        {
            $this->model = new Model_comments();
            $this->view = new View();
        }
        function action_page()
        {
            $data = $this->model->get_comments($_GET['id']);
            $this->view->show_view('', 'comments_view.php', $data);
        }
        function action_add_comment()
        {
             $this->model->add_comment($_GET);
        }
        function action_get_one()
        {
             $res = $this->model->get_one_commet($_GET['id']);
             $data = $res->fetch();
                echo json_encode($data);

        }



    }