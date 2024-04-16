<?php 
 class Home extends Controller{
   private $deliverModel;
   public function __construct()
   {
    $this->orderModel=$this->model("Order");
    $this->deliverModel =$this->model('Deliver');
   }
   public function index()
   {
       $data = [
           'logged' => isset($_SESSION['user_id']),
           'username' => isset($_SESSION['user_id']) ? ($_SESSION['user_name']) : null,
       ];
   
       
       if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'deliver') {
        
            $deliver_id = $_SESSION['deliver_id'];
            $details = $this->orderModel->getOngoingOrderDetails($deliver_id);
            $rowB = $this->orderModel->getBuyerDetailsOngoingOrder($deliver_id);
            $rowS = $this->orderModel->getSellerDetailsOngoingOrder($deliver_id);
            $view;

        $data = [
            'details' => $details,
            'rowB' => $rowB,
            'rowS' => $rowS
        ];

        // if(!$details){
        //     $view = false;
        // }else{
        //     $view = true;
        // }





        $this -> view('deliveryHome',$data);
       } else {
           // Load default home view
           $this->view('home', $data);
       }
   }
   






















   
   
   public function about($id)
   {
    echo "about loaded".$id;
   }


 }
?>