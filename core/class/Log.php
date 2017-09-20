<?php


	class Log {

		static protected $instance = null;
		static private $E_errors;

		protected function __construct() {
		}

		protected function __clone() {
		}

		protected function __wakeup() {
		}

		static public function getInstance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new static();
			}

			return self::$instance;
		}


		public function setError( $val ) {
			self::$E_errors = $val;
		}

		public function getError() {
			return self::$E_errors;
		}


	}