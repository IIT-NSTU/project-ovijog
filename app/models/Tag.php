<?php

/**
 * Tag Model handle all data manipulation associated to Tags.
 */
class Tag {

    /**
     * @var Database instance of database.
     */
    private $db;

    /**
     * Default constructor for Tag model, initialize the database instance.
     */
    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * Fetch all the tags of a post.
     *
     * @param $post_id: post_id
     * @return mixed all tags of the specified post.
     */
    public function getTags($post_id) {
        $this->db->query("select tag from tags where post_id = :post_id");
        $this->db->bind(':post_id', $post_id);

        return $this->db->resultSet();
    }

    /**
     * Fetch all distinct tags used for all exsited posts.
     *
     * @return mixed all distinct tags.
     */
    public function getAllTags() {
        $this->db->query("select distinct tag from tags");

        return $this->db->resultSet();
    }
}
