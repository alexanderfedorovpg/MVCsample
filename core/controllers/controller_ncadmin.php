<?php


    class Controller_ncadmin extends Controller
    {
        public $action;

        function __construct()
        {
            $this->model = new Model_ncadmin();
            $this->view = new View();
            $this->action = isset($_POST['action'])? $_POST['action'] : '';
        }
        function action_page()
        {
            switch ($this->action){

                case 'post_del':  $this->model->delete_post($_POST['post_id']);
                    break;

                case 'post_change': $this->model->change_post($_POST);
                    break;

                case 'post_add': $this->model->post_add($_POST);
                     break;
            }

            $data = $this->model->get_table_admin();
            $this->view->show_view('ncadmin_view.php', 'template_view.php', $data);

        }



        function action_comments()
        {


            include  "core/models/model_comments.php";
            $model_comments = new Model_comments();

            switch ($this->action){

                case 'comments_del': $model_comments->del_comment($_POST['comm_id']);
                    break;

                case 'comm_change': $model_comments->update_comment($_POST);
                    break;
            }


            $data = $model_comments->get_comments($_GET['id']);
            $this->view->show_view('nc_admin_comments_view.php', 'template_view.php', $data);

        }



    }