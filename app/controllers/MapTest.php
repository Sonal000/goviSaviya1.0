<?php 
 class MapTest extends Controller{

   private $itemModel;
   public function __construct()
   {
  
   }

   public function index(){


    $data=[
        'map'=>"maps",
    ];

    $this->view('layouts/mapCurrentLoc',$data);
   }





}

   ?>