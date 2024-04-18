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

    $bidItems=$this->auctionModel->getBuyerBids($_SESSION['buyer_id']);
    if($bidItems){
    foreach ($bidItems as $item) {
      $mybid = $this->auctionModel->getYourBid($item->auction_id,$_SESSION['buyer_id']);
      $currentBid = $this->auctionModel->getCurrentBid($item->auction_id);

      $currentDateTime = new DateTime();
      $expDateTime = new DateTime($item->exp_date);
      $timeDifference = $currentDateTime->diff($expDateTime);
      $remains = $timeDifference->format('%a days %H hours');

      $item->leading_bid = ($currentBid->buyer_id == $_SESSION['buyer_id'])?true:false;
      $item->current_bid =$currentBid->bid_price;
      $item->your_bid =$mybid->your_bid;
      $item->exp_date =$remains;
  }
}

    $data =['items'=>$bidItems];

    $this->view('viewAuction',$data);
   }



 }
?>