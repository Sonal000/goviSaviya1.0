<?php

class DeliveryHome extends Controller{
    private $orderModel;

    public function __construct(){
            $this->orderModel=$this->model("Order");
            if(!isset($_SESSION['deliver_id'])){
                $this->view('_404');
                exit;
            }
    }

    public function index(){

    $deliver_id = $_SESSION['deliver_id'];    
    $details = $this->orderModel->getOngoingOrderDetails($deliver_id);

        $data = [
            'details' => $details,
            
        ];





        $this -> view('deliveryHome',$data);
    }

   
}