<?php
    class Database{   
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'cuoiki1';

    private $conn = NULL;
    #Connect
    public function connect(){
        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if(!$this->conn){
            echo 'Failed connection';
            exit;
        }else{
            mysqli_set_charset($this->conn, 'utf8');
           // echo 'Connected';
        }
        return $this->conn;      
    }
   
}
?>