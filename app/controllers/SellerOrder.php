<?php

class SellerOrder extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('sellerOrder');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}