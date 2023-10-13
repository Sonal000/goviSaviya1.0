<?php

class SellerOrderComplete extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('sellerOrderComplete');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}