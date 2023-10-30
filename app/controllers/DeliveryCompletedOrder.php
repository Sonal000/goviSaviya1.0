<?php

class DeliveryCompletedOrder extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('deliveryCompletedOrder');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}