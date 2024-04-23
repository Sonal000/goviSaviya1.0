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
    }

        
        

    }
       
}

?>
