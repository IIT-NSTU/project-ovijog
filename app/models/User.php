<?php

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findUserByEmail($email) {
        $this->db->query("Select * from users where edu_mail = :email");
        $this->db->bind(":email", $email);

        $res = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return $res;
        } else {
            return false;
        }
    }

    public function getUserById($id) {
        $this->db->query("Select * from users where user_id = :id");
        $this->db->bind(":id", $id);

        return $this->db->single();
    }

    public function register($data) {
        $this->db->query("insert into users (first_name,last_name,edu_mail,pass_hash,isverified,isadmin)
                                values (:fname,:lname,:edu_email,:password,false,false)");

        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':lname', $data['lname']);
        $this->db->bind(':edu_email', $data['edu_email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            $this->sendVerifyMail($data['edu_email']);
            return true;
        } else {
            return false;
        }
    }

    public function verify($user_id,$key){
        $this->db->query("select * from verify_keys where user_id = :user_id and v_key = :v_key");
        $this->db->bind(':user_id',$user_id);
        $this->db->bind(':v_key',$key);
        $this->db->execute();

        if($this->db->rowCount()==0){
            return false;
        }else{
            $this->db->query("update users set isverified = true where user_id = :user_id");
            $this->db->bind(':user_id',$user_id);
            $this->db->execute();
            return true;
        }
    }

    public function sendVerifyMail($mail){
        $user_id=$this->db->lastInsertId();

        $key=bin2hex($user_id).bin2hex(random_bytes(16));

        try{
            $this->db->query("insert into verify_keys (user_id, v_key) values (:user_id, :v_key)");
            $this->db->bind(':user_id',$user_id);
            $this->db->bind(':v_key',$key);
            $this->db->execute();
        }catch (PDOException $e){
            $this->db->query("update verify_keys set v_key = :v_key where user_id = :user_id");
            $this->db->bind(':user_id',$user_id);
            $this->db->bind(':v_key',$key);
            $this->db->execute();
        }

        $link=URLROOT.'/users/verify?id='.$user_id.'&key='.$key;

        sendMail($mail,$link);
    }


    public function sendChangePasswordMail($user_id,$mail){

        $key=bin2hex($user_id).bin2hex(random_bytes(16));

        try{
            $this->db->query("insert into verify_keys (user_id, v_key) values (:user_id, :v_key)");
            $this->db->bind(':user_id',$user_id);
            $this->db->bind(':v_key',$key);
            $this->db->execute();
        }catch (PDOException $e){
            $this->db->query("update verify_keys set v_key = :v_key where user_id = :user_id");
            $this->db->bind(':user_id',$user_id);
            $this->db->bind(':v_key',$key);
            $this->db->execute();
        }

        $link=URLROOT.'/users/forgetPassword?id='.$user_id.'&key='.$key;

        sendMail($mail,$link);
    }

    public function login($email, $password) {
        $this->db->query('select * from users where edu_mail = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->pass_hash;

        if (password_verify($password, $hashed_password)) {
            //die('varified '.$email);
            return $row;
        } else {
            //die('invalid '.$password);
            return false;
        }
    }

    public function verifyPassword($password) {
        $this->db->query('select * from users where user_id = :user_id');
        $this->db->bind(':user_id', $_SESSION['user_id']);

        $row = $this->db->single();

        $hashed_password = $row->pass_hash;

        if (password_verify($password, $hashed_password)) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($hashedPassword, $id=-1){
        $this->db->query('update users set pass_hash = :pass_hash where user_id = :user_id');
        $this->db->bind(':pass_hash', $hashedPassword);
        if($id==-1){
            $this->db->bind(':user_id', $_SESSION['user_id']);
        }else{
            $this->db->bind(':user_id', $id);
        }

        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }


    public function getPosts() {
        $user_id = $_SESSION['user_id'];

        $this->db->query("select * from posts where user_id = :user_id ORDER BY created_time DESC");
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }

    public function getVotedPosts($page){
        $user_id = $_SESSION['user_id'];
        $limit=4;
        $row=($page-1)*$limit;

        $this->db->query("SELECT * 
                                FROM users NATURAL JOIN votes JOIN posts ON posts.post_id=votes.post_id
                                WHERE users.user_id=:user_id
                                ORDER BY created_time DESC limit :row, :limit");

        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':row',$row);
        $this->db->bind(':limit',$limit);

        return $this->db->resultSet();
    }

    public function getCommentedPosts($page){
        $user_id = $_SESSION['user_id'];
        $limit=4;
        $row=($page-1)*$limit;

        $this->db->query("SELECT distinct posts.post_id,title,body,category,issolved,posts.created_time,img_link
                                FROM users NATURAL JOIN comments JOIN posts ON posts.post_id=comments.post_id
                                WHERE users.user_id=:user_id
                                ORDER BY posts.created_time DESC limit :row, :limit");

        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':row',$row);
        $this->db->bind(':limit',$limit);

        return $this->db->resultSet();
    }

    public function getCreatedPosts($page){
        $user_id = $_SESSION['user_id'];
        $limit=4;
        $row=($page-1)*$limit;

        $this->db->query("SELECT * 
                                FROM posts
                                WHERE user_id=:user_id
                                ORDER BY created_time DESC limit :row, :limit");

        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':row',$row);
        $this->db->bind(':limit',$limit);

        return $this->db->resultSet();
    }
}
