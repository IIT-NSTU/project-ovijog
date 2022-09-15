<?php

class Tag
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getTags($post_id)
    {
        $this->db->query("select tag from tags where post_id = :post_id");
        $this->db->bind(':post_id', $post_id);

        return $this->db->resultSet();
    }

    public function getAllTags(){
        $this->db->query("select distinct tag from tags");

        return $this->db->resultSet();
    }
}
