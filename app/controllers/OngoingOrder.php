<?php

class OngoingOrder extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('ongoingOrder');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}