<?php


	class Model_ncadmin extends Model {
		function getTableAdmin() {

			$this->get_query( "SELECT *
                               FROM tb_comments
                               ORDER BY cdate"
			);

			return $this->res;
		}


		function getUser( $login ) {
			$this->get_query( "SELECT * FROM user WHERE login='$login' LIMIT 1" );

			return $this->res->fetch();
		}

		function checkHash( $id, $hash ) {
			$this->get_query( "SELECT * FROM user WHERE id='$id' AND user_hash='$hash' LIMIT 1" );

			return $this->res->fetch();
		}

		function setHash( $id, $hash ) {
			$this->get_query( "UPDATE user SET user_hash = '$hash' WHERE id = '$id'" );

			return $this->res;
		}

		function deletePost( $id ) {

			$this->get_query( "DELETE FROM tb_comments WHERE id = $id" );

		}

		function getOnePost( $id ) {

			$this->get_query( "SELECT *FROM tb_comments WHERE id = $id" );

			return $this->res->fetch();
		}


		function changePost( $post ) {
			$res = array_diff( $post, $this->getOnePost( $post['id'] ) );
			$this->get_query( "UPDATE  tb_comments SET   name = '" . $post['name'] . "', COMMENT = '" . $post['comment'] . "', status = '" . ( $post['status'] ? 1 : 0 ) . "'" . ( isset( $res['comment'] ) || isset( $res['name'] ) ? ", admin_date_change=CURRENT_TIMESTAMP()" : '' ) . "  WHERE id = " . $post['id'] );

		}

	}