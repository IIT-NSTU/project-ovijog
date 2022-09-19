<?php

/**
 * Comment Model handle all data manipulation associated to comment.
 * This Model is a representation of all data that is used for comment and has the methods to change them.
 */
class Comment {

    /**
     * @var Database instance of database.
     */
    private $db;

    /**
     *  Constructor for Comment model, initialize the database instance.
     */
    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * Add a comment to the database.
     *
     * @param $id: post_id
     * @param $comment: comment text
     * @return false|string
     */
    public function addComment($id, $comment) {
        $this->db->query("insert into comments (comment,user_id,post_id) values (:comment,:user_id,:post_id)");
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':post_id', $id);
        $this->db->bind(':comment', $comment);


        $this->db->execute();

        return $this->db->lastInsertId();

    }

    /**
     * Fetch a comment from database specified by comment_id.
     *
     * @param $id: comment_id
     * @return mixed fetched comment.
     */
    public function getComment($id) {
        $this->db->query("select * from comments where comment_id = :comment_id");
        $this->db->bind(':comment_id', $id);

        return $this->db->single();
    }

    /**
     * Fetch all comments from database for a post specified by post_id.
     *
     * @param $post_id: post_id
     * @return mixed all comments for a post.
     */
    public function getPostComment($post_id) {
        $this->db->query("select * from comments where post_id = :post_id ORDER BY created_time DESC");
        $this->db->bind(':post_id', $post_id);

        return $this->db->resultSet();
    }

}