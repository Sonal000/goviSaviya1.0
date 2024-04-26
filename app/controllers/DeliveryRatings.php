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
        $deliver_id = $_SESSION['deliver_id'];
        $reviews = $this->orderModel->test_get_reviews_orders($deliver_id);
        
        var_dump($reviews);

        $data = ['reviews'=>$reviews];
        
        $this -> view('deliveryRatings',$data);
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}