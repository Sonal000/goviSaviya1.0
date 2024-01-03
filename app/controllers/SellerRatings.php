<?php

class SellerRatings extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('deliveryRatings');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}