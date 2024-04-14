<?php

class Posts extends Controller{
    private $postModel;
    public function __construct(){
         $this->postModel = $this->model('Post');
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('adminPosts');
    }

    public function marketplace(){
        $posts=$this->postModel->selectMposts();

        $data=[
            'mposts'=>$posts,
        ];
        $this->view('adminMposts',$data);
    }

    public function auction(){
        $posts=$this->postModel->selectAposts();

        $data=[
            'Aposts'=>$posts,
        ];
        $this->view('adminAposts',$data);
    }

    public function Requests(){
        $posts=$this->postModel->selectRposts();

        $data=[
            'Rposts'=>$posts,
        ];
        $this->view('adminRposts',$data);
    }





















    public function details(){
        $data = ['title'=>'welcome'];
        $this -> view('adminOrderDetails');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}