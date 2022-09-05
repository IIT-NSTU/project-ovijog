<?php

class Post
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }


    public function getCategories()
    {
        $this->db->query('SELECT * FROM post_categories');
        return $this->db->resultSet();
    }

    public function getPosts()
    {
        $this->db->query('SELECT * FROM posts NATURAL JOIN users ORDER BY posts.created_time DESC');
        return $this->db->resultSet();
    }

    public function addPost($data)
    {
        $this->db->query("insert into posts (title, user_id, category, issolved, body, img_link) values (:title, :user_id, :category, false, :body, :img_link)");

        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':img_link', $data['image']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePost($data)
    {
        $this->db->query("update posts set title = :title, body = :body where id = :id");

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePost($id)
    {
        $this->db->query("delete from posts where id = :id");

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPostById($id)
    {
        $this->db->query('select * from posts where post_id = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }
}
