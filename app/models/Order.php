<?php
class Order{
    private $db;

    
    public function __construct(){
        $this -> db = new Database;
    }

    public function placeOrder($items,$details ,$buyer_id){
        var_dump("cart model");
        var_dump($details);
        try{

            $this->db->beginTransaction();
            $total=0;
            foreach($items as $item){
                $total =$total + ($item->price * $item->qty);
            }
            
            $this->db->query("INSERT INTO orders (buyer_id, total_price,order_mobile,order_address,order_city,order_postal_code,order_company)
        VALUES (:buyer_id, :total_price,:order_mobile,:order_address,:order_city,:order_postal_code,:order_company);
        ");

$this ->db ->bind(':buyer_id',$buyer_id);
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
                    return true;

    }catch(Exception $e){
        $this->db->rollBack();
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
                    o_items.seller_id = :seller_id
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

















}
?>