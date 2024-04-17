<?php 
 class Home extends Controller{

  
    private $adminModel;
    private $deliverModel;
    private $userModel;
   public function __construct()
   {

    $this->orderModel=$this->model("Order");
    $this->deliverModel =$this->model('Deliver');
   }
   public function index()
   {
       $data = [
           'logged' => isset($_SESSION['user_id']),
           'username' => isset($_SESSION['user_id']) ? ($_SESSION['user_name']) : null,
       ];
   
       
       if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'deliver') {
        
            $deliver_id = $_SESSION['deliver_id'];
            $details = $this->orderModel->getOngoingOrderDetails($deliver_id);
            $rowB = $this->orderModel->getBuyerDetailsOngoingOrder($deliver_id);
            $rowS = $this->orderModel->getSellerDetailsOngoingOrder($deliver_id);
            $view;

        $data = [
            'details' => $details,
            'rowB' => $rowB,
            'rowS' => $rowS
        ];

        // if(!$details){
        //     $view = false;
        // }else{
        //     $view = true;
        // }





        $this -> view('deliveryHome',$data);
       } else {
           // Load default home view
           $this->view('home', $data);

    $this->adminModel =$this->model('Admin');
     $this->deliverModel =$this->model('Deliver');
     $this->userModel =$this->model('User');

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
  $this -> view('adminDash',$data);
  }
   elseif(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'deliver') {
           // Assuming getOngoingOrdersdetails is a method in the Deliver model
           $orders = $this->deliverModel->getOngoingOrdersDetails($_SESSION['user_id']);
           $data['orders'] = $orders; // pass orders data to view
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