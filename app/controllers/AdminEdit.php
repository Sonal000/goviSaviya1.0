<?php

class AdminEdit extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('adminEdit');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}