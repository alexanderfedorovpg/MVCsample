<?php


    class Model_comments extends Model
    {
        function get_comments($id)
        {

            $this-> get_query('SELECT id, full_name, comment  FROM tb_comments WHERE fk_tb_news='.$id.'ORDER BY id');

            return $this->res;
        }

        function add_comment($get)
        {
            $this-> get_query("INSERT INTO tb_comments(full_name,comment, fk_tb_news) VALUES ('".$get['full_name']."' ,'".$get['comment']."',".$get['fk_tb_news'].")");

        }

        function del_comment($id){

            $this-> get_query("DELETE FROM tb_comments WHERE id=$id");

        }
        function get_one_commet($id){

            $this-> get_query("SELECT id, full_name, comment FROM tb_comments WHERE id=$id");

            return $this->res;

        }function update_comment($post){

            $this-> get_query("UPDATE tb_comments SET full_name ='".$post['full_name']."', comment = '".$post['comment']."'  WHERE id=".$post['pid']);


        }

    }