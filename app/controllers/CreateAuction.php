<?php

class CreateAuction extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('createAuction');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}