<?php 
 
 class Auction{

    private $db;

    public function __construct(){
        $this -> db = new Database;
    }

    public function addItem($data){

        $stock = $data['stock'];
        $unit_price=$data['price'];

        $total_amount = $stock*$unit_price;
        $this->db->query
        ('INSERT INTO auction(name,seller_ID,category,description,price,stock,total_amount,exp_date,start_date,end_date,address,unit,district,item_img,status)
        VALUES(:name,:seller_ID,:category,:description,:price,:stock,:total_amount,:exp_date,:start_date,:end_date,:address,:unit,:district,:item_img,:status)');
        

        $this->db->bind(':name',$data['name']);
        $this->db->bind(':seller_ID',$data['seller_ID']);
        $this->db->bind(':category',$data['category']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':price',$data['price']);
        $this->db->bind(':stock',$data['stock']);
        $this->db->bind(':total_amount',$total_amount);
        $this->db->bind(':exp_date',$data['exp_date']);
        $this->db->bind(':start_date',$data['start_date']);
        $this->db->bind(':end_date',$data['end_date']);
        $this->db->bind(':address',$data['address']);
        $this->db->bind(':unit',$data['unit']);
        $this->db->bind(':district',$data['district']);
        $this->db->bind(':item_img',$data['item_img']);
        $this->db->bind(':status',$data['status']);

        if($this->db->execute()){
            return true;
           
        }
        else{
            return false;
        }

    }


    
   public function getItems($page=1,$perPage=10){
    $offset = ($page - 1) * $perPage;

    $this->db->query("SELECT * FROM auction WHERE status='active' ORDER BY created_at DESC LIMIT :offset , :perPage");
    $this ->db ->bind(':offset',$offset);
    $this ->db ->bind(':perPage',$perPage);
 
    $row=$this->db->resultSet();
    if($row){
      return $row;
    }else{
      return false;
    }

   } 



   public function getTotalItemsCount(){
    $this->db->query("SELECT COUNT(*) AS total FROM auction");
    $row = $this->db->single();

    if ($row) {
        return $row->total;
    } else {
        return 0; 
    }
   }


   public function getAuctionInfo($id){
    $this->db->query("SELECT * FROM auction WHERE auction_ID = :auction_ID AND status='active'");
    $this ->db ->bind(':auction_ID',$id);
    $row=$this->db->single();
     if($row){
      return $row;
     }else{
    return false;
     };
  }


  public function myAuctionInfo($id){
    $this->db->query("SELECT * FROM auction WHERE seller_ID=:seller_ID AND status='active'");
    $this->db->bind(':seller_ID',$id);
    $row=$this->db->resultSet();
    if($row){
        return $row;
    }
    else{
        return false;
    };

  }


  public function endAuction($id) {
    $this->db->beginTransaction();

    try {
        // Update auction status to 'inactive'
        $this->db->query("UPDATE auction SET status='inactive' WHERE auction_ID=:auction_ID");
        $this->db->bind(':auction_ID', $id);
        $this->db->execute();

        // Fetch auction details
        $this->db->query('SELECT * FROM auction WHERE auction_ID=:auction_ID');
        $this->db->bind(':auction_ID', $id);
        $row = $this->db->single();
        $buyer_id=$row->buyer_id;

        // Fetch buyer details
        $this->db->query('SELECT * FROM buyers WHERE buyer_id=:buyer_id');
        $this->db->bind(':buyer_id',$buyer_id);
        $row3 = $this->db->single();
        $user_id = $row3->user_id;

        // Fetch user details
        $this->db->query('SELECT * FROM users WHERE user_id=:user_id');
        $this->db->bind(':user_id', $user_id);
        $row2 = $this->db->single();

        // Insert into orders table
        if ($row->bid_Count > 0) {
            $this->db->query('INSERT INTO orders(buyer_id,total_price,order_mobile,order_address,order_city)VALUES(:buyer_id,:total_price,:order_mobile,:order_address,:order_city)');
            $this->db->bind(':buyer_id', $buyer_id);
            $this->db->bind(':total_price', $row->total_amount);
            $this->db->bind(':order_mobile', $row2->mobile);
            $this->db->bind(':order_address', $row2->address);
            $this->db->bind(':order_city', $row2->city);
            $this->db->execute();
            $order_id = $this->db->lastInsertId();

            // Insert into order_items table
            $this->db->query('INSERT INTO order_items(order_id,item_id,quantity,total_price,seller_id,buyer_id)VALUES(:order_id,:item_id,:quantity,:total_price,:seller_id,:buyer_id)');
            $this->db->bind(':order_id', $order_id);
            $this->db->bind(':item_id', $id);
            $this->db->bind(':quantity', $row->stock);
            $this->db->bind(':total_price', $row->total_amount);
            $this->db->bind(':buyer_id', $buyer_id);
            $this->db->bind(':seller_id', $_SESSION['seller_id']);
            $this->db->execute();
        }

        $this->db->commit();
        return true;
    } catch (Exception $e) {
        $this->db->rollBack();
        return false;
    }
}




 }