<?php 
 class Test extends Controller{

    private $testModel;

   public function __construct()
   {
    $this->testModel = $this->model('Item');
   }

   public function index()
   {

    $items = $this->testModel->getItems();
    $data=[
      'items'=>$items
    ];
      $this->view('test',$data);
   }


 }
?> 
