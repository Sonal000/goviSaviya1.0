<?php

class DeliveryConfirmQualityDropoff extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('deliveryConfirmQualityDropoff');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}