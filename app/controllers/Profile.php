<?php
  class Profile extends Controller{

    private $sellerModel;
    private $itemModel;
    private $userModel;
    private $buyerModel;
    private $deliverModel;
   public function __construct(){

    $this->sellerModel=$this->model('Seller');
    $this->buyerModel=$this->model('Buyer');
    $this->deliverModel=$this->model('Deliver');
    $this->itemModel=$this->model('Item');
    $this->userModel=$this->model('User');
    if(!isset($_SESSION['user_id'])){
      redirect('users/login');
    }

    
   }

   public function index($id=null){

if($id===null){
  $this->view("_404");

}else{
    $userType=$this->userModel->getUserType($id);
    $items=false;
    switch($userType){
      case "seller":
        $row =$this->sellerModel->getProfileInfo($id);
        $items=$this->itemModel->getSellerItems($row->seller_id);
        break;
      case "buyer":
        $row =$this->buyerModel->getProfileInfo($id);
        break;
      case "deliver":
        $row =$this->deliverModel->getProfileInfo($id);
        break;
      default:
        $data=[
          "message"=>"No user Found!",
          "description"=>"No user Found!"
        ];
        $this->view("_404",$data);  
        exit();
    }

    if(!$row){
      $data=[
        "message"=>"No user Found!",
        "description"=>"No user Found!"
      ];
      $this->view("_404",$data);  
    }else{
      
      $data=[
        "name"=>$row->name,
        "address"=>$row->address,
        "user_type"=>$row->user_type,
        "city"=>$row->city,
        "prof_img"=>$row->prof_img,
        "cover_img"=>$row->cover_img,
        "about"=>$row->about,
        "items"=>$items?$items:false,
      ];
      
      
      
      
      $this->view("profile",$data);
      
    }
}
}

  } 



?>