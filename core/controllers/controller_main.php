<?php

    class Controller_main extends Controller
    {
        function __construct()
        {
            $this->model = new Model_main();
            $this->view = new View();
        }
        function action_page()
        {
            $data = $this->model->get_news();
            $this->view->show_view('news_view.php', 'template_view.php', $data);
        }

    }