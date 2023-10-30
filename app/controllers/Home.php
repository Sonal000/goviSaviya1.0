<?php 
 class Home extends Controller{

   public function __construct()
   {


   }
   public function index()
   {
    $data =[
      'logged'=>isset($_SESSION['user_id']),
      'username'=>isset($_SESSION['user_id'])?($_SESSION['user_name']):null,
  ];

    $this->view('home',$data);
   }
   public function about($id)
   {
    echo "about loaded".$id;
   }


 }
?>