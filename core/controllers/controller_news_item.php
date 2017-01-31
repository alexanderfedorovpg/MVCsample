<?php

    /**
     * Created by PhpStorm.
     * User: Alex
     * Date: 30.01.2017
     * Time: 04:26
     */
    class Controller_news_item extends Controller
    {
        function __construct()
        {
            $this->model = new Model_news_item();
            $this->view = new View();
        }

        function action_page()
        {
            $res = $this->model->get_item_news($_GET['id']);
            $data = $res->fetch(PDO::FETCH_LAZY);
            $this->view->show_view('news_item_view.php', 'template_view.php',$data);
        }

        function action_get_one_news(){

            $res = $this->model->get_one_news($_GET['id']);
            $data = $res->fetch();
            echo json_encode($data);
        }

    }