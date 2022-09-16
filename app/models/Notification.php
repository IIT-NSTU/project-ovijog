<?php

class Notification {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function addNotification($user_id,$post_id,$text){
        $this->db->query('insert into notifications (user_id,post_id,text) values (:user_id,:post_id,:text)');

        $this->db->bind(':user_id',$user_id);
        $this->db->bind(':post_id',$post_id);
        $this->db->bind(':text',$text);

        $this->db->execute();
    }

    public function getAllNotification(){
        $this->db->query('select * from notifications where user_id = :user_id order by notification_id desc');

        $this->db->bind(':user_id',$_SESSION['user_id']);

        return $this->db->resultSet();
    }

}