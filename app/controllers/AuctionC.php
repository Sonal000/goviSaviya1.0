<?php

class AuctionC extends Controller{
    private $auctionModel;
    private $sellerModel;
    private $buyerModel;
    public function __construct(){
        $this->auctionModel =$this->model('Auction');
        $this->sellerModel =$this->model('Seller');
        $this->buyerModel =$this->model('Buyer');
            
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

                    $bid = $this->auctionModel->getCurrentBid($id);

                    $activebidder = $this->auctionModel->isActiveBidder($id ,$_SESSION['buyer_id']);

                    $bidCount = $this->auctionModel->getBidCount($id);
                    $yourBid = $this->auctionModel->getYourBid($id,$_SESSION['buyer_id']);


                    $currentDateTime = new DateTime();
                    $expDateTime = new DateTime($row->exp_date);
                    $timeDifference = $currentDateTime->diff($expDateTime);
                    $remains = $timeDifference->format('%a days %H hours');
               



// echo "Remaining days: " . $timeDifference->d . " days<br>";
// echo "Remaining hours: " . $timeDifference->h . " hours";           
                    
                  

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
                          'leading_bidder'=>(($bid?$bid->buyer_id:0)==$_SESSION['buyer_id']?true:false),
                          'yourBid'=>$yourBid?$yourBid->your_bid:0,
                      ]
                          ;
            
                    }
                }else{
                    $this->view('_404');
                 }
           

                $this->view('auctionItemInfo',$data);
        }


        public function bid($id){

            if($_SERVER['REQUEST_METHOD']=='POST'){
                var_dump($id);
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $data=[
                    'bid_price'=>trim($_POST['bid_price']),
                    'buyer_id'=>$_SESSION['buyer_id'],
                    'auction_id'=>$id
                ];
          
                if($this->auctionModel->addBid($data)){
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
        
        $this->auctionModel->endAuction($id);
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