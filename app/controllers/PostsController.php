<?php

class PostsController extends Controller
{

    private $postModel;
    private $userModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function vote($params0,$params1){

        $this->postModel->vote($params0,$params1);

        $data=[
            'upCount'=>$this->postModel->getUpVotes($params0),
            'downCount'=>$this->postModel->getDownVotes($params0)
        ];

        echo json_encode($data);
    }

    public function index()
    {

        $posts = $this->postModel->getAllPosts();

        $upVotes=[];
        $downVotes=[];

        $upCount=[];
        $downCount=[];

        foreach ($posts as $post){
            if($this->postModel->isVoted($post->post_id)){
                if($this->postModel->getVote($post->post_id)==1){
                    $upVotes[$post->post_id]=1;
                }else{
                    $downVotes[$post->post_id]=1;
                }
            }

            $upCount[$post->post_id]=$this->postModel->getUpVotes($post->post_id);
            $downCount[$post->post_id]=$this->postModel->getdownVotes($post->post_id);
        }

        $data = [
            'posts' => $posts,
            'up-votes'=>$upVotes,
            'down-votes'=>$downVotes,
            'up-count'=>$upCount,
            'down-count'=>$downCount
        ];

        $this->view('posts/index', $data);
    }

    public function show($id)
    {

        $post = $this->postModel->getPostById($id);

        $data = [
            'post' => $post,
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


            //die($data['image']);


            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }
            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter body text';
            }

            if (empty($data['title_err']) && empty($data['body_err'])) {
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
                'image' => ''
            ];

            $this->view('posts/add', $data);
        }
    }

    public function edit($id)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_err' => '',
                'body_err' => ''
            ];

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

            $data = [
                'id' => $id,
                'title' => $post->title,
                'body' => $post->body
            ];

            $this->view('posts/edit', $data);
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
        } else {
            redirect('posts');
        }
    }

    public function about($id)
    {
        echo $id;
    }
}
