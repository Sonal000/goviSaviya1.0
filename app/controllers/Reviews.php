<?php

class Reviews extends Controller{
   
    private $itemModel;

    public function __construct(){
        $this->itemModel=$this->model("item"); 
        if(!isset($_SESSION['user_id'])){
            $this -> view('_404');
            exit;
        }    
    }


    public function index(){

        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){

            // $reviews = $this->itemModel->getSellerReviews($_SESSION['seller_id'],); 
            $row=$this->itemModel->getSellerItems($_SESSION['seller_id']);

            if($row){

                foreach ($row as $item) {


                    $reviews = $this->itemModel->getReviewsSeller($item->item_id);
                    $count = $this->itemModel->getreviewcount($item->item_id);
                    $item->reviewlist=$reviews;
                    $item->reviewcount =$count;
                    
                
                
            }
        }

        $data=[
            
            'row'=>$row,
        ];
        $this -> view('SellerReviews',$data);
    }


    }

}