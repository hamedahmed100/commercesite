<?php
class Database{
    private $host = "ec2-54-211-255-161.compute-1.amazonaws.com";
    private $db_name = "d9p5kjt7iubb6f";
    private $username = "vueqsgmjtwqycw";
    private $password = "5b2de5e753b6ea05a8ab09617d3d000fcaaa0257cf3c4af4f5956a9027108771";
    public $conn;
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("pgsql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(Exception $exception){}
        return $this->conn;
    }
}
