<?php


class Cart extends Controller {
   private $itemModel;
 public function __construct(){
  $this->itemModel=$this->model('Item');
 }

 public function index()
 {
  $items = $this->itemModel->getCartItems($_SESSION['buyer_id']);
  $data = [
   'items'=>$items,
];

  $this->view('cart',$data);
 }
}


