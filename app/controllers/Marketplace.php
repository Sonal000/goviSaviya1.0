<?php 
 class Marketplace extends Controller{

   private $itemModel;
   private $userModel;
   private $notifiModel;
   public function __construct()
   {
      $this->itemModel= $this->model('Item');
      $this->userModel= $this->model('User');
      $this->notifiModel= $this->model('Notifi');
   }

   public function index()
   { 
      // pagination
      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      $perPage = 20;

      // sortings
      $sort =isset($_GET['sort']) ? $_GET['sort'] : null;
      $order =isset($_GET['order']) ? $_GET['order'] : "ASC";


      // filterings
      // Filtering by Category
      $category = isset($_GET['category']) ? (array)explode('%a%', $_GET['category']) : [];
      $city = isset($_GET['city']) ? (array)explode('%a%',$_GET['city'] ): [];
      $minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : null;
      $maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : null;
      $minQty = isset($_GET['minQty']) ? $_GET['minQty'] : null;
      $maxQty = isset($_GET['maxQty']) ? $_GET['maxQty'] : null;
      $search = isset($_GET['search']) ? (array)explode('%a%',$_GET['search'] ): [];


      // var_dump($search);
   
      $filter=[
       'category'=>  $category,
         'city'=>$city,
         'minPrice'=>$minPrice,
         'maxPrice'=>$maxPrice,
         'minQty'=>$minQty,
         'maxQty'=>$maxQty,
         'search'=>$search
         ];

      $row=$this->itemModel->getItems($page,$perPage,$sort,$order,$filter);
      $totalCount=$row['totalCount'];
      $data=[
          'items'=>$row['items'],
          'totItems'=>$totalCount,
          'totPages'=>ceil($totalCount/$perPage),
          'page'=>$page,
          'category'=>$category,
          'city'=>$city,
          'priceRange'=>$maxPrice? ('price: '.$minPrice.' - '.$maxPrice) :false,
          'qtyRange'=>$maxQty?('quantity: '.$minQty.' - '.$maxQty):false,
          'search_term'=>isset($_GET['search']) ?join(" ",(array)explode('%a%',$_GET['search'] )):''
      ];


      if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){

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
            'item_id'=>$id,
            'seller_name'=>$seller->name,
            'seller_id'=>$seller->seller_id,
            'seller_user_id'=>$seller->user_id,
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
               $this->notifiModel->notifyuser(0,$_SESSION['user_id'],'New items added to the cart','cart');
               header("Location: " . URLROOT . "/marketplace/iteminfo/".$id); 
               exit();
            }else{
               // $data=[
               //    'name'=>$row->name,
               //    'item_id'=>$id,
               //    'seller_name'=>$seller->name,
               //    'seller_id'=>$seller->seller_id,
               //    'seller_city'=>$seller->city,
               //    'category'=>$row->category,
               //    'description'=>$row->description,
               //    'price'=>$row->price,
               //    'unit'=>$row->unit,
               //    'district'=>$row->district,
               //    'exp_date'=>$row->exp_date,
               //    'created_at'=>$row->created_at,
               //    'item_img'=>$row->item_img,
               //    'stock'=>$row->stock,
               // ];

               header("Location: " . URLROOT . "/marketplace/iteminfo/".$id); // Replace with your success page URL
               exit();
            };

         }



      }else{
         $this->view('_404');
      }







      

      $this->view('itemInfo',$data);
   }



 }
?>