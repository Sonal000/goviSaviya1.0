<?php 
 class Auction extends Controller{

   public function __construct()
   {

   }

   public function index()
   {
      $data = [
         'logged'=>true
      ];
    $this->view('auction',$data);
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