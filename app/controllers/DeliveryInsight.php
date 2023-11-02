<?php

class DeliveryInsight extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('deliveryInsight');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}