<?php

  class DBconnection{
    private $host = "localhost" ;
    private $user = "root" ;
    private $dbName = "entreprise" ;
    private $password = "" ;
  

   public function connection() {
    try{
        $dsn = "mysql:host=$this->host;dbname=$this->dbName;";
                $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE =>
                            PDO::FETCH_ASSOC, PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'] ;
                $conn = new PDO($dsn, $this->user, $this->password, $options) ;
                return $conn ;
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
   }
  }

  $connection = new DBConnection();
  $conn = $connection->connection();
?>
