<?php

class DeliveryInsight extends Controller{

    private $deliverModel;

    public function __construct(){
        $this->deliverModel =$this->model('Deliver');
    }

    public function index(){

        $deliver_id = $_SESSION['deliver_id'];

        //Orders Calc
        $totalPurchaseOrdersCompleted = $this->deliverModel->getTotalPurchaseOrdersCompleted($deliver_id);
        $totalAuctionOrdersCompleted = $this->deliverModel->getTotalAuctionOrdersCompleted($deliver_id);
        $totalRequestOrdersCompleted = $this->deliverModel->getTotalRequestOrdersCompleted($deliver_id);
        $totalOrdersCompleted = $totalPurchaseOrdersCompleted+$totalAuctionOrdersCompleted+$totalRequestOrdersCompleted;

        //This month orders
        $thisPurchase =$this->deliverModel->getThisPurchase($deliver_id);
        $thisAuction=$this->deliverModel->getThisAuction($deliver_id);
        $thisRequest=$this->deliverModel->getThisRequest($deliver_id);
        $thisMonth=$thisPurchase->month_orders_count+$thisAuction->month_orders_count+$thisRequest->month_orders_count;

        
        //Prev month orders
        $prevPurchase =$this->deliverModel->getPrevPurchase($deliver_id);
        $prevAuction=$this->deliverModel->getPrevAuction($deliver_id);
        $prevRequest=$this->deliverModel->getPrevRequest($deliver_id);
        $prevMonth=$prevPurchase->month_orders_count+$prevAuction->month_orders_count+$prevRequest->month_orders_count;
        
        
        //Prev Prev Month orders
        $prevPrevPurchase =$this->deliverModel->getPrevPrevPurchase($deliver_id);
        $prevPrevAuction=$this->deliverModel->getPrevPrevAuction($deliver_id);
        $prevPrevRequest=$this->deliverModel->getPrevPrevRequest($deliver_id);
        $prevPrevMonth=$prevPrevPurchase->month_orders_count+$prevPrevAuction->month_orders_count+$prevPrevRequest->month_orders_count;
        
       

         //Revenue Calc
         $totalPurchaseRevenue =$this->deliverModel->getTotalPurchaseRevenue($deliver_id);
         $totalAuctionRevenue =$this->deliverModel->getTotalAuctionRevenue($deliver_id);
         $totalRequestRevenue =$this->deliverModel->getTotalRequestRevenue($deliver_id);
         $totalRevenue = $totalPurchaseRevenue->total_revenue+$totalAuctionRevenue->total_revenue+$totalRequestRevenue->total_revenue;

        //This month revenue

          $thisPurchaseRevenue =$this->deliverModel->getCurrentMonthPurchaseRevenue($deliver_id);
          $thisAuctionRevenue =$this->deliverModel->getCurrentMonthAuctionRevenue($deliver_id);
          $thisRequestRevenue =$this->deliverModel->getCurrentMonthAuctionRevenue($deliver_id);
          $thisRevenue = $thisPurchaseRevenue->total_revenue+$thisAuctionRevenue->total_revenue+$thisRequestRevenue->total_revenue;



          //Prev Revenue Calc
          $prevPurchaseRevenue =$this->deliverModel->getPrevMonthPurchaseRevenue($deliver_id);
          $prevAuctionRevenue =$this->deliverModel->getPrevMonthAuctionRevenue($deliver_id);
          $prevRequestRevenue =$this->deliverModel->getPrevMonthRequestRevenue($deliver_id);
          $prevRevenue = $prevPurchaseRevenue->total_revenue+$prevAuctionRevenue->total_revenue+$prevRequestRevenue->total_revenue;

        
          //Prev Revenue Calc
        $prevPrevPurchaseRevenue =$this->deliverModel->getPrevPrevMonthPurchaseRevenue($deliver_id);
        $prevPrevAuctionRevenue =$this->deliverModel->getPrevPrevMonthAuctionRevenue($deliver_id);
        $prevPrevRequestRevenue =$this->deliverModel->getPrevPrevMonthRequestRevenue($deliver_id);
        $prevPrevRevenue = $prevPrevPurchaseRevenue->total_revenue+$prevPrevAuctionRevenue->total_revenue+$prevPrevRequestRevenue->total_revenue;


        //Reviews

        $reviews=$this->deliverModel->getNumberofReviews($deliver_id);

        //Deliver Profile Info

        $profile=$this->deliverModel->getProfileInfo($_SESSION['user_id']);


        //orders growth

        $orderGrowth =  $thisMonth - $prevMonth ;
        
        //Revenue Growth

        $revenueGrowth = $thisRevenue - $prevRevenue;

        //Average Revenue

        $averageRevenue = $totalRevenue / $totalOrdersCompleted;
       


        $data = [
            'title'=>'welcome',
            'totalOrders'=> $totalOrdersCompleted,
            'totalRevenue'=>$totalRevenue,
            "thisMonth"=>$thisMonth,
            'prevMonth'=>$prevMonth,
            'prevPrevMonth'=>$prevPrevMonth,
            'profile'=>$profile,
            'thisRevenue'=>$thisRevenue,
            'prevRevenue'=>$prevRevenue,
            'prevPrevRevenue'=>$prevPrevRevenue,
            'reviews'=>$reviews->reviews_count,
            'orderGrowth'=>$orderGrowth,
            'revenueGrowth'=>$revenueGrowth,
            'averageRevenue'=>$averageRevenue


        ];
        $this -> view('deliveryInsight',$data);
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}