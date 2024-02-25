<?php 
 class Home extends Controller{
   private $deliverModel;
   public function __construct()
   {

    $this->deliverModel =$this->model('Deliver');
   }
   public function index()
   {
       $data = [
           'logged' => isset($_SESSION['user_id']),
           'username' => isset($_SESSION['user_id']) ? ($_SESSION['user_name']) : null,
       ];
   
       // Check for user type and load appropriate view
       if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'deliver') {
           // Assuming getOngoingOrdersdetails is a method in the Deliver model
           $orders = $this->deliverModel->getOngoingOrdersDetails($_SESSION['user_id']);
           $data['orders'] = $orders; // pass orders data to view
           $this->view('deliveryHome', $data);
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