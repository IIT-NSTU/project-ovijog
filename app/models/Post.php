<?php

class Post
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getViewCount($post_id){
        $this->db->query("select * from views where post_id = :post_id");
        $this->db->bind(':post_id',$post_id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function addView($post_id){
        $this->db->query("insert into views (user_id,post_id) values (:user_id,:post_id)");
        $this->db->bind(':user_id',$_SESSION['user_id']);
        $this->db->bind(':post_id',$post_id);

        try{
            $this->db->execute();
        }catch (PDOException $e){
            //ignoring multiple views from a single user
        }

    }

    public function getUpVotes($post_id){
        $this->db->query("select * from votes where isagree = 1 and post_id = :post_id");
        $this->db->bind(':post_id',$post_id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getDownVotes($post_id){
        $this->db->query("select * from votes where isagree = 0 and post_id = :post_id");
        $this->db->bind(':post_id',$post_id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function vote($post_id,$isagree){
        if($this->isVoted($post_id)!=null){

            //die('vote:'.$this->getVote($post_id));

            if($this->getVote($post_id)==$isagree){
                //die('delete');

                //die('id:'.$_SESSION['user_id'].' p_id:'.$post_id);

                $this->db->query("delete from votes where user_id = :user_id and post_id = :post_id");
                $this->db->bind(':user_id',$_SESSION['user_id']);
                $this->db->bind(':post_id',$post_id);

                if($this->db->execute()){
                    //die("del sus");
                }else{
                    //die('not sus');
                }

            }else{
                //die('update');
                $this->db->query("update votes set isagree=:isagree where user_id = :user_id and post_id = :post_id");
                $this->db->bind(':user_id',$_SESSION['user_id']);
                $this->db->bind(':post_id',$post_id);
                $this->db->bind(':isagree',$isagree);

                if($this->db->execute()){
                    //die("update sus");
                }else{
                    //die('not sus');
                }
            }

        }else{
            //die('new');
            $this->db->query("insert into votes (user_id,post_id,isagree) values (:user_id,:post_id,:isagree)");
            $this->db->bind(':user_id',$_SESSION['user_id']);
            $this->db->bind(':post_id',$post_id);
            $this->db->bind(':isagree',$isagree);

            if($this->db->execute()){
                //die("new sus");
            }else{
                //die('not sus');
            }
        }
    }

    public function isVoted($post_id){
        $this->db->query("select * from votes where user_id = :user_id and post_id = :post_id");
        $this->db->bind(':user_id',$_SESSION['user_id']);
        $this->db->bind(':post_id',$post_id);

        $this->db->execute();

        $count=$this->db->rowCount();

        //die('c:'.$count);

        return $count!=0;
    }

    public function getVote($post_id){
        $this->db->query("select * from votes where user_id = :user_id and post_id = :post_id");
        $this->db->bind(':user_id',$_SESSION['user_id']);
        $this->db->bind(':post_id',$post_id);

        return $this->db->single()->isagree;
    }

    public function getCategories()
    {
        $this->db->query('SELECT * FROM post_categories');
        return $this->db->resultSet();
    }

    public function getAllPosts()
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
