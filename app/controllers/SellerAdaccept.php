<?php

class SellerAdaccept extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('sellerAdaccept');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}