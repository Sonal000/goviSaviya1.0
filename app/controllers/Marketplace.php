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

      if($_SESSION['user_type']=='seller'){
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
      }else{
         return false;
      }

      

      $this->view('itemInfo',$data);
   }



 }
?>