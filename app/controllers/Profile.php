<?php
  class Profile extends Controller{

    private $sellerModel;
    private $itemModel;
   public function __construct(){

    $this->sellerModel=$this->model('Seller');
    $this->itemModel=$this->model('Item');
    
   }

   public function index($id=null){

if($id===null){
  $this->view("_404");

}else{

    $row=$this->sellerModel->getSellerInfo($id);
    $items=$this->itemModel->getSellerItems($id);

  
  $data=[
    "name"=>$row->name,
    "address"=>$row->address,
    "user_type"=>$row->user_type,
    "city"=>$row->city,
    "prof_img"=>$row->prof_img,
    "cover_img"=>$row->cover_img,
    "about"=>$row->about,
    "items"=>$items,
  ];
  



  $this->view("profile",$data);
  
}
}

  } 



?>