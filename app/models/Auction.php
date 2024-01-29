<?php 
 
 class Auction{

    private $db;

    public function __construct(){
        $this -> db = new Database;
    }

    public function addItem($data){
        $this->db->query
        ('INSERT INTO auction(name,seller_ID,category,description,price,stock,exp_date,start_date,end_date,address,unit,district,item_img,status)
        VALUES(:name,:seller_ID,:category,:description,:price,:stock,:exp_date,:start_date,:end_date,:address,:unit,:district,:item_img,:status)');

        $this->db->bind(':name',$data['name']);
        $this->db->bind(':seller_ID',$data['seller_ID']);
        $this->db->bind(':category',$data['category']);
        $this->db->bind(':description',$data['description']);
        $this->db->bind(':price',$data['price']);
        $this->db->bind(':stock',$data['stock']);
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


  public function endAuction($id){
    $this->db->query("UPDATE auction 
    SET status='inactive' WHERE auction_ID=:auction_ID");
    $this->db->bind(':auction_ID',$id);

    if($this->db->execute()){
        return true;
    }
    else{
        return false;
    }

  }

 }