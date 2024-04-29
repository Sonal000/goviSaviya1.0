<?php 
 class Auc extends Controller{

   public function __construct()
   {

   }

   public function index()
   {
      $data = [
         'logged'=>true
      ];  
    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){
      $this->view('sellerAuc',$data);
   }else{

      $this->view('auctionC',$data);
   }


   }
   public function itemInfo($id)
   {
      $data = [
         'itemName'=>'Onions',
         'itemPrice'=> 2000 ,
         'logged'=>false
      ];


      $this->view('auctionItemInfo',$data);
   }
 }
?>