<?php

	/**
	 * Class Controller_main
	 */
	class Controller_main extends Controller {

		/**
		 * Controller_main constructor.
		 */
		function __construct() {
			parent::__construct();
			$this->model = new Model_main();
		}

		/**
		 * Метод посторения главной страницы
		 */
		function action_page() {
			$data = $this->model->getComments();
			$this->view->showView( 'main_view.php', 'template_view.php', $data );
		}

	}