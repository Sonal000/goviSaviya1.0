<?php

class Auction extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];

        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){
            $this->view('sellerauction',$data);
         }else{
            $this->view('viewAuction',$data);
         }
    }
    public function add() {
        $data = ['title'=>'welcome'];
        $this->view('_404',$data);
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}