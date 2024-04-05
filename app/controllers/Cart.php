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


//  placeorder
 public function placeOrder(){
  $items = $this->itemModel->getCartItems($_SESSION["buyer_id"]);
  $details=[];

  var_dump($items);

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
    "success_url" => "http://localhost/goviSaviya1.0/orders", // Change this URL to your success page
    "cancel_url" => "http://localhost/goviSaviya1.0/cart/checkout", // Change this URL to your cancel page
    "locale" => "auto",
    "line_items" => $lineItems,
]);

// Redirect the user to the Stripe Checkout page
http_response_code(303);
header("Location: " . $checkout_session->url);
exit;







  
  if($_SERVER['REQUEST_METHOD']=='POST'){

      
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
   


      $details=[
        "order_mobile"=>trim($_POST['mobile']),
        "order_address"=>trim($_POST['address']),
        "order_company"=>trim($_POST['company']),
        "order_city"=>trim($_POST['city']),
        "order_postal_code"=>trim($_POST['postalCode'])
      ];






      // if($this->orderModel->placeOrder($items,$details,$_SESSION["buyer_id"])){

      //   if($this->itemModel->clearCartitems($_SESSION["buyer_id"])){
      //     header("Location: " . URLROOT . "/marketplace"); 
      //     exit();  
      //   }else{
      //     header("Location: " . URLROOT . "/cart"); 
      //     exit();
      //   };
      // }else{
      //   header("Location: " . URLROOT . "/cart"); 
      //   exit();
      // }

    
}






 }



// test
    public function test() {

    } 
 
 
 
}