<?php

class DeliveryComplete extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('deliveryComplete');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}