<?php 
 class Test extends Controller{

    private $testModel;

   public function __construct()
   {
    $this->testModel = $this->model('Item');
   }

   public function index()
   {

    $this->view('test');
   }

   public function show(){
    $items = $this->testModel->getSellerItems(19);
    $data=[
      'status'=>'success',
      'items'=>$items
    ];
    echo json_encode($data);
      
   }


 }
?> 
