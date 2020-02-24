<?php
    namespace Dbc;

    class Dbc{
        
        protected $db;
        
        function __construct(){
            require_once ("./Model/db_config.php");
            $this->db=new \mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            
            if(mysqli_connect_errno()){
                echo "Could not connect to database";
                exit;
            }
        }
    }
?>