
<?php 

class Requests extends Controller{

    public function __construct(){
            
    }
    public function index(){
        $this -> view('_404');
    }

    public function available(){
        $data = ['title'=>'welcome'];
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){
        $this -> view('sellerAdrequest',$data);
    }
}
    public function accepted(){
        $data = ['title'=>'welcome'];
        if(isset($_SESSION['user_type']) && $_SESSION['user_type']=='seller'){
        $this -> view('sellerAdaccept',$data);
    }
}

}