<?php


 class View
    {
        public $template_view;
        public $content_view;

        function show_view($content_view, $template_view, $data = null  ){

                include "core/view/".$template_view;

        }
    }