<?php

class Myproducts extends Controller{
    private $itemModel;
    public function __construct(){
            $this->itemModel=$this->model('Item');
    }

    public function index(){
        $row=$this->itemModel->getSellerItems($_SESSION['seller_id']);

        $data=[
            'items'=>$row
        ];
        $this -> view('myproducts',$data);

    }
    public function delete($id){

    if($this->itemModel->deleteItem($id)){
                    // redirect('myProducts');
                    redirect('/myproducts');
    }else{
                    die('error');

    }


        
        
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}