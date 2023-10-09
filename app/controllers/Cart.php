<?php


class Cart extends Controller {
 public function __construct(){

 }

 public function index()
 {

  $data = [
   'logged'=>true
];

  $this->view('cart',$data);
 }
}