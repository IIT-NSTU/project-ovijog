<?php

class AdminsController extends Controller
{


    public function __construct()
    {
        security();
        if(!$_SESSION['is_admin']){
            redirect('errors');
        }
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
            'title' => SITENAME,
        ];

        $this->view('/admins/managePost', $data);
    }

    public function manageReport()
    {

        $data = [
            'title' => SITENAME,
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
}
