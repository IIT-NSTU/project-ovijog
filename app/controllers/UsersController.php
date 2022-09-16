<?php

class UsersController extends Controller {

    private $userModel;
    private $postModel;
    private $tagModel;

    public function __construct() {
        $this->userModel = $this->model("User");
        $this->postModel = $this->model("Post");
        $this->tagModel = $this->model("Tag");
    }

    public function loadPosts($type='created',$page = 1) {
        sleep(1);

        if($type=='created'){
            $posts = $this->userModel->getCreatedPosts($page);
        }else if($type=='voted'){
            $posts = $this->userModel->getVotedPosts($page);
        } else{
            $posts = $this->userModel->getCommentedPosts($page);
        }


        $upCount = [];
        $downCount = [];

        $viewCount = [];

        $tags = [];

        foreach ($posts as $post) {
            $upCount[$post->post_id] = $this->postModel->getUpVotes($post->post_id);
            $downCount[$post->post_id] = $this->postModel->getdownVotes($post->post_id);
            $viewCount[$post->post_id] = $this->postModel->getViewCount($post->post_id);

            $tags[$post->post_id] = $this->tagModel->getTags($post->post_id);
        }

        $data = [
            'posts' => $posts,
            'up-count' => $upCount,
            'down-count' => $downCount,
            'view-count' => $viewCount,
            'tags' => $tags
        ];


        $this->view('users/profilePostList', $data);
    }

    public function profile() {
        security();

        $data = [
            'user' => $this->userModel->getUserById($_SESSION['user_id']),
        ];

        $this->view('/users/profile', $data);
    }

    public function register() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'fname' => trim($_POST['fname']),
                'lname' => trim($_POST['lname']),
                'edu_email' => trim($_POST['edu_email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'fname_err' => '',
                'lname_err' => '',
                'edu_email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            if (empty($data['edu_email'])) {
                $data['edu_email_err'] = 'Please enter email';
            } elseif (!preg_match('/^[a-zA-Z0-9+_.-]+@*[a-zA-Z.]*.nstu.edu.bd/', $data['edu_email'])) {
                $data['edu_email_err'] = 'Please enter a valid nstu edu email';
            } else {
                if ($this->userModel->findUserByEmail($data['edu_email'])) {
                    $data['edu_email_err'] = 'This email is already taken';
                }
            }

            if (empty($data['fname'])) {
                $data['fname_err'] = 'Please enter first name';
            }

            if (empty($data['lname'])) {
                $data['lname_err'] = 'Please enter last name';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 character';
            }

            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Password not matched';
                }
            }

            if (empty($data['edu_email_err']) && empty($data['fname_err']) && empty($data['lname_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                //die('SUCCESS');
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->register($data)) {
                    flash('register_success', 'You are registered can log in');
                    redirect('users/login');
                } else {
                    die("something went wrong");
                }
            }

            $this->view('/users/register', $data);
        } else {
            $data = [
                'fname' => '',
                'lname' => '',
                'edu_email' => '',
                'password' => '',
                'confirm_password' => '',
                'fname_err' => '',
                'lname_err' => '',
                'edu_email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            $this->view('/users/register', $data);
        }
    }

    public function verify() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $user_id = $_GET['id'];
            $key = $_GET['key'];

            if ($this->userModel->verify($user_id, $key)) {
                flash('register_success', 'verification successful you can log in now');
                redirect('users/login');
            } else {
                die('BAD REQUEST');
            }


        } else {
            die('BAD REQUEST');
        }
    }

    public function login() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];

            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 character';
            } else {
                if (!empty($data['email']) && !$this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Invalid email address';
                    $data['password_err'] = 'Invalid password';
                }
            }

            if (empty($data['email_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['email_err'] = 'Invalid email address';
                    $data['password_err'] = 'Invalid password';
                }
            }

            $this->view('/users/login', $data);
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];

            $this->view('/users/login', $data);
        }
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['user_name'] = $user->fname . ' ' . $user->lname;
        $_SESSION['user_email'] = $user->edu_mail;
        $_SESSION['is_admin'] = $user->isadmin;

        if ($user->isadmin) {
            redirect('/admins');
        } else {
            redirect('pages/home');
        }

    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        session_destroy();
        redirect('users/login');
    }

    public function sendChangePasswordRequest() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $res = $this->userModel->findUserByEmail($_POST['email']);
            if ($res) {
                $this->userModel->sendChangePasswordMail($res->user_id, $_POST['email']);
                $data = ['res' => 'ok'];
                echo json_encode($data);
            } else {
                echo "No account exist with provided email";
            }
        }
    }

    public function forgetPassword() {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            if ($this->userModel->verify($_GET['id'], $_GET['key'])) {

                $data = [
                    'user_id' => $_GET['id'],
                ];

                $this->view('/users/forgetpassword', $data);
            } else {
                echo "BAD REQUEST";
            }

        } else {
            echo "BAD REQUEST";
        }

    }

    public function changePasswordForForget() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //echo json_encode($_POST);
            $data = [];

            $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
            if ($this->userModel->updatePassword($hashed,$_POST['user_id'])) {
                $data['res'] = 'ok';
                flash('register_success', 'Your password changed');
                echo json_encode($data);
            } else {
                echo 'Some thing went wrong, try aging';
            }
        }

    }

    public function changePassword() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //echo json_encode($_POST);
            $data = [];
            if ($this->userModel->verifyPassword($_POST['old-password'])) {
                $hashed = password_hash($_POST['new-password'], PASSWORD_DEFAULT);
                if ($this->userModel->updatePassword($hashed)) {
                    $data['res'] = 'ok';
                    echo json_encode($data);
                } else {
                    echo 'Some thing went wrong, try aging';
                }
            } else {
                echo 'Old password do not match';
            }
        }

    }


}
