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
    $rowB = $this->orderModel->getBuyerDetailsOngoingOrder($deliver_id);
    $rowS = $this->orderModel->getSellerDetailsOngoingOrder($deliver_id);

        $data = [
            'details' => $details,
            'rowB' => $rowB,
            'rowS' => $rowS
        ];





        $this -> view('deliveryHome',$data);
    }

   
}