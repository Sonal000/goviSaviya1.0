<?php 

 class OrderRequests extends Controller{
    private $RequestsModel;
   public function __construct()
   {
    $this->RequestsModel=$this->model("Requests"); 

   }
   public function index(){
    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='buyer'){
      $request = $this->RequestsModel->BuyerAcceptRequests($_SESSION['buyer_id']);
      $pendreq = $this->RequestsModel->BuyerPendingRequests($_SESSION['buyer_id']);
      $quotation=$this->RequestsModel->BuyerQuotations($_SESSION['buyer_id']);
      
      $data =[
          'requests'=> $request,
          'pendreq'=>$pendreq,
          'quotations'=>$quotation,
      ];

      $this->view('buyerRequestPosts',$data);
    }

    if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){
      $request =$this->RequestsModel->getOrderRequests();
      $Qrequests =$this->RequestsModel->getQorderRequests();
      $data =[
        'requests'=>$request,
        'Qrequests'=>$Qrequests,
      ];

      $this -> view('sellerAdrequest',$data);
    }

    
  }


   public function add(){
    if($_SERVER['REQUEST_METHOD']=='POST'){

      //sanitize POST data
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

      
                  $data=[
                  'name'=>trim($_POST['name']),
                  'category' =>trim($_POST['category']),
                  'req_stock' =>trim($_POST['req_stock']),
                  'unit'=>trim($_POST['unit']),
                  'req_date' =>trim($_POST['req_date']),
                  'req_address' =>trim($_POST['req_address']),
                  'district' =>trim($_POST['district']),
                  'buyer_id'=>$_SESSION['buyer_id'],
                  
                 
                ];
                if($this->RequestsModel->addRequests($data)){
                  $data=[
                      'name'=>'',
                      'category' =>'',
                      'unit' =>'',
                      'req_stock' =>'',
                      'unit'=>'',
                      'req_date' =>'',
                      'req_address' =>'',
                      'district' =>'',
                      'buyer_id' =>'',
                      
                      
                    ];
                    redirect('OrderRequests');
              }else{
                echo '<script>
                      alert("add item failed");
                </script>';
              };
      }
      else{
        $this -> view('buyerRequestPosts');
      }
      
      
   }

   public function accept($id){

    $this->RequestsModel->acceptRequest($id);
    $requests = $this->RequestsModel->getOrderRequests();


    $data=[
      'requests'=>$requests,
    ];
    $this->view('sellerAdaccept',$data);


   }

   public function decline($id){

    $this->RequestsModel->declineRequest($id);

    $request =$this->RequestsModel->getOrderRequests();
      $data =[
        'requests'=>$request,
      ];

      $this -> view('sellerAdrequest',$data);
}

   public function accepted(){

    $requests=$this->RequestsModel->getAcceptRequests();

    $data=[
      'requests'=>$requests,
    
    ];
    $this->view('sellerAdaccept',$data);

   }

   public function setQuotation($id){

    if($_SERVER['REQUEST_METHOD']=='POST'){

      //sanitize POST data
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

      $data =[
        'amount'=>trim($_POST['amount']),
        'request_ID'=>$id,
        
      ];
     
      if($this->RequestsModel->addQuotation($data)){
        $data=[
          'amount'=>'',
          'request_ID'=>'',
        
          ];
        redirect('OrderRequests');
      }
      else{
        return false;
      }

    }
    else{
      echo 'error';
    }

   }

   public function viewQuotations($id){

    $requests =$this->RequestsModel->getrequestDetails($id);
    $quotations = $this->RequestsModel->viewQuotations($id);

    $data=[
      'details'=>$requests,
      'Q2'=>$quotations,
    ];

    $this->view('viewQuotations',$data);



   }

   public function acceptQuotation($id){
        $this->RequestsModel->acceptquotation($id);

      
        redirect('OrderRequests');
    

        

   }

 }
?>