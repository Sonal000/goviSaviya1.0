<?php
/*testing model to get know */
class Post{
    private $db;

    public function __construct(){
        $this -> db = new Database;
    }

    public function getPosts(){
        $this->db->query("SELECT * FROM Users"); // insert our query

        return $this->db->resultSet(); //result set gives us array single method gives us single value. those methods are in the database class
    }

}

/*in controller we write this code 

public function __construct(){
    $this ->postModel = $this->model('Post');
}

then inside index or other method

$posts = $this ->postModel ->getPosts();

$data = [
    'title' => 'welcome',
    'posts' => $posts
];

*/