<?php

class QualityCheck extends Controller{
    private $orderModel;
    public function __construct(){
         $this->orderModel = $this->model('Order');

         if(isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin'){
            $this->view('_404'); 
    }
    }

    public function index(){
           
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin'){
            $orders = $this->orderModel->getQualityCheckOrders();
            $data = [
                'orders' => $orders
            ];
        
        $this -> view('adminQualityCheck',$data);
        }else{
            $this -> view('_404');
        }
    }



    public function penalty(){
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin'){
            $orders = $this->orderModel->getQualityCheckOrders();
            $data = [
                'orders' => $orders
            ];
        
        $this -> view('adminPenalty',$data);
        }else{
            $this -> view('_404');
        }

    }


    public function viewComplain($order_item_id,$order_id,$order_type){

        $result = $this->orderModel->getImagestoCheck($order_type,$order_item_id,$order_id);
        if($result){

            $data = [
                'images'=>$result,
            ];
            $this -> view('adminImageCheck',$data);
        }else{
            $this -> view('_404');

        }
    }










}
    ?>