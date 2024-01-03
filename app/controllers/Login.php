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

      $row=$this ->userModel->findUserByEmail($data['email']);
      if($row){
         
        $loggedInUser = $this->userModel->login($data['email'],$data['password']);

        if($loggedInUser){
            if(trim($loggedInUser->verification_code)==='verified'){
              $this->createSession($loggedInUser);
            }else{
              redirect('register/verifyEmail/'.$loggedInUser->user_id);
echo '<script>toggleLoginState(false);</script>';
            }
            
        }else{

          $data=[
            'incorrect_password'=>'Password is incorrect',
            'email' =>trim($_POST['email']),
            'password'=>trim($_POST['password']),
        ];
        echo '<script>toggleLoginState(false);</script>';
        }


      }else{
        $data=[
          'invalid_email'=>'No user found',
          'email' =>trim($_POST['email']),
          'password'=>trim($_POST['password']),
      ];
      echo '<script>toggleLoginState(false);</script>';
      }
 
      


    
   }
   else{
    //load the view
    $data = [
      'email' =>'',
      'password'=>'',
   ];
   echo '<script>toggleLoginState(false);</script>';
  }
  $this->view('login',$data);

  }



  public function createSession($user){

    $_SESSION['user_id']=$user->user_id;
    $_SESSION['user_name']=$user->name;
    $_SESSION['user_email']=$user->email;
    $_SESSION['user_type']=$user->user_type;
    $data=$this ->userModel->getProfileInfo($user->user_id,$user->user_type);
    $_SESSION['user_image']=strlen($data->prof_img)>0?$data->prof_img:false;
    $id=$user->user_type.'_id';
    $_SESSION[$id]=$data->$id;

    redirect('/home');
  }

  public function logout(){
    $this->userModel->logout();
    redirect('/home');
  }

  


 }
?> 
