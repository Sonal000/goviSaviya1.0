<?php



class Invoice extends Controller{

    private $orderModel;

    public function __construct(){

    $this->orderModel=$this->model("Order");
   
   }

    public function index($order_item_id,$order_id,$type){

        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){

            $details = $this->orderModel->getDetailsforInvoice($_SESSION['seller_id'],$order_item_id,$order_id,$type);

        $data=[
            "details"=>$details,
        ];

        $this->view('invoice',$data);


    } elseif(isset($_SESSION['user_type']) && $_SESSION['user_type']=='deliver'){

        if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'deliver'){
            $deliver_id = $_SESSION['deliver_id'];
            $item_id = $order_item_id;
            $id = $order_id;
            $type = $type;

        if($type=="AUCTION"){
                $order=$this->orderModel->getAuctionOrderDetails($order_item_id);
                }elseif($type == "PURCHASE"){
                $order=$this->orderModel->getOrderDetails($order_item_id);
                }elseif($type == "REQUEST"){
                $order=$this->orderModel->getRequestOrderDetails($order_item_id);
                }

                $data = [
                    'title' => 'welcome',
                    'order' => $order,
                    'type' => $type,
                    'id' => $id,
                    'item_id'=>$item_id
                    
                ];

                // var_dump($order);
                
                $this->view('deliverInvoice',$data);


        }
}
    

        
        

    }
}

?>

    

        
        

    
       




