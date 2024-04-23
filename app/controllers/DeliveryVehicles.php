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

        $userId = $_SESSION['user_id'];       
        $vehicles = $this->VehicleModel->getVehicles($userId);
        $available = $this->VehicleModel->checkVehicleAdd($userId);
        $pending = $this->VehicleModel->hasPendingVehicle($userId); 

        $data = [
            'title'=>'welcome',
            'id' => $userId,
            'vehicles' => $vehicles,
            'pending' => $pending
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
            // Sanitize POST Array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Image Upload
            $uploadDirectory = (str_replace("\\", "/", STOREROOT)) . '/vehicles/';
    
            
            // Check if a new image file is uploaded
            $vehicleImg = isset($_FILES['vehicle_img']['tmp_name']) && $_FILES['vehicle_img']['error'] == UPLOAD_ERR_OK
                ? $this->uploadFile('vehicle_img', $uploadDirectory)
                : $this->VehicleModel->getVehicleById($id)->vehicle_img; // Use existing image filename if no new file is uploaded
    
            $data = [
                'user_id' => $_SESSION['user_id'],
                'id' => $id,
                'capacity' => trim($_POST['capacity']),
                'milage' => trim($_POST['milage']),
                'vehicle_img' => $vehicleImg,
                'max_vol' => trim($_POST['max_vol']),
                'ref_cap' => trim($_POST['ref_cap']),
                
                
                'capacity_error' => '',
                'milage_error' => '',
                'vehicle_img_error' => '',
                'max_vol_error' => '',
                'ref_cap_error' => '',
                
            ];
    
            // Validation
            if(empty($data['capacity'])){
                $data['capacity_error'] = 'Please enter the maximum weight';
            }
    
            if(empty($data['milage'])){
                $data['milage_error'] = 'Please enter the milage of the vehicle';
            }
    
            if(empty($data['max_vol'])){
                $data['max_vol_error'] = 'Please enter the maximum volume';
            }
    
            if(empty($data['ref_cap'])){
                $data['ref_cap_error'] = 'Please select the refregiration capability';
            }
    
            // Make sure there are no errors
            if(empty($data['capacity_error'])
                && empty($data['milage_error']) && empty($data['vehicle_img_error'])
                && empty($data['max_vol_error'])
                && empty($data['ref_cap_error'])) {
    
                // Validated
                if($this->VehicleModel->updateVehicle($data)){
                    // Successfully Updated!
                    redirect('deliveryVehicles/show/' . $data['id']);
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load the view with errors
                $this->view('deliveryVehicleEdit', $data);
            }
        } else {
            // Get existing post from model
            $vehicle = $this->VehicleModel->getVehicleById($id);
    
            // Check for owner
            if($vehicle->user_id != $_SESSION['user_id']){
                redirect('deliveryVehicles');
            }
    
            $data = [
                'id' => $id,

                'brand' => $vehicle->vehicle_brand,
                'model' => $vehicle->vehicle_model,
                'vehicleNo' => $vehicle->vehicle_number,
                'capacity' => $vehicle->max_capacity,
                'milage' => $vehicle->milage,
                'vehicle_img' => $vehicle->vehicle_img,
                'rev_expiry' => $vehicle->rev_expiry,
                // 'rev_license_imgs'=>$revLicenseImgs,
                'insurance_status' => $vehicle->insurance_status,
                // 'insurance_imgs'=> $insuranceImgs,
                'max_vol' => $vehicle->max_vol,
                'ref_cap' => $vehicle->ref_cap,
    
                'capacity_error' => '',
                'milage_error' => '',
                'vehicle_img_error' => '',
                'rev_expiry_error' => '',
                'rev_license_imgs_error' => '',
                'insurance_status_error' => '',
                'insurance_imgs_error' => '',
                'max_vol_error' => '',
                'ref_cap_error' => '',
            ];   
            $this->view('deliveryVehicleEdit', $data);
        }
    }


    //Function to upload files

    private function uploadFile($fileInputName, $uploadDirectory) {
        if (isset($_FILES[$fileInputName]['tmp_name']) && $_FILES[$fileInputName]['error'] == UPLOAD_ERR_OK) {
            $filename = uniqid() . '_' . $_FILES[$fileInputName]['name'];
            $targetPath = $uploadDirectory . $filename;
    
            if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetPath)) {
                return $filename;
            } else {
                die('Failed to move the uploaded file.');
            }
        }
        return '';
    }



    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize POST array
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        //Image upload
        $uploadDirectory = (str_replace("\\", "/", STOREROOT)) . '/vehicles/';

        $vehicleImg = $this->uploadFile('vehicle_img', $uploadDirectory);
        $frontImg = $this->uploadFile('front_img', $uploadDirectory);
        $backImg = $this->uploadFile('back_img', $uploadDirectory);
        $revLicenseImgs = $this->uploadFile('rev_license_imgs', $uploadDirectory);
        $insuranceImgs = $this->uploadFile('insurance_imgs', $uploadDirectory);
        $licenseImgs = $this->uploadFile('license_imgs', $uploadDirectory);
        
        $data = [
            'id' => $_SESSION['user_id'],
            'type' => trim($_POST['type']),
            'vehicleNo' => trim($_POST['vehicleNo']),
            'fuel_type'=>trim($_POST['fuel_type']),
            'brand' => trim($_POST['brand']),
             'model' => trim($_POST['model']),
             'year' => trim($_POST['year']),
            'capacity' => trim($_POST['capacity']),
            'milage' => trim($_POST['milage']),
            'vehicle_img' =>  $vehicleImg,
            'front_img' =>  $frontImg,
            'back_img' =>  $backImg,
            'license_imgs' => $licenseImgs,
            'rev_expiry'=>trim($_POST['rev_expiry']),
            'rev_license_imgs'=>$revLicenseImgs,
            'insurance_status'=>trim($_POST['insurance_status']),
            'insurance_imgs'=> $insuranceImgs,
            'max_vol'=>trim($_POST['max_vol']),
            'ref_cap'=>trim($_POST['ref_cap']),
            'ins_expiry'=>trim($_POST['ins_expiry']),

            //'user_id' => $_SESSION['user_id'],
            'type_error' => '',
            'vehicleNo_error' =>'',
            'fuel_type_error'=>'',
            'brand_error' =>'',
            'model_error' =>'',
            'year_error' =>'',
            'capacity_error' =>'',
            'milage_error' => '',
            'vehicle_img_error' => '',
            'front_img_error' =>'' ,
            'back_img_error' => '',
            'rev_expiry_error'=>'',
            'license_imgs_error'=>'',
            'rev_license_imgs_error'=>'',
            'insurance_status_error'=>'',
            'insurance_imgs_error'=>'',
            'max_vol_error'=>'',
            'ins_expiry_error'=>'',
            'ref_cap_error'=>'',
        ];

        //Validation
            if(empty($data['type'])){
                $data['type_error'] = 'Please enter the type of the vehicle';
            }

            if(empty($data['vehicleNo'])){
                $data['vehicleNo_error'] = 'Please enter the Vehicle Registration Number';
            }

            if(empty($data['fuel_type'])){
                $data['fuel_type_error'] = 'Please enter the fuel type of the vehicle';
            }

            if(empty($data['brand'])){
                $data['brand_error'] = 'Please enter the brand of the vehicle';
            }

            if(empty($data['model'])){
                $data['model_error'] = 'Please enter the model of the vehicle';
            }

            if(empty($data['year'])){
                $data['year_error'] = 'Please enter the year of the vehicle';
            }

            if(empty($data['capacity'])){
                $data['capacity_error'] = 'Please enter the maximum weight';
            }

            if(empty($data['milage'])){
                $data['milage_error'] = 'Please enter the milage of the vehicle';
            }

            if(empty($data['vehicle_img'])){
                $data['vehicle_img_error'] = 'Please upload a photo of the vehicle';
            }

            if(empty($data['front_img'])){
                $data['front_img_error'] = 'Please upload a photo';
            }

            if(empty($data['back_img'])){
                $data['back_img_error'] = 'Please upload a photo';
            }

            if(empty($data['rev_expiry'])){
                $data['rev_expiry_error'] = 'Please enter the expiration date of revenue license';
            }

            if(empty($data['ins_expiry'])){
                $data['ins_expiry_error'] = 'Please enter the expiration date of vehicle insurance';
            }

            if(empty($data['rev_license_imgs'])){
                $data['rev_license_imgs_error'] = 'Please upload photos of revenue license of the vehicle';
            }

            if(empty($data['license_imgs'])){
                $data['rev_license_imgs_error'] = 'Please upload photos of revenue license of the vehicle';
            }

            if(empty($data['insurance_status'])){
                $data['insurance_status_error'] = 'Please select the type of insurance the vehicle';
            }

            if(empty($data['insurance_imgs'])){
                $data['insurance_imgs_error'] = 'Please upload photos of insurance of the vehicle';
            }

            if(empty($data['max_vol'])){
                $data['max_vol_error'] = 'Please enter the maximum volume';
            }

            if(empty($data['ref_cap'])){
                $data['ref_cap_error'] = 'Please select the refregiration capability';
            }

            //Make sure there are no errors

            if(empty($data['type_error']) && empty($data['vehicleNo_error'])
            && empty($data['fuel_type_error'])&& empty($data['brand_error'])
            && empty($data['model_error'])&& empty($data['year_error'])
            && empty($data['capacity_error'])
            && empty($data['milage_error'])&& empty($data['vehicle_img_error'])
            && empty($data['front_img_error'])
            && empty($data['back_img_error'])&& empty($data['rev_expiry_error'])
            && empty($data['rev_license_imgs_error'])
            && empty($data['insurance_status_error']) 
            && empty($data['insurance_imgs_error'])&& empty($data['max_vol_error'])
            && empty($data['ref_cap_error'])  && empty($data['ins_expiry_error'])){
                
                //Validated
                if($this->VehicleModel->addVehicle($data)){
                //Here it should show a pop up message saying the post is added successfully-----------            
                    redirect('deliveryVehicles');
                }           
        else{
                    die('Something went wrong');
                } 
            }else{
                //Load the view with errors
                $this->view('vehicleAdd',$data);
                
            }
        }else{
            $data = [
            'type' => '',
            'vehicleNo' => '',
            'fuel_type'=>'',
            'brand' => '',
            'model' =>'',
            'year' => '',
            'capacity' => '',
            'milage' => '',
            'vehicle_img' => '',
            'front_img' => '',
            'back_img' => '',
            'rev_expiry'=>'',   
            'rev_license_imgs'=>'',
            'license_imgs'=>'',
            'insurance_status'=>'',
            'ins_expiry'=>'',
            'insurance_imgs'=>'',
            'max_vol'=>'',
            'ref_cap'=>'',

            'type_error' => '',
            'vehicleNo_error' =>'',
            'fuel_type_error'=>'',
            'brand_error' =>'',
            'model_error' =>'',
            'year_error' =>'',
            'capacity_error' =>'',
            'milage_error' => '',
            'vehicle_img_error' => '',
            'front_img_error' => '',
            'back_img_error' => '',
            'rev_expiry_error'=>'',           
            'rev_license_imgs_error'=>'',
            'license_imgs_error'=>'',
            'insurance_status_error'=>'',
            'ins_expiry_error'=>'',
            'insurance_imgs_error'=>'',
            'max_vol_error'=>'',
            'ref_cap_error'=>'',
            ];

            $this->view('vehicleAdd',$data);
        }
    }

    public function editCom($id){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST Array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Image Upload
            $uploadDirectory = (str_replace("\\", "/", STOREROOT)) . '/vehicles/';

            $revLicenseImgs = isset($_FILES['rev_license_imgs']['tmp_name']) && $_FILES['rev_license_imgs']['error'] == UPLOAD_ERR_OK
            ? $this->uploadFile('rev_license_imgs', $uploadDirectory)
            : $this->VehicleModel->getVehicleById($id)->rev_license_imgs; // Use existing image filename if no new file is uploaded

            $insuranceImgs = isset($_FILES['insurance_imgs']['tmp_name']) && $_FILES['insurance_imgs']['error'] == UPLOAD_ERR_OK
            ? $this->uploadFile('insurance_imgs', $uploadDirectory)
            : $this->VehicleModel->getVehicleById($id)->insurance_imgs; // Use existing image filename if no new file is uploaded
            $data = [
                'id' => $id,
                'user_id' =>$_SESSION['user_id'],
                'rev_expiry'=>trim($_POST['rev_expiry']),
                'rev_license_imgs'=>$revLicenseImgs,
                'insurance_status'=>trim($_POST['insurance_status']),
                'insurance_imgs'=> $insuranceImgs,
                'ins_expiry'=>trim($_POST['ins_expiry']),
    
                //'user_id' => $_SESSION['user_id'],
                
                'rev_expiry_error'=>'',
                'rev_license_imgs_error'=>'',
                'insurance_status_error'=>'',
                'insurance_imgs_error'=>'',
                'ins_expiry_error'=>'',
            ];
    
            // Validation
            if(empty($data['rev_expiry'])){
                $data['rev_expiry_error'] = 'Please enter the maximum weight';
            }
    
            if(empty($data['rev_license_imgs'])){
                $data['rev_license_imgs_error'] = 'Please enter the milage of the vehicle';
            }
    
            if(empty($data['insurance_status'])){
                $data['insurance_status_error'] = 'Please enter the maximum volume';
            }
    
            if(empty($data['insurance_imgs'])){
                $data['insurance_imgs_error'] = 'Please select the refregiration capability';
            }

            if(empty($data['ins_expiry'])){
                $data['ins_expiry_error'] = 'Please select the refregiration capability';
            }
        
            // Make sure there are no errors
            if(empty($data['rev_expiry_error']) 
                && empty($data['rev_license_imgs_error']) && empty($data['insurance_status_error'])
                && empty($data['insurance_imgs_error'])
                && empty($data['ins_expiry_error'])){
    
                // Validated
                if($this->VehicleModel->updateVehicleCom($data)){
                    // Successfully Updated!
                    redirect('deliveryVehicles/show/' . $data['id']);
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load the view with errors
                $this->view('deliveryVehiclesComEdit', $data);
            }
        } else {
            // Get existing post from model
            $vehicle = $this->VehicleModel->getVehicleById($id);

            
    
            // Check for owner
            if($vehicle->user_id != $_SESSION['user_id']){
                redirect('deliveryVehicles');
            }
    
            $data = [

                'id' => $id,
                'rev_expiry'=>$vehicle->ins_expiry,
                'rev_license_imgs'=>$vehicle->rev_license_imgs,
                'insurance_status'=>$vehicle->insurance_status,
                'insurance_imgs' => $vehicle->insurance_imgs,
                'ins_expiry'=>$vehicle->ins_expiry,
    
                //'user_id' => $_SESSION['user_id'],
                
                'rev_expiry_error'=>'',
                'rev_license_imgs_error'=>'',
                'insurance_status_error'=>'',
                'insurance_imgs_error'=>'',
                'ins_expiry_error'=>'',

                // 'id' => $id,
                // 'capacity' => $vehicle->max_capacity,
                // 'milage' => $vehicle->milage,
                // // 'vehicle_img' =>  $vehicleImg,
                // 'rev_expiry' => $vehicle->rev_expiry,
                // // 'rev_license_imgs'=>$revLicenseImgs,
                // 'insurance_status' => $vehicle->insurance_status,
                // // 'insurance_imgs'=> $insuranceImgs,
                // 'max_vol' => $vehicle->max_vol,
                // 'ref_cap' => $vehicle->ref_cap,
    
                // 'capacity_error' => '',
                // 'milage_error' => '',
                // 'vehicle_img_error' => '',
                // 'rev_expiry_error' => '',
                // 'rev_license_imgs_error' => '',
                // 'insurance_status_error' => '',
                // 'insurance_imgs_error' => '',
                // 'max_vol_error' => '',
                // 'ref_cap_error' => '',
            ];   
            $this->view('deliveryVehiclesComEdit', $data);
        }
    }



   







// public function indexx() {
//     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//         // Sanitize POST data
//         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

//         // Initialize an array to store uploaded filenames
//         $uploadedFiles = [];

//         // Loop through each file input section
//         for ($i = 1; $i <= 5; $i++) {
         
//             $inputName = 'item_img_' . $i;

//             if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == UPLOAD_ERR_OK) {
//                 // Handle file upload for each section
//                 $uploadDirectory = str_replace("\\", "/", STOREROOT) . '/vehicles/license/';
//                 $filename = uniqid() . '_' . $_FILES[$inputName]['name'];
//                 $targetPath = $uploadDirectory . $filename;

//                 if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $targetPath)) {
//                     $uploadedFiles[$inputName] = $filename;
//                 } else {
//                     die('Failed to move the uploaded file.');
//                 }
//             }
//         }

//         // Prepare data array with form fields and uploaded filenames
//         $data = [
//             'name' => trim($_POST['name']),
//             'category' => trim($_POST['category']),
//             'unit' => trim($_POST['unit']),
//             'seller_id' => $_SESSION['seller_id'],
//             'price' => trim($_POST['price']),
//             'stock' => trim($_POST['stock']),
//             'exp_date' => trim($_POST['exp_date']),
//             'address' => trim($_POST['address']),
//             'district' => trim($_POST['district']),
//             'description' => trim($_POST['description']),
//             'item_img_1' => $uploadedFiles['item_img_1'] ?? '',
//             'item_img_2' => $uploadedFiles['item_img_2'] ?? '',
//             'item_img_3' => $uploadedFiles['item_img_3'] ?? '',
//             'item_img_4' => $uploadedFiles['item_img_4'] ?? '',
//             'item_img_5' => $uploadedFiles['item_img_5'] ?? '',
//         ];

//         // Add data to the database
//         if ($this->itemModel->addItems($data)) {
//             // Reset form fields
//             $data = [
//                 'name' => '',
//                 'category' => '',
//                 'unit' => '',
//                 'seller_id' => '',
//                 'price' => '',
//                 'stock' => '',
//                 'exp_date' => '',
//                 'address' => '',
//                 'district' => '',
//                 'description' => '',
//                 'item_img_1' => '',
//                 'item_img_2' => '',
//                 'item_img_3' => '',
//                 'item_img_4' => '',
//                 'item_img_5' => '',
//             ];

//             // Redirect to 'myproducts' page
//             redirect('myproducts');
//         } else {
//             echo '<script>alert("Add item failed");</script>';
//         }
//     }

//     // Render the 'listproduct' view
//     $this->view('listproduct');
// }



public function delete($id){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->VehicleModel->deleteVehicle($id)){
            redirect('deliveryVehicles');
        }else{
            die('Something went wrong');
        }
    }else{
        redirect('deliveryVehicles');
    }
}

// admin part functions

public function pickuptrucks(){

    $vehicleDet = $this->VehicleModel->getPickuptrucks();
    var_dump($vehicleDet);
        $data =[
            'Vdetails'=>$vehicleDet,
        ]; 
        
    $this->view('adminPicktrucks',$data);
    
}



}