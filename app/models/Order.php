<?php
class Order{
    private $db;

    
    public function __construct(){
        $this -> db = new Database;
    }

    public function placeOrder($items,$details ,$buyer_id){
        try{

            $this->db->beginTransaction();
            $total=0;
            foreach($items as $item){
                $total =$total + ($item->price * $item->qty);
            }
            
            $this->db->query("INSERT INTO orders (buyer_id,buyer_name, total_price,order_mobile,order_address,order_city,order_postal_code,order_company)
        VALUES (:buyer_id,:buyer_name, :total_price,:order_mobile,:order_address,:order_city,:order_postal_code,:order_company);
        ");

$this ->db ->bind(':buyer_id',$buyer_id);
$this ->db ->bind(':buyer_name',$details['buyer_name']);
$this ->db ->bind(':total_price',$total);
$this ->db ->bind(':order_mobile',$details['order_mobile']);
$this ->db ->bind(':order_address',$details['order_address']);
$this ->db ->bind(':order_city',$details['order_city']);
$this ->db ->bind(':order_postal_code',$details['order_postal_code']);
$this ->db ->bind(':order_company',$details['order_company']);

if (!$this->db->execute()) {
    throw new Exception('Failed to insert into orders table');
}
    
    $order_id = $this->db->lastInsertId();

    
    
    foreach($items as $item){
        $total = ($item->price * $item->qty);
        $this->db->query("INSERT INTO order_items (order_id,item_id,quantity, total_price,buyer_id,seller_id)
                VALUES (:order_id,:item_id,:quantity,:total_price,:buyer_id,:seller_id);
                ");
                        $this ->db ->bind(':order_id',$order_id);
                        $this ->db ->bind(':item_id',$item->item_id);
                        $this ->db ->bind(':quantity',$item->qty);
                        $this ->db ->bind(':total_price',$total);
                        $this ->db ->bind(':buyer_id',$buyer_id);
                        $this ->db ->bind(':seller_id',$item->seller_id);
                        if($this->db->execute()){
                            continue;
                        }else{
                                throw new Exception('Failed to insert into order_items table');
                        }
                    }
                    $this->db->commit();
                
                    return $order_id;

    }catch(Exception $e){
        $this->db->rollBack();
        return false;
       
    }
    }

    public function getOrderAuctionId($order_id){
        $this->db->query('SELECT item_id FROM order_items WHERE order_id=:order_id');
        $this->db->bind(':order_id',$order_id);
        $row=$this->db->single();
        if($row){
            return $row->item_id;
        }else{
            return false;
        }
    }


    public function placeAuctionOrder($items,$details ,$buyer_id){
        try{

            $this->db->beginTransaction();
            $total=0;
            
                $total =$total + ($items->price * $items->stock);
      
            
            $this->db->query("INSERT INTO orders (order_type,buyer_id,buyer_name, total_price,order_mobile,order_address,order_city,order_postal_code,order_company)
        VALUES ('AUCTION',:buyer_id,:buyer_name, :total_price,:order_mobile,:order_address,:order_city,:order_postal_code,:order_company);
        ");

$this ->db ->bind(':buyer_id',$buyer_id);
$this ->db ->bind(':buyer_name',$details['buyer_name']);
$this ->db ->bind(':total_price',$total);
$this ->db ->bind(':order_mobile',$details['order_mobile']);
$this ->db ->bind(':order_address',$details['order_address']);
$this ->db ->bind(':order_city',$details['order_city']);
$this ->db ->bind(':order_postal_code',$details['order_postal_code']);
$this ->db ->bind(':order_company',$details['order_company']);

if (!$this->db->execute()) {
    throw new Exception('Failed to insert into orders table');
}
    
    $order_id = $this->db->lastInsertId();

    
    

        // $total = ($item->price * $item->qty);
        $this->db->query("INSERT INTO order_items (order_id,item_id,quantity, total_price,buyer_id,seller_id)
                VALUES (:order_id,:item_id,:quantity,:total_price,:buyer_id,:seller_id);
                ");
                        $this ->db ->bind(':order_id',$order_id);
                        $this ->db ->bind(':item_id',$items->auction_ID);
                        $this ->db ->bind(':quantity',$items->stock);
                        $this ->db ->bind(':total_price',$total);
                        $this ->db ->bind(':buyer_id',$buyer_id);
                        $this ->db ->bind(':seller_id',$items->seller_ID);
                        if(!$this->db->execute()){
                                throw new Exception('Failed to insert into order_items table');
                        }
                    
                    $this->db->commit();
                
                    return $order_id;

    }catch(Exception $e){
        die($e->getMessage());
        $this->db->rollBack();
        return false;
       
    }
    }

    public function updateOrderPaymentStatus($id){
        $this->db->query('UPDATE orders SET payment_status=1 WHERE order_id=:order_id');
        $this->db->bind(':order_id',$id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getALLOrders(){
        $query = "SELECT 
                    orders.*,
                    users.name AS buyer_name
                    FROM orders
                    JOIN
                    buyers ON orders.buyer_id=buyers.buyer_id
                    JOIN
                    users ON buyers.user_id=users.user_id ";
        
        
        
        $this->db->query($query);
        $row=$this->db->resultSet();
        
        if($row){
            return $row;
        }else{
            return false;
        }
    }
    // get seller orders
    public function getSellerOrders($seller_id){
        $query ="SELECT  
                    o_items.*,
                    u_buyer.name AS buyer_name,
                    od.order_address AS buyer_address,
                    od.order_mobile AS buyer_mobile,
                    od.order_city AS buyer_city,
                    b.prof_img AS buyer_img,
                    COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
                    COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
                    i.item_img,
                    i.name AS item_name
                FROM
                    -- order_items
                    order_items o_items
                JOIN
                    orders od ON o_items.order_id = od.order_id    
                JOIN 
                    buyers b ON o_items.buyer_id = b.buyer_id
                JOIN 
                    users u_buyer ON b.user_id = u_buyer.user_id
                LEFT JOIN 
                    delivers d ON o_items.deliver_id = d.deliver_id
                LEFT JOIN 
                    users u_deliver ON d.user_id = u_deliver.user_id
                JOIN
                    items_market i ON o_items.item_id = i.item_id
                WHERE
                    o_items.seller_id = :seller_id AND Od.payment_status=1
                ORDER BY o_items.order_date DESC
                ";
            
            $this->db->query($query);
            $this ->db ->bind(':seller_id',$seller_id);
            $row=$this->db->resultSet();
            if($row){
                return $row;
            }else{
                return false;
            }
            
    }


    public function getDeliverOrders($deliver_id){
        $query ="SELECT  
        o_items.*,
        u_seller.name AS seller_name,
        u_seller.address AS seller_address,
        u_seller.mobile AS seller_mobile,
        u_seller.city AS seller_city,
        s.prof_img AS seller_img,
        u_buyer.name AS buyer_name,
        u_buyer.address AS buyer_address,
        u_buyer.mobile AS buyer_mobile,
        u_buyer.city AS buyer_city,
        od.order_mobile AS order_mobile,
        od.order_address AS order_address,
        od.order_city AS order_city,
        od.total_delivery_fee AS total_delivery_fee,
        b.prof_img AS buyer_img,
        
        COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
            COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
        i.item_img,
        i.name AS item_name,
        i.unit AS item_unit
    FROM
        -- order_items
        order_items o_items
    JOIN
        orders od ON o_items.order_id = od.order_id    
    JOIN 
        sellers s ON o_items.seller_id = s.seller_id
    JOIN 
        users u_seller ON s.user_id = u_seller.user_id
    JOIN 
        buyers b ON o_items.buyer_id = b.buyer_id
    JOIN 
        users u_buyer ON b.user_id = u_buyer.user_id
    LEFT JOIN 
        delivers d ON o_items.deliver_id = d.deliver_id
    LEFT JOIN 
        users u_deliver ON d.user_id = u_deliver.user_id
    JOIN
        items_market i ON o_items.item_id = i.item_id
    WHERE o_items.order_status = 'pending'
    ORDER BY o_items.order_date DESC
    ";

$this->db->query($query);
// $this ->db ->bind(':buyer_id',$deliver_id);
$row=$this->db->resultSet();
if($row){
    return $row;
}else{
    return false;
}

    }



    public function getBuyerOrders($buyer_id){
        $query ="SELECT  
        o_items.*,
        u_seller.name AS seller_name,
        u_seller.address AS seller_address,
        u_seller.mobile AS seller_mobile,
        u_seller.city AS seller_city,
        s.prof_img AS seller_img,
        COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
            COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
        i.item_img,
        i.name AS item_name,
        i.unit AS item_unit
    FROM
        -- order_items
        order_items o_items
    JOIN
        orders od ON o_items.order_id = od.order_id    
    JOIN 
        sellers s ON o_items.seller_id = s.seller_id
    JOIN 
        users u_seller ON s.user_id = u_seller.user_id
    JOIN 
        buyers b ON o_items.buyer_id = b.buyer_id
    JOIN 
        users u_buyer ON b.user_id = u_buyer.user_id
    LEFT JOIN 
        delivers d ON o_items.deliver_id = d.deliver_id
    LEFT JOIN 
        users u_deliver ON d.user_id = u_deliver.user_id
    JOIN
        items_market i ON o_items.item_id = i.item_id
    WHERE
        o_items.buyer_id = :buyer_id AND od.payment_status=1
    ORDER BY o_items.order_date DESC
    ";

$this->db->query($query);
$this ->db ->bind(':buyer_id',$buyer_id);
$row=$this->db->resultSet();
if($row){
    return $row;
}else{
    return false;
}
}

public function getNewOrderDetails($order_id){
    $this->db->query('SELECT o.*,oi.* FROM orders o JOIN order_items oi ON o.order_id = oi.order_id WHERE o.order_id=:order_id');
    $this ->db ->bind(':order_id',$order_id);
    $row=$this->db->resultSet();
if($row){
    return $row;
}else{
    return false;
}

}


public function getOrderDetails($id){
    $query ="SELECT  
    o_items.*,
    u_seller.name AS seller_name,
    u_seller.address AS seller_address,
    u_seller.mobile AS seller_mobile,
    u_seller.city AS seller_city,
    u_buyer.name AS buyer_name,
    od.order_city AS order_city,
    od.order_address AS order_address,
    od.order_mobile AS order_mobile,
    s.prof_img AS seller_img,
    b.prof_img AS buyer_img,
    COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
        COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
    i.item_img,
    i.name AS item_name,
    i.unit AS item_unit
FROM
    -- order_items
    order_items o_items
JOIN
    orders od ON o_items.order_id = od.order_id    
JOIN 
    sellers s ON o_items.seller_id = s.seller_id
JOIN 
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items.buyer_id = b.buyer_id
JOIN 
    users u_buyer ON b.user_id = u_buyer.user_id
LEFT JOIN 
    delivers d ON o_items.deliver_id = d.deliver_id
LEFT JOIN 
    users u_deliver ON d.user_id = u_deliver.user_id
JOIN
    items_market i ON o_items.item_id = i.item_id
WHERE
    o_items.order_item_id = :order_item_id
    AND o_items.order_status = 'pending'
ORDER BY o_items.order_date DESC
";

$this->db->query($query);
$this ->db ->bind(':order_item_id',$id);

$row=$this->db->single();
if($row){
return $row;
}else{
return false;
}
}

public function orderStatus($order_item_id){
    $query="SELECT order_status from order_items WHERE order_item_id=:order_item_id";
    $this->db->query($query);
    $this->db->bind(':order_item_id',$order_item_id);
    $status=$this->db->single();
    if($status){
        return $status;
    }else{
        return false;
    }
}

public function deliverAvailability($deliver_id){
    $query="SELECT  COUNT(*) AS count 
            FROM order_items 
            WHERE 
                deliver_id=:deliver_id
            AND order_status != 'completed' AND order_status != 'pending'   
            "    
                ;
    $this->db->query($query);
    $this->db->bind(':deliver_id',$deliver_id);
    $row=$this->db->single();
    if(($row->count)>0){
        return false;
    }else{
        return true;
    }
}


public function assignDeliver($order_item_id ,$deliver_id){

    $status=$this->orderStatus($order_item_id);
    $availability=$this->deliverAvailability($deliver_id);
    if($status && $status->order_status == 'pending' && $availability){
        $query="UPDATE  order_items 
                SET 
                    order_status=:order_status,
                    deliver_id=:deliver_id
                WHERE 
                    order_item_id=:order_item_id";
            $this->db->query($query);
            $this->db->bind(':order_item_id',$order_item_id);
            $this->db->bind(':order_status',"deliver_assigned");
            $this->db->bind(':deliver_id',$deliver_id);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
    }else{
        return false;
    }
}


public function OrdersAdminView($id){
    $this->db->query('SELECT * FROM orders WHERE order_id=:order_id');
    $this->db->bind(':order_id',$id);

    $row= $this->db->single();
    if($row){
        return $row;
    }
    else{
        return true;
    }
}

public function OrderItemsView($id){
    $this->db->query('SELECT 
                      order_items.*,
                      items_market.*,
                      users.*,
                      users.name As seller_name,
                      users.address As seller_address
                      FROM
                      order_items
                      JOIN 
                      items_market ON 
                      order_items.item_id = items_market.item_id
                      JOIN
                      sellers ON
                      items_market.seller_id = sellers.seller_id
                      JOIN
                      users ON
                      sellers.user_id=users.user_id
                      WHERE order_id=:order_id');

    $this->db->bind(':order_id',$id);

    $row= $this->db->resultSet();
    if($row){
        return $row;
    }
    else{
        return false;
    }

}

public function sellersInOrder($id){
    $query = 'SELECT 
            order_items.seller_id,
            users.*
            FROM
            order_items
            JOIN
            sellers ON
            order_items.seller_id=sellers.seller_id
            JOIN 
            users ON
            sellers.user_id = users.user_id
            WHERE order_items.order_id = :order_id';
    
    $this->db->query($query);
    $this->db->bind(':order_id',$id);
    
    $row = $this->db->resultSet();

    if($row){
        return $row;
    }
    else{
        return false;
    }
}


public function OrderBuyer($id){
    $query = 'SELECT 
            order_items.buyer_id,
            users.*
            FROM
            order_items
            JOIN
            buyers ON
            order_items.buyer_id=buyers.buyer_id
            JOIN 
            users ON
            buyers.user_id = users.user_id
            WHERE order_items.order_id =:order_id';
     
     $this->db->query($query);
    $this->db->bind(':order_id',$id);
   
    $row = $this->db->resultSet();

    if($row){
        return $row;
    }
    else{
        return false;
    }
}


public function getOngoingOrderDetails($deliver_id){
    $query = "SELECT
        order_items.*,
        items_market.*
    FROM
        order_items
    JOIN
        items_market ON
        order_items.item_id = items_market.item_id
    WHERE
        order_items.deliver_id = :delivery_id
    AND 
        order_items.order_status !='completed' ";

    $this->db->query($query);
    $this->db->bind(':delivery_id', $deliver_id);

    $row = $this->db->single();

    if(!empty($row)){
        return $row;
    } else {
        return false;
    }
}


public function getBuyerDetailsOngoingOrder($deliver_id){

    $row1 = $this->getOngoingOrderDetails($deliver_id);
    if($row1){
    $buyer_id = $row1->buyer_id;
    }else{
        return false;
    }
    $query = "SELECT 
                users.* 
              FROM 
                users
              JOIN 
                buyers ON users.user_id = buyers.user_id
              WHERE
                buyers.buyer_id = :buyer_id";


$this->db->query($query);
$this->db->bind(':buyer_id', $buyer_id);

$row = $this->db->single();

if($row){
    return $row;
}else{
    return false;
}

}


public function getSellerDetailsOngoingOrder($deliver_id){

    $row1 = $this->getOngoingOrderDetails($deliver_id);
    if($row1){
    $seller_id = $row1->seller_id;
    }else{
        return NULL;
    }
    $query = "SELECT 
                users.* 
              FROM 
                users
              JOIN 
                sellers ON users.user_id = sellers.user_id
              WHERE
                sellers.seller_id = :seller_id";


$this->db->query($query);
$this->db->bind(':seller_id', $seller_id);

$row = $this->db->single();

if($row){
    return $row;
}else{
    return false;
}

}

public function getDeliveryRecommendedOrders($deliver_id){
    

}


public function editToPickedUp($deliver_id){
    $query = "UPDATE 
                    order_items 
              SET 
                    order_status = 'pickedup' 
              WHERE 
                    deliver_id = :deliver_id AND order_status='deliver_assigned'";

    $this->db->query($query);
    $this->db->bind(':deliver_id',$deliver_id);

    if($this->db->execute()){
        return true;      
    }else{
        return false;
    }
}


public function editToDelivering($deliver_id){
    $query = "UPDATE 
                    order_items 
              SET 
                    order_status = 'delivering' 
              WHERE 
                    deliver_id = :deliver_id AND order_status='pickedup'";

    $this->db->query($query);
    $this->db->bind(':deliver_id',$deliver_id);

    if($this->db->execute()){
        return true;      
    }else{
        return false;
    }
}

public function editToDelivered($deliver_id){
    $query = "UPDATE 
                    order_items 
              SET 
                    order_status = 'delivered' 
              WHERE 
                    deliver_id = :deliver_id AND order_status='delivering'";

    $this->db->query($query);
    $this->db->bind(':deliver_id',$deliver_id);

    if($this->db->execute()){
        return true;      
    }else{
        return false;
    }
}

public function editToCompleted($deliver_id){
    $query = "UPDATE 
                    order_items 
              SET 
                    order_status = 'completed' 
              WHERE 
                    deliver_id = :deliver_id AND order_status='delivered'";

    $this->db->query($query);
    $this->db->bind(':deliver_id',$deliver_id);

    if($this->db->execute()){
        return true;      
    }else{
        return false;
    }
}



public function getItemID($deliver_id){
    $query = "SELECT item_id, order_id FROM order_items WHERE deliver_id = :delivery_id ";
    $this->db->query($query);
    $this->db->bind(':delivery_id',$deliver_id);

    $result = $this->db->Single();

    if($result){
        return $result;
    }else{
        return false;
    }
}


public function uploadPickupImages($deliver_id,$pickupImg){

    $itemID = $this->getItemID($deliver_id)->item_id;
    $order_id = $this->getItemID($deliver_id)->order_id;
    $s = "hello";
    $query = 'UPDATE quality_check 
            SET
            order_id = :order_id,
            deliver_id= :deliver_id,
            deliver_pickup_img= :deliver_pickup_img
            WHERE item_id = :item_id';
    
    $this->db->query($query);
    $this->db->bind(':order_id',$order_id);
     $this->db->bind(':item_id',$itemID);
     $this->db->bind(':deliver_id',$deliver_id);
    $this->db->bind(':deliver_pickup_img',$pickupImg);

    if($this->db->execute()){
        return true;
    }else{
        return false;
    }



              
}





}

?>