<?php


    class Model_ncadmin extends Model
    {
        function get_table_admin()
        {

            $this-> get_query("SELECT id, header, page_text, status, meta, date
                               FROM tb_news
                               ORDER BY 1"
            );

            return $this->res;
        }
        function delete_post($id)
        {

            $this-> get_query("DELETE FROM tb_news WHERE id=$id");
            $this-> get_query("DELETE FROM tb_comments WHERE fk_tb_news=$id");

        }
        function post_add($post)
        {

            $this-> get_query("INSERT INTO tb_news (header, page_text, meta) VALUES ('".$post['header']."','".$post['page_text']."','".$post['meta']."' ) ");


        }

        function change_post($post)
        {

            $this-> get_query("UPDATE  tb_news SET   header='".$post['header']."', page_text='".$post['page_text']."', meta='".$post['meta']."', status='".$post['status']."' WHERE id= ".$post['id'] );


        }

    }