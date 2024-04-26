<?php 
 class Home extends Controller{

  
    private $adminModel;
    private $deliverModel;
    private $userModel;
    private $orderModel;
    private $VehicleModel;
   public function __construct()
   {

    $this->orderModel=$this->model("Order");
    $this->deliverModel =$this->model('Deliver');
    $this->adminModel =$this->model('Admin');
    $this->deliverModel =$this->model('Deliver');
    $this->userModel =$this->model('User');
    $this->VehicleModel =$this->model('DeliveryVehicle');
    
   }
  
   public function index(){

    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin'){
      $details = $this->adminModel->findUsers();
      $row = $this->adminModel->countUsers();
      $sellerCount = $this->adminModel->countBuyers();
      $buyerCount = $this->adminModel->countSellers();
      $deliveryCount = $this->adminModel->countAgents();

  $data=[
      "details"=>$details,
      'usercount' =>$row,
      'sellercount'=>$sellerCount,
      'buyercount'=>$buyerCount,
      'deliverycount'=>$deliveryCount,

  ];
  $this -> view('adminDashboard',$data);
  }
   elseif(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'deliver') {
    $deliver_id = $_SESSION['deliver_id'];
    $availability = $this->orderModel->getDeliverAvailability($deliver_id);
    $reco = $this->orderModel->getRecommendedOrders($_SESSION['deliver_id']);
    $hasVehicle = $this->VehicleModel->hasVehicle($_SESSION['user_id']);
    
    // $details = $this->orderModel->getOngoingOrderDetails($deliver_id);
    // $rowB = $this->orderModel->getBuyerDetailsOngoingOrder($deliver_id);
    // $rowS = $this->orderModel->getSellerDetailsOngoingOrder($deliver_id);
if(!$availability){
    $current =$this->orderModel->getDeliverCurrentOrder($deliver_id);
    if($current->current_order_type=="AUCTION"){
      $order=$this->orderModel->getAuctionOrderDetails($current->current_order_item_id);
      }elseif($current->current_order_type=="PURCHASE"){
      $order=$this->orderModel->getOrderDetails($current->current_order_item_id);
      }elseif($current->current_order_type=="REQUEST"){
      $order=$this->orderModel->getRequestOrderDetails($current->current_order_item_id);
    }
    

      
      
      $data = [
        'details' => $order, 
        'reco' => $reco,
        'hasVehicle' => $hasVehicle  
      ];
 
      
    }else{
      
      // var_dump($reco);
      
      $data = [
        'reco' => $reco,
        'details' =>false,
        'hasVehicle' => $hasVehicle 
      ];
     
    }
    // $view;
    $this->view('deliveryHome', $data);

    
       } 
       else{
        











    $data =[
      'logged'=>isset($_SESSION['user_id']),
      'username'=>isset($_SESSION['user_id'])?($_SESSION['user_name']):null,
  ];

    $this->view('home',$data);

       }
  
    
  }



   
   





















   
   
   public function about($id)
   {
    echo "about loaded".$id;
   }

   



 }
?>