<?php
    class dbConnect {
        private $host = '20.55.45.25';
        private $dbName = 'canvasdb';
        private $user = "XDiaz241";
        private $pass = 'XDSandman2388';

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