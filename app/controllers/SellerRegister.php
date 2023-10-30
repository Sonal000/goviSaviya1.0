<?php 
 class SellerRegister extends Controller{

  private $sellerModel;

   public function __construct()
   {
    $this ->sellerModel = $this->model('Seller');
   }

   public function index()
   {

    if($_SERVER['REQUEST_METHOD']=='POST'){

      //sanitize POST data
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      $data=[
        'name'=>trim($_POST['name']),
        'mobile' =>trim($_POST['mobile']),
        'email' =>trim($_POST['email']),
        'address' =>trim($_POST['address']),
        'city' =>trim($_POST['city']),
        'password'=>trim($_POST['password']),
      ];
      //process form
      if($this->sellerModel->findUserByEmail($data['email'])){
          $data=[
            'invalid_email'=>"Email already exists",
            'name'=>trim($_POST['name']),
            'mobile' =>trim($_POST['mobile']),
            'email' =>trim($_POST['email']),
            'address'=>trim($_POST['address']),
            'city'=>trim($_POST['city']),
            'password'=>trim($_POST['password']),
          ];
      }else{
        
      $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
      if($this ->sellerModel->register($data)){
        echo '<script>
        alert("User Added succefully");
        </script>';
        header('location:'.URLROOT.'/Login');
      }
      else{
        die('something went wrong');
      }

      }

    }
    else{
      //load the view
      $data = [
        'name'=>'',
        'mobile' =>'',
        'email' =>'',
        'address' =>'',
        'city' =>'',
        'password'=>'',
     ];
     
    }
  
      $this->view('sellerRegister',$data);
   }


 }




















































