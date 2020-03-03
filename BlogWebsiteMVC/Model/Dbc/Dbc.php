<?php
    namespace Dbc;

    /**
     * Provides Batabase Connection
     */

    class Dbc{
        
       /**
        * Handles Database connection
        *
        * @var $db
        *
        * Initialize DB server, username, password and database
        *
        */
        
        protected $db;
        
        function __construct(){
            require_once ("db_config.php");
            $this->db=new \mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            
            if(mysqli_connect_errno()){
                echo "Could not connect to database";
                exit;
            }
        }
    }
?>