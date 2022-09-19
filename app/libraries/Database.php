<?php

/**
 * Database class to efficiently and effectively write queries and perform.
 */
class Database {

    private static $instance;

    private $host=DB_HOST;
    private $user=DB_USER;
    private $pass=DB_PASS;
    private $dbname=DB_NAME;

    private $pdo;
    private $stmt;
    private $error;

    /**
     * Singleton constructor.
     */
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

    /**
     * @return Database instance of database.
     */
    public static function getInstance() {

        if(!isset(self::$instance)){
            self::$instance=new Database();
        }

        return self::$instance;
    }

    /**
     * Build a statement with given sql command
     *
     * @param $sql: sql command
     * @return void
     */
    public function query($sql){
        $this->stmt=$this->pdo->prepare($sql);
    }

    /**
     * Bind the values in the statement
     *
     * @param $param: parameter name
     * @param $value: value of the parameter
     * @param $type: type of the parameter [by default set to detect type auto]
     * @return void
     */
    public function bind($param, $value, $type=null){
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

    /**
     * Execute statement.
     *
     * @return mixed result.
     */
    public function execute(){
        return $this->stmt->execute();
    }

    /**
     * Returns result set as objects.
     *
     * @return mixed result set.
     */
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Returns a single row of the result as object.
     *
     * @return mixed single row.
     */
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Returns row count of the result.
     *
     * @return mixed row count.
     */
    public function rowCount(){
        return $this->stmt->rowCount();
    }

    /**
     * Returns last inserted id.
     *
     * @return false|string last inserted id if has one else false.
     */
    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }


}