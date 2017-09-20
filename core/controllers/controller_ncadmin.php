<?php

	class Controller_ncadmin extends Controller {
		/**
		 * @var string
		 */
		public $action;

		/**
		 * Controller_ncadmin constructor.
		 */
		function __construct() {
			parent::__construct();
			$this->model  = new Model_ncadmin();
			$this->action = isset( $_POST['action'] ) ? $_POST['action'] : '';
		}


		/**
		 * Метод посторения страницы административной панели
		 */
		function action_page() {


			if ( isset( $_COOKIE['id'] ) and isset( $_COOKIE['hash'] ) ) {


				$userdata = $this->model->checkHash( intval( $_COOKIE['id'] ), $_COOKIE['hash'] );


				if ( ( $userdata['user_hash'] !== $_COOKIE['hash'] ) or ( $userdata['id'] !== $_COOKIE['id'] ) ) {

					setcookie( "id", "", time() - 3600 * 24 * 30 * 12, "/" );

					setcookie( "hash", "", time() - 3600 * 24 * 30 * 12, "/" );


				} else {

					switch ( $this->action ) {

						case 'post_del':
							$this->model->deletePost( $_POST['post_id'] );
							break;

						case 'post_change':
							$this->model->changePost( $_POST );
							break;

					}

					$data = $this->model->getTableAdmin();
					$this->view->showView( 'ncadmin_view.php', 'template_view.php', $data );

				}

			} else {

				$this->view->showView( 'ncadmin_login_view.php', 'template_view.php' );

			}


		}

		/**
		 * Метод авторизации админитстатора
		 */
		function action_login() {


			if ( isset( $_POST['enter'] ) ) {


				$user = $this->model->getUser( $_POST['login'] );


				if ( $user['password'] === md5( md5( $_POST['password'] ) ) ) {

					$hash = md5( $this->generateCode( 10 ) );

					setcookie( "id", intval( $user['id'] ), time() + 60 * 60 * 24 * 30 );

					setcookie( "hash", $hash, time() + 60 * 60 * 24 * 30 );

					$user = $this->model->setHash( $user['id'], $hash );


					header( "Location: /ncadmin" );
					exit();

				} else {

					$data = "Вы ввели неправильный логин/пароль";
					$this->view->showView( 'ncadmin_login_view.php', 'template_view.php', $data );

				}

			} else {
				$data = "Вы ввели неправильный логин/пароль";
				$this->view->showView( 'ncadmin_login_view.php', 'template_view.php', $data );

			}

		}

		/**
		 * Выход из админ панели
		 */
		function action_logout() {
			setcookie( "id", "", time() - 3600 );
			setcookie( "hash", "", time() - 3600 );
			header( "Location: /" );
			header( "Refresh:2" );
			exit();
		}


		/**Генератора хеша
		 *
		 * @param int $length
		 *
		 * @return string
		 */
		function generateCode( $length = 6 ) {

			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

			$code = "";

			$clen = strlen( $chars ) - 1;
			while ( strlen( $code ) < $length ) {

				$code .= $chars[ mt_rand( 0, $clen ) ];
			}

			return $code;

		}


	}