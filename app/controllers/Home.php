<?php 
 class Home extends Controller{

  
    private $userModel;
    private $deliverModel;
   public function __construct()
   {
    $this->userModel =$this->model('User');
     $this->deliverModel =$this->model('Deliver');

   }
   public function index(){

    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin'){
      $details = $this->userModel->getUserDet();
  $data=[
      "details"=>$details,
  ];
  $this -> view('adminDash',$data);
  }
   if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'deliver') {
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