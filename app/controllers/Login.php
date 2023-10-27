<?php 
 class Login extends Controller{
  
    private $userModel;
   public function __construct()
   {
    $this ->userModel = $this->model('User');
   }

   public function index(){
    $data=[];
        //we have to check if we are only load the view page or we submit the data as a registration in here. we check POST is for we have post method in our form
    if($_SERVER['REQUEST_METHOD']=='POST'){

      //sanitize POST data
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      //process form
      $data = [
        'email' =>trim($_POST['email']),
        'password'=>trim($_POST['password']),
      ];


      if($this ->userModel->findUserByEmail($data['email'])){
         
        $loggedInUser = $this->userModel->login($data['email'],$data['password']);

        if($loggedInUser){
            $this->createSession($loggedInUser);
        }else{

          $data=[
            'incorrect_password'=>'Password is incorrect',
            'email' =>trim($_POST['email']),
            'password'=>trim($_POST['password']),
        ];
        }


      }else{
        $data=[
          'invalid_email'=>'No user found',
          'email' =>trim($_POST['email']),
          'password'=>trim($_POST['password']),
      ];
      }
 
     


    
   }
   else{
    //load the view
    $data = [
      'email' =>'',
      'password'=>'',
   ];
  }
  $this->view('login',$data);

  }



  public function createSession($user){

    $_SESSION['user_id']=$user->user_id;
    $_SESSION['user_name']=$user->name;
    $_SESSION['user_email']=$user->email;
    $_SESSION['user_type']=$user->user_type;
    redirect('/home');
  }

  public function logout(){
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    unset($_SESSION['user_type']);
    session_destroy();
    redirect('/home');
  }

  public function adminlogin(){
    $this ->view('adminlogin');
  }


 }
?> 
