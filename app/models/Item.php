<?php 
  
  class Item {

   private $db;
   public function __construct()
   {
     $this->db = new Database;
   }

   public function getItems($page=1,$perPage=10,$sort=null,$order='ASC',$filter){
    $offset = ($page - 1) * $perPage;

    // valid params
    $validateSort=['price','stock','city','category','district','exp_date','created_at'];
    $validateOrder=['asc','desc'];

    $validCategories =["vegetables","fruits","spices"];
    $validCities =["colombo","kaluthara","gampaha","galle","anuradhapura","matara","hambanthota","polonnaruwa","nuwaraeliya","badulla","rathnapura"];

    // query
    $query="SELECT * FROM items_market WHERE 1"; 
    $countQuery="SELECT COUNT(*) as total FROM items_market WHERE 1"; 

    // filtering
    foreach($filter as $key=> $value){
      switch ($key){
        case 'category':
          if(!empty($value)){
            $categoryValid = [];
            foreach ($value as $category) {

              if (in_array($category, $validCategories)) {
                  $categoryValid[] = "category = :category_$category";
                  // $this->db->bind(":category_$category", $category);
              }else{
                return ['items' => false, 'totalCount' => 0];
              }
          }
          if (!empty($categoryValid)) {
              $query .= " AND (" . implode(' OR ', $categoryValid) . ")";
              $countQuery .= " AND (" . implode(' OR ', $categoryValid) . ")";
          }
      }
        break;
        case 'city':
          if(!empty($value)){
            $cityValid = [];
            foreach ($value as $city) {

              if (in_array($city, $validCities)) {
                  $cityValid[] = "district = :city_$city";
                  // $this->db->bind(":city_$city", $city);
              }else{
                return ['items' => false, 'totalCount' => 0];
              }
          }
          if (!empty($cityValid)) {
              $query .= " AND (" . implode(' OR ', $cityValid) . ")";
              $countQuery .= " AND (" . implode(' OR ', $cityValid) . ")";
          }
      }
        break;
        case 'minPrice':    
          if ($value !== null && $value > 0) {
          $query .= " AND price >= :minPrice";
          $countQuery .= " AND price >= :minPrice";
        }
        break;
        case 'maxPrice':
          if ($value !== null && $value > 0) {
          $query .= " AND price <= :maxPrice";
          $countQuery .= " AND price <= :maxPrice";
        }
        break;
        case 'minQty':    
          if ($value !== null && $value > 0) {
          $query .= " AND stock >= :minQty";
          $countQuery .= " AND stock >= :minQty";
        }
        break;
        case 'maxQty':
          if ($value !== null && $value > 0) {
          $query .= " AND stock <= :maxQty";
          $countQuery .= " AND stock <= :maxQty";
        }
        break;
        case 'search':
          if ($value !== null && $value !== '') {
              // $searchTerms = explode(' ', $value);
              $searchConditions = [];
              // var_dump($value);
              foreach ($value as $term) {
                  $searchConditions[] = "name LIKE :search_$term";
              }
              if (!empty($searchConditions)) {
                  $query .= " AND (" . implode(' OR ', $searchConditions) . ")";
                  $countQuery .= " AND (" . implode(' OR ', $searchConditions) . ")";
              }
          }
          break;
      }
  }

  

// sorting
    if($sort!=null && in_array($sort,$validateSort) && in_array($order,$validateOrder)){
      if($searchConditions){
        $query .= " ORDER BY 
        CASE 
            WHEN " . implode(" AND ", $searchConditions) . " THEN 0
            ELSE 1
        END, $sort $order LIMIT :offset, :perPage";

      }else{
        $query .=" ORDER BY $sort $order LIMIT :offset, :perPage";
      }
    }else{ 
      if($searchConditions){
        $query .= " ORDER BY 
        CASE 
            WHEN " . implode(" AND ", $searchConditions) . " THEN 0
            ELSE 1
        END, created_at DESC LIMIT :offset , :perPage";
      }else{
        $query .=" ORDER BY created_at DESC LIMIT :offset , :perPage";
      }
    }

    
// items query
    $this->db->query($query);  
  foreach ($filter as $key => $value) {
    if (is_array($value)) {
        foreach ($value as $item) {
          if($key=='search'){
            $this->db->bind(":$key" . "_$item", "%$item%");
          }else{
            $this->db->bind(":$key" . "_$item", $item);
          }
        }
    } else if($value){
        $this->db->bind(":$key", $value);
    }
}
    $this ->db ->bind(':offset',$offset);
    $this ->db ->bind(':perPage',$perPage);
    $row=$this->db->resultSet();
  
    if($row){
          // get totalCount query
          $this->db->query($countQuery);
          foreach ($filter as $key => $value) {
            if (is_array($value) ) {
                foreach ($value as $item) {
                  if($key=='search'){
                    $this->db->bind(":$key" . "_$item", "%$item%");
                  }else{
                    $this->db->bind(":$key" . "_$item", $item);
                  }
                }
            } else if($value) {
                $this->db->bind(":$key", $value);
            }
        }
          $totalCount=$this->db->single();
        return ['items' => $row, 'totalCount' => $totalCount->total];
      }else{
        return ['items' => false, 'totalCount' => 0];
  
      }
   }
   
   


   public function ReduceStock($id,$quantity){
  
  $this->db->query("SELECT stock FROM items_market WHERE item_id =:id");
    $this->db->bind(':id',$id);
    $current= $this->db->single();
  
    if($current){
      $new_stock = $current->stock - $quantity ;
      
      $query =    "UPDATE
                items_market
                SET
                stock =:stock
                WHERE 
                item_id =:id";
    
    $this->db->query($query);
    $this->db->bind(':stock',$new_stock);
    $this->db->bind(':id',$id);
    
    if($this->db->execute()){
      return true;
    }else{
      return false;
    }
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

    // $this->db->query('INSERT INTO
    // quality_check(seller_id,seller_img)
    // VALUES(:seller_id,:item_img)');


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
public function getSellerInfo($id) {

  
  // Corrected SQL query and parameter binding
  $this->db->query("SELECT sellers.*, users.* 
                   FROM sellers 
                   RIGHT JOIN users ON sellers.user_id = users.user_id 
                   WHERE sellers.seller_id = :seller_id");
  
  $this->db->bind(':seller_id', $id);
  
  $this->db->execute(); // Execute the query
  $row = $this->db->single();
  
  
  if ($row) {
      return $row;
  } else {
      return false;
  }
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


public function updateItem($data){
  $this->db->query(
    'UPDATE items_market SET
    name=:name,
    price=:price,
    unit =:unit,
    stock=:stock,
    description=:description
    WHERE item_id =:item_id');

$this->db->bind(':item_id',$data['item_id']);
$this->db->bind(':name', $data['name']);
$this->db->bind(':price', $data['price']);
$this->db->bind(':unit', $data['unit']);
$this->db->bind(':stock', $data['stock']);
$this->db->bind(':description', $data['description']);

if($this->db->execute()){
  return true;
}
else{
  return false;
}

}

public function addtoCart($data){
 $this->db->query('SELECT * FROM cart WHERE item_id = :item_id AND buyer_id = :buyer_id');
 $this ->db ->bind(':item_id',$data['item_id']);
 $this ->db ->bind(':buyer_id',$data['buyer_id']);
 $existingitem = $this->db->single();

 

if ($this->db ->rowcount()>0) {
    $this->db->query('UPDATE cart SET qty = qty + :qty WHERE item_id = :item_id AND buyer_id = :buyer_id');
    var_dump('yes');
} else {
    $this->db->query('INSERT INTO cart (item_id, buyer_id, qty) VALUES (:item_id, :buyer_id, :qty)');
}


$this ->db ->bind(':item_id',$data['item_id']);
$this ->db ->bind(':buyer_id',$data['buyer_id']);
$this ->db ->bind(':qty',$data['qty']);
if ($this->db->execute()) {
  return true;
} else {
  return false;
}



  // $this->db->query('INSERT INTO 
  // cart (item_id,buyer_id,qty) 
  // VALUES(:item_id,:buyer_id,:qty)'
  // );
}

public function getCartItems($buyer_id){
    $this->db->query("SELECT items_market.*, cart.* FROM items_market RIGHT JOIN cart ON cart.item_id = items_market.item_id WHERE cart.buyer_id = :buyer_id");
    $this ->db ->bind(':buyer_id',$buyer_id);
  $row=$this->db->resultSet();
   if($row){
    return $row;
   }else{
  return false;
   };
}

public function clearCartitems($id){
  $this->db->query("DELETE FROM cart WHERE buyer_id = :buyer_id");
  $this ->db ->bind(':buyer_id',$id);
  if ($this->db->execute()) {
    return true;
}else{
    return false;
}
}

public function deleteCartItem($id){
  $this->db->query("DELETE FROM cart WHERE cart_id=:cart_id");
  $this ->db ->bind(':cart_id',$id);
  if ($this->db->execute()) {
    return true;
}else{
    return false;
}
}

//for Review Function 

public function getSellerID($id){
  $this->db->query("SELECT * FROM items_market WHERE item_id=:id");
  $this->db->bind(':id',$id);
  $row =$this->db->Single();

  if($row){
    return $row;
  }
  else{
    return false;
  }
}

public function Addreview($data){

  var_dump($data);

$this->db->query('INSERT INTO reviews(item_id,buyer_id,seller_id,review) VALUES(:item_id,:buyer_id,:seller_id,:review)');

$this->db->bind(':item_id',$data['item_id']);
$this->db->bind(':buyer_id',$data['buyer_id']);
$this->db->bind(':seller_id',$data['seller_id']);
$this->db->bind(':review',$data['review']);

if($this->db->execute()){
  return true;
}
else{
  return true;
}


}

public function getReviews($id){
 
  $query = 'SELECT 
            reviews.*,
            users.*,
            buyers.prof_img AS buyer_img
            FROM
            reviews
            JOIN
            buyers ON
            reviews.buyer_id = buyers.buyer_id
            JOIN 
            users ON 
            buyers.user_id = users.user_id
            WHERE
            reviews.item_id = :id';

        $this->db->query($query);
        $this->db->bind(':id',$id);

        $row = $this->db->Resultset();

        if($row){
          return $row;
        }
        else{
          return false;
        }
}

public function getSellerReviews($id){

  $query ='SELECT
            reviews.*,
            users.*,
            buyers.prof_img AS buyer_img
            FROM
            reviews
            JOIN
            buyers ON
            reviews.buyer_id = buyers.buyer_id
            JOIN
            users ON
            buyers.user_id = users.user_id
            WHERE
            reviews.seller_id =:id
            ORDER BY posted_date DESC';
          
    $this->db->query($query);
    $this->db->bind(':id',$id);
    $row = $this->db->resultset();

    if($row){
      return $row;
    }
    else{
      return false;
    }

}

public function getReviewsSeller($id){

  $query = 'SELECT
            reviews.*,
            buyers.prof_img AS buyer_img,
            users.name  AS buyer_name,
            users.*
            FROM
            reviews
            JOIN
            buyers ON
            reviews.buyer_id = buyers.buyer_id
            JOIN
            users ON
            buyers.user_id = users.user_id
            WHERE
            reviews.item_id =:id
            ORDER BY posted_date DESC';

$this->db->query($query);
$this->db->bind(':id',$id);
$row = $this->db->resultSet();

if($row){
  return $row;
}
else{
  return false;
}

}

public function getreviewcount($id){

  $this->db->query('SELECT COUNT(*) AS count FROM reviews WHERE item_id=:id');
  $this->db->bind(':id',$id);
  $result = $this->db->Single();

  if($result){
    return $result->count;
  }
  else{
    return false;
  }

}









}