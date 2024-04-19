<?php

class DeliveryRatings extends Controller{
    private $orderModel;
    public function __construct(){
        $this->orderModel=$this->model("Order"); 
        if(!isset($_SESSION['user_id'])){
            $this -> view('_404');
            exit;
        }      
    }

    public function index(){
        $data = ['title'=>'welcome'];
        $this -> view('deliveryRatings');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}