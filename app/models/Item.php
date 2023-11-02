<?php 
  
  class Item {

   private $db;
   public function __construct()
   {
     $this->db = new Database;
   }

   public function getItems(){

    $this->db->query("SELECT * FROM items_market ORDER BY created_at DESC LIMIT 9");
 
    $row=$this->db->resultSet();
    if($row){
      return $row;
    }else{
      return false;
    }

   } 
   public function getSellerItems($id){

    $this->db->query("SELECT * FROM items_market WHERE seller_id=:seller_id ORDER BY created_at DESC");
    $this ->db ->bind(':seller_id',$id);
    $row=$this->db->resultSet();
    if($row){
      return $row;
    }else{
      return false;
    }

   } 
   public function addItems($data){
    $this->db->query('INSERT INTO 
    items_market (name,seller_id,category,description,price,stock,address,unit,district,item_img) 
    VALUES(:name,:seller_id,:category,:description,:price,:stock,:address,:unit,:district,:item_img)'
    );


$this ->db ->bind(':name',$data['name']);
$this ->db ->bind(':seller_id',$data['seller_id']);
$this ->db ->bind(':category',$data['category']);
$this ->db ->bind(':description',$data['description']);
$this ->db ->bind(':price',$data['price']);
$this ->db ->bind(':stock',$data['stock']);
$this ->db ->bind(':address',$data['address']);
$this ->db ->bind(':unit',$data['unit']);
$this ->db ->bind(':district',$data['district']);
$this ->db ->bind(':item_img',$data['item_img']);

//execute
if ($this->db->execute()) {
return true;
} else {
return false;
}
   } 

public function getItemInfo($id){
  $this->db->query("SELECT * FROM items_market WHERE item_id = :item_id");
  $this ->db ->bind(':item_id',$id);
  $row=$this->db->single();
   if($row){
    return $row;
   }else{
  return false;
   };
}
public function getSellerInfo($id){
  $this->db->query("SELECT sellers.*, users.* FROM sellers RIGHT JOIN users ON sellers.user_id = users.user_id WHERE seller_id = :seller_id");

  $this ->db ->bind(':seller_id',$id);
  $row=$this->db->single();
   if($row){
    return $row;
   }else{
  return false;
   };
}


public function deleteItem($id){
  $this->db->query("DELETE FROM items_market WHERE item_id = :item_id");
  $this ->db ->bind(':item_id',$id);
  if ($this->db->execute()) {
    return true;
}else{
    return false;
}

}



   
  }