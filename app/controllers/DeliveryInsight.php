<?php

class DeliveryInsight extends Controller{

    private $deliverModel;

    public function __construct(){
        $this->deliverModel =$this->model('Deliver');
    }

    public function index(){

        $deliver_id = $_SESSION['deliver_id'];
        $totalOrdersCompleted = $this->deliverModel->getTotalOrdersCompleted($deliver_id);
        var_dump('totalOrdersCompleted');

        $data = ['title'=>'welcome'];
        $this -> view('deliveryInsight');
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}