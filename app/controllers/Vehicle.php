<?php 
 class Vehicle extends Controller{

  private $vehicleModel;
    
   public function __construct(){
    
     $this->vehicleModel =$this->model('DeliveryVehicle');

   }

   public function index(){

    
    $vehicleDet = $this->vehicleModel->getPickuptrucks();
    
        $data =[
            'Vdetails'=>$vehicleDet,
        ]; 
        
    $this->view('adminPicktrucks',$data);
    
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
        $data =[
            'Vdetails'=>$vehicleDet,
        ]; 
        
    $this->view('adminContainertrucks',$data);
    
}

public function Cars(){

    $vehicleDet = $this->vehicleModel->getCars();
        $data =[
            'Vdetails'=>$vehicleDet,
        ]; 
        
    $this->view('adminCars',$data);
    
}




 }