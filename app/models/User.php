<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function findUserByEmail($email)
    {
        $this->db->query("Select * from users where edu_mail = :email");
        $this->db->bind(":email", $email);

        $res = $this->db->single();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserById($id)
    {
        $this->db->query("Select * from users where user_id = :id");
        $this->db->bind(":id", $id);

        return $this->db->single();
    }

    public function register($data)
    {
        $this->db->query("insert into users (first_name,last_name,edu_mail,pass_hash,isverified,isadmin)
                                values (:fname,:lname,:edu_email,:password,false,false)");

        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':lname', $data['lname']);
        $this->db->bind(':edu_email', $data['edu_email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
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
}
