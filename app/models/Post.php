<?php

/**
 * Post Model handle all data manipulation associated to Post.
 */
class Post {

    /**
     * @var Database instance of database.
     */
    private $db;


    /**
     *  Default constructor for post model, initialize the database instance.
     */
    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * Get all the commented user of a post.
     *
     * @param $post_id: post_id
     * @return mixed all the commented user of a post.
     */
    public function commentedUsers($post_id) {
        $this->db->query("select distinct user_id from comments where post_id=:post_id");
        $this->db->bind(':post_id', $post_id);
        return $this->db->resultSet();
    }

    /**
     * Get all the voted user of a post.
     *
     * @param $post_id: post_id
     * @return mixed all the voted user of a post.
     */
    public function votedUsers($post_id) {
        $this->db->query("select distinct user_id from votes where post_id=:post_id");
        $this->db->bind(':post_id', $post_id);
        return $this->db->resultSet();
    }

    /**
     * Submit report to a post
     *
     * @param $data: report data.
     * @return void
     */
    public function report($data) {
        $this->db->query("insert into reports (user_id,post_id,category,feedback) values (:user_id,:post_id,:category,:feedback)");
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':feedback', $data['feedback']);

        $this->db->execute();
    }

    /**
     * Fetch post with limit (4 per page) in addition with filter by categories and search key.
     *
     * @param $page: page number
     * @param $categories: post categories
     * @param $key: search key
     * @return mixed result
     */
    public function filterPostsWithLimit($page, $categories = '', $key = '') {
        $limit = 4;
        $row = ($page - 1) * $limit;

        if($key && $categories){
            $key = '%' . $key . '%';

            $this->db->query("WITH scopeposts as (
	                                    select * 
                                        from posts
                                        where category IN (" . $categories . ")
                                    )

                                select distinct scopeposts.post_id,title,body,category,issolved,created_time,user_id,img_link
                                from scopeposts LEFT JOIN tags on scopeposts.post_id=tags.post_id
                                where title LIKE :key OR body LIKE :key OR category LIKE :key OR tag LIKE :key OR created_time LIKE :key
                                ORDER BY created_time DESC limit :row, :limit");

            $this->db->bind(':key', $key);
            $this->db->bind(':row', $row);
            $this->db->bind(':limit', $limit);

            return $this->db->resultSet();

        } else if ($key) {
            $key = '%' . $key . '%';

            $this->db->query("select distinct posts.post_id,title,body,category,issolved,created_time,user_id,img_link
                                    from posts LEFT JOIN tags on posts.post_id=tags.post_id
                                    where title LIKE :key OR body LIKE :key OR category LIKE :key OR tag LIKE :key OR created_time LIKE :key
                                    ORDER BY created_time DESC limit :row, :limit");

            $this->db->bind(':key', $key);
            $this->db->bind(':row', $row);
            $this->db->bind(':limit', $limit);

            return $this->db->resultSet();
        } elseif ($categories) {
            $this->db->query("select * 
                                    from posts
                                    where category IN (" . $categories . ")
                                    ORDER BY created_time DESC limit :row, :limit");

            $this->db->bind(':row', $row);
            $this->db->bind(':limit', $limit);

            return $this->db->resultSet();
        } else {
            $this->db->query("select * from posts ORDER BY created_time DESC limit :row, :limit");
            $this->db->bind(':row', $row);
            $this->db->bind(':limit', $limit);

            return $this->db->resultSet();
        }
    }

    /**
     * Mark a post solved.
     *
     * @param $post_id: post_id
     * @return bool ture if success and false otherwise.
     */
    public function markSolved($post_id) {
        $this->db->query("update posts set issolved = true where post_id = :post_id");
        $this->db->bind(':post_id', $post_id);

        return $this->db->execute();
    }

    /**
     * Count total number of solved posts.
     *
     * @return mixed number of solved posts.
     */
    public function totalSolvedCount() {
        $this->db->query("select * from posts where issolved = true");

        $this->db->execute();

        return $this->db->rowCount();
    }

    /**
     * Count total number of posts.
     *
     * @return mixed number of posts.
     */
    public function totalPostCount() {
        $this->db->query("select * from posts");

        $this->db->execute();

        return $this->db->rowCount();
    }

    /**
     * Fetch all the views data for a post.
     *
     * @param $post_id: post_id
     * @return mixed: views data.
     */
    public function getViewCount($post_id) {
        $this->db->query("select * from views where post_id = :post_id");
        $this->db->bind(':post_id', $post_id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    /**
     * Add view of the current user to the specific user.
     * Ignore multiple views from a single user
     *
     * @param $post_id: post_id
     * @return void
     */
    public function addView($post_id) {
        $this->db->query("insert into views (user_id,post_id) values (:user_id,:post_id)");
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':post_id', $post_id);

        try {
            $this->db->execute();
        } catch (PDOException $e) {
            //ignoring multiple views from a single user
        }

    }

    /**
     * Fetch all the up votes data for a post.
     *
     * @param $post_id: post_id
     * @return mixed: up votes data.
     */
    public function getUpVotes($post_id) {
        $this->db->query("select * from votes where isagree = 1 and post_id = :post_id");
        $this->db->bind(':post_id', $post_id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    /**
     * Fetch all the down votes data for a post.
     *
     * @param $post_id: post_id
     * @return mixed: down votes data.
     */
    public function getDownVotes($post_id) {
        $this->db->query("select * from votes where isagree = 0 and post_id = :post_id");
        $this->db->bind(':post_id', $post_id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    /**
     * Submit vote of the currnt user for a post
     *
     * @param $post_id: post_id of the post.
     * @param $isagree: type of vote 1 if upvote 0 for downvote
     * @return void
     */
    public function vote($post_id, $isagree) {
        if ($this->isVoted($post_id) != null) {

            if ($this->getVote($post_id) == $isagree) {

                $this->db->query("delete from votes where user_id = :user_id and post_id = :post_id");
                $this->db->bind(':user_id', $_SESSION['user_id']);
                $this->db->bind(':post_id', $post_id);

                $this->db->execute();

            } else {

                $this->db->query("update votes set isagree=:isagree where user_id = :user_id and post_id = :post_id");
                $this->db->bind(':user_id', $_SESSION['user_id']);
                $this->db->bind(':post_id', $post_id);
                $this->db->bind(':isagree', $isagree);

                $this->db->execute();
            }

        } else {
            $this->db->query("insert into votes (user_id,post_id,isagree) values (:user_id,:post_id,:isagree)");
            $this->db->bind(':user_id', $_SESSION['user_id']);
            $this->db->bind(':post_id', $post_id);
            $this->db->bind(':isagree', $isagree);

            $this->db->execute();
        }
    }

    /**
     * Checks if current user voted a post
     *
     * @param $post_id: post_id of the post
     * @return bool ture if success and false otherwise.
     */
    public function isVoted($post_id) {
        $this->db->query("select * from votes where user_id = :user_id and post_id = :post_id");
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':post_id', $post_id);

        $this->db->execute();

        $count = $this->db->rowCount();

        return $count != 0;
    }

    /**
     * Get vote of the current user for a specific post.
     *
     * @param $post_id: post_id
     * @return mixed return 1 if upvote 0 for downvote
     */
    public function getVote($post_id) {
        $this->db->query("select * from votes where user_id = :user_id and post_id = :post_id");
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':post_id', $post_id);

        return $this->db->single()->isagree;
    }

    /**
     * Fetch all categories form database.
     *
     * @return mixed all Categories.
     */
    public function getCategories() {
        $this->db->query('SELECT * FROM post_categories');
        return $this->db->resultSet();
    }

    /**
     * Fetch all posts form database.
     *
     * @return mixed all posts.
     */
    public function getAllPosts() {
        $this->db->query('SELECT * FROM posts NATURAL JOIN users ORDER BY posts.created_time DESC');
        return $this->db->resultSet();
    }

    /**
     * Add a post.
     *
     * @param $data post data
     * @return bool ture if success and false otherwise.
     */
    public function addPost($data) {
        $this->db->query("insert into posts (title, user_id, category, issolved, body, img_link) values (:title, :user_id, :category, false, :body, :img_link)");

        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':img_link', $data['image']);

        if ($this->db->execute()) {
            $post_id = $this->db->lastInsertId();
            foreach ($data['tags'] as $tag) {
                $this->db->query("insert into tags (post_id, tag) values (:post_id, :tag)");
                $this->db->bind(':post_id', $post_id);
                $this->db->bind(':tag', $tag);
                $this->db->execute();
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Update a post.
     *
     * @param $data post updated data
     * @return bool ture if success and false otherwise.
     */
    public function updatePost($data) {
        if (empty($data['image'])) {
            $this->db->query("update posts set title = :title, body = :body, category = :category where post_id = :post_id");

            $this->db->bind(':title', $data['title']);
            $this->db->bind(':post_id', $data['post_id']);
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':body', $data['body']);
        } else {
            $this->db->query("update posts set title = :title, body = :body, category = :category, img_link = :img_link where post_id = :post_id");

            $this->db->bind(':title', $data['title']);
            $this->db->bind(':post_id', $data['post_id']);
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':img_link', $data['image']);
        }


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete a post specified by post_id.
     *
     * @param $id: post_id
     * @return bool ture if success and false otherwise.
     */
    public function deletePost($id) {
        $this->db->query("delete from posts where post_id = :id");

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Fetch a post specified by post_id.
     *
     * @param $id: post_id
     * @return mixed post.
     */
    public function getPostById($id) {
        $this->db->query('select * from posts where post_id = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    /**
     * Fetch top 5 unsolved posts.
     *
     * @return mixed top 5 unsolved posts.
     */
    public function getTopUnsolved(){
        $this->db->query("
            with solvedpost as (
                SELECT *
                FROM posts
                WHERE issolved=0
            ), upvotes as (
                SELECT *
                FROM votes
                WHERE isagree=1
            ), downvotes as (
                SELECT *
                FROM votes
                WHERE isagree=0
            ), upcounts as (
                SELECT solvedpost.post_id,count(isagree) as upcount
                FROM solvedpost LEFT JOIN upvotes ON solvedpost.post_id=upvotes.post_id
                GROUP BY solvedpost.post_id
            ), downcounts as (
                SELECT solvedpost.post_id,count(isagree) as downcount
                FROM solvedpost LEFT JOIN downvotes ON solvedpost.post_id=downvotes.post_id
                GROUP BY solvedpost.post_id
            ), viewcounts as (
                SELECT solvedpost.post_id,count(views.post_id) as viewcount
                FROM solvedpost LEFT JOIN views ON solvedpost.post_id=views.post_id
                GROUP BY solvedpost.post_id
            )
            
            SELECT *,((upcount-downcount+viewcount)/(upcount+downcount+viewcount+1)) as ratio
            FROM upcounts NATURAL JOIN downcounts NATURAL JOIN viewcounts
            ORDER BY ratio DESC
            LIMIT 5
        ");

        return $this->db->resultSet();
    }

    /**
     * Fetch top 5 solved posts.
     *
     * @return mixed top 5 solved posts.
     */
    public function getTopSolved(){
        $this->db->query("
            with solvedpost as (
                SELECT *
                FROM posts
                WHERE issolved=1
            ), upvotes as (
                SELECT *
                FROM votes
                WHERE isagree=1
            ), downvotes as (
                SELECT *
                FROM votes
                WHERE isagree=0
            ), upcounts as (
                SELECT solvedpost.post_id,count(isagree) as upcount
                FROM solvedpost LEFT JOIN upvotes ON solvedpost.post_id=upvotes.post_id
                GROUP BY solvedpost.post_id
            ), downcounts as (
                SELECT solvedpost.post_id,count(isagree) as downcount
                FROM solvedpost LEFT JOIN downvotes ON solvedpost.post_id=downvotes.post_id
                GROUP BY solvedpost.post_id
            ), viewcounts as (
                SELECT solvedpost.post_id,count(views.post_id) as viewcount
                FROM solvedpost LEFT JOIN views ON solvedpost.post_id=views.post_id
                GROUP BY solvedpost.post_id
            )
            
            SELECT *,((upcount-downcount+viewcount)/(upcount+downcount+viewcount+1)) as ratio
            FROM upcounts NATURAL JOIN downcounts NATURAL JOIN viewcounts
            ORDER BY ratio DESC
            LIMIT 5
        ");

        return $this->db->resultSet();
    }
}
