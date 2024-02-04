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
            $orders = $this->orderModel->getBuyerOrders($_SESSION['buyer_id']);
        $data=[
            "orders"=>$orders,
        ];
        $this -> view('buyerOrders',$data);
    }
}
    public function complete(){
        $data = ['title'=>'welcome'];
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){
        $this -> view('sellerOrderComplete',$data);
    }
    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){
        $this -> view('deliveryCompletedOrder',$data);
    }
    }
    public function ongoing(){
        $data = ['title'=>'welcome'];

    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){
        $this -> view('OngoingOrder',$data);
    }
    }


    public function pickedup(){
        $data = ['title'=>'welcome'];

    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){
        $this -> view('deliveryConfirmQualityPickup',$data);
    }
    }

    public function delivering(){
        $data = ['title'=>'welcome'];

    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){
        $this -> view('deliveringOrder',$data);
    }
    }

    public function delivered(){
        $data = ['title'=>'welcome'];

    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){
        $this -> view('deliveryConfirmQualityDropoff',$data);
    }
    }

    public function conclude(){
        $data = ['title'=>'welcome'];

    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){
        $this -> view('deliveryComplete',$data);
    }
    }

    

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}


