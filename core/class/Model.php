<?php


	class Model {

		public $dbh;
		public $res;


		function __construct() {
			$this->dbh = new PDO( "mysql:dbname=db_test_m;", 'root' );
		}

		public function get_query( $sql ) {

			try {

				$this->res = $this->dbh->query( $sql, PDO::FETCH_ASSOC );

			} catch ( PDOException $e ) {
				print "Error!: " . $e->getMessage() . "<br/>";
				die();

			}
		}
	}
