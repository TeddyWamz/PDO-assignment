<?php
class dbconn{
    
    private $servername;
    private $username;
    private $password;
    private $dbname;
    

    public function connect(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "hello";
        
        

try {

    $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname;
    $pdo = new PDO($dsn,  $this->username, $this->password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;

}catch(PDOException $e){
    echo "connection failed: ".$e->getMessage();

}


  
    }
}

?>