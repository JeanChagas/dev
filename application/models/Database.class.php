<?php

    class Database{
        
        private $host;
        private $user;
        private $pass;
        private $db;
        private $message_error;
        public $dbconnect;
        public $tabela;
        
           
      

        public function __construct(){
            $this->host = DB_HOST;			
            $this->user= DB_USER;
            $this->pass = DB_PASS;
            $this->db = DB_NAME;
            $this->message_error = MYSQL_CONN_ERROR;   
            
            try{
                $this->dbconnect = new PDO(
                    'mysql:host='.$this->host.';dbname='.$this->db, 
                    $this->user, 
                    $this->pass, 
                    array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => DB_CHARSET
                    )
                );
               
                
            } catch (PDOException $e) {
                die($this->message_error." Erro ".$e->getCode());
            }
        }
               
       
    }
