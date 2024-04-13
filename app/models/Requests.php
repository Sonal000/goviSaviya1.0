<?php
/*testing model to get know */
class Requests{
    private $db;

    public function __construct(){
        $this -> db = new Database;
    }

    public function addRequests($data){

        $this->db->query('SELECT * FROM buyers WHERE buyer_id=:buyer_id');
        $this->db->bind(':buyer_id',$data['buyer_id']);
        $row = $this->db->single();

        $this->db->query('SELECT * FROM users WHERE user_id=:user_id');
        $this->db->bind(':user_id',$row->user_id);
        $row2 = $this->db->single();
        
        $this->db->query
        ("INSERT INTO requests(name,category,req_stock,unit,req_date,req_address,district,buyer_id,buyer_name,buyer_img)
        VALUES(:name,:category,:req_stock,:unit,:req_date,:req_address,:district,:buyer_id,:buyer_name,:buyer_img)");

        $this->db->bind(':name',$data['name']);
        $this->db->bind(':category',$data['category']);
        $this->db->bind(':req_stock',$data['req_stock']);
        $this->db->bind(':unit',$data['unit']);
        $this->db->bind(':req_date',$data['req_date']);
        $this->db->bind(':req_address',$data['req_address']);
        $this->db->bind(':district',$data['district']);
        $this->db->bind(':buyer_id',$data['buyer_id']);
        $this->db->bind(':buyer_name',$row2->name);
        $this->db->bind(':buyer_img',$row->prof_img);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function BuyerAcceptRequests($id){

        $this->db->query("SELECT * FROM requests WHERE buyer_id=:buyer_id AND status='accepted' ORDER BY posted_date DESC");

        $this->db->bind(':buyer_id',$id);

        $row = $this->db->resultset();

        if($row){
            return $row;
        }
        else{
            return false;
        }
        
    }

    public function BuyerPendingRequests($id){

        $this->db->query("SELECT * FROM requests WHERE buyer_id=:buyer_id AND status='pending' ORDER BY posted_date DESC");

        $this->db->bind(':buyer_id',$id);

        $row = $this->db->resultSet();

        if($row){
            return $row;
        }
        else{
            return false;
        }
        
    }

    public function getOrderRequests(){

        $this->db->query('SELECT * FROM requests 
                  WHERE status = "pending" 
                  AND decline_seller_ID != :seller_ID 
                  AND request_ID NOT IN (SELECT request_ID FROM req_quotation WHERE seller_ID = :seller_ID)
                  ORDER BY posted_date DESC');

    $this->db->bind(':seller_ID', $_SESSION['seller_id']);
    $row = $this->db->resultSet();

    if ($row) {
    return $row;
    } else {
    return false;
    }

    }

    public function acceptRequest($id){

        $this->db->query('SELECT * FROM sellers WHERE seller_id=:seller_id');
        $this->db->bind(':seller_id',$_SESSION['seller_id']);
        $row = $this->db->single();

        $this->db->query('SELECT * FROM users WHERE user_id=:user_id');
        $this->db->bind(':user_id',$row->user_id);
        $row2 = $this->db->single();

        $this->db->query('UPDATE requests 
                  SET seller_ID = :seller_ID,
                      seller_name = :seller_name,
                      Seller_img = :seller_img,
                      status = :status 
                  WHERE request_ID = :request_ID');

        $this->db->bind(':seller_ID',$_SESSION['seller_id']);
        $this->db->bind(':seller_name',$row2->name);
        $this->db->bind(':seller_img',$row->prof_img);
        $this->db->bind(':request_ID',$id);
        $this->db->bind(':status','accepted');

        

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function getAcceptRequests(){

        $this->db->query('SELECT * FROM requests WHERE status="accepted" AND acp_seller_ID=:seller_ID ORDER BY posted_date DESC');
        $this->db->bind(':seller_ID',$_SESSION['seller_id']);
        $row = $this->db->resultSet();

        if($row){
            return $row;
        }
        else{
            return false;
        }
    }

    public function declineRequest($id){

        $this->db->query('UPDATE requests SET decline_seller_ID=:seller_ID WHERE request_ID=:request_ID');
        $this->db->bind(':seller_ID',$_SESSION['seller_id']);
        $this->db->bind(':request_ID',$id);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function addQuotation($data){

        

        $this->db->query('SELECT * FROM requests WHERE request_ID=:request_ID');
        $this->db->bind(':request_ID',$data['request_ID']);
        $details = $this->db->single();
        $quotation_count = ($details->quotation_count) + 1;
        
       
        $this->db->query('UPDATE requests SET quotation_count=:quotation_count WHERE request_ID=:request_ID');
        $this->db->bind(':request_ID',$data['request_ID']);
        $this->db->bind(':quotation_count',$quotation_count);
        $this->db->execute();

        $this->db->query('INSERT INTO req_quotation(request_ID,seller_ID,amount,buyer_ID)VALUES(:request_ID,:seller_ID,:amount,:buyer_ID)');
        $this->db->bind(':request_ID',$data['request_ID']);
        $this->db->bind(':seller_ID',$_SESSION['seller_id']);
        $this->db->bind(':amount',$data['amount']);
        $this->db->bind(':buyer_ID',$details->buyer_id);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function BuyerQuotations($id){
        $this->db->query('SELECT * FROM requests WHERE quotation_count >0 AND buyer_id=:buyer_id');
        $this->db->bind(':buyer_id',$id);
        $row = $this->db->resultset();

        if($row){
            return $row;
        }
        else{
            return false;
        }

    }

    // public function getQorderRequests(){
    //     $this->db->query('SELECT * FROM req_quotation WHERE seller_ID=:seller_ID');
    //     $this->db->bind(':seller_ID',$_SESSION['seller_id']);
    //     $row= $this->db->resultset();

        

    //     if($row){
    //         return $row;
    //     }
    //     else{
    //         return false;
    //     }
    // }

    public function getQorderRequests(){
       
        $this->db->query('SELECT rq.request_ID,rq.amount,rq.seller_ID, r.* 
                          FROM req_quotation rq 
                          JOIN requests r ON rq.request_ID = r.request_ID 
                          WHERE rq.seller_ID = :seller_ID');
        
       
        $this->db->bind(':seller_ID', $_SESSION['seller_id']);
       
       $row = $this->db->resultset();
    
       
        if($row){
            return $row; 
            
        } else {
            return false; 
        }
    }
    

    





}

