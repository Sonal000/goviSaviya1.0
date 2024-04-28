<?php 
 class Vehicle extends Controller{

  private $vehicleModel;
  private $notifyModel;
    
   public function __construct(){
    
     $this->vehicleModel =$this->model('DeliveryVehicle');
     $this->notifyModel =$this->model('Notifi');

   }

   public function index(){

    
    $vehicleDet = $this->vehicleModel->getPickuptrucks();
    $count = $this->vehicleModel->countPickupTruck();
        $data =[
            'Vdetails'=>$vehicleDet,
            'count'=>$count,
        ]; 
        
    $this->view('adminPicktrucks',$data);
    
   }

   public function details($id){
    $details = $this->vehicleModel->getVehicleinfo($id);
   
    $data=[
        'details'=>$details,
       
    ];

    $this->view('adminVehicleDetails',$data);
   }



//    public function pickuptrucks(){

//     $vehicleDet = $this->VehicleModel->getPickuptrucks();
//     var_dump($vehicleDet);
//         $data =[
//             'Vdetails'=>$vehicleDet,
//         ]; 
        
//     $this->view('adminPicktrucks',$data);
    
// }

public function deliverytrucks(){

    $vehicleDet = $this->vehicleModel->getdeliverytrucks();
    $count = $this->vehicleModel->countdeliveryTruck();

        $data =[
            'Vdetails'=>$vehicleDet,
            'count'=>$count,
        ]; 
        
    $this->view('adminDeliverytrucks',$data);
    
}


public function Deliveryvan(){

    $vehicleDet = $this->vehicleModel->getDeliveryvan();
    $count = $this->vehicleModel->countDeliveryVan();

        $data =[
            'Vdetails'=>$vehicleDet,
            'count'=>$count,
        ]; 
        
    $this->view('adminDeliveryVan',$data);
    
}

public function Three_Wheeler(){

    $vehicleDet = $this->vehicleModel->get3wheeler();
    $count = $this->vehicleModel->count3Wheel();

        $data =[
            'Vdetails'=>$vehicleDet,
            'count'=>$count,
        ]; 
        
    $this->view('admin3wheeler',$data);
    
}

public function approve($id){

    $user_id = $this->vehicleModel->getDeliverUserIdByVehicleId($id);

    if($this->vehicleModel->approveVehicle($id)){

        $this->notifyModel->notifyuser('OTHER',$user_id,'Your vehicle has been approved. You are ready for delivery.','deliveryVehicles','OTHER');
        redirect('Vehicle');

    }
}

public function Refuse($id){

    $user_id = $this->vehicleModel->getDeliverUserIdByVehicleId($id);

    if($this->vehicleModel->RefuseVehicle($id)){

        $this->notifyModel->notifyuser('OTHER',$user_id,'Your vehicle has been refused. You are not ready for delivery.','deliveryVehicles','OTHER');

        redirect('Vehicle');
    }
}






 }