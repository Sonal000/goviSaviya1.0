<?php

class AuctionC extends Controller{
    private $auctionModel;
    public function __construct(){
        $this->auctionModel =$this->model('Auction');
            
    }

    public function index(){
        
            
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $perPage = 20;
            $row=$this->auctionModel->getItems($page,$perPage);
            $totalItems = $this->auctionModel->getTotalItemsCount(); 
            $data=[
                'items'=>$row,
                'totItems'=>$totalItems,
                'totPages'=>$totalItems/$perPage,
                'page'=>$page
            ];

          if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){
            $this->view('sellerAuc',$data);
         }else{
      
            $this->view('auction',$data);
         }
      
      
         }

    public function auctionInfo($id){
        $row =$this->auctionModel->getAuctionInfo($id);
        
        $data=[

            'items'=>$row
        ];
        if($row){
            $this->view('auctionItemInfo',$data);
        }
        else{
            echo 'nothing to show';
        }


    }

    public function myAuctions($id){
        $row=$this->auctionModel->myAuctionInfo($id);
        $data=[
            'items'=>$row
        ];
        if($row){
            $this->view('sellerauction',$data);

        }
        else{
            echo 'nothing to show';
        }

    }

    public function endAuction($id){

        $this->auctionModel->endAuction($id);

        $seller_id = $_SESSION['seller_id'];
        $row=$this->auctionModel->myAuctionInfo($seller_id);
        $data=[
            'items'=>$row
        ];

       

        if($row){
            $this->view('sellerauction',$data);
        }
        else{
            echo"nothig to show";
        }
        


    }


    
    



    public function add() {
        if($_SERVER['REQUEST_METHOD']=='POST'){

           
    //sanitize POST data
    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
    if (isset($_FILES['item_img'])) {
        $uploadDirectory = (str_replace("\\", "/",STOREROOT)) . '/items/'; 
        $filename = uniqid() . '_' . $_FILES['item_img']['name'];
        $targetPath = $uploadDirectory . $filename;         
        if (move_uploaded_file($_FILES['item_img']['tmp_name'], $targetPath)){
            $data=[
                'name'=>trim($_POST['name']),
                'category' =>trim($_POST['category']),
                'unit' =>trim($_POST['unit']),
                'seller_ID' =>($_SESSION['seller_id']),
                'price' =>trim($_POST['price']),
                'stock' =>trim($_POST['stock']),
                'exp_date' =>trim($_POST['exp_date']),
                'start_date'=>trim($_POST['start_date']),
                'end_date' =>trim($_POST['end_date']),
                'address' =>trim($_POST['address']),
                'district' =>trim($_POST['district']),
                'description' =>trim($_POST['description']),
                'status'=>'active',
                'item_img'=>$filename
                
              ];
              if($this->auctionModel->addItem($data)){
                $data=[
                    'name'=>'',
                    'category' =>'',
                    'unit' =>'',
                    'seller_ID' =>'',
                    'price' =>'',
                    'stock' =>'',
                    'exp_date' =>'',
                    'start_date'=>'',
                    'end_date'=>'',
                    'address' =>'',
                    'district' =>'',
                    'description' =>'',
                    'item_img'=>''
                  ];
                  redirect('sellerauction',$data);
            }else{
              echo '<script>
                    alert("add item failed");
              </script>';
            };

    } else {
        die('Something went wrong.');
    }
    } else {
    die('Failed to move the uploaded file.');
    }

        }
       $this->view('auctionList');
    }



   /* public function about(){
        $this ->view('Pages/about');
    }*/
}