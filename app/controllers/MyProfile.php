<?php
  class Myprofile extends Controller{

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
  $type="buyer";

  if($type==="seller"){
   $this->view("sellerProfile",$data); 
  }
  if($type==="buyer"){
   $this->view("buyerProfile",$data); 
  }
  if($type==="deliver"){
   // $this->view("deliverProfile",$data); 
  }
  
  
}
}

  } 



?>