<?php

class vehicleAdd extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('vehicleAdd');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}