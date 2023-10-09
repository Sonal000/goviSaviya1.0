<?php 
 class _404 extends Controller{

   public function __construct()
   {

   }

   public function index()
   {

    $error=["message"=>"Not found"];
    http_response_code(404);
      $this->view('_404',$error);
   }


 }
?>