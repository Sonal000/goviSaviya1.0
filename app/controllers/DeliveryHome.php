<?php

class DeliveryHome extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('deliveryHome');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}