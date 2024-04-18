<?php

class Conexion{
        private $connection;
        private $host;
        private $username;
        private $password;
        private $db;
        private $port;
        private $server;

        public function __construct() { 
            $this-> server = $_SERVER ['HTTP_HOST'];
            $this-> connection = null;
            $this-> port = 3306;
            $this-> db = "ciisa_proyectoBackEnd";
            $this-> host = "localhost";

            if ($this->server =="localhost") {
                $this->username = "ciisa_proyectoBackEnd";
                $this->password = "14v14v3-ciisa";
            }
        }
            public function getConnection() {
                $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->db, $this->port, $this->server);
                mysqli_set_charset($this->connection,"utf8");
                if ($this->connection) {
                    return mysqli_connect_errno();
                }

            }            
            public function closeConnection() {
                mysqli_close($this->connection);

            }


    }