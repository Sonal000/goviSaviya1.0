<?php

class Orders extends Controller{
    private $orderModel;
    public function __construct(){
        $this->orderModel=$this->model("Order");     
    }

    public function index(){
        $data = ['title'=>'welcome'];
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){
            $orders = $this->orderModel->getSellerOrders($_SESSION['seller_id']);
        $data=[
            "orders"=>$orders,
        ];
        $this -> view('sellerOrder',$data);
    }
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='buyer'){
        //     $orders = $this->orderModel->getSellerOrders($_SESSION['seller_id']);
        $data=[
            "orders"=>0,
        ];
        $this -> view('buyerOrders',$data);
    }
}
    public function complete(){
        $data = ['title'=>'welcome'];
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){
        $this -> view('sellerOrderComplete',$data);
    }
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}