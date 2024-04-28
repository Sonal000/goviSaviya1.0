<?php


class Dashboard extends Controller{

    private $orderModel;

    public function __construct(){
        $this->orderModel=$this->model("Order");
        $this->itemModel=$this->model("Item");
        $this->auctionModel=$this->model("Auction");
        $this->sellerModel=$this->model("Seller");
        $this->requestModel=$this->model("Requests");
        
        
        
    }

    public function index(){

        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){
        
            $purchaseOrders = $this->orderModel->sellerPurchaseOrderDetails($_SESSION['seller_id']);
            $AuctionOrders = $this->orderModel->sellerAuctionOrderDetails($_SESSION['seller_id']);
            $RequestsOrders = $this->orderModel->sellerRequestOrderDetails($_SESSION['seller_id']);

            $marketplacepost = $this->itemModel ->countSellerMPosts($_SESSION['seller_id']);
            $auctions = $this->auctionModel ->countSellerauctions($_SESSION['seller_id']);

            $orders = $this->orderModel->getSellerOrders($_SESSION['seller_id']);
            
            $details = $this->sellerModel->sellerInfo($_SESSION['seller_id']);

            $requests = $this->requestModel->countavailablerequests();
            $penalty = $this->orderModel ->countmypenalty($_SESSION['seller_id']);
            $reviews = $this->itemModel ->countmyreviews($_SESSION['seller_id']);

            
            
        
             $total_count = $purchaseOrders->order_count + $AuctionOrders->order_count + $RequestsOrders->order_count ;
             $total_revenue = $purchaseOrders->Prevenue + $AuctionOrders->Arevenue + $RequestsOrders->Rrevenue;

        $data =[
             "Porders"=>$purchaseOrders->order_count,
             "Aorders"=>$AuctionOrders->order_count,
             "Rorders"=>$RequestsOrders->order_count,
             "total" =>$total_count,
             'Trevenue'=>$total_revenue,
             'Prevenue'=>$purchaseOrders->Prevenue,
             'Arevenue'=>$AuctionOrders->Arevenue,
             'Rrevenue'=>$RequestsOrders->Rrevenue,
             'mposts'=>$marketplacepost->post_count,
             'auction'=>$auctions->auction_count,
             'orders'=>$orders,
             'seller_name'=>$details->seller_name,
             'seller_img'=>$details->seller_img,
             'requests_count'=>$requests->request_count,
             'penalty_count'=>$penalty->penalty_count,
             'review_count'=>$reviews->review_count,
        ];
        
        $this -> view('sellerDashboard',$data);
    }if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){







    }
        

    }
       
}

