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
        

        $data = ['title'=>'welcome'];
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
       if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){
        $orders = $this->orderModel->getSellerOrders($_SESSION['seller_id']);
    $data=[
        "orders"=>$orders,
    ];
    $this -> view('sellerOrder',$data);
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
    //     $file = fopen("LK.txt", "r");

    // // Initialize an empty array to store postal codes
    // $postalCodes = array();

    // // Read each line from the file
    // while (($line = fgets($file)) !== false) {
    //     // Split the line by tabs
    //     $fields = explode("\t", $line);
    //     // Extract postal code and add it to the array
    //     $postalCodes[] = $fields[1];
    // }

    // // Close the file
    // fclose($file);

    // Create data array to pass to the view
    $data = [
        'title' => 'welcome',
        // 'postalCodes' => $postalCodes
];

    // var_dump($data);
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



