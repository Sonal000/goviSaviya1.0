<?php 
 class Home extends Controller{
    private $userModel;
   public function __construct()
   {
    $this->userModel =$this->model('User');

   }
   public function index(){

    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin'){
      $details = $this->userModel->getUserDet();
  $data=[
      "details"=>$details,
  ];
  $this -> view('adminDash',$data);
  }
  else{
    
    $data =[
      'logged'=>isset($_SESSION['user_id']),
      'username'=>isset($_SESSION['user_id'])?($_SESSION['user_name']):null,
  ];

    $this->view('home',$data);
  }


   }
   public function about($id)
   {
    echo "about loaded".$id;
   }


 }
?>