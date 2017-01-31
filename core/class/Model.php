<?php


    class Model
    {

        public $dbh;
        public $res;


        function __construct()
        {
            $this->dbh =  new PDO("pgsql:dbname=db_news;user=postgres;password=;");
        }

        public function get_query($sql){

            try {

                $this->res = $this->dbh->query($sql, PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }


        }



    }
