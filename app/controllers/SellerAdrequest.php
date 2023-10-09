<?php

class SellerAdrequest extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('sellerAdrequest');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}