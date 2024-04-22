<?php 

 class ViewAuction extends Controller{
  private $auctionModel;
   public function __construct()
   {
    if(!isset($_SESSION['buyer_id'])){
      $this -> view('_404');
      exit;  
    }  

    $this->auctionModel = $this->model('Auction');
    
   }
   public function index()
   {
    $bidItems=$this->auctionModel->getBuyerPaymentBids($_SESSION['buyer_id']);
    $winners=0;
    if($bidItems){
    foreach ($bidItems as $item) {
      $mybid = $this->auctionModel->getYourBid($item->auction_id,$_SESSION['buyer_id']);
      $currentBid = $this->auctionModel->getCurrentBid($item->auction_id);

      $itemInfo=$this->auctionModel->getAuctionInfo($item->auction_id);
                    $winning_bidder=false;
                    if($itemInfo->highest_buyer_id && $itemInfo->highest_buyer_id==$_SESSION['buyer_id']){
                        $winning_bidder=true;
                        $winners=$winners+1;
                    }else{
                        $winning_bidder=false;
                    }



      $currentDateTime = new DateTime();
      $expDateTime = new DateTime($item->exp_date);
      $timeDifference = $currentDateTime->diff($expDateTime);
      $remains = $timeDifference->format('%a days %H hours');
      $item->highest_buyer=$itemInfo->highest_buyer_id;
      $item->winning_bidder = $winning_bidder;
      
      $item->current_bid =$currentBid->bid_price;
      $item->your_bid =$mybid->your_bid;
      $item->exp_date =$remains;
  }
}

$activeBids = $this->auctionModel->getBuyerActiveBids($_SESSION['buyer_id']);
if($activeBids){
  foreach($activeBids as $acBids){
    $mybid = $this->auctionModel->getYourBid($acBids->auction_id,$_SESSION['buyer_id']);
    $currentBid = $this->auctionModel->getCurrentBid($acBids->auction_id);
    $itemInfo=$this->auctionModel->getAuctionInfo($acBids->auction_id);
    $currentDateTime = new DateTime();
    $expDateTime = new DateTime($acBids->exp_date);
    $timeDifference = $currentDateTime->diff($expDateTime);
    $remains = $timeDifference->format('%a days %H hours');
    $acBids->highest_buyer=$itemInfo->highest_buyer_id;
    $acBids->leading_bid = ($currentBid->buyer_id == $_SESSION['buyer_id'])?true:false;
    $acBids->current_bid =$currentBid->bid_price;
    $acBids->your_bid =$mybid->your_bid;
    $acBids->exp_date =$remains;

  }
}
$bidHistory = $this->auctionModel->getBuyerBidhistory($_SESSION['buyer_id']);
if($bidHistory){

  foreach($bidHistory as $hsBid){
    if($hsBid->highest_buyer_id == $_SESSION['buyer_id']){
      $hsBid->won_bid =true;
      if($hsBid->payment_status){
        $hsBid->closed_bid =true;
      }else{
        $hsBid->closed_bid =false;
      }
    }else{
      $hsBid->won_bid =false;
      $hsBid->closed_bid =true;
    }
    
    $mybid = $this->auctionModel->getYourBid($hsBid->auction_id,$_SESSION['buyer_id']);
    $hsBid->your_bid =$mybid->your_bid;
  }
}
// var_dump($bidHistory);
    $data =['items'=>$bidItems,
      'winners'=>$winners,
      "active_bids"=>$activeBids,
      "bid_history"=>$bidHistory,
  ];

    $this->view('viewAuction',$data);
   }



 }
?>