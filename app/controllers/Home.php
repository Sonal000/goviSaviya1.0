<?php 
 class Home extends Controller{

   public function __construct()
   {


   }
   public function index()
   {
    $data =[
      'logged'=>isset($_SESSION['user_id']),
      'username'=>isset($_SESSION['user_id'])?($_SESSION['user_name']):null,
  ];
  if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){
//     $orders = $this->orderModel->getSellerOrders($_SESSION['seller_id']);
$data=[
    // "orders"=>$orders,
];
$this -> view('deliveryHome',$data);
}else{
    $this->view('home',$data);
   }
  }



   public function about($id)
   {
    echo "about loaded".$id;
   }


 }
?>