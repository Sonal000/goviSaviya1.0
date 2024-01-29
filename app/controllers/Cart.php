<?php


class Cart extends Controller {
   private $itemModel;
   private $buyerModel;
   private $orderModel;
 public function __construct(){
  $this->itemModel=$this->model('Item');
  $this->buyerModel=$this->model('Buyer');
  $this->orderModel=$this->model('Order');
 }

 public function index()
 {
  $items = $this->itemModel->getCartItems($_SESSION['buyer_id']);
  $data = [
   'items'=>$items,
];

  $this->view('cart',$data);
 }
 public function delete(){
  if($_SERVER['REQUEST_METHOD']==='POST'){
    $cart_id = $_POST['cart_id'];
    $this->itemModel->deleteCartItem($cart_id);
    header("Location: " . URLROOT . "/cart"); 
    exit();
  }
 }
 
 public  function checkout(){
  $items = $this->itemModel->getCartItems($_SESSION["buyer_id"]);
  $buyerInfo = $this->buyerModel->getProfileInfo($_SESSION["user_id"]);
  $data=[
    "items"=>$items,
    "buyerName"=>$buyerInfo->name,
    "buyerEmail"=>$buyerInfo->email,
    "buyerAddress"=>$buyerInfo->address,
    "buyerCity"=>$buyerInfo->city,
    "buyerMobile"=>$buyerInfo->mobile,
  ];
  $this->view('checkout',$data);
 }


//  placeorder
 public function placeOrder(){
  $items = $this->itemModel->getCartItems($_SESSION["buyer_id"]);
  $details=[];
  
  if($_SERVER['REQUEST_METHOD']=='POST'){

      
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
   


      $details=[
        "order_mobile"=>trim($_POST['mobile']),
        "order_address"=>trim($_POST['address']),
        "order_company"=>trim($_POST['company']),
        "order_city"=>trim($_POST['city']),
        "order_postal_code"=>trim($_POST['postalCode'])
      ];

      if($this->orderModel->placeOrder($items,$details,$_SESSION["buyer_id"])){

        if($this->itemModel->clearCartitems($_SESSION["buyer_id"])){
          header("Location: " . URLROOT . "/marketplace"); 
          exit();  
        }else{
          header("Location: " . URLROOT . "/cart"); 
          exit();
        };
      }else{
        header("Location: " . URLROOT . "/cart"); 
        exit();
      }

    
}






 }



// test
    public function test() {

    } 
 
 
 
}