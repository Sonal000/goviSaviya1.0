<?php

class DeliveryVehicles extends Controller{
    public function __construct(){
            if(!isset($_SESSION['user_id'])){
                redirect('/home');
            }

            $this->VehicleModel = $this->model('DeliveryVehicle');
    }

    public function index(){
        //Get Vehicles

        $vehicles = $this->VehicleModel->getVehicles();

        $data = [
            'title'=>'welcome',
            'vehicles' => $vehicles
        ];
        $this -> view('deliveryVehicles',$data);
    }

    public function show($id){
        $vehicle = $this->VehicleModel->getVehicleById($id);

        $data = [
            'vehicle' => $vehicle  
        ];

        $this->view('deliveryVehicleShow',$data);
    }

    public function edit($id){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize POST Array
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'type' => trim($_POST['type']),
                'number' => trim($_POST['number']),
                'brand' => trim($_POST['brand']),
                'model' => trim($_POST['model']),
                'year' => trim($_POST['year']),
                'capacity' => trim($_POST['capacity']),
                'user_id' => $_SESSION['user_id'],
                'type_error' => '',
                'number_error' =>'',
                'brand_error' =>'',
                'model_error' =>'',
                'year_error' =>'',
                'capacity_error' =>''
            ];

            //Validate the type
            if(empty($data['type'])){
                $data['type_error'] = 'Please enter the vehicle type';
            }
            //Validate the number
            if(empty($data['number'])){
                $data['number_error'] = 'Please enter the vehicle registration number';
            }
            //Validate the brand
            if(empty($data['brand'])){
                $data['brand_error'] = 'Please enter vehicle brand';
            }
            //Validate the model
            if(empty($data['model'])){
                $data['model_error'] = 'Please enter the model of the vehicle';
            }
            //Validate the year
            if(empty($data['year'])){
                $data['year_error'] = 'Please enter the manufactured year of the vehicle';
            }
            //Validate the capacity
            if(empty($data['capacity'])){
                $data['capacity_error'] = 'Please enter capacity';
            }

            //Make sure there are no errors

            if(empty($data['type_error']) && empty($data['number_error']) && empty($data['brand_error']) && empty($data['model_error']) &&
            empty($data['year_error']) && empty($data['capacity_error'])){
                //Validated
                if($this->VehicleModel->updateVehicle($data)){
                //alert("Successfully Updated!");
                redirect('deliveryVehicles');
            }else{
                die('Something went wrong');
            }
        }else{
            //Load the view with errors
            $this->view('deliveryVehicleEdit',$data);
        }
        }else{
            //Get existing post from model
            $vehicle = $this->VehicleModel->getVehicleById($id);


            //Check for owner
                if($vehicle->user_id != $_SESSION['user_id']){
                    redirect('deliveryVehicles');
                }

            $data = [
                'id' => $id,
                'type' => $vehicle->vehicle_type,
                'number' => $vehicle->vehicle_number,
                'brand' => $vehicle->vehicle_brand,
                'model' => $vehicle->vehicle_model,
                'year' => $vehicle->vehicle_year,
                'capacity' => $vehicle->max_capacity,
                'type_error' => '',
                'number_error' =>'',
                'brand_error' =>'',
                'model_error' =>'',
                'year_error' =>'',
                'capacity_error' =>''
            ];   
            $this->view('deliveryVehicleEdit',$data);
        }
    }

   


}

