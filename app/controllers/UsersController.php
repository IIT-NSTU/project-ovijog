<?php

class UsersController extends Controller {

    private $userModel;

    public function __construct() {
        $this->userModel = $this->model("User");
    }

    public function profile() {
        $data = [
            'user' => $this->userModel->getUserById($_SESSION['user_id']),
            'posts' => $this->userModel->getPosts()
        ];
        $this->view('/users/profile', $data);
    }

    public function editProfile() {
        $data = [
            'title' => 'this is profile'
        ];
        $this->view('/users/editProfile', $data);
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
        redirect('pages/home');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
        session_destroy();
        redirect('users/login');
    }
}
