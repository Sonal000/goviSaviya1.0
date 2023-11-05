<?php 
 class Marketplace extends Controller{

   private $itemModel;
   public function __construct()
   {
      $this->itemModel= $this->model('Item');
   }

   public function index()
   { 
       
      $row=$this->itemModel->getItems();
      $data=[
          'items'=>$row
      ];

      if((isset($_SESSION['user_type']))&&$_SESSION['user_type']=='seller'){
         $this->view('sellermarketplace',$data);
      }else{

         $this->view('marketplace',$data);
      }
   }
   public function itemInfo($id)
   {

      $row=$this->itemModel->getItemInfo($id);
     
      if($row){
         $seller=$this->itemModel->getSellerInfo($row->seller_id);
        
         $data=[
            'name'=>$row->name,
            'seller_name'=>$seller->name,
            'seller_id'=>$seller->seller_id,
            'seller_city'=>$seller->city,
            'category'=>$row->category,
            'description'=>$row->description,
            'price'=>$row->price,
            'unit'=>$row->unit,
            'district'=>$row->district,
            'exp_date'=>$row->exp_date,
            'created_at'=>$row->created_at,
            'item_img'=>$row->item_img,
            'stock'=>$row->stock,
         ];

         if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            //process form
            $data=[
               'qty' =>trim($_POST['qty']),
               'buyer_id' =>$_SESSION['buyer_id'],
               'item_id' =>$id,
            ];

            if($this->itemModel->addtoCart($data)){
               $data=[
                  'name'=>$row->name,
                  'seller_name'=>$seller->name,
                  'seller_id'=>$seller->seller_id,
                  'seller_city'=>$seller->city,
                  'category'=>$row->category,
                  'description'=>$row->description,
                  'price'=>$row->price,
                  'unit'=>$row->unit,
                  'district'=>$row->district,
                  'exp_date'=>$row->exp_date,
                  'created_at'=>$row->created_at,
                  'item_img'=>$row->item_img,
                  'stock'=>$row->stock,
               ];
            }else{
               $data=[
                  'name'=>$row->name,
                  'seller_name'=>$seller->name,
                  'seller_id'=>$seller->seller_id,
                  'seller_city'=>$seller->city,
                  'category'=>$row->category,
                  'description'=>$row->description,
                  'price'=>$row->price,
                  'unit'=>$row->unit,
                  'district'=>$row->district,
                  'exp_date'=>$row->exp_date,
                  'created_at'=>$row->created_at,
                  'item_img'=>$row->item_img,
                  'stock'=>$row->stock,
               ];
            };

         }



      }else{
         $this->view('_404');
      }







      

      $this->view('itemInfo',$data);
   }



 }
?>