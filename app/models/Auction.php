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


    
//    public function getItems($page=1,$perPage=10){
//     $offset = ($page - 1) * $perPage;

//     $this->db->query("SELECT * FROM auction WHERE status='active' ORDER BY created_at DESC LIMIT :offset , :perPage");
//     $this ->db ->bind(':offset',$offset);
//     $this ->db ->bind(':perPage',$perPage);
 
//     $row=$this->db->resultSet();
//     if($row){
//       return $row;
//     }else{
//       return false;
//     }

//    } 


public function getItems($page=1,$perPage=10,$sort=null,$order='ASC',$filter){
    $offset = ($page - 1) * $perPage;

    // valid params
    $validateSort=['price','stock','city','category','district','exp_date','created_at'];
    $validateOrder=['asc','desc'];

    $validCategories =["vegetables","fruits","spices"];
    $validCities =["colombo","kaluthara","gampaha","galle","anuradhapura","matara","hambanthota","polonnaruwa","nuwaraeliya","badulla","rathnapura"];

    // query
    $query="SELECT * FROM auction WHERE 1"; 
    $countQuery="SELECT COUNT(*) as total FROM auction WHERE 1"; 

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
        $query .= " AND status='active'  ORDER BY 
        CASE 
            WHEN " . implode(" AND ", $searchConditions) . " THEN 0
            ELSE 1
        END, $sort $order LIMIT :offset, :perPage";

      }else{
        $query .=" AND status='active' ORDER BY $sort $order LIMIT :offset, :perPage";
      }
    }else{ 
      if($searchConditions){
        $query .= " AND status='active' ORDER BY 
        CASE 
            WHEN " . implode(" AND ", $searchConditions) . " THEN 0
            ELSE 1
        END, created_at DESC LIMIT :offset , :perPage";
      }else{
        $query .=" AND status='active' ORDER BY created_at DESC LIMIT :offset , :perPage";
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
    $this->db->query("SELECT * FROM auction WHERE auction_ID = :auction_ID");
    $this ->db ->bind(':auction_ID',$id);
    $row=$this->db->single();
     if($row){
      return $row;
     }else{
    return false;
     };
  }

public function getBidUsersInfo($id){
  $this->db->query(
    "SELECT 
    us.user_id AS buyer_user_id,
    us.name AS buyer_name,
    usr.user_id AS seller_user_id,
    bd.buyer_id AS buyer_id
    FROM bids bd
    JOIN auction au ON bd.auction_id = au.auction_ID
    JOIN buyers b ON bd.buyer_id  = b.buyer_id
    JOIN users us ON b.user_id = us.user_id
    JOIN sellers s ON au.seller_ID = s.seller_id
    JOIN users usr ON s.user_id = usr.user_id
    WHERE bd.bid_id = :bid_id 
  ");
  $this->db->bind(':bid_id',$id);
  $row=$this->db->single();
  if($row){
    return $row;
  }else{
    return false;
  }



}


  public function getAuctionBidInfo($id){
    $this->db->query(
      "SELECT 
      bd.*,
      au.name AS item_name, 
      au.unit AS item_unit, 
      au.stock AS stock, 
      au.name AS item_name, 
      au.start_date AS starting_date,
      au.end_date AS ending_date,
      bd.buyer_id AS buyer_id,
      bd.bid_time AS bid_date,
      bd.bid_price AS bid_price,
      u.name AS buyer_name,
      usr.user_id AS seller_user_id,
      u.city AS buyer_city,
      u.user_id AS buyer_user_id 
      FROM bids bd 
      JOIN auction au ON bd.auction_id = au.auction_ID
      JOIN sellers sl ON au.seller_ID = sl.seller_id
      JOIN users usr ON sl.user_id = usr.user_id
      JOIN buyers b ON bd.buyer_id = b.buyer_id
      JOIN users u ON b.user_id = u.user_id
      WHERE bd.auction_id = :auction_id
      ORDER BY bd.bid_price DESC "
    
    );
    $this ->db ->bind(':auction_id',$id);
    $row=$this->db->resultSet();
     if($row){
      return $row;
     }else{
    return false;
     };
  }
  public function getAuctionBidUserIds($id){
    $this->db->query(
        "SELECT DISTINCT
      bd.buyer_id AS buyer_id,
      u.user_id AS buyer_user_id 
      FROM bids bd 
      JOIN auction au ON bd.auction_id = au.auction_ID
      JOIN buyers b ON bd.buyer_id = b.buyer_id
      JOIN users u ON b.user_id = u.user_id
      WHERE bd.auction_id = :auction_id
      "
    );
    $this ->db ->bind(':auction_id',$id);
    $row=$this->db->resultSet();
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


  public function endAuction($id,$buyer_id,$highest_bid) {
    // $this->db->beginTransaction();

    // try {
        // Update auction status to 'inactive'
        var_dump($id, $buyer_id, $highest_bid);

        $this->db->query("UPDATE auction SET status='inactive',highest_buyer_id=:buyer_id,highest_bid=:highest_bid  WHERE auction_ID=:auction_ID");
        $this->db->bind(':buyer_id', $buyer_id);
        $this->db->bind(':highest_bid', $highest_bid);
        $this->db->bind(':auction_ID', $id);
        if($this->db->execute()){
          return true;
        }else{
          return false;
        }

        // // Fetch auction details
        // $this->db->query('SELECT * FROM auction WHERE auction_ID=:auction_ID');
        // $this->db->bind(':auction_ID', $id);
        // $row = $this->db->single();
        // $buyer_id=$row->buyer_id;

        // // Fetch buyer details
        // $this->db->query('SELECT * FROM buyers WHERE buyer_id=:buyer_id');
        // $this->db->bind(':buyer_id',$buyer_id);
        // $row3 = $this->db->single();
        // $user_id = $row3->user_id;

        // // Fetch user details
        // $this->db->query('SELECT * FROM users WHERE user_id=:user_id');
        // $this->db->bind(':user_id', $user_id);
        // $row2 = $this->db->single();

        // // Insert into orders table
        // if ($row->bid_Count > 0) {
        //     $this->db->query('INSERT INTO orders(buyer_id,total_price,order_mobile,order_address,order_city)VALUES(:buyer_id,:total_price,:order_mobile,:order_address,:order_city)');
        //     $this->db->bind(':buyer_id', $buyer_id);
        //     $this->db->bind(':total_price', $row->total_amount);
        //     $this->db->bind(':order_mobile', $row2->mobile);
        //     $this->db->bind(':order_address', $row2->address);
        //     $this->db->bind(':order_city', $row2->city);
        //     $this->db->execute();
        //     $order_id = $this->db->lastInsertId();

        //     // Insert into order_items table
        //     $this->db->query('INSERT INTO order_items(order_id,item_id,quantity,total_price,seller_id,buyer_id)VALUES(:order_id,:item_id,:quantity,:total_price,:seller_id,:buyer_id)');
        //     $this->db->bind(':order_id', $order_id);
        //     $this->db->bind(':item_id', $id);
        //     $this->db->bind(':quantity', $row->stock);
        //     $this->db->bind(':total_price', $row->total_amount);
        //     $this->db->bind(':buyer_id', $buyer_id);
        //     $this->db->bind(':seller_id', $_SESSION['seller_id']);
        //     $this->db->execute();
    //     }

    //     $this->db->commit();
    //     return true;
    // } catch (Exception $e) {
    //   die($e->getMessage());
    //     $this->db->rollBack();
    //     return false;
    // }
}




  public function addbid($data){
    $this->db->query('INSERT INTO bids(auction_id,buyer_id,bid_price) VALUES(:auction_id,:buyer_id,:bid_price)');

    $this->db->bind(':auction_id',$data['auction_id']);
    $this->db->bind(':buyer_id',$data['buyer_id']);
    $this->db->bind(':bid_price',$data['bid_price']);

    if($this->db->execute()){
      $bid_id = $this->db->lastInsertId();

      $this->db->query('UPDATE auction SET bid_Count = bid_Count + 1 WHERE auction_ID = :auction_id');
      $this->db->bind(':auction_id',$data['auction_id']);
      if($this->db->execute()){
        
        return $bid_id;
      }else{
        return false;}
      
    }
    else{
        return false;
    }

  }


public function getCurrentBid($id){
  $this->db->query("SELECT * FROM bids WHERE auction_id = :auction_id AND bid_price = (SELECT MAX(bid_price) AS current_bid FROM bids WHERE auction_id = :auction_id)");
  $this->db->bind(':auction_id',$id);
  $row=$this->db->single();
  if($row){
    return $row;
  }else{
    return false;
  }
}

public function getBidCount($id){
  $this->db->query("SELECT COUNT(*) AS bid_count FROM bids WHERE auction_id = :auction_id ");
  $this->db->bind(':auction_id',$id);
  $row=$this->db->single();
  if($row){
    return $row;
  }else{
    return false;
  }
}

public function getYourBid($auction_id,$buyer_id){
  $this->db->query("SELECT MAX(bid_price) AS your_bid FROM bids WHERE auction_id = :auction_id AND buyer_id = :buyer_id");
  $this->db->bind(':auction_id',$auction_id);
  $this->db->bind(':buyer_id',$buyer_id);
  $row=$this->db->single();
  if($row){
    return $row;
  }else{
    return false;
  }

}

public function isActiveBidder($auction_id,$buyer_id){
  $this->db->query("SELECT * FROM bids WHERE auction_id = :auction_id AND buyer_id = :buyer_id");
  $this->db->bind(':auction_id',$auction_id);
  $this->db->bind(':buyer_id',$buyer_id);
  $row=$this->db->single();
  if($row){
    return true;
  }else{
    return false;
  }

}

public function getBuyerBids($buyer_id){
  $this->db->query(
  " SELECT 
    DISTINCT bd.auction_id,
    sl.seller_id,
    au.name,
    us.name AS seller_name,
    au.bid_Count,
    au.item_img,
    au.exp_date,
    bd.auction_id  
    FROM bids bd
    JOIN auction au ON bd.auction_id = au.auction_ID
    JOIN sellers sl ON au.seller_ID = sl.seller_id  JOIN users us ON sl.user_id = us.user_id
    WHERE buyer_id = :buyer_id
    ORDER BY bd.bid_time DESC
    
    ");
    $this->db->bind(':buyer_id',$buyer_id);
  $row=$this->db->resultSet();
  if($row){
    return $row;
  }else{
    return false;
  }
}


public function changeStatus($id){

  $query = 'UPDATE
            auction
            SET status ="inactive"
            WHERE auction_ID=:id';

  $this->db->query($query);
  $this->db->bind(':id',$id);

  if($this->db->execute()){
    return true;
  }
  else{
    return false;
  }

}



public function getpaymentsuccessAuctions(){

  $query = 'SELECT
            order_id
            FROM
            orders
            WHERE 
            order_type = "AUCTION" AND payment_status = 1';

    $this->db->query($query);
    $row = $this->db->resultSet();

    if($row){
      return $row;
    }
    else{
      return false;
    }
}

public function getpaymentunsuccessAuctions(){

      $query = 'SELECT
                order_id
                FROM
                orders
                WHERE 
                order_type ="AUCTION" AND payment_status= 0';

$this->db->query($query);
$row = $this->db->resultSet();

if($row){
  return $row;
}
else{
  return false;
}

}

public function getNobidAuctions($id){
  $query = 'SELECT * FROM auction WHERE status="inactive" AND bid_Count= 0 AND seller_ID=:id';

  $this->db->query($query);
  $this->db->bind(':id',$id);

  $row= $this->db->resultSet();

  if($row){
    return $row;
  }
  else{
    return false;
  }
}


public function getAuctionIDS($id,$seller_id){

  $query ='SELECT 
          auction_id
          FROM
          order_items_ac
          WHERE
          order_id=:id AND seller_id =:seller_id';

  $this->db->query($query);
  $this->db->bind(':id',$id);
  $this->db->bind(':seller_id',$seller_id);

  $row = $this->db->single();

  if($row){
    return $row->auction_id;
  }
  else{
    return false;
  }
}

public function getdetails($id){
  
  $query = 'SELECT
            auction.*,
            auction.name AS product_name,
            users.name AS buyer_name,
            buyers.prof_img AS buyer_img,
            users.*
            FROM
            auction
            JOIN
            buyers ON
            auction.highest_buyer_id = buyers.buyer_id 
            JOIN 
            users ON
            buyers.user_id = users.user_id
            WHERE auction_ID=:auction_id';

  $this->db->query($query);
  $this->db->bind(':auction_id',$id);
  $row = $this->db->Single();

  if($row){
    return $row;
  }
  else{
    return false;
  }
}



 }