<?php
  class Profile extends Controller{

   public function __construct(){


   }

   public function index($id=null){

if($id===null){
  $this->view("_404");

}else{

  
  $data=[
    "logged"=>true,
    "userid"=>$id
  ];
  
  $this->view("profile",$data);
  




  
}
}

  } 



?>