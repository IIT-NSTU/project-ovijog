<?php

class PagesController extends Controller {
    private $postModel;

    public function __construct() {
        $this->postModel = $this->model('Post');
    }

    public function index() {

        if (isLoggedIn()) {
            redirect('posts');
        }

        $data = [
            'title' => SITENAME,
        ];

        $this->view('/pages/index', $data);
    }

    public function about() {
        $data = [
            'title' => 'About us'
        ];
        $this->view('/pages/about', $data);
    }

    public function home() {
        security();

        $totalPost = $this->postModel->totalPostCount();
        $totalSolved = $this->postModel->totalSolvedCount();

        $data = [
            'title' => 'this is home',
            'total_post' => $totalPost,
            'total_solved' => $totalSolved,
            'total_unsolved' => ($totalPost - $totalSolved)
        ];
        $this->view('/pages/home', $data);
    }

}
