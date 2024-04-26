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
            var_dump($orders);
            $data = [
                'orders' => $orders
            ];
        
        $this -> view('adminQualityCheck',$data);
        }else{
            $this -> view('_404');
        }
    }

public function details($qc_id){
    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin'){
        $order = $this->orderModel->getQualityCheckdetails($qc_id);
        $data = [
            'order' => $order
        ];
        $this -> view('adminQualityCheckDetails',$data);
    }else{
        $this -> view('_404');
    }
}

    public function approve($qc_id){
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin'){
            $result = $this->orderModel->approveQualityCheck($qc_id);
            if($result){
                header('location:'.URLROOT.'/QualityCheck');
            }else{
                die('Something went wrong');
            }
        }else{
            $this -> view('_404');
        }
    }

    public function reject($qc_id){
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='admin'){
            $result = $this->orderModel->rejectQualityCheck($qc_id);
            if($result){
                header('location:'.URLROOT.'/QualityCheck');
            }else{
                die('Something went wrong');
            }
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