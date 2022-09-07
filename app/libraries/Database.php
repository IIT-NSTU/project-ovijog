<?php

class Database {

    private static $instance;

    private $host=DB_HOST;
    private $user=DB_USER;
    private $pass=DB_PASS;
    private $dbname=DB_NAME;

    private $pdo;
    private $stmt;
    private $error;

    private function __construct() {

        $dsn="mysql:host=".$this->host.";dbname=".$this->dbname;
        $options=array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->pdo=new PDO($dsn,$this->user,$this->pass,$options);
        }catch (PDOException $e){
            $this->error=$e->getMessage();
            echo $this->error;
        }
    }

    public static function getInstance() {

        if(!isset(self::$instance)){
            self::$instance=new Database();
        }

        return self::$instance;
    }

    public function query($sql){
        $this->stmt=$this->pdo->prepare($sql);
    }

    public function bind($param,$value,$type=null){
        if(is_null($type)){
            if(is_int($value)){
                $type=PDO::PARAM_INT;
            }elseif(is_bool($value)){
                $type=PDO::PARAM_BOOL;
            }elseif (is_null($value)){
                $type=PDO::PARAM_NULL;
            }else{
                $type=PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param,$value,$type);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }

    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }


}