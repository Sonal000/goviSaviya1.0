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

        $name = $_POST['name'];
        $price = $_POST['price'];
        $unit = $_POST['unit'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        $exp_date = $_POST['exp_date'];

        if ($exp_date == $postData->exp_date) {
            // If the expiration date is not updated, display an error message
            redirect('/myproducts', ['error' => 'Please update the expiration date.']);
        } else {

            $data = [
                'name' => trim($_POST['name']),
                'unit' => trim($_POST['unit']),
                'price' => trim($_POST['price']),
                'stock' => trim($_POST['stock']),
                'exp_date' => trim($_POST['exp_date']),
                'description' => trim($_POST['description']),
                'item_id' => $postData->item_id,
            ];

            if ($this->itemModel->updateItem($data)) {
                redirect('/myproducts');
            } else {
                die('Error updating item.');
            }
        }
    } else {
        // If the request method is not POST, display an error message
        die('Invalid request method.');
    }
}


}