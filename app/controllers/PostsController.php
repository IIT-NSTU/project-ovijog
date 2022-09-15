<?php

class PostsController extends Controller
{

    private $postModel;
    private $userModel;
    private $commentModel;
    private $tagModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
        $this->commentModel = $this->model('Comment');
        $this->tagModel = $this->model('Tag');
    }

    public function getAllTags()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->tagModel->getAllTags();
            echo json_encode($data);
        }
    }

    public function load($page = 1)
    {
        sleep(1);
        //$page=$_POST['page']??1;

        $posts = $this->postModel->getPostsWithLimit($page);

        $upVotes = [];
        $downVotes = [];

        $upCount = [];
        $downCount = [];

        $viewCount = [];

        $tags = [];

        foreach ($posts as $post) {
            if ($this->postModel->isVoted($post->post_id)) {
                if ($this->postModel->getVote($post->post_id) == 1) {
                    $upVotes[$post->post_id] = 1;
                } else {
                    $downVotes[$post->post_id] = 1;
                }
            }

            $upCount[$post->post_id] = $this->postModel->getUpVotes($post->post_id);
            $downCount[$post->post_id] = $this->postModel->getdownVotes($post->post_id);
            $viewCount[$post->post_id] = $this->postModel->getViewCount($post->post_id);

            $tags[$post->post_id] = $this->tagModel->getTags($post->post_id);
        }

        $data = [
            'posts' => $posts,
            'up-votes' => $upVotes,
            'down-votes' => $downVotes,
            'up-count' => $upCount,
            'down-count' => $downCount,
            'view-count' => $viewCount,
            'tags' => $tags
        ];


        $this->view('posts/list', $data);
    }

    public function markSolved()
    {

        $post_id = $_POST['post_id'];

        echo $this->postModel->markSolved($post_id);
    }

    public function comment($id)
    {

        $commentMsg = $_POST['comment'];

        $comment_id = $this->commentModel->addComment($id, $commentMsg);

        $comment = $this->commentModel->getComment($comment_id);

        $data = [
            'comment' => $comment->comment,
            'user_id' => $_SESSION['user_id'],
            'comment_id' => $comment_id,
            'created_time' => $comment->created_time
        ];

        echo json_encode($data);
    }

    public function vote($params0, $params1)
    {

        $this->postModel->vote($params0, $params1);

        $data = [
            'upCount' => $this->postModel->getUpVotes($params0),
            'downCount' => $this->postModel->getDownVotes($params0)
        ];

        echo json_encode($data);
    }

    public function index()
    {

        $posts = $this->postModel->getAllPosts();

        $upVotes = [];
        $downVotes = [];

        $upCount = [];
        $downCount = [];

        $viewCount = [];

        $tags = [];

        foreach ($posts as $post) {
            if ($this->postModel->isVoted($post->post_id)) {
                if ($this->postModel->getVote($post->post_id) == 1) {
                    $upVotes[$post->post_id] = 1;
                } else {
                    $downVotes[$post->post_id] = 1;
                }
            }

            $upCount[$post->post_id] = $this->postModel->getUpVotes($post->post_id);
            $downCount[$post->post_id] = $this->postModel->getdownVotes($post->post_id);
            $viewCount[$post->post_id] = $this->postModel->getViewCount($post->post_id);

            $tags[$post->post_id] = $this->tagModel->getTags($post->post_id);
        }


        $data = [
            'posts' => $posts,
            'up-votes' => $upVotes,
            'down-votes' => $downVotes,
            'up-count' => $upCount,
            'down-count' => $downCount,
            'view-count' => $viewCount,
            'tags' => $tags,
            'categories' => $this->postModel->getCategories()
        ];

        $this->view('posts/index', $data);
    }

    public function report($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'category' => $_POST['reportCategory'],
                'feedback' => $_POST['feedback'],
                'post_id' => $id
            ];

            $this->postModel->report($data);

            unset($_POST);

            $this->view('posts/report', $data);
        }
    }

    public function show($id)
    {

        $this->postModel->addView($id);

        $post = $this->postModel->getPostById($id);

        $upVoted = 0;
        $downVoted = 0;

        if ($this->postModel->isVoted($post->post_id)) {
            if ($this->postModel->getVote($post->post_id) == 1) {
                $upVoted = 1;
            } else {
                $downVoted = 1;
            }
        }

        $data = [
            'post' => $post,
            'comments' => $this->commentModel->getPostComment($id),
            'up-voted' => $upVoted,
            'down-voted' => $downVoted,
            'up-count' => $this->postModel->getUpVotes($id),
            'down-count' => $this->postModel->getdownVotes($id),
            'view-count' => $this->postModel->getViewCount($post->post_id),
            'tags' => $this->tagModel->getTags($post->post_id)
        ];

        $this->view('posts/show', $data);
    }

    public function add()
    {

        $categories = $this->postModel->getCategories();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'categories' => $categories,

                'title' => trim($_POST['title']),
                'category' => trim($_POST['category']),
                'body' => trim($_POST['body']),
                'image' => $_FILES['image'],
                'tags'  => trim($_POST['tags']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];

            if (!empty($data['image']['name'])) {
                $prod = uniqid();

                $filename = $data["image"]['name'];
                $filename = explode(".", $filename);
                $extension = end($filename);
                $newfilename = $prod . "." . $extension;

                move_uploaded_file($data['image']['tmp_name'], dirname(APPROOT) . "\public\dir\\" . $newfilename);

                $url = URLROOT . '/dir/' . $newfilename;
                $data['image'] = $url;
            } else {
                $data['image'] = "";
            }

            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter body text';
            }

            if (empty($data['title_err']) && empty($data['body_err'])) {
                $data['tags'] = explode(',', $data['tags']);
                if ($this->postModel->addPost($data)) {
                    flash('post_message', 'Post Added');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            }

            $this->view('posts/add', $data);
        } else {

            $data = [
                'categories' => $categories,

                'title' => '',
                'category' => '',
                'body' => '',
                'tags' => '',
                'image' => ''
            ];

            $this->view('posts/add', $data);
        }
    }

    public function edit($id)
    {
        $categories = $this->postModel->getCategories();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'categories' => $categories,

                'post_id' => $id,
                'title' => trim($_POST['title']),
                'category' => trim($_POST['category']),
                'body' => trim($_POST['body']),
                'image' => $_FILES['image'],
                'user_id' => $_SESSION['user_id'],
                'tags'  => trim($_POST['tags']),
                'title_err' => '',
                'body_err' => ''
            ];

            if (!empty($data['image']['name'])) {
                $prod = uniqid();

                $filename = $data["image"]['name'];
                $filename = explode(".", $filename);
                $extension = end($filename);
                $newfilename = $prod . "." . $extension;

                move_uploaded_file($data['image']['tmp_name'], dirname(APPROOT) . "\public\dir\\" . $newfilename);

                $url = URLROOT . '/dir/' . $newfilename;
                $data['image'] = $url;
            } else {
                $data['image'] = "";
            }

            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter body text';
            }

            if (empty($data['title_err']) && empty($data['body_err'])) {
                if ($this->postModel->updatePost($data)) {
                    flash('post_message', 'Post Update');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            }

            $this->view('posts/edit', $data);
        } else {

            $post = $this->postModel->getPostById($id);

            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }

            $tags=$this->tagModel->getTags($id);
            $tagText='';
            foreach ($tags as $tag){
                $tagText.=$tag->tag.', ';
            }

            $data = [
                'categories' => $categories,

                'post_id' => $id,
                'title' => $post->title,
                'category' => $post->category,
                'body' => $post->body,
                'tags' => $tagText,
                'title_err' => '',
                'body_err' => ''
            ];

            $this->view('posts/edit', $data);
        }
    }

    public function delete($id)
    {
        $post = $this->postModel->getPostById($id);

        if ($post->user_id != $_SESSION['user_id']) {
            redirect('posts');
        }

        if ($this->postModel->deletePost($id)) {
            flash('post_message', 'Post Removed');
            redirect('posts');
        } else {
            die('Something went wrong');
        }
    }
}
