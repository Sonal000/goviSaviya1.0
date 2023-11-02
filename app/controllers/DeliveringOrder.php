<?php

class DeliveringOrder extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('deliveringOrder');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}