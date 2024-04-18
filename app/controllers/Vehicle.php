<?php 
 class Vehicle extends Controller{

  private $vehicleModel;
    
   public function __construct(){
    
     $this->vehicleModel =$this->model('DeliveryVehicle');

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

public function containertrucks(){

    $vehicleDet = $this->vehicleModel->getContainertrucks();
    $count = $this->vehicleModel->countContainerTruck();

        $data =[
            'Vdetails'=>$vehicleDet,
            'count'=>$count,
        ]; 
        
    $this->view('adminContainertrucks',$data);
    
}


public function Cars(){

    $vehicleDet = $this->vehicleModel->getCars();
    $count = $this->vehicleModel->countCars();

        $data =[
            'Vdetails'=>$vehicleDet,
            'count'=>$count,
        ]; 
        
    $this->view('adminCars',$data);
    
}






 }