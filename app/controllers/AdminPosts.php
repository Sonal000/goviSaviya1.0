<?php

class AdminPosts extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('adminPosts');
    }

    public function details(){
        $data = ['title'=>'welcome'];
        $this -> view('adminOrderDetails');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}