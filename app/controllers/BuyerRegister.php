<?php 
 class BuyerRegister extends Controller{

  private $buyerModel;
  private $userModel;

   public function __construct()
   {
    $this ->buyerModel = $this->model('Buyer');
    $this ->userModel = $this->model('User');
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
      if($this->buyerModel->findUserByEmail($data['email'])){
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
      $user_id =$this ->buyerModel->register($data);
      if($user_id){
        if($this ->userModel->verifyEmail($data['email'],$data['name'],$user_id)){
          redirect('register/verifyEmail/'.$user_id);
          echo '<script>toggleButtonState(false);</script>';
        }else{
          die('something went wrong');
          echo '<script>toggleButtonState(false);</script>';
        }
      }
      else{
        die('something went wrong');
        echo '<script>toggleButtonState(false);</script>';
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
  
      $this->view('buyerRegister',$data);
   }


 }
