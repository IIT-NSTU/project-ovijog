<?php

class Comment {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function addComment($id, $comment) {
        $this->db->query("insert into comments (comment,user_id,post_id) values (:comment,:user_id,:post_id)");
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':post_id', $id);
        $this->db->bind(':comment', $comment);


        $this->db->execute();

        return $this->db->lastInsertId();

    }

    public function getComment($id) {
        $this->db->query("select * from comments where comment_id = :comment_id");
        $this->db->bind(':comment_id', $id);

        return $this->db->single();
    }

    public function getPostComment($post_id) {
        $this->db->query("select * from comments where post_id = :post_id ORDER BY created_time DESC");
        $this->db->bind(':post_id', $post_id);

        return $this->db->resultSet();
    }

}