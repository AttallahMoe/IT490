<?php
    class dbConnect {
        private $host = 'localhost';
        private $dbName = 'youtube';
        private $user = "root";
        private $pass = '';

        public function connect(){
            try{
                $conn = new PDO('mysql:host=' . $this->host . '; dbName=' . $this->dbName . '; user=' . $this->user . '; pass=' . $this->pass );
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            }   catch (PDOException $e) {
                    echo 'Database Error: ' . $e->getMessage();
            }
        }
    }