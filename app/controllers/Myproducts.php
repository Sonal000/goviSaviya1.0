<?php

class Myproducts extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('myproducts');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}