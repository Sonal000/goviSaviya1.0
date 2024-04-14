<?php

class AdminVehicleDetails extends Controller{
    public function __construct(){
            
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('adminVehicleDetails');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}