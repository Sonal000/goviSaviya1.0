<?php

class Sellermarketplace extends Controller{
    private $itemModel;
    public function __construct(){
        $this->itemModel=$this->model('Item');
    }

    public function index(){
        
        $row=$this->itemModel->getItems();
        $data=[
            'items'=>$row
        ];

        $this -> view('sellermarketplace',$data);
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}