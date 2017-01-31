<?php

    class Model_main extends Model
    {


        function get_news()
        {

            $this-> get_query('SELECT * FROM tb_news WHERE status=true ORDER BY 1 ');

            return $this->res;
        }
    }