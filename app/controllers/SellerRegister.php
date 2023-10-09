<?php 
 class SellerRegister extends Controller{

   public function __construct()
   {

   }

   public function index()
   {
    $data = [
      'logged'=>false
   ];
      $this->view('sellerRegister');
   }


 }
?>