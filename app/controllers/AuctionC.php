<?php

class AuctionC extends Controller{
    private $auctionModel;
    private $sellerModel;
    private $buyerModel;
    private $notifiModel;
    private $orderModel;
    public function __construct(){
        $this->auctionModel =$this->model('Auction');
        $this->sellerModel =$this->model('Seller');
        $this->buyerModel =$this->model('Buyer');
        $this->notifiModel =$this->model('Notifi');
        $this->orderModel =$this->model('Order');
            
    }

    public function index(){


                  // pagination
      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      $perPage = 20;

      // sortings
      $sort =isset($_GET['sort']) ? $_GET['sort'] : null;
      $order =isset($_GET['order']) ? $_GET['order'] : "ASC";


      // filterings
      // Filtering by Category
      $category = isset($_GET['category']) ? (array)explode('%a%', $_GET['category']) : [];
      $city = isset($_GET['city']) ? (array)explode('%a%',$_GET['city'] ): [];
      $minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : null;
      $maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : null;
      $minQty = isset($_GET['minQty']) ? $_GET['minQty'] : null;
      $maxQty = isset($_GET['maxQty']) ? $_GET['maxQty'] : null;
      $search = isset($_GET['search']) ? (array)explode('%a%',$_GET['search'] ): [];


      // var_dump($search);
   
      $filter=[
       'category'=>  $category,
         'city'=>$city,
         'minPrice'=>$minPrice,
         'maxPrice'=>$maxPrice,
         'minQty'=>$minQty,
         'maxQty'=>$maxQty,
         'search'=>$search
         ];

      $row=$this->auctionModel->getItems($page,$perPage,$sort,$order,$filter);
      $totalCount=$row['totalCount'];
      
    if(isset($_SESSION['buyer_id'])){
        foreach ($row['items'] as $item) {
            $activebidder=$this->auctionModel->isActiveBidder($item->auction_ID,$_SESSION['buyer_id']);
            $currentBid = $this->auctionModel->getCurrentBid($item->auction_ID);
            // var_dump($currentBid);
            $item->active_bidder=$activebidder;
            $item->leading_bidder=(($currentBid?$currentBid->buyer_id:0) == $_SESSION['buyer_id'])?true:false;
        }
        $data=[
            'items'=>$row['items'],
            'totItems'=>$totalCount,
            'totPages'=>ceil($totalCount/$perPage),
            'page'=>$page,
            'category'=>$category,
            'city'=>$city,
            'priceRange'=>$maxPrice? ('price: '.$minPrice.' - '.$maxPrice) :false,
            'qtyRange'=>$maxQty?('quantity: '.$minQty.' - '.$maxQty):false,
            'search_term'=>isset($_GET['search']) ?join(" ",(array)explode('%a%',$_GET['search'] )):''
        ];
    }else{

        $data=[
            'items'=>$row['items'],
            'totItems'=>$totalCount,
            'totPages'=>ceil($totalCount/$perPage),
            'page'=>$page,
            'category'=>$category,
            'city'=>$city,
            'priceRange'=>$maxPrice? ('price: '.$minPrice.' - '.$maxPrice) :false,
            'qtyRange'=>$maxQty?('quantity: '.$minQty.' - '.$maxQty):false,
            'search_term'=>isset($_GET['search']) ?join(" ",(array)explode('%a%',$_GET['search'] )):''
        ];
    } 
        // $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            // $perPage = 20;
            // $row=$this->auctionModel->getItems($page,$perPage);
            // $totalItems = $this->auctionModel->getTotalItemsCount(); 
            // $data=[
            //     'items'=>$row,
            //     'totItems'=>$totalItems,
            //     'totPages'=>$totalItems/$perPage,
            //     'page'=>$page
            // ];

          if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){
            $this->view('sellerAuc',$data);
         }else{
      
            $this->view('auction',$data);
         }
      
      
         }



         public function itemInfo($id){
            

                $row=$this->auctionModel->getAuctionInfo($id);
                
                if($row){
                    


                   $seller=$this->sellerModel->getSellerInfo($row->seller_ID);
                  if($seller){

                      $bidCount = $this->auctionModel->getBidCount($id);
                    $bid = $this->auctionModel->getCurrentBid($id);
                    if(isset($_SESSION['buyer_id'])){
                    $activebidder = $this->auctionModel->isActiveBidder($id ,$_SESSION['buyer_id']);

                    $yourBid = $this->auctionModel->getYourBid($id,$_SESSION['buyer_id']);
                    
                    $leading_bidder = (($bid?$bid->buyer_id:0)==$_SESSION['buyer_id']?true:false);

                    if($row->highest_buyer_id && $row->highest_buyer_id==$_SESSION['buyer_id']){
                        $winning_bidder=true;    
                    }else{
                        $winning_bidder=false;
                    }
                    }else{
                        $activebidder=false;
                        $yourBid=false;
                        $winning_bidder=false;
                        $leading_bidder=false;
                    }

                    $currentDateTime = new DateTime();
                    $expDateTime = new DateTime($row->exp_date);
                    $timeDifference = $currentDateTime->diff($expDateTime);
                    $remains = $timeDifference->format('%a days %H hours');
               



// echo "Remaining days: " . $timeDifference->d . " days<br>";
// echo "Remaining hours: " . $timeDifference->h . " hours";    
$userIds = $this->auctionModel->getAuctionBidUserIds($id);

    
if(($row->highest_buyer_id) && (!isset($_SESSION['user_id'])) && (!$activebidder)){

    $this->view('_404');
    exit();

}


    

                  

                      $data=[
                          'name'=>$row->name,
                          'item_id'=>$id,
                          'seller_name'=>$seller->name,
                          'seller_id'=>$seller->seller_id,
                          'seller_city'=>$seller->city,
                          'category'=>$row->category,
                          'description'=>$row->description,
                          'price'=>$row->price,
                          'current_bid'=>$bid?$bid->bid_price:$row->price,
                          'unit'=>$row->unit,
                          'district'=>$row->district,
                          'exp_date'=>$remains,
                          'bid_Count'=>$bidCount->bid_count,
                          'created_at'=>$row->created_at,
                          'item_img'=>$row->item_img,
                          'stock'=>$row->stock,
                          'active_bidder'=>$activebidder,
                          'leading_bidder'=>$leading_bidder,
                          'yourBid'=>$yourBid?$yourBid->your_bid:0,
                          'highest_bidder_id'=>$row->highest_buyer_id,
                          'auction_id'=>$id,
                          'winning_bidder'=>$winning_bidder,
                      ]
                          ;
            
                          $this->view('auctionItemInfo',$data);
                    }
                }else{
                    $this->view('_404');
                 }
           

        }

// =================ceckout==========================================
public  function checkout($id){
    $items = $this->auctionModel->getAuctionInfo($id);
    
    if($items->highest_buyer_id){
        if((!isset($_SESSION['buyer_id']))|| ($_SESSION['buyer_id']!=$items->highest_buyer_id)){
            $this->view('_404');
            exit();
        }
    }
    $buyerInfo = $this->buyerModel->getProfileInfo($_SESSION["user_id"]);
    var_dump($buyerInfo);
    
    $totalDeliveryfee = 0;
    foreach ($items as $item) {
        $totalDeliveryfee +=( getDistancefee($item->address,$buyerInfo->address));
    }
    
    
    $data=[
            "auction_id"=>$id,
              "items"=>$items,
              "buyerName"=>$buyerInfo->name,
              "buyerEmail"=>$buyerInfo->email,
              "buyerAddress"=>$buyerInfo->address,
              "buyerCity"=>$buyerInfo->city,
              "buyerMobile"=>$buyerInfo->mobile,
              "totalDeliveryfee"=>$totalDeliveryfee
            ];
            $this->view('checkoutac',$data);
        }


        public function payments($id){
            $items = $this->auctionModel->getAuctionInfo($id);
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
              "success_url" => "http://localhost/goviSaviya1.0/auctionC/verifiedOrder/".$id, // success page
              "cancel_url" => "http://localhost/goviSaviya1.0/auctionC/checkout/".$id, // cancel page
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
                $this->notifiModel->notifyuser(0,$seller->user_id,"New order received from <span class='bg'>".$item->buyer_name."</span>",'orders');
              }
                header("Location: " . URLROOT . "/orders"); 
            }else{
                redirect('AuctionC/checkout/'.$id);
            };
          
          
          
          }
          
          
          //  placeorder
          public function placeOrder($id){
            
            $items = $this->auctionModel->getAuctionInfo($id);  
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
                            header("Location: " . URLROOT . "/auctionC/payments/".$order_id); 
                            exit();  
                }else{
                 redirect('AuctionC/checkout/'.$id);
                  exit();
                }
              }
           }
        
        
        // =================checkout==========================================
        
        public function bid($id){

            if($_SERVER['REQUEST_METHOD']=='POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $data=[
                    'bid_price'=>trim($_POST['bid_price']),
                    'buyer_id'=>$_SESSION['buyer_id'],
                    'auction_id'=>$id
                ];
                $bid_id=$this->auctionModel->addBid($data);
                if($bid_id){
                   
                    $users=$this->auctionModel->getBidUsersInfo($bid_id);
                    $this->notifiModel->notifyUser(0,$users->seller_user_id,"<span class='bg'>".$users->buyer_name."</span> has bid on your item.",'AuctionC/items',"AUCTION");
                    $bids = $this->auctionModel->getAuctionBidUserIds($id);
                    foreach ($bids as $bid) {
                        if($bid->buyer_id != $users->buyer_id){
                            $this->notifiModel->notifyUser(0,$bid->buyer_user_id,"Someone has outbid  the item you have bid on.",'AuctionC/itemInfo/'.$id,"AUCTION");
                        }
                    }
                    redirect('AuctionC/itemInfo/'.$id);
                }else{
                    echo 'bid failed';
                }
            }
        }

    // public function auctionInfo($id){
    //     $row =$this->auctionModel->getAuctionInfo($id);
        
    //     $data=[

    //         'items'=>$row
    //     ];
    //     if($row){
    //         $this->view('auctionItemInfo',$data);
    //     }
    //     else{
    //         echo 'nothing to show';
    //     }


    // }

    public function items(){
        $row=$this->auctionModel->myAuctionInfo($_SESSION['seller_id']);
        if($row){

            foreach ($row as $item) {
                $currentDateTime = new DateTime();
                $expDateTime = new DateTime($item->exp_date);
                $timeDifference = $currentDateTime->diff($expDateTime);
                $remains = $timeDifference->format('%a days %H hours');
                $currentBid = $this->auctionModel->getCurrentBid($item->auction_ID);
                $bidInfo=$this->auctionModel->getAuctionBidInfo($item->auction_ID);
                $buyerinfo = $this->buyerModel->getBuyerInfo($currentBid?$currentBid->buyer_id:null);
                
                $bidCount = $this->auctionModel->getBidCount($item->auction_ID);
                
                
                $item->time_remain =$remains;
                $item->bid_Count =$bidCount->bid_count;
                $item->current_bid =$currentBid?$currentBid->bid_price:$item->price;
                $item->current_buyer_name =$buyerinfo?$buyerinfo->name:null;
                $item->bidlist=$bidInfo;
                
            
            
        }
    }
        $data=[
            'items'=>$row
        ];
        
        $this->view('sellerauction',$data);
        
        

    }

    public function endAuction($id){
        $highestBid=$this->auctionModel->getCurrentBid($id);
        
        if($highestBid){
            $bids = $this->auctionModel->getAuctionBidUserIds($id);
            $item=$this->auctionModel->getAuctionInfo($highestBid->auction_id);
            if($bids&& $item){
            if($this->auctionModel->endAuction($id,$highestBid->buyer_id)){

                $bidUsers=$this->auctionModel->getBidUsersInfo($highestBid->bid_id);
                
                if($bidUsers){
                    $this->notifiModel->notifyUser(0,$bidUsers->buyer_user_id,"You have won the auction for <span class='bg'>".$item->name."</span>",'AuctionC/itemInfo/'.$id,"AUCTION");
    
                        foreach ($bids as $bid) {
                        if($bid->buyer_id != $bidUsers->buyer_id){
                            $this->notifiModel->notifyUser(0,$bid->buyer_user_id,"You have lost the auction for the item <span class='bg'>".$item->name."</span> you have bid on.",'viewAuction'.$id,"AUCTION");
                        }
                    }   
                }
            }
        }else{
            redirect('AuctionC/items');
                    
        }
        }
        redirect('AuctionC/items');
    }


    
    



    public function add() {
        if($_SERVER['REQUEST_METHOD']=='POST'){

           
    //sanitize POST data
    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
    if (isset($_FILES['item_img'])) {
        $uploadDirectory = (str_replace("\\", "/",STOREROOT)) . '/items/'; 
        $filename = uniqid() . '_' . $_FILES['item_img']['name'];
        $targetPath = $uploadDirectory . $filename;         
        if (move_uploaded_file($_FILES['item_img']['tmp_name'], $targetPath)){
            
            $data=[
                'name'=>trim($_POST['name']),
                'category' =>trim($_POST['category']),
                'unit' =>trim($_POST['unit']),
                'seller_ID' =>($_SESSION['seller_id']),
                'price' =>trim($_POST['price']),
                'stock' =>trim($_POST['stock']),
                'exp_date' =>trim($_POST['exp_date']),
                'start_date'=>trim($_POST['start_date']),
                'end_date' =>trim($_POST['end_date']),
                'address' =>trim($_POST['address']),
                'district' =>trim($_POST['district']),
                'description' =>trim($_POST['description']),
                'status'=>'active',
                'item_img'=>$filename
                
              ];
              if($this->auctionModel->addItem($data)){
                $data=[
                    'name'=>'',
                    'category' =>'',
                    'unit' =>'',
                    'seller_ID' =>'',
                    'price' =>'',
                    'stock' =>'',
                    'exp_date' =>'',
                    'start_date'=>'',
                    'end_date'=>'',
                    'address' =>'',
                    'district' =>'',
                    'description' =>'',
                    'item_img'=>''
                  ];
                  redirect('AuctionC/items');
                //   header()
            }else{
              echo '<script>
                    alert("add item failed");
              </script>';
            };

    } else {
        die('Something went wrong.');
    }
    } else {
    die('Failed to move the uploaded file.');
    }

        }
       $this->view('auctionList');
    }



   /* public function about(){
        $this ->view('Pages/about');
    }*/
}