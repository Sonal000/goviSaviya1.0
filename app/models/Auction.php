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