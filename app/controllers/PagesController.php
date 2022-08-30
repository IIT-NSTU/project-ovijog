<?php

class PagesController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {

        if (isLoggedIn()) {
            redirect('posts');
        }

        $data = [
            'title' => SITENAME,
        ];

        $this->view('/pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About us'
        ];
        $this->view('/pages/about', $data);
    }

    public function home()
    {
        $data = [
            'title' => 'this is home'
        ];
        $this->view('/pages/home', $data);
    }

    public function categories()
    {
        $data = [
            'title' => 'this is categories'
        ];
        $this->view('/pages/categories', $data);
    }
}
