<?php 
 class Marketplace extends Controller{

   public function __construct()
   {

   }

   public function index()
   {  
      $data = [
         'logged'=>true
      ];
      $this->view('marketplace',$data);
   }
   public function itemInfo($id)
   {
      $data = [
         'itemName'=>'Fresh Mango',
         'itemPrice'=> 2000 ,
            'logged'=>false
      ];


      $this->view('itemInfo',$data);
   }



 }
?>