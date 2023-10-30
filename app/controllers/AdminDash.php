<?php

class AdminDash extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('adminDash');
    }
   public function addUser(){
    $data = ['title'=>'welcome'];
    $this -> view('addUser');
   }
   /* public function about(){
        $this ->view('Pages/about');
    }*/
}