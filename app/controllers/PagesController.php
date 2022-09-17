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

        $topUnsolved = $this->postModel->getTopUnsolved();
        $topSolved = $this->postModel->getTopSolved();

        $topUnsolvedPosts=[];
        $topSolvedPosts=[];

        foreach ($topUnsolved as $post){
            $topUnsolvedPosts[]=$this->postModel->getPostById($post->post_id);
        }

        foreach ($topSolved as $post){
            $topSolvedPosts[]=$this->postModel->getPostById($post->post_id);
        }

        $data = [
            'title' => 'this is home',
            'total_post' => $totalPost,
            'total_solved' => $totalSolved,
            'total_unsolved' => ($totalPost - $totalSolved),
            'top_unsolved_posts'=>$topUnsolvedPosts,
            'top_solved_posts'=>$topSolvedPosts
        ];

        $this->view('/pages/home', $data);
    }

}
