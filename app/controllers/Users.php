<?php 
class Users extends Controller{

    private $adminModel;
    private $deliverModel;
    private $userModel;
    private $orderModel;
    private $VehicleModel;
    public function __construct()
    {
 
     $this->orderModel=$this->model("Order");
     $this->deliverModel =$this->model('Deliver');
     $this->adminModel =$this->model('Admin');
     $this->deliverModel =$this->model('Deliver');
     $this->userModel =$this->model('User');
     $this->VehicleModel =$this->model('DeliveryVehicle');
     
    }

    public function index(){

        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin'){
            $details = $this->adminModel->findUsers();
            $row = $this->adminModel->countUsers();
            $sellerCount = $this->adminModel->countBuyers();
            $buyerCount = $this->adminModel->countSellers();
            $deliveryCount = $this->adminModel->countAgents();
      
        $data=[
            "details"=>$details,
            'usercount' =>$row,
            'sellercount'=>$sellerCount,
            'buyercount'=>$buyerCount,
            'deliverycount'=>$deliveryCount,
      
        ];
        $this -> view('adminDash',$data);
        }

    }

}





?>