<?php


class Dashboard extends Controller{

    private $orderModel;
    private $auctionModel;
    private $itemModel;
    private $sellerModel;
    private $requestModel;
    private $adminModel;

    public function __construct(){
        $this->orderModel=$this->model("Order");
        $this->itemModel=$this->model("Item");
        $this->auctionModel=$this->model("Auction");
        $this->sellerModel=$this->model("Seller");
        $this->requestModel=$this->model("Requests");
        $this->adminModel=$this->model("Admin");
        
        
        
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





    }elseif(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin'){


$usersCount = $this->adminModel->countUsers();
$sellersCount = $this->adminModel->countSellers();
$buyersCount = $this->adminModel->countBuyers();
$agentsCount = $this->adminModel->countAgents();
$ordersCount = $this->adminModel->getTotalOrdersCount();
$ordersCountAuction = $this->adminModel->getAuctionOrdersCount();
$ordersCountPurchase = $this->adminModel->getPurchaseOrdersCount();
$ordersCountRequest = $this->adminModel->getRequestOrdersCount();




        $data=[
            "users_count"=>$usersCount,
            "buyers_count"=>$buyersCount,
            "sellers_count"=>$sellersCount,
            "agents_count"=>$agentsCount,
            "orders_count"=>$ordersCount,
            "orders_countAuction"=>$ordersCountAuction,
            "orders_countPurchase"=>$ordersCountPurchase,
            "orders_countRequest"=>$ordersCountRequest,
       ];
       $this -> view('adminDashboard',$data);





    }elseif(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){

    }else{
        $this -> view('_404');
    }
        

    }

    public function generatePdf(){
        // Get orders data
        $orders = $this->orderModel->getALLOrders();
        
        // Start output buffering
        ob_start();
    
        // Create a new PDF instance
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    
        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Admin');
        $pdf->SetTitle('Orders Report');
        $pdf->SetSubject('Orders Report');
        $pdf->SetKeywords('Orders, Report, PDF');
    
        // Set default header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
        // Set margins
        $pdf->SetMargins(15, 15, 15);
        $pdf->SetHeaderMargin(5);
        $pdf->SetFooterMargin(10);
    
        // Add a page
        $pdf->AddPage();
    
        // Set content
        $html = '<h1>Orders Report</h1>';
        $html .= '<table border="1">';
        $html .= '<tr><th>Order ID</th><th>Customer</th><th>Order Type</th><th>Order Status</th></tr>';
    
        // Fetch data from database and loop through each order
        if (!empty($orders)) {
            foreach ($orders as $order) {
                $html .= '<tr>';
                $html .= '<td>' . $order->order_id . '</td>';
                $html .= '<td>' . $order->buyer_name . '</td>';
                $html .= '<td>' . $order->order_type . '</td>';
                $html .= '<td>' . $order->order_history . '</td>';
                $html .= '</tr>';
            }
        } else {
            $html .= '<tr><td colspan="4">No Orders Found</td></tr>';
        }
    
        $html .= '</table>';
    
        // Write HTML content to PDF
        $pdf->writeHTML($html, true, false, true, false, '');
    
        // Close and output PDF
        $pdf->Output('orders_report.pdf', 'D'); 
    
        // Clean the output buffer
        ob_end_clean();
    }
    
    



       
}

