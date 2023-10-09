<?php

class Sellermarketplace extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('sellermarketplace');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}