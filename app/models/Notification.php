<?php

/**
 * Notification Model handle all data manipulation associated to notification.
 * This Model is a representation of all data that is used for notification and has the methods to change them.
 */
class Notification {

    /**
     * @var Database instance of database.
     */
    private $db;

    /**
     *  Default constructor for Notification model, initialize the database instance.
     */
    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * Add a notification to the database for a user associate to a post
     *
     * @param $user_id: user_id for whom the notification is.
     * @param $post_id: post_id of the post the notification associated with.
     * @param $text: notification text.
     * @return void
     */
    public function addNotification($user_id, $post_id, $text){
        $this->db->query('insert into notifications (user_id,post_id,text) values (:user_id,:post_id,:text)');

        $this->db->bind(':user_id',$user_id);
        $this->db->bind(':post_id',$post_id);
        $this->db->bind(':text',$text);

        $this->db->execute();
    }

    /**
     * This method fetch all the notification from database.
     *
     * @return mixed all the notification.
     */
    public function getAllNotification(){
        $this->db->query('select * from notifications where user_id = :user_id order by notification_id desc');

        $this->db->bind(':user_id',$_SESSION['user_id']);

        return $this->db->resultSet();
    }

}