<?php

class DeliveryOrderDetails extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('deliveryOrderDetails');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}