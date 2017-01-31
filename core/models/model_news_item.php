<?php

    /**
     * Created by PhpStorm.
     * User: Alex
     * Date: 30.01.2017
     * Time: 23:45
     */
    class Model_news_item extends Model
    {
        function get_item_news($id)
        {

            $this-> get_query("
                                WITH c as (
                                    SELECT COUNT(id) c_id
                                    FROM tb_comments
                                    WHERE fk_tb_news=$id)
                                 
                                SELECT n.id,header,page_text, status, c.c_id as count_comm 
                                FROM tb_news n, c                             
                                WHERE id=$id"
                             );

            return $this->res;
        }


        function get_one_news($id)
        {

            $this-> get_query("
                                SELECT id, header, page_text, status, meta
                                FROM tb_news                               
                                WHERE id=$id");

            return $this->res;
        }





    }