<?php 
 class SellerProfile extends Controller{

   public function __construct()
   {

   }

   public function index()
   {
    $data = [
      'logged'=>false
   ];
      $this->view('sellerProfile');
   }


 }
?>