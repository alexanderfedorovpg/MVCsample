<?php

    class controller_404 extends Controller
    {
            function action_page()
            {
               $this->view->show_view('404_view.php', 'template_view.php');
            }

    }