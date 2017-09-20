<?php

	class Model_main extends Model {


		function getComments() {

			$this->get_query( 'SELECT * FROM tb_comments WHERE status=TRUE ORDER BY cdate DESC' );

			return $this->res;
		}
	}