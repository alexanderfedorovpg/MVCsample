<?php


	class View {

		public $template_view;
		public $content_view;
		public $error_message;
		function showView( $content_view, $template_view, $data = null ) {

			include "core/view/" . $template_view;

		}
	}