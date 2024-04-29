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
        $count = $this->postModel->countMposts();
        $data=[
            'mposts'=>$posts,
            'count'=>$count,
        ];
        $this->view('adminMposts',$data);
    }

    public function marketplaceView($id){
        $posts=$this->postModel->getinfoMposts($id);

        $data=[
            'mposts'=>$posts,
        ];
        $this->view('adminMpostsview',$data);
    }

    public function auction(){
        $posts=$this->postModel->selectAposts();
        $count = $this->postModel->countAposts();

        $data=[
            'Aposts'=>$posts,
            'count'=>$count,
        ];
        $this->view('adminAposts',$data);
    }

    public function Requests(){
        $posts=$this->postModel->selectRposts();
        
        $count = $this->postModel->countRposts();

        $data=[
            'Rposts'=>$posts,
            'count'=>$count,
        ];
        $this->view('adminRposts',$data);
    }

    public function RequestsView($id){
        $posts=$this->postModel->getinfoRposts($id);
        $items =$this->postModel->getquotationinfo($id);

        $data=[
            'details'=>$posts,
            'items'=>$items,
        ];
        $this->view('adminRpostview',$data);
    }

    public function AuctionView($id){
        $posts=$this->postModel->getinfoAposts($id);
        $items =$this->postModel->getbidsinfo($id);

        $data=[
            'details'=>$posts,
            'items'=>$items,
        ];
        $this->view('adminApostsview',$data);
    }





















    public function details(){
        $data = ['title'=>'welcome'];
        $this -> view('adminOrderDetails');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}