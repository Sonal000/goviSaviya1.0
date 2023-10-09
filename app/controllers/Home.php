<?php 
 class Home extends Controller{

   public function __construct()
   {


   }
   public function index()
   {
    $data =['logged'=>true];

    $this->view('home',$data);
   }
   public function about($id)
   {
    echo "about loaded".$id;
   }


 }
?>