<?php 

 class ViewAuction extends Controller{

   public function __construct()
   {


   }
   public function index()
   {
    $data =['logged'=>true];

    $this->view('viewAuction',$data);
   }



 }
?>