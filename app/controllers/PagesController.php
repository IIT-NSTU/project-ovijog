<?php

/**
 * Pages controller that handle request's prefix with 'pages'.
 */
class PagesController extends Controller
{
    private $postModel;

    /**
     * Default constructor.
     */
    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }

    /**
     * This method handle requests '/pages/index' and /pages.
     * 
     * @return void
     */
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

    /**
     * This method handle requests '/pages/about'.
     * 
     * @return void
     */
    public function about()
    {
        $data = [
            'title' => 'About us'
        ];
        $this->view('/pages/about', $data);
    }

    /**
     * This method handle requests '/pages/home'.
     * 
     * @return void
     */
    public function home()
    {
        security();

        $totalPost = $this->postModel->totalPostCount();
        $totalSolved = $this->postModel->totalSolvedCount();

        $topUnsolved = $this->postModel->getTopUnsolved();
        $topSolved = $this->postModel->getTopSolved();

        $topUnsolvedPosts = [];
        $topSolvedPosts = [];

        foreach ($topUnsolved as $post) {
            $topUnsolvedPosts[] = $this->postModel->getPostById($post->post_id);
        }

        foreach ($topSolved as $post) {
            $topSolvedPosts[] = $this->postModel->getPostById($post->post_id);
        }

        $data = [
            'title' => 'this is home',
            'total_post' => $totalPost,
            'total_solved' => $totalSolved,
            'total_unsolved' => ($totalPost - $totalSolved),
            'top_unsolved_posts' => $topUnsolvedPosts,
            'top_solved_posts' => $topSolvedPosts
        ];

        $this->view('/pages/home', $data);
    }
}
