<?php

class Orders extends Controller{
    private $orderModel;
    public function __construct(){
        $this->orderModel=$this->model("Order"); 
        if(!isset($_SESSION['user_id'])){
            $this -> view('_404');
            exit;
        }    
    }

    public function index($id = null){
        if(!$id==null){
            $this->orderDetails($id);
            exit;
        }

        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='buyer'){
            $orders = $this->orderModel->getBuyerOrders($_SESSION['buyer_id']);
        $data=[
            "orders"=>$orders,
        ];
        $this -> view('buyerOrders',$data);
    }
    if(!isset($_SESSION['user_type'])){
    $this -> view('_404');
}

        
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){
            $orders = $this->orderModel->getSellerOrders($_SESSION['seller_id']);
        $data=[
            "orders"=>$orders,
        ];
        $this -> view('sellerOrder',$data);
    }
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin'){
            $orders = $this->orderModel->getALLOrders();
           
        $data=[
            "orders"=>$orders,
        ];
            $this -> view('adminOrders',$data);
        }

       if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){
            $orders = $this->orderModel->getDeliverOrders($_SESSION['deliver_id']);
        $data=[
            "orders"=>$orders,
        ];
        $this -> view('availableOrdersDelivery',$data);


    }
}


public function orderDetails($id){

    $order= $this->orderModel->getOrderDetails($id);
    $available = $this->orderModel->deliverAvailability($_SESSION['deliver_id']);
    
    $data=[
     "order"=>$order,
     "available"=>$available,

 ];
     $this->view('deliveryOrderDetails',$data);

}

public function acceptOrder($order_item_id){
    $deliver_id= $_SESSION['deliver_id'];
    $assign=$this->orderModel->assignDeliver($order_item_id,$deliver_id);
    if($assign){
        redirect('orders/ongoing');
    }else{
        redirect('orders');
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
    
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){
    $deliver_id = $_SESSION['deliver_id'];
    $details = $this->orderModel->getOngoingOrderDetails($deliver_id);
    $rowB = $this->orderModel->getBuyerDetailsOngoingOrder($deliver_id);
    $rowS = $this->orderModel->getSellerDetailsOngoingOrder($deliver_id);



    $data = [
        'details' => $details,
        'rowB' => $rowB,
        'rowS' => $rowS       
];

        $this -> view('OngoingOrder',$data);

    
    
    }
}

    public function pickedup(){
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){
        $deliver_id= $_SESSION['deliver_id'];
        $pickedUp = $this->orderModel->editToPickedUp($deliver_id);
        $data = [
            'title'=>'welcome',
        ];
        
        

    if($pickedUp){
        $this -> view('deliveryConfirmQualityPickup',$data);
    }else{
        $this -> view('_404');;
    }

    }
}

private function uploadFile($fileInputName, $uploadDirectory) {
    if (isset($_FILES[$fileInputName]['tmp_name']) && $_FILES[$fileInputName]['error'] == UPLOAD_ERR_OK) {
        $filename = uniqid() . '_' . $_FILES[$fileInputName]['name'];
        $targetPath = $uploadDirectory . $filename;

        if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetPath)) {
            return $filename;
        } else {
            die('Failed to move the uploaded file.');
        }
    }
    return '';
}


    public function delivering(){
        

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize POST array
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        $uploadDirectory = (str_replace("\\", "/", STOREROOT)) . '/items/';
        $pickupImg = $this->uploadFile('pickup_img', $uploadDirectory);
        $deliver_id = $_SESSION['deliver_id'];
        $details = $this->orderModel->getOngoingOrderDetails($deliver_id);
        $rowB = $this->orderModel->getBuyerDetailsOngoingOrder($deliver_id);
        $rowS = $this->orderModel->getSellerDetailsOngoingOrder($deliver_id);
        $delivered = $this->orderModel->editToDelivering($deliver_id);

        
        $this->orderModel->uploadPickupImages($deliver_id,$pickupImg);
        

                $data =[
                    'id' => $deliver_id,
                    'pickup_img' =>  $pickupImg,
                    'details' => $details,
                    'rowB' => $rowB,
                    'rowS' => $rowS 
                ];
            
                $this->view('deliveringOrder',$data);
        }

       
        // $deliver_id = $_SESSION['deliver_id'];
        // $details = $this->orderModel->getOngoingOrderDetails($deliver_id);
        // $rowB = $this->orderModel->getBuyerDetailsOngoingOrder($deliver_id);
        // $rowS = $this->orderModel->getSellerDetailsOngoingOrder($deliver_id);
        // $delivered = $this->orderModel->editToDelivering($deliver_id);

        // $data = [
        //     'title'=>'welcome',
        //     'details' => $details,
        //     'rowB' => $rowB,
        //     'rowS' => $rowS 

    
    


        if($delivered){
        $this -> view('deliveringOrder',$data);
        }else{
            $this -> view('_404');
        }
    }

    public function delivered(){
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){

        $deliver_id = $_SESSION['deliver_id'];
        $delivered = $this->orderModel->editToDelivered($deliver_id);
        $data = ['title'=>'welcome'];

    

            if($delivered){
        $this -> view('deliveryConfirmQualityDropoff',$data);
            }else{
                $this->view('_404');
            }
    }



    }





    public function conclude(){
     if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){  
        
        

        $deliver_id = $_SESSION['deliver_id'];
        $completed = $this->orderModel->editToCompleted($deliver_id);
        $data = ['title'=>'welcome'];

        
        $this -> view('deliveryComplete',$data);
    
    }
}




    //admin functions

    public function details($id){
        $OrderDet = $this->orderModel->OrdersAdminView($id);
        $OrderItems = $this->orderModel->OrderItemsView($id);
        $sellerDet=$this->orderModel ->sellersInOrder($id);
        $buyerDet = $this->orderModel ->OrderBuyer($id);

        $data = [
            'details'=>$OrderDet,
            'items'=>$OrderItems,
            'sellerdet'=>$sellerDet,
            'buyerdet'=>$buyerDet,
        ];
        $this->view('adminOrderDetails',$data);
    }

    

   
}



