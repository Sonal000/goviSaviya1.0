<?php 

class Register extends Controller{

 public function __construct()
 {

 }

 public function index()
 {
    $this->view('register');
 }
 public function seller()
 {
    $this->view('sellerRegister');
 }
 public function delivery()
 {
    $this->view('deliveryRegister');
 }

}