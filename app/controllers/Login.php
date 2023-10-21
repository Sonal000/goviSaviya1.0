<?php 
 class Login extends Controller{

   public function __construct()
   {

   }

   public function index(){
        //we have to check if we are only load the view page or we submit the data as a registration in here. we check POST is for we have post method in our form
    if($_SERVER['REQUEST_METHOD']=='POST'){

      //sanitize POST data
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      //process form
      $data = [
        
        'Email' =>trim($_POST['Email']),
        'password'=>trim($_POST['password']),
        
        'Email_err'=>'',
        'password_err'=>'',
        
      ];
        //validate data

        if(empty($data['Email'])){
          $data['Email'] = 'please enter name';
        }
        
        if(empty($data['password'])){
          $data['password_err'] = 'please enter name';
        } else if(strlen($data['password'])<6){
          $data['password_err'] ='password must be atleast 6 characters';
        }

        //make sure errors are empty
        if(empty($data['Email'])&& empty($data['passsword'])){
          echo '<script>
           alert("User logged in");
           </script>';
           $this->view('Login');
          
        }else{
          //load view with errors
          $this->view('Login',$data);
        }


    
   }
   else{
    //load the view
    $data = [
      
      'Email' =>'',
      'password'=>'',
      'email_address_err'=>'',
      'password_err'=>'',
      
   ];
   //load view
   $this->view('Login',$data);

  }

  }

  public function adminlogin(){
    $this ->view('adminlogin');
  }


 }
?> 
