<?php

class Orders extends Controller{
    private $orderModel;
    private $notifiModel;
    private $VehicleModel;
    public function __construct(){
        $this->orderModel=$this->model("Order");
        $this->VehicleModel =$this->model('DeliveryVehicle'); 
        $this->notifiModel=$this->model("Notifi"); 
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
            $orders = $this->orderModel->getBuyerOngoingOrders($_SESSION['buyer_id']); 
            $completedOrders = $this->orderModel->getBuyerCompletedOrders($_SESSION['buyer_id']); 
            if($completedOrders){

                foreach($completedOrders as $item){
                    if($item){
                        foreach($item as $order){
                            $currentDateTime = new DateTime(); 
                            $completeDateTime = new DateTime($order->completed_date); 
                            $interval = $currentDateTime->diff($completeDateTime);
                            $order->completed_date_time = $completeDateTime->format('Y-m-d H:i:s');
                        }
                        
                    }
                }
            }
        $data=[
            "orders"=>$orders,
            "completedOrders"=>$completedOrders,
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
            $deliver_id = $_SESSION['deliver_id'];
            $orders = $this->orderModel->getDeliverOrders($_SESSION['deliver_id']);
            $hasVehicle = $this->VehicleModel->hasVehicle($_SESSION['user_id']);
            
        $data=[
            "orders"=>$orders,
            "hasVehicle"=>$hasVehicle
        ];
        $this -> view('availableOrdersDelivery',$data);


    }
}



public function raiseBuyerComplain($qc_id){

if($_SESSION['user_type']=='buyer' && isset($_SESSION['buyer_id'])){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isset($_FILES['complain_img'])){
            //Sanitize POST array
            $uploadDirectory = (str_replace("\\", "/", STOREROOT)) . '/items/';
            $complainImg = $this->uploadFile('complain_img', $uploadDirectory);
        }
        $data = [
            'qc_id' => $qc_id,
            'buyer_id' => $_SESSION['buyer_id'],
            'complain' => $_POST['description'],
            'complain_img' => $complainImg,
        ];
        $seller_user_id = $_POST['seller_user_id'];
        $order_item_id = $_POST['order_item_id'];
        $order_id = $_POST['order_id'];
        $buyer_user_id = $_SESSION['user_id'];
       if( $this->orderModel->addBuyerComplain($data)){
        $this->notifiModel->notifYUser(0,$seller_user_id,"Buyer has raised a complain for the order".$order_item_id."/".$order_id." ","orders","OTHER");
        $this->notifiModel->notifYUser(0,$buyer_user_id,"Successfuly raised a complain for the order".$order_item_id."/".$order_id." ","orders","OTHER");
        redirect('orders');
       }


}else{
    $this->view('_404');
}
}else{
    $this->view('_404');

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
    $assign=$this->orderModel->assignDeliver($order_item_id,$deliver_id,"PURCHASE");
    if($assign){
        $order=$this->orderModel->getOrderDetails($order_item_id);
        $this->notifiModel->notifYUser(0,$order->seller_user_id,"Delivery agent assigned to your order <span class='bg'>".$order->item_name."</span> (order_id:".$order->order_item_id."/".$order->order_id .")","orders","DELIVERY");
        $this->notifiModel->notifYUser(0,$order->buyer_user_id,"Delivery agent assigned to your order <span class='bg'>".$order->item_name."</span> (order_id:".$order->order_item_id."/".$order->order_id .")","orders","orders","DELIVERY");
        redirect('orders/ongoing');
    }else{
        redirect('orders');
    }

}
public function acceptOrder_AC($order_item_id){
    $deliver_id= $_SESSION['deliver_id'];
     $assign=$this->orderModel->assignDeliver($order_item_id,$deliver_id,"AUCTION");
    if(true){
        $order=$this->orderModel->getAuctionOrderDetails($order_item_id);
        $this->notifiModel->notifYUser(0,$order->seller_user_id,"Delivery agent assigned to your order <span class='bg'>".$order->item_name."</span> (order_id:".$order->order_item_id."/".$order->order_id .")","orders","DELIVERY");
        $this->notifiModel->notifYUser(0,$order->buyer_user_id,"Delivery agent assigned to your order <span class='bg'>".$order->item_name."</span> (order_id:".$order->order_item_id."/".$order->order_id .")","orders","DELIVERY");
        redirect('orders/ongoing');
    }else{
        redirect('orders');
    }
}


public function acceptOrder_PR($order_item_id){
    var_dump('request');
    $deliver_id= $_SESSION['deliver_id'];
    $assign=$this->orderModel->assignDeliver($order_item_id,$deliver_id,"REQUEST");
    if($assign){
        $order=$this->orderModel->getRequestOrderDetails($order_item_id);

        $this->notifiModel->notifYUser(0,$order->seller_user_id,"Delivery agent assigned to your order <span class='bg'>".$order->item_name."</span> (order_id:".$order->order_item_id."/".$order->order_id .")","orders","DELIVERY");
        $this->notifiModel->notifYUser(0,$order->buyer_user_id,"Delivery agent assigned to your order <span class='bg'>".$order->item_name."</span> (order_id:".$order->order_item_id."/".$order->order_id .")","orders","orders","DELIVERY");
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
        
        $deliver_id = $_SESSION['deliver_id'];
            $orders = $this->orderModel->getCompletedOrders($_SESSION['deliver_id']);
            $order_id = $this->orderModel->getCompletedOrderIDs($deliver_id);
        $data=[
            "orders"=>$orders,
        ];
        
        $this -> view('deliveryCompletedOrder',$data);

    }
    }
    public function ongoing() {
        if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'deliver') {
            $deliver_id = $_SESSION['deliver_id'];
            $hasVehicle = $this->VehicleModel->hasVehicle($_SESSION['user_id']);
            $current = $this->orderModel->getDeliverCurrentOrder($deliver_id);
    
            if ($current) {
                if($current->current_order_type == "AUCTION") {
                    $order = $this->orderModel->getAuctionOrderDetails($current->current_order_item_id);
                } elseif($current->current_order_type == "PURCHASE") {
                    $order = $this->orderModel->getOrderDetails($current->current_order_item_id);
                } elseif($current->current_order_type == "REQUEST") {
                    $order = $this->orderModel->getRequestOrderDetails($current->current_order_item_id);
                }
    
                if ($order) {
                    // Define $data only if $order is valid
                    $data = [
                        'details' => $order,
                        'hasVehicle' => $hasVehicle  
                        // 'rowB' => $rowB,
                        // 'rowS' => $rowS       
                    ];
    
                    // Handle order status
                    if($order->order_status == 'deliver_assigned') {
                        $this->view('OngoingOrder', $data);
                    } elseif($order->order_status == 'pickedup') {
                        redirect('orders/pickedup');
                    } elseif($order->order_status == 'delivering') {
                        redirect('orders/delivering');
                    } elseif($order->order_status == 'delivered') {
                        redirect('orders/delivered');
                    } elseif($order->order_status == 'completed') {
                        redirect('orders/complete');
                    }
                } else {
                    // Handle case where $order is null
                    echo "Order details not found";
                }
            } else {
                $data = [
                    'details' => false,
                    'hasVehicle' => $hasVehicle  
                    // 'rowB' => $rowB,
                    // 'rowS' => $rowS       
                ];
                // Handle case where $current is null
                $this->view('OngoingOrder',$data);
            }
        }
    }
    

    public function pickedup(){
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){
        $deliver_id= $_SESSION['deliver_id'];
        $current =$this->orderModel->getDeliverCurrentOrder($deliver_id);
        if($current->current_order_type=="AUCTION"){
            $order=$this->orderModel->getAuctionOrderDetails($current->current_order_item_id);
        }elseif($current->current_order_type=="PURCHASE"){
            $order=$this->orderModel->getOrderDetails($current->current_order_item_id);
        }elseif($current->current_order_type=="REQUEST"){
            $order=$this->orderModel->getRequestOrderDetails($current->current_order_item_id);
        }
        
        if($order->order_status == 'deliver_assigned') {
            $pickedUp = $this->orderModel->editToPickedUp($deliver_id);
            $data = [
                'title'=>'welcome',
            ];
        if($pickedUp){
            $current =$this->orderModel->getDeliverCurrentOrder($deliver_id);
            if($current->current_order_type=="AUCTION"){
                $order=$this->orderModel->getAuctionOrderDetails($current->current_order_item_id);
                }elseif($current->current_order_type=="PURCHASE"){
                $order=$this->orderModel->getOrderDetails($current->current_order_item_id);
                }elseif($current->current_order_type=="REQUEST"){
                $order=$this->orderModel->getRequestOrderDetails($current->current_order_item_id);
                }
            $this->notifiModel->notifYUser(0,$order->seller_user_id,"Delivery agent has arrived for your order <span class='bg'>".$order->item_name."</span> (order_id:".$order->order_item_id."/".$order->order_id .")","orders","DELIVERY");
            $this->notifiModel->notifYUser(0,$order->buyer_user_id,"Delivery agent has arrived for your order <span class='bg'>".$order->item_name."</span> (order_id:".$order->order_item_id."/".$order->order_id .")","orders","DELIVERY");
    
    
    
            $this -> view('deliveryConfirmQualityPickup',$data);
        }else{
            $this -> view('_404');;
        }

        }else{
            $this -> view('deliveryConfirmQualityPickup');
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
        
        $deliver_id = $_SESSION['deliver_id'];
        $details = $this->orderModel->getOngoingOrderDetails($deliver_id);
        $rowB = $this->orderModel->getBuyerDetailsOngoingOrder($deliver_id);
        $rowS = $this->orderModel->getSellerDetailsOngoingOrder($deliver_id);
            
        $current =$this->orderModel->getDeliverCurrentOrder($deliver_id);
        if($current->current_order_type=="AUCTION"){
            $order=$this->orderModel->getAuctionOrderDetails($current->current_order_item_id);
            }elseif($current->current_order_type=="PURCHASE"){
            $order=$this->orderModel->getOrderDetails($current->current_order_item_id);
            }elseif($current->current_order_type=="REQUEST"){
            $order=$this->orderModel->getRequestOrderDetails($current->current_order_item_id);
            }

        
        $data =[
            'order' => $order,
            'id' => $deliver_id,
            // 'pickup_img' =>  $pickupImg,
            'details' => $details,
            'rowB' => $rowB,
            'rowS' => $rowS 
        ];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Sanitize POST array
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $uploadDirectory = (str_replace("\\", "/", STOREROOT)) . '/items/'; 
            $pickupImg = $this->uploadFile('pickup_img', $uploadDirectory);
            $data=[
                'order_id' => $order->order_id,
                'order_item_id' => $order->order_item_id,
                'seller_id' => $order->seller_id,
                'deliver_pickup_img' => $pickupImg,
                'deliver_id' => $_SESSION['deliver_id'],
                'seller_img' => $order->item_img,
                'order_type' => $current->current_order_type
            ];

          if ( $this->orderModel->uploadPickupImages($data)){
            if($order->order_status == 'pickedup'){
              $delivered = $this->orderModel->editToDelivering($deliver_id);
              if($delivered){

                $current =$this->orderModel->getDeliverCurrentOrder($deliver_id);
                if($current->current_order_type=="AUCTION"){
                    $order=$this->orderModel->getAuctionOrderDetails($current->current_order_item_id);
                    }elseif($current->current_order_type=="PURCHASE"){
                    $order=$this->orderModel->getOrderDetails($current->current_order_item_id);
                    }elseif($current->current_order_type=="REQUEST"){
                    $order=$this->orderModel->getRequestOrderDetails($current->current_order_item_id);
                    }
                $this->notifiModel->notifYUser(0,$order->seller_user_id,"Delivery agent has picked up your order <span class='bg'>".$order->item_name."</span> (order_id:".$order->order_item_id."/".$order->order_id .")","orders","DELIVERY");
                $this->notifiModel->notifYUser(0,$order->buyer_user_id,"Delivery agent has picked up order <span class='bg'>".$order->item_name."</span> (order_id:".$order->order_item_id."/".$order->order_id .")","orders","DELIVERY");
                $data =[
                    'order' => $order,
                    'id' => $deliver_id,
                    // 'pickup_img' =>  $pickupImg,
                    'details' => $details,
                    'rowB' => $rowB,
                    'rowS' => $rowS 
                ];

            $this -> view('deliveringOrder',$data);
            }else{
                $this -> view('_404');
            }
        }else{
            redirect('orders/pickedup');
        }
    }else{
        $this -> view('deliveringOrder',$data);
    }

          }else{
            

            $this -> view('deliveringOrder',$data);

          };
            
            
            
            
            
            
          
       
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

    
    



    }

    public function delivered(){
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){

        $deliver_id = $_SESSION['deliver_id'];
        $data = ['title'=>'welcome'];
        
        $current =$this->orderModel->getDeliverCurrentOrder($deliver_id);
        if($current->current_order_type=="AUCTION"){
            $order=$this->orderModel->getAuctionOrderDetails($current->current_order_item_id);
            }elseif($current->current_order_type=="PURCHASE"){
                $order=$this->orderModel->getOrderDetails($current->current_order_item_id);
            }elseif($current->current_order_type=="REQUEST"){
                $order=$this->orderModel->getRequestOrderDetails($current->current_order_item_id);
            }
            
            
            if($order->order_status == 'delivering') {
                
                $delivered = $this->orderModel->editToDelivered($deliver_id);
       
            if($delivered){

                $current =$this->orderModel->getDeliverCurrentOrder($deliver_id);
                if($current->current_order_type=="AUCTION"){
                    $order=$this->orderModel->getAuctionOrderDetails($current->current_order_item_id);
                    }elseif($current->current_order_type=="PURCHASE"){
                    $order=$this->orderModel->getOrderDetails($current->current_order_item_id);
                    }elseif($current->current_order_type=="REQUEST"){
                    $order=$this->orderModel->getRequestOrderDetails($current->current_order_item_id);
                    }
                $this->notifiModel->notifYUser(0,$order->buyer_user_id,"Delivery agent has arrived to your location for order <span class='bg'>".$order->item_name."</span> (order_id:".$order->order_item_id."/".$order->order_id .")","orders","DELIVERY");
                $this->notifiModel->notifYUser(0,$order->seller_user_id,"Delivery agent has arrived to the destination for order <span class='bg'>".$order->item_name."</span> (order_id:".$order->order_item_id."/".$order->order_id .")","orders","DELIVERY");
        $this -> view('deliveryConfirmQualityDropoff',$data);
            }else{
                $this->view('_404');
            }

        }else{
            $this -> view('deliveryConfirmQualityDropoff');
        }
    }else{
        $this->view('_404');
    }



    }





    public function conclude(){

        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize POST array
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        $uploadDirectory = (str_replace("\\", "/", STOREROOT)) . '/items/';
        $dropoffImg = $this->uploadFile('dropoff_img', $uploadDirectory);

        
        $deliver_id = $_SESSION['deliver_id'];
        $current =$this->orderModel->getDeliverCurrentOrder($deliver_id);
        if($current->current_order_type=="AUCTION"){
            $order=$this->orderModel->getAuctionOrderDetails($current->current_order_item_id);
            }elseif($current->current_order_type=="PURCHASE"){
            $order=$this->orderModel->getOrderDetails($current->current_order_item_id);
            }elseif($current->current_order_type=="REQUEST"){
            $order=$this->orderModel->getRequestOrderDetails($current->current_order_item_id);
            }

        $data=[
            'order_id' => $order->order_id,
            'order_item_id' => $order->order_item_id,
            'seller_id' => $order->seller_id,
            'deliver_dropoff_img' => $dropoffImg,
            'deliver_id' => $_SESSION['deliver_id'],
            'seller_img' => $order->item_img,
            'order_type' => $current->current_order_type
        ];

      if ( $this->orderModel->uploadDropoffImages($data)){

        if($order->order_status=="delivered"){
        $completed = $this->orderModel->editToCompleted($deliver_id);

        if($completed){
            if($current->current_order_type=="AUCTION"){
                $order=$this->orderModel->getAuctionOrderDetails($current->current_order_item_id);
                }elseif($current->current_order_type=="PURCHASE"){
                $order=$this->orderModel->getOrderDetails($current->current_order_item_id);
                }elseif($current->current_order_type=="REQUEST"){
                $order=$this->orderModel->getRequestOrderDetails($current->current_order_item_id);
                }
            $this->notifiModel->notifYUser(0,$order->buyer_user_id,"Delivery has completed for order <span class='bg'>".$order->item_name."</span> (order_id:".$order->order_item_id."/".$order->order_id .")","orders","DELIVERY");
            $this->notifiModel->notifYUser(0,$order->seller_user_id,"Delivery has completed for order <span class='bg'>".$order->item_name."</span> (order_id:".$order->order_item_id."/".$order->order_id .")","orders","DELIVERY");

        }
        $data = ['title'=>'welcome'];

        
        $this -> view('deliveryComplete',$data);
        
    }else{
        $this -> view('deliveryComplete');
    }

    }else{
        $this -> view('deliveryComplete');
    }


}}else{
    $this->view('_404');}
}




    //admin functions


    
    public function details($id){

        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin'){

            $type = $this->orderModel->getOrderTypebyID($id);
            

            

                $OrderDet = $this->orderModel->OrdersAdminView($id);
                $OrderItems = $this->orderModel->OrderItemsView($id,$type);
                $sellerDet=$this->orderModel ->sellersInOrder($id,$type);
                // $buyerDet = $this->orderModel ->OrderBuyer($id,$type->order_type);
                $deliverDet = $this->orderModel->OrderDeliverers($id,$type);

                $data = [
                    'details'=>$OrderDet,
                    'items'=>$OrderItems,
                    'sellerdet'=>$sellerDet,
                    // 'buyerdet'=>$buyerDet,
                    'deliverdet'=>$deliverDet,
                ];
                $this->view('adminOrderDetails',$data);


            // }
            // elseif($type->order_type = 'AUCTION'){

            //     $OrderDet = $this->orderModel->OrdersAdminView($id);
            //     $OrderItems = $this->orderModel->OrderItemsView($id,$type->order_type);
            //     $sellerDet=$this->orderModel ->sellersInOrder($id,$type->order_type);
            //     // $buyerDet = $this->orderModel ->OrderBuyer($id,$type->order_type);
            //     $deliverDet = $this->orderModel->OrderDeliverers($id,$type->order_type);

            //     $data = [
            //         'details'=>$OrderDet,
            //         'items'=>$OrderItems,
            //         'sellerdet'=>$sellerDet,
            //         // 'buyerdet'=>$buyerDet,
            //         'deliverdet'=>$deliverDet,
            //     ];
            //     var_dump($data);
            //     $this->view('adminOrderDetails',$data);

            // }elseif($type->order_type='REQUEST'){


            //     $OrderDet = $this->orderModel->OrdersAdminView($id);
            //     $OrderItems = $this->orderModel->OrderItemsView($id,$type->order_type);
            //     $sellerDet=$this->orderModel ->sellersInOrder($id,$type->order_type);
            //     // $buyerDet = $this->orderModel ->OrderBuyer($id,$type->order_type);
            //     $deliverDet = $this->orderModel->OrderDeliverers($id,$type->order_type);

            //     $data = [
            //         'details'=>$OrderDet,
            //         'items'=>$OrderItems,
            //         'sellerdet'=>$sellerDet,
            //         // 'buyerdet'=>$buyerDet,
            //         'deliverdet'=>$deliverDet,
            //     ];
            //     $this->view('adminOrderDetails',$data);

            // }

        

        
    }

    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){

        $deliver_id = $_SESSION['deliver_id'];
        $order_type = 


        $data = [
            'title' => 'welcome'
        ];

    }

    }


    public function info($order_id,$order_item_id,$order_type){
        
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){

            $deliver_id = $_SESSION['deliver_id'];
            $id = $order_id;
            $type = $order_type;
            $order_item_id = $order_item_id;

            if($type=="AUCTION"){
                $order=$this->orderModel->getAuctionOrderDetails($order_item_id);
                }elseif($type == "PURCHASE"){
                $order=$this->orderModel->getOrderDetails($order_item_id);
                }elseif($type == "REQUEST"){
                $order=$this->orderModel->getRequestOrderDetails($order_item_id);
                }
               
            $available = $this->orderModel->getDeliverAvailability($deliver_id);

                
            $data = [
                'title' => 'welcome',
                'order' => $order,
                'available' =>  $available,
                'type' => $type,
                'order_item_id' => $order_item_id
            ];

           
    
            $this->view('deliveryOrderDetails',$data);
        }
    }



    

    public function ImageChecking($id){
        
    }
   
    public function CheckItemsImages($id){
        $data = ['title'=>'welcome'];
        $this -> view('adminImageCheck',$data);
    }


    public function completed($order_id,$order_item_id,$order_type){
        if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'deliver'){
            $deliver_id = $_SESSION['deliver_id'];
            $id = $order_id;
            $type = $order_type;

        if($type=="AUCTION"){
                $order=$this->orderModel->getAuctionOrderDetails($order_item_id);
                }elseif($type == "PURCHASE"){
                $order=$this->orderModel->getOrderDetails($order_item_id);
                }elseif($type == "REQUEST"){
                $order=$this->orderModel->getRequestOrderDetails($order_item_id);
                }

                $data = [
                    'title' => 'welcome',
                    'order' => $order,
                    'type' => $type
                ];
        
                $this->view('deliveryCompletedOrderDetails',$data);


        }
        
    }

    public function Completedd(){
        $orders = $this->orderModel->getSellerCompleteOrders($_SESSION['seller_id']);
        $data=[
            "orders"=>$orders,
        ];
        
        $this -> view('sellerOrderComplete',$data);
    }


   

   
}



