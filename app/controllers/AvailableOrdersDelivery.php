<?php

class AvailableOrdersDelivery extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('availableOrdersDelivery');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}