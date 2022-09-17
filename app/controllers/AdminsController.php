<?php

class AdminsController extends Controller
{

    private $postModel;
    private $userModel;

    public function __construct()
    {
        security();
        if(!$_SESSION['is_admin']){
            redirect('errors');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }


    public function index()
    {

        $data = [
            'title' => SITENAME,
        ];

        $this->view('/admins/index', $data);
    }

    public function managePost()
    {

        $data = [
            'posts' => $this->postModel->getAllPosts()
        ];

        $this->view('/admins/managePost', $data);
    }

    public function manageReport()
    {

        $data = [
            'reports' => $this->postModel->getAllReports(),
        ];

        $this->view('/admins/manageReport', $data);
    }

    public function manageCategory()
    {

        $data = [
            'title' => SITENAME,
        ];

        $this->view('/admins/manageCategory', $data);
    }

    public function manageUsers()
    {

        $data = [
            'title' => SITENAME,
        ];

        $this->view('/admins/manageUsers', $data);
    }

    public function manageAdmin()
    {

        $data = [
            'title' => SITENAME,
        ];

        $this->view('/admins/manageAdmin', $data);
    }

    public function deletePost($id) {

        if ($this->postModel->deletePost($id)) {
            flash('admin', 'Post Removed');
            redirect('admins/managePost');
        } else {
            die('Something went wrong');
        }
    }
}
