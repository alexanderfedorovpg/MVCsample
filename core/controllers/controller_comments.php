<?php


	/**
	 * Class Controller_comments
	 */
	class Controller_comments extends Controller {

		/**
		 * Controller_comments constructor.
		 */
		function __construct() {
			parent::__construct();
			$this->model = new Model_comments();
		}

		/**
		 * Метод добавления нвого комментария
		 */
		function action_add_comment() {
			$options = array(
				'name'    => FILTER_SANITIZE_STRING,
				'email'   => FILTER_VALIDATE_EMAIL,
				'comment' => FILTER_SANITIZE_STRING,
			);

			$data = filter_var_array( $_POST, $options );

			$uploaddir       = 'uploads/';                                                                            // Диретория загрузки
			$file_mime_types = array(
				'image/png',
				'image/jpeg',
				'image/bmp',
				'image/gif',
			);

			if ( $data['name'] && $data['email'] && $data['comment'] ) {

				$file              = $_FILES['image'];
				$file_types        = array( 'png', 'jpg', 'jpeg', 'gif' );
				$current_file_type = substr( strrchr( $file['name'], '.' ), 1 );
				if ( $file && in_array( $current_file_type, $file_types ) && in_array( $file['type'],
						$file_mime_types )                                                                                  // Проверка типа файла
				) {
					$uploadfile = $uploaddir . basename( $file['name'] );

					$image = new Imagick( $file['tmp_name'] );
					if ( $image->getImageWidth() >= 320 ) {
						$image->thumbnailImage( 320, 0 );
						$image->writeImage( $file['tmp_name'] );
					}

					if ( move_uploaded_file( $file['tmp_name'], $uploadfile ) ) {

						$data['path_img'] = $uploadfile;
					} else {
						error_log( "Ошибка загрузки файла" . $file['name'] );
						Log::getInstance()->setError( "Ошибка загрузки файла" );
					}
				} else {
					$data['path_img'] = $uploaddir . "default.jpg";
				}

				$this->model->addComment( $data );
			} else {

				Log::getInstance()->setError( "Ошибка данных формы" );

			}

			header( "Location: /" );
			die();

		}

		/**
		 * Ajax получение комментария
		 */
		function action_get_one() {
			$res  = $this->model->getOneCommet( $_GET['id'] );
			$data = $res->fetch();
			echo json_encode( $data );

		}


	}