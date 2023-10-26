<?php

class AdminOrders extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('adminOrders');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}