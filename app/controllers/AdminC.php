<?php

class AdminC extends Controller{

    private $adminModel;
    public function __construct(){
           
        $this ->adminModel = $this->model('Admin');
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

      $row=$this ->adminModel->findUserByEmail($data['email']);
      if($row){
         
        $loggedInUser = $this->adminModel->login($data['email'],$data['password']);

        if($loggedInUser){
          
              $this->createSession($loggedInUser);
              redirect('AdminC/adminDash/'.$loggedInUser->admin_ID);
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
      }else{
        //load the view
        $data = [
          'email' =>'',
          'password'=>'',
          
       ];
       ;
      }
      $this->view('adminlogin',$data);
    
      


    
   }
   
        

    public function createSession($user){

        $_SESSION['user_id']=$user->admin_ID;
        $_SESSION['user_name']=$user->name;
        $_SESSION['user_email']=$user->email;
        $_SESSION['user_type']=$user->user_type;
        $image=$this ->adminModel->getProfileImage($user->admin_ID,$user->user_type);
        $_SESSION['user_image']=strlen($image->prof_img)>0?$image->prof_img:"green.png";
    
        redirect('/AdminC/adminDash');
       /* var_dump($_SESSION['user_image']);*/
      }
    
      public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_type']);         
        unset($_SESSION['user_image']);         
        session_destroy();
        redirect('/AdminC');
      }
    

    public function adminDash(){
      $row = $this ->adminModel->findUsers();
      $countAll = $this ->adminModel ->countUsers();
      $countbuyers = $this ->adminModel->countBuyers();
      $countSellers =$this ->adminModel ->countSellers();
      $countAgents =$this ->adminModel ->countAgents();
      $data =[
        'row' => $row,
        'buyercount'=>$countbuyers,
        'sellercount'=>$countSellers,
        'agentcount'=>$countAgents,
        'usercount' =>$countAll,
        
      ];
      
            $this -> view('adminDash',$data);
    }

    public function adminorders(){
        $data = ['title'=>'welcome'];
        $this -> view('adminOrders');
    }

    public function OrderDetails(){
        $data = ['title'=>'welcome'];
        $this -> view('adminOrderDetails');
    }

    public function adminposts(){
        $data = ['title'=>'welcome'];
        $this -> view('adminPosts');
    }

    public function details(){
        $data = ['title'=>'welcome'];
        $this -> view('adminOrderDetails');
    }

    public function addUser(){

      if($_SERVER['REQUEST_METHOD']=='POST'){

        //sanitize POST data
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        $data=[
          'name'=>trim($_POST['name']),
          'mobile' =>trim($_POST['mobile']),
          'email' =>trim($_POST['email']),
          'address' =>trim($_POST['address']),
          'password'=>trim($_POST['password']),
        ];
        //process form
        if($this->adminModel->findUserByEmail_add($data['email'])){
            $data=[
              'invalid_email'=>"Email already exists",
              'name'=>trim($_POST['name']),
              'mobile' =>trim($_POST['mobile']),
              'email' =>trim($_POST['email']),
              'address'=>trim($_POST['address']),
              'password'=>trim($_POST['password']),
            ];
        }else{
          
        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
        $user_id =$this ->adminModel->register($data);
        redirect('/AdminC/adminDash');
        }
       
  
      }
      else{
        //load the view
        $data = [
          'name'=>'',
          'mobile' =>'',
          'email' =>'',
          'address' =>'',
          'password'=>'',
       ];
       
      }
    
        $this->view('addUser',$data);


     }

     public function delUser($id){
      $data = ['id'=>$id];
      $this ->adminModel->userdelete($data);
      
      $this -> view('adminDash');
  }

  public function editUser($id){
    

    if($_SERVER['REQUEST_METHOD']=='POST'){
      
      //sanitize POST data
    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      $data=[
        'name'=>trim($_POST['name']),
        'email'=>trim($_POST['email']),
        'mobile'=>trim($_POST['address']),
        'address'=>trim($_POST['mobile']),
        'city'=>trim($_POST['city']),
      ];
      $this ->adminModel->updateProfile($data,$id);
      redirect('/AdminC/adminDash');
      }
      else{
        $row = $this ->adminModel->getUsers($id);
        $data =[
          'id'=> $row->user_id,
          'name' => $row->name,
          'email' => $row->email,
          'mobile' => $row->mobile,
          'address' => $row->address,
          'city' => $row->city,
        ];
      }
    $this -> view('userEdit',$data);
    
  }
  
        
}

   /* public function about(){
        $this ->view('Pages/about');
    }*/