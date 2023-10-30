<?php 

class Register extends Controller{
   private $userModel;

 public function __construct()
 {
   $this ->userModel = $this->model('User');
 }

 public function index()
 {
    $this->view('register');
 }
 public function seller()
 {
    $this->view('sellerRegister');
 }
 public function delivery()
 {
    $this->view('deliveryRegister');
 }



 public function verifyEmail($id){
   if($_SERVER['REQUEST_METHOD']=='POST'){
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
 //process form
   $data = [
      'code'=>trim($_POST['code']),
      'user_id' =>$id
   ];
   if($this ->userModel->findVerificationByUser($data['code'],$id)){
      if( $this->userModel->setVerification($id)){  
         redirect('login');
         echo '<script>toggleButtonState(false);</script>';
      }else{
         echo '<script>toggleButtonState(false);</script>';
       die('something went wrong');
      }


 }else{
   $data=[
     'invalid_code'=>'Verification Code is Incorrect',
     'code' =>trim($_POST['code']),
     'user_id' =>$id,
 ];
 echo '<script>toggleButtonState(false);</script>';
 }
}
else{
//load the view
$data = [
 'code' =>'',
 'user_id' =>$id
];
}


    $this->view('verifyEmail',$data);
 }

 public function sendVerification(){

   if($_SERVER['REQUEST_METHOD']=='POST'){
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      //process form
      $data = [
        'email' =>trim($_POST['email']),
      ];

      $row =$this ->userModel->findUserByEmail($data['email']);
      if($row){

            if($this ->userModel->verifyEmail($data['email'],$row->name,$row->user_id)){
               redirect('register/verifyEmail/'.$row->user_id); 
            }else{
              die('something went wrong');
            }
          }else{
        $data=[
          'invalid_email'=>'No Registered Email found',
          'email' =>trim($_POST['email']),
      ];
      }
 
     


    
   }
   else{
    //load the view
    $data = [
      'email' =>'',
   ];
  }


   $this->view('sendVerification',$data);
 }

}