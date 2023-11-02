<?php

class DeliveryConfirmQualityPickup extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('deliveryConfirmQualityPickup');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}