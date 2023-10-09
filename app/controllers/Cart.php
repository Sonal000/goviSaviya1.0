<?php


class Cart extends Controller {
 public function __construct(){

 }

 public function index()
 {

  $data = [
   'logged'=>true,
   'cart'=>false,
];

  $this->view('cart',$data);
 }
}