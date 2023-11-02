<?php

class Listproduct extends Controller{
   private $itemModel;
    public function __construct(){
        $this->itemModel=$this->model('Item');
    }

    public function index(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            //sanitize POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            if (isset($_FILES['item_img'])) {
                $uploadDirectory = (str_replace("\\", "/",STOREROOT)) . '/items/'; 
                $filename = uniqid() . '_' . $_FILES['item_img']['name'];
                $targetPath = $uploadDirectory . $filename;         
                if (move_uploaded_file($_FILES['item_img']['tmp_name'], $targetPath)){
                    $data=[
                        'name'=>trim($_POST['name']),
                        'category' =>trim($_POST['category']),
                        'unit' =>trim($_POST['unit']),
                        'seller_id' =>($_SESSION['seller_id']),
                        'price' =>trim($_POST['price']),
                        'stock' =>trim($_POST['stock']),
                        'exp_date' =>trim($_POST['exp_date']),
                        'address' =>trim($_POST['address']),
                        'district' =>trim($_POST['district']),
                        'description' =>trim($_POST['description']),
                        'item_img'=>$filename
                      ];
                      if($this->itemModel->addItems($data)){
                        $data=[
                            'name'=>'',
                            'category' =>'',
                            'unit' =>'',
                            'seller_id' =>'',
                            'price' =>'',
                            'stock' =>'',
                            'exp_date' =>'',
                            'address' =>'',
                            'district' =>'',
                            'description' =>'',
                            'item_img'=>''
                          ];
                    }else{
                      echo '<script>
                            alert("add item failed");
                      </script>';
                    };

            } else {
                die('Something went wrong.');
            }
            } else {
            die('Failed to move the uploaded file.');
            }
            }
            $this -> view('listproduct');
            
        // $data = ['title'=>'welcome'];
   
    }
    
   

}
