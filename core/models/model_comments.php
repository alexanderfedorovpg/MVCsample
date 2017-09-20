<?php


	class Model_comments extends Model {
		function getComments() {

			$this->get_query( 'SELECT * FROM tb_comments WHERE status=TRUE ORDER BY cdate' );

			return $this->res;
		}

		function addComment( $get ) {
			$this->get_query( "INSERT INTO tb_comments(name, comment, email, path_img ) VALUES ('" . $get['name'] . "','" . $get['comment'] . "','" . $get['email'] . "','" . $get['path_img'] . "')" );

		}

		function delComment( $id ) {

			$this->get_query( "DELETE FROM tb_comments WHERE id=$id" );

		}

		function getOneCommet( $id ) {

			$this->get_query( "SELECT * FROM tb_comments WHERE id=$id" );

			return $this->res;

		}

		function updateComment( $post ) {

			$this->get_query( "UPDATE tb_comments SET name ='" . $post['name'] . "', COMMENT = '" . $post['comment'] . "', cdate = 'CURRENT_TIMESTAMP()'   WHERE id=" . $post['pid'] );


		}

		function setCommentStatus( $post ) {

			$this->get_query( "UPDATE tb_comments SET status ='" . $post['status'] . "'   WHERE id=" . $post['pid'] );


		}

	}