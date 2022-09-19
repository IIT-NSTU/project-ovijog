<?php

/**
 * Admin Model works to retrieve, manipulate or delete data that is associated to the admin.
 * This Model is a representation of all data that is used by system admin and has the methods to change them.
 */
class Admin {

    /**
     * @var Database instance of database.
     */
    private $db;

    /**
     *  Constructor for Admin model, initialize the database instance.
     */
    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * This method fetch all the reports from database.
     *
     * @return mixed all the reports from database.
     */
    public function getAllReports(){
        $this->db->query('select * from reports');

        return $this->db->resultSet();
    }

    /**
     * Add a post category type to the database.
     *
     * @param $category: category name.
     * @return bool return ture if success false otherwise.
     */
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

    /**
     * Remove a post category type from the database.
     *
     * @param $category: category name.
     * @return bool return ture if success false otherwise.
     */
    public function removeCategory($category){
        $this->db->query("delete from post_categories where category = :category");
        $this->db->bind(':category',$category);
        return $this->db->execute();
    }

    /**
     * This method fetch all the users from database.
     *
     * @return mixed all the users.
     */
    public function getAllUsers(){
        $this->db->query("select * from users");

        return $this->db->resultSet();
    }

    /**
     * Delete a user from the database
     *
     * @param $id: user_id
     * @return bool return ture if success false otherwise.
     */
    public function deleteUser($id){
        $this->db->query("delete from users where user_id = :user_id");
        $this->db->bind(':user_id',$id);
        return $this->db->execute();
    }

    /**
     * This method fetch all the admins from database.
     *
     * @return mixed all the admins.
     */
    public function getAllAdmins(){
        $this->db->query("select * from users where isadmin=1");

        return $this->db->resultSet();
    }

    /**
     * Remove admin ship of a specified user.
     *
     * @param $id: specified user's user_id.
     * @return bool return ture if success false otherwise.
     */
    public function removeAdminShip($id){
        $this->db->query("update users set isadmin=0 where user_id=:user_id");
        $this->db->bind(':user_id',$id);

        return $this->db->execute();
    }

    /**
     * Give admin ship to a specified user.
     *
     * @param $id: specified user's user_id.
     * @return bool return ture if success false otherwise.
     */
    public function makeAdmin($id){
        $this->db->query("update users set isadmin=1 where user_id=:user_id");
        $this->db->bind(':user_id',$id);

        return $this->db->execute();
    }

}