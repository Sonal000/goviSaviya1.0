<?php


class Cart extends Controller {
   private $itemModel;
   private $orderModel;
   private $buyerModel;
   private $sellerModel;
   private $notifiModel;
 public function __construct(){
  $this->itemModel=$this->model('Item');
  $this->buyerModel=$this->model('Buyer');
  $this->sellerModel=$this->model('Seller');
  $this->orderModel=$this->model('Order');
  $this->notifiModel=$this->model('Notifi');
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

  $totalDeliveryfee = 0;
  foreach ($items as $item) {
      $totalDeliveryfee +=( getDistancefee($item->address,$buyerInfo->address));
  }


  $data=[
    "items"=>$items,
    "buyerName"=>$buyerInfo->name,
    "buyerEmail"=>$buyerInfo->email,
    "buyerAddress"=>$buyerInfo->address,
    "buyerCity"=>$buyerInfo->city,
    "buyerMobile"=>$buyerInfo->mobile,
    "totalDeliveryfee"=>$totalDeliveryfee
  ];
  $this->view('checkout',$data);
 }


 public function payments($id){
  $items = $this->itemModel->getCartItems($_SESSION["buyer_id"]);
  $lineItems = [];
  foreach ($items as $item) {
      $lineItems[] = [
          "quantity" => $item->qty, // Assuming quantity is always 1 for each item
          "price_data" => [
              "currency" => "lkr", // Change currency according to your needs
              "unit_amount" => $item->price * 100, // Stripe requires amount in cents
              "product_data" => [
                  "name" => $item->name, // Use item name from your database
              ],
          ],
      ];
  }
  \Stripe\Stripe::setApiKey(STRIPESECRETKEY);
  $checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => "http://localhost/goviSaviya1.0/cart/verifiedOrder/".$id, // success page
    "cancel_url" => "http://localhost/goviSaviya1.0/cart/checkout", // cancel page
    "locale" => "auto",
    "line_items" => $lineItems,
]);
// Redirect the user to the Stripe Checkout page
http_response_code(303);
header("Location: " . $checkout_session->url);
    
exit();
}

public function verifiedOrder($id){

  if($this->orderModel->updateOrderPaymentStatus($id)){
    $row=$this->orderModel->getNewOrderDetails($id);
    foreach($row as $item) {
      $seller=$this->sellerModel->getSellerInfo($item->seller_id);
      $this->notifiModel->notifyuser(0,$seller->user_id,"New order received from <span class='bg'>".$item->buyer_name."</span>",'orders',"ORDER");
    }

   
    
    


   foreach($row as $item){
    $this->itemModel->ReduceStock($item->item_id,$item->quantity);
   }


    if($this->itemModel->clearCartitems($_SESSION["buyer_id"])){

      header("Location: " . URLROOT . "/orders"); 
    }else{
      header("Location: " . URLROOT . "/cart"); 
      exit();
    };



  };



}


//  placeorder
public function placeOrder(){
  
  $items = $this->itemModel->getCartItems($_SESSION["buyer_id"]);  
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      $details=[
        "buyer_name"=>trim($_SESSION['user_name']),
        "order_mobile"=>trim($_POST['mobile']),
        "order_address"=>trim($_POST['address']),
        "order_company"=>trim($_POST['company']),
        "order_city"=>trim($_POST['city']),
        "order_postal_code"=>trim($_POST['postalCode'])
      ];
      $order_id= $this->orderModel->placeOrder($items,$details,$_SESSION["buyer_id"]);
      if($order_id){
                  header("Location: " . URLROOT . "/cart/payments/".$order_id); 
                  exit();  
      }else{
        header("Location: " . URLROOT . "/cart"); 
       
        exit();
      }
    }
 }
 
 
}