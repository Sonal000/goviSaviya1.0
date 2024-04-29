<?php 

 class OrderRequests extends Controller{
    private $RequestsModel;
    private $notifiModel;
    private $buyerModel;
    private $sellerModel;
    private $orderModel;
   public function __construct()
   {
    $this->RequestsModel=$this->model("Requests"); 
    $this->notifiModel=$this->model("Notifi"); 
    $this->buyerModel=$this->model("Buyer"); 
    $this->sellerModel=$this->model("Seller"); 
    $this->orderModel=$this->model("Order"); 


   }
   public function index(){
    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='buyer'){
      $request = $this->RequestsModel->BuyerAcceptRequests($_SESSION['buyer_id']);
      $pendreq = $this->RequestsModel->BuyerPendingRequests($_SESSION['buyer_id']);
      $quotation=$this->RequestsModel->BuyerQuotations($_SESSION['buyer_id']);
      // $active =  $this->RequestsModel->getBuyerActiveRequests($_SESSION['buyer_id']);
      $payment =  $this->RequestsModel->getBuyerPaymentRequests($_SESSION['buyer_id']);
      $paymentsCount =  $this->RequestsModel->getBuyerPaymentRequestsCount($_SESSION['buyer_id']);
     
      
      $data =[
          'requests'=> $payment,
          'paymentsCount'=>$paymentsCount,
          'pendreq'=>$pendreq,
          'quotations'=>$quotation,
      ];

      $this->view('buyerRequestPosts',$data);
    }

    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){

      $current_date_time = date('Y-m-d H:i:s');
      $request =$this->RequestsModel->getOrderRequests($current_date_time);
      $Qrequests =$this->RequestsModel->getQorderRequests();
      $data =[
        'requests'=>$request,
        'Qrequests'=>$Qrequests,
      ];

      $this -> view('sellerAdrequest',$data);
    }

    
  }


   public function add(){
    if($_SERVER['REQUEST_METHOD']=='POST'){

      //sanitize POST data
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      
      $req_img = trim($_POST['category'])=='spices' ? 'spices_request_img.jpg' : (trim($_POST['category'])=='vegetables' ? 'vegitable_request_img.jpg' : 'fruits_request_img.jpg');
                  $data=[
                  'name'=>trim($_POST['name']),
                  'category' =>trim($_POST['category']),
                  'req_stock' =>trim($_POST['req_stock']),
                  'unit'=>trim($_POST['unit']),
                  'req_date' =>trim($_POST['req_date']),
                  'req_address' =>trim($_POST['req_address']),
                  'req_img' =>$req_img,
                  'district' =>trim($_POST['district']),
                  'buyer_id'=>$_SESSION['buyer_id'],
                  
                 
                ];
                if($this->RequestsModel->addRequests($data)){
                  $data=[
                      'name'=>'',
                      'category' =>'',
                      'unit' =>'',
                      'req_stock' =>'',
                      'unit'=>'',
                      'req_date' =>'',
                      'req_address' =>'',
                      'district' =>'',
                      'buyer_id' =>'',
                      
                      
                    ];
                    redirect('OrderRequests');
              }else{
                echo '<script>
                      alert("add item failed");
                </script>';
              };
      }
      else{
        $this -> view('buyerRequestPosts');
      }
      
      
   }

   public function accept($id){

    $this->RequestsModel->acceptRequest($id);
    $requests = $this->RequestsModel->getOrderRequests();


    $data=[
      // 'Qrequests'=>$Qrequests,
      'requests'=>$requests,
    ];
    $this->view('sellerAdaccept',$data);


   }

   

   public function decline($id){

    $this->RequestsModel->declineRequest($id);

    $request =$this->RequestsModel->getOrderRequests();
      $data =[
        'requests'=>$request,
      ];

      $this -> view('sellerAdrequest',$data);
}

   public function accepted(){

    $requests=$this->RequestsModel->getAcceptRequests();
    $Qrequests =$this->RequestsModel->getQorderRequests();
    $PQrequests = $this->RequestsModel->getPQorderRequests();


    $data=[
      'requests'=>$requests,
      'Qrequests'=>$Qrequests,
      'PQrequests'=>$PQrequests,
    
    ];
    $this->view('sellerAdaccept',$data);

   }

   public function setQuotation($id){

    if($_SERVER['REQUEST_METHOD']=='POST'){

      //sanitize POST data
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

      $data =[
        'amount'=>trim($_POST['amount']),
        'request_ID'=>$id,
        
      ];
     
      if($this->RequestsModel->addQuotation($data)){

        $request=$this->RequestsModel->getRequestDetails($data['request_ID']);
        $buyer = $this->buyerModel->getBuyerInfo($request->buyer_id);

        
        $this->notifiModel->notifyuser(0,$buyer->user_id,"New Quotation received from <span class='bg'>".$_SESSION['user_name']."</span>",'OrderRequests',"REQUEST");
        $data=[
          'amount'=>'',
          'request_ID'=>'',
        
          ];
        redirect('OrderRequests');
      }else{
        return false;
      }

    }else{
      echo 'error';
    }

   }

   public function changeQuotation($id){

    if($_SERVER['REQUEST_METHOD']=='POST'){

      //sanitize POST data
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

      $data =[
        'amount'=>trim($_POST['amount']),
        'request_ID'=>$id,
        'seller_id'=>$_SESSION['seller_id'],
        
      ];

      

      

      if($this->RequestsModel->changeQuotation($data)){
          
           redirect('OrderRequests/accepted');
      }else{
        return false;
      }
    }else{
      echo 'error';
    }
      

      
   }

   public function viewQuotations($id){

    $requests =$this->RequestsModel->getrequestDetails($id);
    $quotations = $this->RequestsModel->viewQuotations($id);

    $data=[
      'details'=>$requests,
      'Q2'=>$quotations,
    ];

    $this->view('viewQuotations',$data);
   }

   public function acceptQuotation($id){
    $row=$this->RequestsModel->acceptquotation($id);
        if($row){
          $this->notifiModel->notifyUser(0,$row,"Quotation accepted by buyer for your quotation <span class='bg'>".$id."</span> ","OrderRequests/accepted","REQUEST");
          redirect('OrderRequests');
        }else{
          redirect('OrderRequests');

        }
   }





   // =================checkout==========================================
public  function checkout($id){
  $items = $this->RequestsModel->getrequestDetails($id);
  $buyerInfo = $this->buyerModel->getProfileInfo($_SESSION["user_id"]);
  $sellerInfo = $this->sellerModel->getsellerInfo($items->acp_seller_ID);
  $totalDeliveryfee = 0;

      $totalDeliveryfee +=( getDistancefee($sellerInfo->address,$items->req_address));
  $data=[
          "request_id"=>$id,
            "items"=>$items,
            "buyerName"=>$buyerInfo->name,
            "buyerEmail"=>$buyerInfo->email,
            "buyerAddress"=>$items->req_address,
            "sellerAddress"=>$sellerInfo->address,
            "buyerCity"=>$buyerInfo->city,
            "buyerMobile"=>$buyerInfo->mobile,
            "totalDeliveryfee"=>$totalDeliveryfee,
            "highest_price"=>$items->acp_amount,
          ];
          $this->view('checkoutrq',$data);
      }


      // public function payments($id){
      //   $reqid = $this->orderModel->getOrderRequestId($id);
      //   $item = $this->RequestsModel->getrequestDetails($reqid);
    
      //     // var_dump($item);
      //     // var_dump( ($item->acp_amount / $item->req_stock) * 100);
      

      //         $lineItems[] = [
      //             "quantity" => $item->req_stock, // Assuming quantity is always 1 for each item
      //             "price_data" => [
      //                 "currency" => "lkr", // Change currency according 
      //                 "unit_amount" => ( intval($item->acp_amount / $item->req_stock) * 100), // Stripe requires 
      //                 "product_data" => [
      //                     "name" => $item->name, // Use item name from your database
      //                 ],
      //             ],
      //         ];

              
      //     \Stripe\Stripe::setApiKey(STRIPESECRETKEY);
      //     $checkout_session = \Stripe\Checkout\Session::create([
      //       "mode" => "payment",
      //       "success_url" => "http://localhost/goviSaviya1.0/orderRequests/verifiedOrder/".$id, // success page
      //       "locale" => "auto",
      //       "cancel_url" => "http://localhost/goviSaviya1.0/orderRequests/checkout/".$id, // cancel page
      //       "locale" => "auto",
      //       "line_items" => $lineItems,
      //   ]);
      //   // Redirect the user to the Stripe Checkout page
      //   http_response_code(303);
      //   header("Location: " . $checkout_session->url);
            
      //   exit();
      //   }
      public function payments($id){
        $reqid = $this->orderModel->getOrderRequestId($id);
        $item = $this->RequestsModel->getrequestDetails($reqid);
        try {
          $lineItems[] = [
              "quantity" => $item->req_stock, // Assuming quantity is always 1 for each item
              "price_data" => [
                  "currency" => "lkr", // Change currency according 
                  "unit_amount" => (intval($item->acp_amount / $item->req_stock) * 100), // Stripe requires 
                  "product_data" => [
                      "name" => $item->name, // Use item name from your database
                  ],
              ],
          ];
      
          \Stripe\Stripe::setApiKey(STRIPESECRETKEY);
          $checkout_session = \Stripe\Checkout\Session::create([
              "mode" => "payment",
              "success_url" => "http://localhost/goviSaviya1.0/orderRequests/verifiedOrder/".$id, // success page
              "locale" => "auto",
              "cancel_url" => "http://localhost/goviSaviya1.0/orderRequests/checkout/".$reqid, // cancel page
              "locale" => "auto",
              "line_items" => $lineItems,
          ]);
      
         
          http_response_code(303);
          header("Location: " . $checkout_session->url);
      } catch (\Stripe\Exception\ApiErrorException $e) {
  
          $this->orderModel->deleteAllOrdersByOrderId($id);
          echo "<script>alert('Failed to process payment: check your internet connection');</script>";
          redirect("orderRequests/checkout/".$reqid."?payment_failed=true");
         
      } catch (Exception $e) {
       
          $this->orderModel->deleteAllOrdersByOrderId($id);
          echo "<script>alert('Failed to process payment: check your internet connection');</script>";
          redirect("orderRequests/checkout/".$reqid."?payment_failed=true");
      }
      
      }  



        public function verifiedOrder($id){
        
          if($this->orderModel->updateOrderPaymentStatus($id)){
            $rows=$this->orderModel->getOrderDetailsByOrderId($id,"REQUEST");
            foreach ($rows as $row) {
                $this->notifiModel->notifyuser(0,$row->seller_user_id,"New order received from <span class='bg'>".$row->buyer_name."</span>",'orderRequests/accepted',"ORDER");
             
            }

         
              header("Location: " . URLROOT . "/orders"); 
          }else{
              redirect('orderRequests/checkout/'.$id);
          };
        
    
        
        }
        
        
        //  placeorder
        public function placeOrder($id){
          
        
          $items = $this->RequestsModel->getrequestDetails($id);
     
          $seller = $this->sellerModel->getsellerInfo($items->acp_seller_ID);
          if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
              $details=[
                "buyer_name"=>trim($_SESSION['user_name']),
                "order_mobile"=>trim($_POST['mobile']),
                "order_address"=>trim($_POST['address']),
                "order_company"=>trim($_POST['company']),
                "order_city"=>trim($_POST['city']),
                "order_postal_code"=>trim($_POST['postalCode']),
                "seller_address"=> $seller->address
              ];
             
              $order_id= $this->orderModel->placeRequestOrder($items,$details,$_SESSION["buyer_id"]);
              

              if($order_id){
                          header("Location: " . URLROOT . "/orderRequests/payments/".$order_id); 
                          exit();  
              }else{
               redirect('orderRequests/checkout/'.$id);
                exit();
              }
            }
         }
      
      
      // =================checkout==========================================











 }
?>