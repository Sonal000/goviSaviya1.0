<?php

class Listproduct extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('listproduct');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}