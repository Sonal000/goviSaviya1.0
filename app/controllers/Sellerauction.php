<?php

class Sellerauction extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('sellerauction');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}