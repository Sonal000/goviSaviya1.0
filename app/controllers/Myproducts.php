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

    public function update($id){
        $postData = $this->itemModel->getItemInfo($id);
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            $data =[
                        'name'=>trim($_POST['name']),
                        'unit' =>trim($_POST['unit']),
                        'price' =>trim($_POST['price']),
                        'stock' =>trim($_POST['stock']),
                        'description' =>trim($_POST['description']),
                        'item_id'=> $postData->item_id
                        
            ];

            if($this->itemModel->updateItem($data)){
                redirect('/myproducts');
            }
             
        else{
            die('error');
        }

        }

       
    }

   /* public function about(){
        $this ->view('Pages/about');
    }*/
}