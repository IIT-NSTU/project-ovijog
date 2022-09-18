<?php

class Admin {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAllReports(){
        $this->db->query('select * from reports');

        return $this->db->resultSet();
    }

    public function addCategory($category){
        $this->db->query("insert into post_categories (category) values (:category)");
        $this->db->bind(':category',$category);

        try{
            $this->db->execute();
            return true;
        }catch (PDOException $e){
            return false;
        }
    }

    public function removeCategory($category){
        $this->db->query("delete from post_categories where category = :category");
        $this->db->bind(':category',$category);
        $this->db->execute();
    }

}