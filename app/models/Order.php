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
            $deliverFee=getDistancefee($item->address,$details['order_address']);
                $this->db->query("INSERT INTO order_items (order_id,item_id,quantity,deliver_fee,total_price,buyer_id,seller_id)
                        VALUES (:order_id,:item_id,:quantity,:deliver_fee,:total_price,:buyer_id,:seller_id);
                        ");
                                $this ->db ->bind(':order_id',$order_id);
                                $this ->db ->bind(':item_id',$item->item_id);
                                $this ->db ->bind(':quantity',$item->qty);
                                $this ->db ->bind(':deliver_fee',$deliverFee);
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
                $this->db->query('SELECT auction_id FROM order_items_ac WHERE order_id=:order_id');
                $this->db->bind(':order_id',$order_id);
                $row=$this->db->single();
                // var_dump($row);
                if($row){
                    return $row->auction_id;
                }else{
                    return false;
                }
            }
            public function getOrderRequestId($order_id){
                $this->db->query('SELECT req_id FROM order_items_rq WHERE order_id=:order_id');
                $this->db->bind(':order_id',$order_id);
                $row=$this->db->single();
                if($row){
                    return $row->req_id;
                }else{
                    return false;
                }
            }


            public function placeAuctionOrder($items,$details ,$buyer_id){
                try{

                    $this->db->beginTransaction();
                    $total=0;
                    
                        $total =$total + ($items->highest_bid * $items->stock);
            
                    
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
                
                        $deliverFee=getDistancefee($items->address,$details['order_address']);
                $this->db->query("INSERT INTO order_items_ac (order_id,auction_id,quantity,deliver_fee ,total_price,buyer_id,seller_id)
                        VALUES (:order_id,:auction_id,:quantity,:deliver_fee,:total_price,:buyer_id,:seller_id);
                        ");
                                $this ->db ->bind(':order_id',$order_id);
                                $this ->db ->bind(':auction_id',$items->auction_ID);
                                $this ->db ->bind(':quantity',$items->stock);
                                $this ->db ->bind(':deliver_fee',$deliverFee);
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
            public function placeRequestOrder($items,$details ,$buyer_id){
                try{

                    $this->db->beginTransaction();
            
            
                    
                    $this->db->query("INSERT INTO orders (order_type,buyer_id,buyer_name, total_price,order_mobile,order_address,order_city,order_postal_code,order_company)
                VALUES ('REQUEST',:buyer_id,:buyer_name, :total_price,:order_mobile,:order_address,:order_city,:order_postal_code,:order_company);
                ");

        $this ->db ->bind(':buyer_id',$buyer_id);
        $this ->db ->bind(':buyer_name',$details['buyer_name']);
        $this ->db ->bind(':total_price',$items->acp_amount);
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
                $deliverFee=getDistancefee($details["seller_address"],$details['order_address']);
                $this->db->query("INSERT INTO order_items_rq (order_id,req_id,quantity,deliver_fee, total_price,buyer_id,seller_id)
                        VALUES (:order_id,:req_id,:quantity,:deliver_fee,:total_price,:buyer_id,:seller_id);
                        ");
                                $this ->db ->bind(':order_id',$order_id);
                                $this ->db ->bind(':req_id',$items->request_ID);
                                $this ->db ->bind(':quantity',$items->req_stock);
                                $this ->db ->bind(':deliver_fee',$deliverFee);
                                $this ->db ->bind(':total_price',$items->acp_amount);
                                $this ->db ->bind(':buyer_id',$buyer_id);
                                $this ->db ->bind(':seller_id',$items->acp_seller_ID);
                                if(!$this->db->execute()){
                                        throw new Exception('Failed to insert into order_items table');
                                }
                            
                            $this->db->commit();
                        
                            return $order_id;

            }catch(Exception $e){
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
                            users ON buyers.user_id=users.user_id
                            ORDER BY order_date DESC";
                
                
                
                $this->db->query($query);
                $row=$this->db->resultSet();
                
                if($row){
                    return $row;
                }else{
                    return false;
                }
            }

            public function getImagestoCheck($order_item_id,$order_id){

                $query = 'SELECT * FROM quality_check WHERE order_item_id=:order_item_id AND order_id =:order_id';

                $this->db->query($query);
                $this->db->bind(':order_item_id',$order_item_id);
                $this->db->bind(':order_id',$order_id);
                $row = $this->db->Single();

                if($row){
                    return $row;
                }
                else{
                    return false;
                }
            }

            public function ApproveQuality($order_item_id,$order_id,$type){

                $query = 'UPDATE
                          quality_check 
                          SET
                          qc_status="approved"
                          WHERE order_item_id=:order_item_id AND
                          order_id =:order_id AND
                          order_type =:type ';

                $this->db->query($query);
                $this->db->bind(':order_item_id',$order_item_id);
                $this->db->bind(':order_id',$order_id);
                $this->db->bind(':type',$type);

                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }

            }

            public function ComplaintQuality($order_item_id,$order_id,$type){

                $query = 'UPDATE
                          quality_check 
                          SET
                          qc_status="declined"
                          WHERE order_item_id=:order_item_id AND
                          order_id =:order_id AND
                          order_type =:type ';
    
                $this->db->query($query);
                $this->db->bind(':order_item_id',$order_item_id);
                $this->db->bind(':order_id',$order_id);
                $this->db->bind(':type',$type);

                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }




            }


            public function getOrderType($order_id){
                $query = "SELECT order_type FROM orders WHERE order_id=:order_id";
                $this->db->query($query);
                $this->db->bind(':order_id',$order_id);
                $row=$this->db->single();
                if($row){
                    return $row->order_type;
                }else{
                    return false;
                }
            }

            public function getSellerOrderIDs($seller_id){
                $query ="SELECT 
                o_items.order_id,
                o.order_type,
                o.order_date
            FROM 
                order_items o_items
            JOIN 
                orders AS o ON o_items.order_id = o.order_id
            WHERE 
                o_items.seller_id = :seller_id
            
            UNION
            
            SELECT 
                o_items_ac.order_id,
                o.order_type,
                o.order_date
            FROM 
                order_items_ac o_items_ac
            JOIN 
                orders o ON o_items_ac.order_id = o.order_id
            WHERE 
                o_items_ac.seller_id = :seller_id

            UNION
            
            SELECT 
                o_items_rq.order_id,
                o.order_type,
                o.order_date
            FROM 
                order_items_rq o_items_rq
            JOIN 
                orders o ON o_items_rq.order_id = o.order_id
            WHERE 
                o_items_rq.seller_id = :seller_id
            ORDER BY 
            order_date DESC "
            ;
                $this->db->query($query);
                $this->db->bind(':seller_id',$seller_id);
                $row=$this->db->resultSet();
                if($row){
                    return $row;
                }else{
                    return false;
                }
            }
            
            public function getsellerCompleteOrderIDs($seller_id){
                $query ="SELECT 
                o_items.order_id,
                o.order_type,
                o.order_date
            FROM 
                order_items o_items
            JOIN 
                orders AS o ON o_items.order_id = o.order_id
            WHERE 
                o_items.seller_id = :seller_id AND
                o_items.order_status = 'completed'
            
            UNION
            
            SELECT 
                o_items_ac.order_id,
                o.order_type,
                o.order_date
            FROM 
                order_items_ac o_items_ac
            JOIN 
                orders o ON o_items_ac.order_id = o.order_id
            WHERE 
                o_items_ac.seller_id = :seller_id AND
                o_items_ac.order_status = 'completed'

            UNION
            
            SELECT 
                o_items_rq.order_id,
                o.order_type,
                o.order_date
            FROM 
                order_items_rq o_items_rq
            JOIN 
                orders o ON o_items_rq.order_id = o.order_id
            WHERE 
                o_items_rq.seller_id = :seller_id AND
                o_items_rq.order_status = 'completed'
            ORDER BY 
            order_date DESC "
            ;
                $this->db->query($query);
                $this->db->bind(':seller_id',$seller_id);
                $row=$this->db->resultSet();
                if($row){
                    return $row;
                }else{
                    return false;
                }
            }
            

            public function getDeliverOrderIDs($deliver_id){
                $query ="SELECT 
                o_items.order_id,
                o.order_type,
                o.order_date,
                o_items.order_status
            FROM 
                order_items o_items
            JOIN 
                orders AS o ON o_items.order_id = o.order_id
            WHERE 
                o_items.order_status = 'pending'
            
            UNION
            
            SELECT 
                o_items_ac.order_id,
                o.order_type,
                o.order_date,
                o_items_ac.order_status
            FROM 
                order_items_ac o_items_ac
            JOIN 
                orders o ON o_items_ac.order_id = o.order_id
            WHERE 
                o_items_ac.order_status = 'pending'

                UNION
            
            SELECT 
                o_items_rq.order_id,
                o.order_type,
                o.order_date,
                o_items_rq.order_status
            FROM 
                order_items_rq o_items_rq
            JOIN 
                orders o ON o_items_rq.order_id = o.order_id
            WHERE 
                o_items_rq.order_status = 'pending'

            ORDER BY 
            order_date DESC"
            
            ;
                $this->db->query($query);
                // $this->db->bind(':seller_id',$seller_id);
                $row=$this->db->resultSet();
                if($row){
                    return $row;
                }else{
                    return false;
                }
            }

            public function getBuyerOrderIDs($buyer_id){
                $query ="SELECT 
                o_items_rq.order_id,
                o.order_type,
                o.order_date
            FROM 
                order_items_rq AS o_items_rq
            JOIN 
                orders o ON o_items_rq.order_id = o.order_id
            WHERE 
                o_items_rq.buyer_id = :buyer_id AND o_items_rq.order_status!='completed'
                
            UNION
            
            SELECT 
                o_items_ac.order_id,
                o.order_type,
                o.order_date
            FROM 
                order_items_ac AS o_items_ac
            JOIN 
                orders o ON o_items_ac.order_id = o.order_id
            WHERE 
                o_items_ac.buyer_id = :buyer_id AND o_items_ac.order_status!='completed'
        
            UNION
                SELECT 
                o_items.order_id,
                o.order_type,
                o.order_date
            FROM 
                order_items o_items
            JOIN 
                orders o ON o_items.order_id = o.order_id
            WHERE 
                o_items.buyer_id = :buyer_id AND o_items.order_status!='completed'
            ORDER BY
                order_date DESC 
                "
            
            ;
                $this->db->query($query);
                $this->db->bind(':buyer_id',$buyer_id);
                $row=$this->db->resultSet();
                if($row){
                    return $row;
                }else{
                    return false;
                }
            }
            public function getBuyerCompletedOrderIDs($buyer_id){
                $query ="SELECT 
                o_items.order_id,
                o_items.completed_date,
                o.order_type,
                o.order_date,
                q.qc_id
            FROM 
                order_items o_items
            JOIN 
                orders o ON o_items.order_id = o.order_id
            JOIN
                quality_check q ON o_items.order_item_id = q.order_item_id
            WHERE 
                o_items.buyer_id = :buyer_id AND o_items.order_status='completed'
            
            UNION
            
            SELECT 
                o_items_ac.order_id,
                o_items_ac.completed_date,
                o.order_type,
                o.order_date,
                q.qc_id
            FROM 
                order_items_ac AS o_items_ac
            JOIN 
                orders o ON o_items_ac.order_id = o.order_id
            JOIN
                quality_check q ON o_items_ac.order_item_id = q.order_item_id
            WHERE 
                o_items_ac.buyer_id = :buyer_id AND o_items_ac.order_status='completed'
            UNION
            
            SELECT 
                o_items_rq.order_id,
                o_items_rq.completed_date,
                o.order_type,
                o.order_date,
                q.qc_id
            FROM 
                order_items_rq AS o_items_rq
            JOIN 
                orders o ON o_items_rq.order_id = o.order_id
            JOIN
                quality_check q ON o_items_rq.order_item_id = q.order_item_id
            WHERE 
                o_items_rq.buyer_id = :buyer_id AND o_items_rq.order_status='completed'
            ORDER BY
                completed_date DESC   
                "
            
            ;
                $this->db->query($query);
                $this->db->bind(':buyer_id',$buyer_id);
                $row=$this->db->resultSet();
        
                if($row){
                    return $row;
                }else{
                    return false;
                }
            }




            public function getOrderDetailsByOrderId($order_id,$order_type){
     
                if($order_type == 'AUCTION'){
                    $query = "SELECT 
                                o.*,
                                o_items_ac.*,
                                o_items_ac.order_status AS order_state,
                                i.name AS item_name,
                                i.unit AS item_unit,
                                i.price AS item_price,
                                i.item_img AS item_img,
                                u_seller.user_id AS seller_user_id,
                                u_seller.name AS seller_name,
                                u_seller.address AS seller_address,
                                u_seller.city AS seller_city,
                                u_seller.mobile AS seller_mobile,
                                s.prof_img AS seller_img,
                                s.seller_id AS seller_id,
                                b.buyer_id AS buyer_id,
                                u_buyer.user_id AS buyer_user_id,
                                u_buyer.name AS buyer_name,
                                u_buyer.address AS buyer_address,
                                u_buyer.city AS buyer_city,
                                u_buyer.mobile AS buyer_mobile,
                                b.prof_img AS buyer_img,
                                COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
                    COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
                    COALESCE(d.deliver_id, 'No Deliver assigned') AS deliver_id,
                    COALESCE(u_deliver.user_id, 'No Deliver assigned') AS deliver_user_id,
                    COALESCE(d.prof_img, 'No Deliver assigned') AS deliver_img,
                    v.vehicle_img,
                    v.vehicle_model,
                    v.vehicle_type,
                    v.vehicle_brand,
                    v.vehicle_number
                            FROM
                                orders o
                            JOIN
                                order_items_ac o_items_ac ON o.order_id = o_items_ac.order_id
                            JOIN
                                auction i ON o_items_ac.auction_id = i.auction_id
                            JOIN
                                sellers s ON o_items_ac.seller_id = s.seller_id
                            JOIN
                                users u_seller ON s.user_id = u_seller.user_id
                            JOIN 
                                buyers b ON o_items_ac.buyer_id = b.buyer_id
                            JOIN 
                                users u_buyer ON b.user_id = u_buyer.user_id
                            LEFT JOIN
                                delivers d ON o_items_ac.deliver_id = d.deliver_id
                            LEFT JOIN
                                users u_deliver ON d.user_id = u_deliver.user_id
                            LEFT JOIN
                                vehicle v ON u_deliver.user_id = v.user_id
                            WHERE
                                o.order_id = :order_id AND o.payment_status=1
                            ";
                }elseif($order_type == 'PURCHASE'){

                $query = "SELECT 
                                o.*,
                                o_items.*,
                                o_items.order_status AS order_state,
                                i.name AS item_name,
                                i.unit AS item_unit,
                                i.price AS item_price,
                                i.item_img AS item_img,
                                u_seller.name AS seller_name,
                                u_seller.address AS seller_address,
                                u_seller.user_id AS seller_user_id,
                                u_seller.city AS seller_city,
                                u_seller.mobile AS seller_mobile,
                                s.prof_img AS seller_img,
                                u_buyer.name AS buyer_name,
                                u_buyer.address AS buyer_address,
                                u_buyer.city AS buyer_city,
                                u_buyer.mobile AS buyer_mobile,
                                b.prof_img AS buyer_img,
                                COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
                    COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
                    COALESCE(d.deliver_id, 'No Deliver assigned') AS deliver_id,
                    COALESCE(u_deliver.user_id, 'No Deliver assigned') AS deliver_user_id,
                    COALESCE(d.prof_img, 'No Deliver assigned') AS deliver_img,
                    v.vehicle_img,
                    v.vehicle_model,
                    v.vehicle_type,
                    v.vehicle_brand,
                    v.vehicle_number
                        FROM
                            order_items o_items
                        JOIN
                            orders o ON o_items.order_id = o.order_id
                        JOIN
                            items_market  i ON o_items.item_id = i.item_id
                        JOIN
                            sellers  s ON o_items.seller_id = s.seller_id
                        JOIN
                            users  u_seller ON s.user_id = u_seller.user_id
                        JOIN
                            buyers  b ON o_items.buyer_id = b.buyer_id
                        JOIN
                            users  u_buyer ON b.user_id = u_buyer.user_id
                        LEFT JOIN
                            delivers d ON o_items.deliver_id = d.deliver_id
                        LEFT JOIN
                            users u_deliver ON d.user_id = u_deliver.user_id
                        LEFT JOIN
                                vehicle v ON u_deliver.user_id = v.user_id
                        WHERE
                            o_items.order_id = :order_id AND o.payment_status=1
                        ";
                        }elseif($order_type=="REQUEST"){

                $query = "SELECT 
                                o.*,
                                o_items_rq.*,
                                o_items_rq.order_status AS order_state,
                                r.name AS item_name,
                                r.unit AS item_unit,
                                r.acp_amount AS item_price,
                                r.req_img AS item_img,
                                u_seller.name AS seller_name,
                                u_seller.user_id AS seller_user_id,
                                u_seller.address AS seller_address,
                                u_seller.city AS seller_city,
                                u_seller.mobile AS seller_mobile,
                                s.prof_img AS seller_img,
                                u_buyer.name AS buyer_name,
                                u_buyer.address AS buyer_address,
                                u_buyer.city AS buyer_city,
                                u_buyer.mobile AS buyer_mobile,
                                b.prof_img AS buyer_img,
                                COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
                                COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
                                COALESCE(d.deliver_id, 'No Deliver assigned') AS deliver_id,
                                COALESCE(u_deliver.user_id, 'No Deliver assigned') AS deliver_user_id,
                                COALESCE(d.prof_img, 'No Deliver assigned') AS deliver_img,
                                v.vehicle_img,
                    v.vehicle_model,
                    v.vehicle_type,
                    v.vehicle_brand,
                    v.vehicle_number
                            FROM
                                order_items_rq o_items_rq
                            JOIN
                                orders o ON o_items_rq.order_id = o.order_id
                            JOIN
                                requests  r ON o_items_rq.req_id = r.request_ID
                            JOIN
                                sellers  s ON o_items_rq.seller_id = s.seller_id
                            JOIN
                                users  u_seller ON s.user_id = u_seller.user_id
                            JOIN
                                buyers  b ON o_items_rq.buyer_id = b.buyer_id
                            JOIN
                                users  u_buyer ON b.user_id = u_buyer.user_id
                            LEFT JOIN
                                delivers d ON o_items_rq.deliver_id = d.deliver_id
                            LEFT JOIN
                                users u_deliver ON d.user_id = u_deliver.user_id
                            LEFT JOIN
                                vehicle v ON u_deliver.user_id = v.user_id
                            WHERE
                                o_items_rq.order_id = :order_id AND o.payment_status=1  ";

                        }
                $this->db->query($query);
                $this->db->bind(':order_id',$order_id);
                $row=$this->db->resultSet();
                
                if($row){
                    return $row;
                }else{
                    return false;
                }
            }
           
            public function getBuyerOngoingOrderDetailsByOrderId($order_id,$order_type){
    
                if($order_type == 'AUCTION'){
                  
                    $query = "SELECT 
                                o.*,
                                o_items_ac.*,
                                o_items_ac.order_status AS order_state,
                                i.name AS item_name,
                                i.unit AS item_unit,
                                i.price AS item_price,
                                i.item_img AS item_img,
                                u_seller.user_id AS seller_user_id,
                                u_seller.name AS seller_name,
                                u_seller.address AS seller_address,
                                u_seller.city AS seller_city,
                                u_seller.mobile AS seller_mobile,
                                s.prof_img AS seller_img,
                                s.seller_id AS seller_id,
                                b.buyer_id AS buyer_id,
                                u_buyer.user_id AS buyer_user_id,
                                u_buyer.name AS buyer_name,
                                u_buyer.address AS buyer_address,
                                u_buyer.city AS buyer_city,
                                u_buyer.mobile AS buyer_mobile,
                                b.prof_img AS buyer_img,
                                COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
                    COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
                    COALESCE(d.deliver_id, 'No Deliver assigned') AS deliver_id,
                    COALESCE(u_deliver.user_id, 'No Deliver assigned') AS deliver_user_id,
                    COALESCE(d.prof_img, 'No Deliver assigned') AS deliver_img,
                    v.vehicle_img,
                    v.vehicle_model,
                    v.vehicle_type,
                    v.vehicle_brand,
                    v.vehicle_number
                            FROM
                                orders o
                            JOIN
                                order_items_ac o_items_ac ON o.order_id = o_items_ac.order_id
                            JOIN
                                auction i ON o_items_ac.auction_id = i.auction_id
                            JOIN
                                sellers s ON o_items_ac.seller_id = s.seller_id
                            JOIN
                                users u_seller ON s.user_id = u_seller.user_id
                            JOIN 
                                buyers b ON o_items_ac.buyer_id = b.buyer_id
                            JOIN 
                                users u_buyer ON b.user_id = u_buyer.user_id
                            LEFT JOIN
                                delivers d ON o_items_ac.deliver_id = d.deliver_id
                            LEFT JOIN
                                users u_deliver ON d.user_id = u_deliver.user_id
                            LEFT JOIN
                                vehicle v ON u_deliver.user_id = v.user_id
                            WHERE
                                o.order_id = :order_id AND o.payment_status=1 AND o_items_ac.order_status!='completed'
                            ORDER BY
                                o_items_ac.order_date ASC
                            ";
                }elseif($order_type == 'PURCHASE'){
                

                $query = "SELECT 
                                o.*,
                                o_items.*,
                                o_items.order_status AS order_state,
                                i.name AS item_name,
                                i.unit AS item_unit,
                                i.price AS item_price,
                                i.item_img AS item_img,
                                u_seller.name AS seller_name,
                                u_seller.address AS seller_address,
                                u_seller.user_id AS seller_user_id,
                                u_seller.city AS seller_city,
                                u_seller.mobile AS seller_mobile,
                                s.prof_img AS seller_img,
                                u_buyer.name AS buyer_name,
                                u_buyer.address AS buyer_address,
                                u_buyer.city AS buyer_city,
                                u_buyer.mobile AS buyer_mobile,
                                b.prof_img AS buyer_img,
                                COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
                    COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
                    COALESCE(d.deliver_id, 'No Deliver assigned') AS deliver_id,
                    COALESCE(u_deliver.user_id, 'No Deliver assigned') AS deliver_user_id,
                    COALESCE(d.prof_img, 'No Deliver assigned') AS deliver_img,
                    v.vehicle_img,
                    v.vehicle_model,
                    v.vehicle_type,
                    v.vehicle_brand,
                    v.vehicle_number
                        FROM
                            order_items o_items
                        JOIN
                            orders o ON o_items.order_id = o.order_id
                        JOIN
                            items_market  i ON o_items.item_id = i.item_id
                        JOIN
                            sellers  s ON o_items.seller_id = s.seller_id
                        JOIN
                            users  u_seller ON s.user_id = u_seller.user_id
                        JOIN
                            buyers  b ON o_items.buyer_id = b.buyer_id
                        JOIN
                            users  u_buyer ON b.user_id = u_buyer.user_id
                        LEFT JOIN
                            delivers d ON o_items.deliver_id = d.deliver_id
                        LEFT JOIN
                            users u_deliver ON d.user_id = u_deliver.user_id
                        LEFT JOIN
                                vehicle v ON u_deliver.user_id = v.user_id
                        WHERE
                            o_items.order_id = :order_id AND o.payment_status=1 AND o_items.order_status!='completed'
                        ORDER BY
                                o_items.order_date ASC
                        ";
                        }elseif($order_type=="REQUEST"){
                          

                $query = "SELECT 
                                o.*,
                                o_items_rq.*,
                                o_items_rq.order_status AS order_state,
                                r.name AS item_name,
                                r.unit AS item_unit,
                                r.acp_amount AS item_price,
                                u_seller.name AS seller_name,
                                u_seller.user_id AS seller_user_id,
                                u_seller.address AS seller_address,
                                u_seller.city AS seller_city,
                                u_seller.mobile AS seller_mobile,
                                s.prof_img AS seller_img,
                                u_buyer.name AS buyer_name,
                                u_buyer.address AS buyer_address,
                                u_buyer.city AS buyer_city,
                                u_buyer.mobile AS buyer_mobile,
                                b.prof_img AS buyer_img,
                                COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
                                COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
                                COALESCE(d.deliver_id, 'No Deliver assigned') AS deliver_id,
                                COALESCE(u_deliver.user_id, 'No Deliver assigned') AS deliver_user_id,
                                COALESCE(d.prof_img, 'No Deliver assigned') AS deliver_img,
                                v.vehicle_img,
                    v.vehicle_model,
                    v.vehicle_type,
                    v.vehicle_brand,
                    v.vehicle_number
                            FROM
                                order_items_rq o_items_rq
                            JOIN
                                orders o ON o_items_rq.order_id = o.order_id
                            JOIN
                                requests  r ON o_items_rq.req_id = r.request_ID
                            JOIN
                                sellers  s ON o_items_rq.seller_id = s.seller_id
                            JOIN
                                users  u_seller ON s.user_id = u_seller.user_id
                            JOIN
                                buyers  b ON o_items_rq.buyer_id = b.buyer_id
                            JOIN
                                users  u_buyer ON b.user_id = u_buyer.user_id
                            LEFT JOIN
                                delivers d ON o_items_rq.deliver_id = d.deliver_id
                            LEFT JOIN
                                users u_deliver ON d.user_id = u_deliver.user_id
                            LEFT JOIN
                                vehicle v ON u_deliver.user_id = v.user_id
                            WHERE
                                o_items_rq.order_id = :order_id AND o.payment_status=1 AND o_items_rq.order_status!='completed'
                            ORDER BY
                                o_items_rq.order_date ASC
                                
                                ";


                        }
                $this->db->query($query);
                $this->db->bind(':order_id',$order_id);
                $row=$this->db->resultSet();

                if($row){
                    return $row;
                }else{
                    return false;
                }
            }

        



            public function getCompletedOrderDetailsByOrderId($order_id,$order_type){
     
                if($order_type == 'AUCTION'){
                    $query = "SELECT 
                                o.*,
                                o_items_ac.*,
                                o_items_ac.order_status AS order_state,
                                i.name AS item_name,
                                i.unit AS item_unit,
                                i.price AS item_price,
                                i.item_img AS item_img,
                                u_seller.user_id AS seller_user_id,
                                u_seller.name AS seller_name,
                                u_seller.address AS seller_address,
                                u_seller.city AS seller_city,
                                u_seller.mobile AS seller_mobile,
                                s.prof_img AS seller_img,
                                s.seller_id AS seller_id,
                                b.buyer_id AS buyer_id,
                                u_buyer.user_id AS buyer_user_id,
                                u_buyer.name AS buyer_name,
                                u_buyer.address AS buyer_address,
                                u_buyer.city AS buyer_city,
                                u_buyer.mobile AS buyer_mobile,
                                b.prof_img AS buyer_img,
                                COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
                    COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
                    COALESCE(d.deliver_id, 'No Deliver assigned') AS deliver_id,
                    COALESCE(u_deliver.user_id, 'No Deliver assigned') AS deliver_user_id,
                    COALESCE(d.prof_img, 'No Deliver assigned') AS deliver_img,
                    v.vehicle_img,
                    v.vehicle_model,
                    v.vehicle_type,
                    v.vehicle_brand,
                    v.vehicle_number,
                    q.qc_id
                            FROM
                                orders o
                            JOIN
                                order_items_ac o_items_ac ON o.order_id = o_items_ac.order_id
                            JOIN
                                auction i ON o_items_ac.auction_id = i.auction_id
                            JOIN 
                                quality_check q ON o_items_ac.order_item_id = q.order_item_id    
                            JOIN
                                sellers s ON o_items_ac.seller_id = s.seller_id
                            JOIN
                                users u_seller ON s.user_id = u_seller.user_id
                            JOIN 
                                buyers b ON o_items_ac.buyer_id = b.buyer_id
                            JOIN 
                                users u_buyer ON b.user_id = u_buyer.user_id
                            LEFT JOIN
                                delivers d ON o_items_ac.deliver_id = d.deliver_id
                            LEFT JOIN
                                users u_deliver ON d.user_id = u_deliver.user_id
                            LEFT JOIN
                                vehicle v ON u_deliver.user_id = v.user_id
                            WHERE
                                o.order_id = :order_id AND o.payment_status=1
                            ";
                }elseif($order_type == 'PURCHASE'){

                $query = "SELECT 
                                o.*,
                                o_items.*,
                                o_items.order_status AS order_state,
                                i.name AS item_name,
                                i.unit AS item_unit,
                                i.price AS item_price,
                                i.item_img AS item_img,
                                u_seller.name AS seller_name,
                                u_seller.address AS seller_address,
                                u_seller.user_id AS seller_user_id,
                                u_seller.city AS seller_city,
                                u_seller.mobile AS seller_mobile,
                                s.prof_img AS seller_img,
                                u_buyer.name AS buyer_name,
                                u_buyer.address AS buyer_address,
                                u_buyer.city AS buyer_city,
                                u_buyer.mobile AS buyer_mobile,
                                b.prof_img AS buyer_img,
                                COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
                    COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
                    COALESCE(d.deliver_id, 'No Deliver assigned') AS deliver_id,
                    COALESCE(u_deliver.user_id, 'No Deliver assigned') AS deliver_user_id,
                    COALESCE(d.prof_img, 'No Deliver assigned') AS deliver_img,
                    v.vehicle_img,
                    v.vehicle_model,
                    v.vehicle_type,
                    v.vehicle_brand,
                    v.vehicle_number,
                    q.qc_id
                        FROM
                            order_items o_items
                        JOIN
                            orders o ON o_items.order_id = o.order_id
                        JOIN
                            items_market  i ON o_items.item_id = i.item_id
                        JOIN 
                            quality_check q ON o_items.order_item_id = q.order_item_id 
                        JOIN
                            sellers  s ON o_items.seller_id = s.seller_id
                        JOIN
                            users  u_seller ON s.user_id = u_seller.user_id
                        JOIN
                            buyers  b ON o_items.buyer_id = b.buyer_id
                        JOIN
                            users  u_buyer ON b.user_id = u_buyer.user_id
                        LEFT JOIN
                            delivers d ON o_items.deliver_id = d.deliver_id
                        LEFT JOIN
                            users u_deliver ON d.user_id = u_deliver.user_id
                        LEFT JOIN
                                vehicle v ON u_deliver.user_id = v.user_id
                        WHERE
                            o_items.order_id = :order_id AND o.payment_status=1
                        ";
                        }elseif($order_type=="REQUEST"){

                $query = "SELECT 
                                o.*,
                                o_items_rq.*,
                                o_items_rq.order_status AS order_state,
                                r.name AS item_name,
                                r.unit AS item_unit,
                                r.acp_amount AS item_price,
                                u_seller.name AS seller_name,
                                u_seller.user_id AS seller_user_id,
                                u_seller.address AS seller_address,
                                u_seller.city AS seller_city,
                                u_seller.mobile AS seller_mobile,
                                s.prof_img AS seller_img,
                                u_buyer.name AS buyer_name,
                                u_buyer.address AS buyer_address,
                                u_buyer.city AS buyer_city,
                                u_buyer.mobile AS buyer_mobile,
                                b.prof_img AS buyer_img,
                                COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
                                COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
                                COALESCE(d.deliver_id, 'No Deliver assigned') AS deliver_id,
                                COALESCE(u_deliver.user_id, 'No Deliver assigned') AS deliver_user_id,
                                COALESCE(d.prof_img, 'No Deliver assigned') AS deliver_img,
                                v.vehicle_img,
                    v.vehicle_model,
                    v.vehicle_type,
                    v.vehicle_brand,
                    v.vehicle_number,
                    q.qc_id
                            FROM
                                order_items_rq o_items_rq
                            JOIN
                                orders o ON o_items_rq.order_id = o.order_id
                            JOIN
                                requests  r ON o_items_rq.req_id = r.request_ID
                            JOIN 
                                quality_check q ON o_items_rq.order_item_id = q.order_item_id 
                            JOIN
                                sellers  s ON o_items_rq.seller_id = s.seller_id
                            JOIN
                                users  u_seller ON s.user_id = u_seller.user_id
                            JOIN
                                buyers  b ON o_items_rq.buyer_id = b.buyer_id
                            JOIN
                                users  u_buyer ON b.user_id = u_buyer.user_id
                            LEFT JOIN
                                delivers d ON o_items_rq.deliver_id = d.deliver_id
                            LEFT JOIN
                                users u_deliver ON d.user_id = u_deliver.user_id
                            LEFT JOIN
                                vehicle v ON u_deliver.user_id = v.user_id
                            WHERE
                                o_items_rq.order_id = :order_id AND o.payment_status=1 ";


                        }
                $this->db->query($query);
                $this->db->bind(':order_id',$order_id);
                $row=$this->db->resultSet();
                
                if($row){
                    return $row;
                }else{
                    return false;
                }
            }






            // get seller orders
            public function getSellerOrders($seller_id){
                $orders=$this->getSellerCurrentOrders($seller_id);
                    if($orders){
                        return $orders;
                    }else{
                        return false;
                    }
                    
            }

            //get seller complete orders
            public function getSellerCompleteOrders($seller_id){

            

                $orders = $this->getSellerCompletedOrders($seller_id);
              

                if($orders){
                    return $orders;
                }else{
                    return false;
                }
            }


            public function getDeliverOrders(){
                $orders=$this->getDeliverAvailableOrders();
                    if($orders){
                        return $orders;
                    }else{
                        return false;
                    }
                    

            }



            public function getBuyerOrders($buyer_id){
                $orderIds   = $this->getBuyerOrderIDs($buyer_id);
                // var_dump($orderIds);
                
                if(!$orderIds){
                    return false;
                }
                $orders = [];
                foreach($orderIds as $order){
                    $orderDetails = $this->getOrderDetailsByOrderId($order->order_id,$order->order_type);
                    array_push($orders,$orderDetails);
                }
                // var_dump($orders);
                    if($orders){
                        return $orders;
                    }else{
                        return false;
                    }
        }
            public function getBuyerOngoingOrders($buyer_id){
                $orderIds   = $this->getBuyerOrderIDs($buyer_id);
           
                if(!$orderIds){
                    return false;
                }
                $orders = [];
                foreach($orderIds as $order){
                    $orderDetails = $this->getBuyerOngoingOrderDetailsByOrderId($order->order_id,$order->order_type);
                    array_push($orders,$orderDetails);
                }
                // var_dump($orders);
        
                    if($orders){
                        return $orders;
                    }else{
                        return false;
                    }
        }
            public function getBuyerCompletedOrders($buyer_id){
                $orderIds   = $this->getBuyerCompletedOrderIDs($buyer_id);
          
                
                if(!$orderIds){
                    return false;
                }
                $orders = [];
                foreach($orderIds as $order){
                    $orderDetails = $this->getCompletedOrderDetailsByOrderId($order->order_id,$order->order_type);
                    array_push($orders,$orderDetails);
                }
                if($orders){
                        return $orders;
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
    o_items.order_item_id AS order_item_id,
    u_seller.name AS seller_name,
    o_items.deliver_fee AS deliver_fee,
    u_seller.user_id AS seller_user_id,
    u_seller.address AS seller_address,
    u_seller.mobile AS seller_mobile,
    u_seller.city AS seller_city,
    u_buyer.name AS buyer_name,
    u_buyer.user_id AS buyer_user_id,
    u_buyer.mobile AS buyer_mobile,
    u_buyer.address AS buyer_address,
    od.order_id AS order_id,
    od.order_city AS order_city,
    od.order_address AS order_address,
    od.order_mobile AS order_mobile,
    s.prof_img AS seller_img,
    b.prof_img AS buyer_img,
    i.address AS pickup_address,
    COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
    COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
    COALESCE(u_deliver.address, 'No Deliver assigned') AS deliver_address,
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
public function getAuctionOrderDetails($id){
    $query ="SELECT  
    o_items_ac.*,
    o_items_ac.order_item_id AS order_item_id,
    o_items_ac.deliver_fee AS deliver_fee,
    u_seller.name AS seller_name,
    u_seller.user_id AS seller_user_id,
    u_seller.address AS seller_address,
    u_seller.mobile AS seller_mobile,
    u_seller.city AS seller_city,
    u_buyer.name AS buyer_name,
    u_buyer.user_id AS buyer_user_id,
    u_buyer.mobile AS buyer_mobile,
    u_buyer.address AS buyer_address,
    od.order_id AS order_id,
    od.order_city AS order_city,
    od.order_address AS order_address,
    od.order_mobile AS order_mobile,
    s.prof_img AS seller_img,
    b.prof_img AS buyer_img,
    i.address AS pickup_address,
    COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
    COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
    COALESCE(u_deliver.address, 'No Deliver assigned') AS deliver_address,
    i.item_img,
    i.name AS item_name,
    i.unit AS item_unit
FROM
    -- order_items
    order_items_ac o_items_ac
JOIN
    orders od ON o_items_ac.order_id = od.order_id    
JOIN 
    sellers s ON o_items_ac.seller_id = s.seller_id
JOIN 
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items_ac.buyer_id = b.buyer_id
JOIN 
    users u_buyer ON b.user_id = u_buyer.user_id
LEFT JOIN 
    delivers d ON o_items_ac.deliver_id = d.deliver_id
LEFT JOIN 
    users u_deliver ON d.user_id = u_deliver.user_id
JOIN
    auction i ON o_items_ac.auction_id = i.auction_ID
WHERE
    o_items_ac.order_item_id = :order_item_id
ORDER BY o_items_ac.order_date DESC
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
public function getRequestOrderDetails($id){
    $query ="SELECT  
    o_items_rq.*,
    o_items_rq.order_item_id AS order_item_id,
    o_items_rq.deliver_fee AS deliver_fee,
    u_seller.name AS seller_name,
    u_seller.user_id AS seller_user_id,
    u_seller.address AS seller_address,
    u_seller.mobile AS seller_mobile,
    u_seller.city AS seller_city,
    u_buyer.name AS buyer_name,
    u_buyer.address AS buyer_address,
    u_buyer.user_id AS buyer_user_id,
    u_buyer.mobile AS buyer_mobile,
    od.order_id AS order_id,
    od.order_city AS order_city,
    od.order_address AS order_address,
    od.order_mobile AS order_mobile,
    s.prof_img AS seller_img,
    b.prof_img AS buyer_img,
    u_seller.address AS pickup_address,
    COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
    COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
    COALESCE(u_deliver.address, 'No Deliver assigned') AS deliver_address,
    r.req_img AS item_img,
    r.name AS item_name,
    r.unit AS item_unit
FROM
    -- order_items
    order_items_rq o_items_rq
JOIN
    orders od ON o_items_rq.order_id = od.order_id    
JOIN 
    sellers s ON o_items_rq.seller_id = s.seller_id
JOIN 
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items_rq.buyer_id = b.buyer_id
JOIN 
    users u_buyer ON b.user_id = u_buyer.user_id
LEFT JOIN 
    delivers d ON o_items_rq.deliver_id = d.deliver_id
LEFT JOIN 
    users u_deliver ON d.user_id = u_deliver.user_id
JOIN
    requests r ON o_items_rq.req_id = r.request_ID
WHERE
    o_items_rq.order_item_id = :order_item_id

ORDER BY o_items_rq.order_date DESC
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


        public function orderStatus($order_item_id,$order_type){
            if($order_type == 'AUCTION'){
                $query="SELECT order_status from order_items_ac WHERE order_item_id=:order_item_id";
            }elseif($order_type == 'PURCHASE'){
                $query="SELECT order_status from order_items WHERE order_item_id=:order_item_id";
            }elseif($order_type == 'REQUEST'){
                $query="SELECT order_status from order_items_rq WHERE order_item_id=:order_item_id";
            }
            $this->db->query($query);
            $this->db->bind(':order_item_id',$order_item_id);
            $status=$this->db->single();
            if($status){
                return $status->order_status;
            }else{
                return false;
            }
        }

public function getDeliverAvailability($deliver_id){
    $query="SELECT availability 
            FROM delivers 
            WHERE deliver_id=:deliver_id";
    $this->db->query($query);
    $this->db->bind(':deliver_id',$deliver_id);
    $row=$this->db->single();
    if($row){
        return $row->availability;
    }else{
        return false;
    }
}
public function changeDeliverAvailability($deliver_id,$change,$order_item_id,$order_type){
    $query = "UPDATE delivers 
    SET 
        availability = :availability,
        current_order_item_id = :order_item_id,
        current_order_type = :order_type 
    WHERE deliver_id = :deliver_id"; 

        $this->db->query($query);
        $this->db->bind(':deliver_id', $deliver_id);
        $this->db->bind(':availability', $change); 
        $this->db->bind(':order_item_id', $order_item_id); 
        $this->db->bind(':order_type', $order_type);
        ;
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }


public function assignDeliver($order_item_id ,$deliver_id,$order_type){
    
    $status=$this->orderStatus($order_item_id,$order_type);
    $availability=$this->getDeliverAvailability($deliver_id);
    // var_dump($status,$availability);
    if($order_item_id && $status == 'pending' && $availability){

                if($order_type == 'AUCTION'){
                    $query="UPDATE  order_items_ac 
                            SET 
                                order_status=:order_status,
                                deliver_id=:deliver_id
                            WHERE 
                                order_item_id=:order_item_id";
                }elseif($order_type == 'PURCHASE'){
                $query="UPDATE  order_items 
                        SET 
                            order_status=:order_status,
                            deliver_id=:deliver_id
                        WHERE 
                            order_item_id=:order_item_id";
                }elseif($order_type == 'REQUEST'){
                $query="UPDATE  order_items_rq  
                        SET 
                            order_status=:order_status,
                            deliver_id=:deliver_id
                        WHERE 
                            order_item_id=:order_item_id";
                                }



                    $this->db->query($query);
                    $this->db->bind(':order_item_id',$order_item_id);
                    $this->db->bind(':order_status',"deliver_assigned");
                    $this->db->bind(':deliver_id',$deliver_id);
                    if($this->db->execute()){
                        
        
                        if($this->changeDeliverAvailability($deliver_id,false,$order_item_id,$order_type)){
                            return true;
                    ;
                        }else{
                            
                            return false;
                        }
                        
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

        public function OrderItemsView($id,$type){

            

            if($type =='PURCHASE'){

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
                            WHERE order_items.order_id=:order_id');

            $this->db->bind(':order_id',$id);

            $row= $this->db->resultSet();
            
            if($row){
                return $row;
            }
            else{
                return false;
            }

            }elseif($type == 'AUCTION'){

                $this->db->query('SELECT 
                            order_items_ac.*,
                            auction.*,
                            users.*,
                            users.name As seller_name,
                            users.address As seller_address
                            FROM
                            order_items_ac
                            JOIN 
                            auction ON 
                            order_items_ac.auction_id = auction.auction_ID
                            JOIN
                            sellers ON
                            auction.seller_ID = sellers.seller_id
                            JOIN
                            users ON
                            sellers.user_id=users.user_id
                            WHERE order_items_ac.order_id=:order_id');

            $this->db->bind(':order_id',$id);

            $row= $this->db->resultSet();
            
            if($row){
                return $row;
            }
            else{
                return false;
            }

            }
            elseif($type == 'REQUESTS'){

                $this->db->query('SELECT 
                            order_items_rc.*,
                            requests.*,
                            users.*,
                            users.name As seller_name,
                            users.address As seller_address
                            FROM
                            order_items_rq
                            JOIN 
                            requests ON 
                            order_items_rq.req_id = requests.request_ID
                            JOIN
                            sellers ON
                            requests.acp_seller_ID = sellers.seller_id
                            JOIN
                            users ON
                            sellers.user_id=users.user_id
                            WHERE order_items_rq.order_id=:order_id');

            $this->db->bind(':order_id',$id);

            $row= $this->db->resultSet();
            // var_dump($row);
            if($row){
                return $row;
            }
            else{
                return false;
            }
            }
            

        }

        public function sellersInOrder($id,$type){

            if($type == 'PURCHASE'){
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
            elseif($type == 'AUCTION'){
                
                $query = 'SELECT 
                order_items_ac.seller_id,
                users.*
                FROM
                order_items_ac
                JOIN
                sellers ON
                order_items_ac.seller_id=sellers.seller_id
                JOIN 
                users ON
                sellers.user_id = users.user_id
                WHERE order_items_ac.order_id = :order_id';
        
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
            elseif($type == 'REQUESTS'){
                
                $query = 'SELECT 
                order_items_ac.seller_id,
                users.*
                FROM
                order_items_rq
                JOIN
                sellers ON
                order_items_rq.seller_id=sellers.seller_id
                JOIN 
                users ON
                sellers.user_id = users.user_id
                WHERE order_items_rq.order_id = :order_id';
        
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

        public function OrderDeliverers($id,$type){
            
            if($type == 'PURCHASE'){

                $query = 'SELECT 
                    order_items.*,
                    users.*
                    FROM 
                    order_items
                    JOIN
                    delivers ON
                    order_items.deliver_id = delivers.deliver_id
                    JOIN
                    users ON
                    delivers.user_id = users.user_id
                    WHERE
                    order_items.order_id = :order_id';
            
            $this->db->query($query);
            $this->db->bind(':order_id',$id);
            $row =$this->db->resultSet();

            if($row){
                return $row;
            }
            else{
                return false;
            }
            }
            elseif($type == 'AUCTION'){

                $query = 'SELECT 
                    order_items_ac.*,
                    users.*
                    FROM 
                    order_items_ac
                    JOIN
                    delivers ON
                    order_items_ac.deliver_id = delivers.deliver_id
                    JOIN
                    users ON
                    delivers.user_id = users.user_id
                    WHERE
                    order_items_ac.order_id = :order_id';
            
            $this->db->query($query);
            $this->db->bind(':order_id',$id);
            $row =$this->db->resultSet();

            if($row){
                return $row;
            }
            else{
                return false;
            }
            }
            elseif($type == 'REQUEST'){

                $query = 'SELECT 
                    order_items_rq.*,
                    users.*
                    FROM 
                    order_items_rq
                    JOIN
                    delivers ON
                    order_items_rq.deliver_id = delivers.deliver_id
                    JOIN
                    users ON
                    delivers.user_id = users.user_id
                    WHERE
                    order_items_rq.order_id = :order_id';
            
            $this->db->query($query);
            $this->db->bind(':order_id',$id);
            $row =$this->db->resultSet();

            if($row){
                return $row;
            }
            else{
                return false;
            }
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

        public function getDeliverCurrentOrder($deliver_id){
            $query = "SELECT 
                            current_order_item_id,
                            current_order_type
                    FROM 
                            delivers
                    WHERE 
                            deliver_id = :deliver_id AND availability=0";

            $this->db->query($query);
            $this->db->bind(':deliver_id',$deliver_id);

            $row = $this->db->single();

            if($row){
                return $row;
            }else{
                return false;
            }
        }


        public function editToPickedUp($deliver_id){
            $order= $this->getDeliverCurrentOrder($deliver_id);
            if($order){
                $order_type = $order->current_order_type;

                if($order_type == 'AUCTION'){
                    $query = "UPDATE 
                            order_items_ac 
                    SET 
                            order_status = 'pickedup' 
                    WHERE 
                            deliver_id = :deliver_id AND order_status='deliver_assigned'";
                }elseif($order_type == 'PURCHASE'){
                    $query = "UPDATE 
                            order_items 
                    SET 
                            order_status = 'pickedup' 
                    WHERE 
                            deliver_id = :deliver_id AND order_status='deliver_assigned'";
                }elseif($order_type == 'REQUEST'){
                    $query = "UPDATE 
                            order_items_rq 
                    SET 
                            order_status = 'pickedup' 
                    WHERE 
                            deliver_id = :deliver_id AND order_status='deliver_assigned'";
                }
            $this->db->query($query);
            $this->db->bind(':deliver_id',$deliver_id);

            if($this->db->execute()){
                return true;      
            }else{
                return false;
            }}else{
                return false;
            }
        }


        public function editToDelivering($deliver_id){
            $order= $this->getDeliverCurrentOrder($deliver_id);
            if($order){
                $order_type = $order->current_order_type;

                if($order_type == 'AUCTION'){
                    $query = "UPDATE 
                            order_items_ac 
                    SET 
                            order_status = 'delivering' 
                    WHERE 
                            deliver_id = :deliver_id AND order_status='pickedup'";
                }elseif($order_type == 'PURCHASE'){
                    $query = "UPDATE 
                            order_items 
                    SET 
                            order_status = 'delivering' 
                    WHERE 
                            deliver_id = :deliver_id AND order_status='pickedup'";
                }elseif($order_type == 'REQUEST'){
                    $query = "UPDATE 
                            order_items_rq 
                    SET 
                            order_status = 'delivering' 
                    WHERE 
                            deliver_id = :deliver_id AND order_status='pickedup'";
                }

            $this->db->query($query);
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

        public function editToDelivered($deliver_id){
            $order= $this->getDeliverCurrentOrder($deliver_id);
            if($order){
                $order_type = $order->current_order_type;

                if($order_type == 'AUCTION'){
                    $query = "UPDATE 
                            order_items_ac 
                    SET 
                            order_status = 'delivered' 
                    WHERE 
                            deliver_id = :deliver_id AND order_status='delivering'";
                }elseif($order_type == 'PURCHASE'){
                    $query = "UPDATE 
                            order_items 
                    SET 
                            order_status = 'delivered' 
                    WHERE 
                            deliver_id = :deliver_id AND order_status='delivering'";
                }elseif($order_type == 'REQUEST'){
                    $query = "UPDATE 
                            order_items_rq 
                    SET 
                            order_status = 'delivered' 
                    WHERE 
                            deliver_id = :deliver_id AND order_status='delivering'";
                }

            $this->db->query($query);
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

        public function editToCompleted($deliver_id){

            $order= $this->getDeliverCurrentOrder($deliver_id);
            if($order){
                $order_type = $order->current_order_type;

        if($order_type == 'AUCTION'){
            $query = "UPDATE 
                    order_items_ac 
              SET 
                    order_status = 'completed', completed_date = now()
              WHERE 
                    deliver_id = :deliver_id AND order_status='delivered'";
        }elseif($order_type == 'PURCHASE'){
            $query = "UPDATE 
                    order_items 
              SET 
                    order_status = 'completed', completed_date = now() 
              WHERE 
                    deliver_id = :deliver_id AND order_status='delivered'";
        }elseif($order_type == 'REQUEST'){
            $query = "UPDATE 
                    order_items_rq 
              SET 
                    order_status = 'completed', completed_date = now()
              WHERE 
                    deliver_id = :deliver_id AND order_status='delivered'";
        }

        //             $query = "UPDATE 
        //             order_items 
        //         SET 
        //             order_status = 'completed',
        //             completed_date = NOW()
        //         WHERE 
        //             deliver_id = :deliver_id AND order_status='delivered'";


            // $action = "UPDATE
            //                 order_items
            //            SET  
            //                 completed_date = NOW()
            //            WHERE
            //                 deliver_id = :deliver_id AND order_status='delivered'";                

            // First query

            $this->db->query($query);
            $this->db->bind(':deliver_id',$deliver_id);
            if($this->db->execute()){
                $this->changeDeliverAvailability($deliver_id,true,NULL,NULL);
                return true;      
            }else{
                return false;
            }

        }else{
            return false;
        }

            // // Second query
            // $this->db->query($action);
            // $this->db->bind(':deliver_id',$deliver_id);
            // $this->db->execute();
            // // Execute the second query
            

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


        public function uploadPickupImages($data){
            $query = 'INSERT INTO quality_check 
                    (order_id,order_item_id,order_type,deliver_id,deliver_pickup_img,seller_id,seller_img)
                    VALUES
                    (:order_id,:item_id,:order_type,:deliver_id,:deliver_pickup_img,:seller_id,:seller_img)';
                  ;
            
            $this->db->query($query);
            $this->db->bind(':order_id',$data['order_id']);
            $this->db->bind(':item_id',$data['order_item_id']);
            $this->db->bind(':order_type',$data['order_type']);
            $this->db->bind(':deliver_id',$data['deliver_id']);
            $this->db->bind(':deliver_pickup_img',$data['deliver_pickup_img']);
            $this->db->bind(':seller_id',$data['seller_id']);
            $this->db->bind(':seller_img',$data['seller_img']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
                    
        }

        public function uploadDropOffImages($data){    
            $query = 'UPDATE quality_check 
                    SET
                    deliver_dropoff_img= :deliver_dropoff_img
                    WHERE order_item_id = :item_id AND order_id = :order_id AND order_type = :order_type AND deliver_id = :deliver_id';
            
            $this->db->query($query);
            $this->db->bind(':order_id',$data['order_id']);
            $this->db->bind(':item_id',$data['order_item_id']);
            $this->db->bind(':order_type',$data['order_type']);
            $this->db->bind(':deliver_id',$data['deliver_id']);
            $this->db->bind(':deliver_dropoff_img',$data['deliver_dropoff_img']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }



        public function addBuyerComplain($data){
            var_dump($data);
            $query = "UPDATE  quality_check 
                        SET buyer_id=:buyer_id ,buyer_message=:complain,complain_date=now(),qc_status='raised',buyer_img=:buyer_img
                        WHERE qc_id = :qc_id
            ";
            $this->db->query($query);
            $this->db->bind(':buyer_id',$data['buyer_id']);
            $this->db->bind(':complain',$data['complain']);
            $this->db->bind(':buyer_img',$data['complain_img']);
            $this->db->bind(':qc_id',$data['qc_id']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }


        public function getDeliveryCompletedOrder($deliver_id){
            $query = "SELECT * FROM order_items 
                        WHERE order_status = 'completed' 
                        AND deliver_id = :deliver_id";
            $this->db->query($query);
            $this->db->bind(':deliver_id',$deliver_id);
            $row = $this->db->resultSet();

            if($row){
                return $row;
            }else{
                return false;
            }

        }

        public function getCompletedOrderDetails($deliver_id){

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
                order_items.order_status ='completed' ";

            $this->db->query($query);
            $this->db->bind(':delivery_id', $deliver_id);

            $row = $this->db->single();

            if(!empty($row)){
                return $row;
            } else {
                return false;
            }
        }


     

        public function getBuyerDetailsCompletedOrder($deliver_id){

            $row1 = $this->getCompletedOrderDetails($deliver_id);
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


        public function getSellerDetailsCompletedOrder($deliver_id){

            $row1 = $this->getCompletedOrderDetails($deliver_id);
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


public function getReviews($deliver_id){
    $query = "SELECT 
                delivery_reviews.*,
                users.* 
              FROM order_items ";
}






public function getCompletedOrderIDs($deliver_id){
    $query ="SELECT 
    o_items.order_id,
    o.order_type,
    o.order_date,
    o_items.order_status
FROM 
    order_items o_items
JOIN 
    orders AS o ON o_items.order_id = o.order_id
WHERE 
    o_items.order_status = 'completed' AND o_items.deliver_id = :deliver_id

UNION

SELECT 
    o_items_ac.order_id,
    o.order_type,
    o.order_date,
    o_items_ac.order_status
FROM 
    order_items_ac o_items_ac
JOIN 
    orders o ON o_items_ac.order_id = o.order_id
WHERE 
    o_items_ac.order_status = 'completed'  AND o_items_ac.deliver_id = :deliver_id

    UNION

SELECT 
    o_items_rq.order_id,
    o.order_type,
    o.order_date,
    o_items_rq.order_status
FROM 
    order_items_rq o_items_rq
JOIN 
    orders o ON o_items_rq.order_id = o.order_id
WHERE 
    o_items_rq.order_status = 'completed'  AND o_items_rq.deliver_id = :deliver_id
ORDER BY 
order_date DESC"

;
    $this->db->query($query);
    $this->db->bind(':deliver_id',$deliver_id);
    $row=$this->db->resultSet();
    if($row){
        return $row;
    }else{
        return false;
    }
}


public function getDeliverAvailableOrders(){
    $query ="SELECT 
                 o_items.order_status AS order_state,
                 o_items.order_date AS order_date,
                 o_items.quantity AS quantity,
                 o_items.deliver_fee AS deliver_fee,
                 o_items.order_item_id AS order_item_id,
                 o_items.order_id AS order_id,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 i.name AS item_name,
                 i.unit AS item_unit,
                 
                 i.item_img AS item_img,
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS seller_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile,
                 i.address AS pickup_address    
                
FROM 
    order_items o_items
JOIN
    sellers s  ON o_items.seller_id = s.seller_id
JOIN
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items.buyer_id = b.buyer_id
JOIN
    users u_buyer ON b.user_id = u_buyer.user_id
JOIN 
    orders o ON o_items.order_id = o.order_id
JOIN 
    items_market i ON o_items.item_id = i.item_id
WHERE 
    o_items.order_status = 'pending' AND o.payment_status = 1

UNION

SELECT 
                o_items_ac.order_status AS order_state,
                 o_items_ac.order_date AS order_date,
                 o_items_ac.quantity AS quantity,
                 o_items_ac.deliver_fee AS deliver_fee,
                 o_items_ac.order_item_id AS order_item_id,
                 o_items_ac.order_id AS order_id,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 a.name AS item_name,
                 a.unit AS item_unit,
                 a.item_img AS item_img,
                 
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS seller_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile,
                 a.address AS pickup_address
FROM 
    order_items_ac o_items_ac
JOIN
    sellers s  ON o_items_ac.seller_id = s.seller_id
JOIN
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items_ac.buyer_id = b.buyer_id
JOIN
    users u_buyer ON b.user_id = u_buyer.user_id
JOIN 
    orders o ON o_items_ac.order_id = o.order_id
JOIN
    auction a ON o_items_ac.auction_id = a.auction_ID
WHERE 
    o_items_ac.order_status = 'pending' AND o.payment_status = 1

    UNION

SELECT 
                o_items_rq.order_status AS order_state,
                 o_items_rq.order_date AS order_date,
                 o_items_rq.quantity AS quantity,
                 o_items_rq.deliver_fee AS deliver_fee,
                 o_items_rq.order_item_id AS order_item_id,
                 o_items_rq.order_id AS order_id,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 r.name AS item_name,
                 r.unit AS item_unit,
                 r.req_img AS item_img,
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS pickup_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile,
                 r.req_address AS request_address
                 
FROM 
    order_items_rq o_items_rq
JOIN
    sellers s  ON o_items_rq.seller_id = s.seller_id
JOIN
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items_rq.buyer_id = b.buyer_id
JOIN
    users u_buyer ON b.user_id = u_buyer.user_id
JOIN 
    orders o ON o_items_rq.order_id = o.order_id
JOIN 
    requests r ON o_items_rq.req_id = r.request_ID
WHERE 
    o_items_rq.order_status = 'pending' AND o.payment_status = 1
ORDER BY order_date DESC
"

;
    $this->db->query($query);

    $row=$this->db->resultSet();
    if($row){
        return $row;
    }else{
        return false;
    }               
}

public function getDeliverCompletedOrders($deliver_id){
    $query ="SELECT 
                 o_items.order_status AS order_state,
                 o_items.order_date AS order_date,
                 o_items.quantity AS quantity,
                 o_items.deliver_fee AS deliver_fee,
                 o_items.order_item_id AS order_item_id,
                 o_items.completed_date AS completed_date,
                 o_items.order_id AS order_id,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 i.name AS item_name,
                 i.unit AS item_unit,
                 i.item_img AS item_img,
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS seller_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile
                
FROM 
    order_items o_items
JOIN
    sellers s  ON o_items.seller_id = s.seller_id
JOIN
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items.buyer_id = b.buyer_id
JOIN
    users u_buyer ON b.user_id = u_buyer.user_id
JOIN 
    orders o ON o_items.order_id = o.order_id
JOIN 
    items_market i ON o_items.item_id = i.item_id
WHERE 
    o_items.order_status = 'completed' AND o.payment_status = 1 AND o_items.deliver_id = :deliver_id

UNION

SELECT 
                o_items_ac.order_status AS order_state,
                 o_items_ac.order_date AS order_date,
                 o_items_ac.quantity AS quantity,
                 o_items_ac.deliver_fee AS deliver_fee,
                 o_items_ac.order_item_id AS order_item_id,
                 o_items_ac.completed_date AS completed_date,
                 o_items_ac.order_id AS order_id,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 a.name AS item_name,
                 a.unit AS item_unit,
                 a.item_img AS item_img,
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS seller_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile
FROM 
    order_items_ac o_items_ac
JOIN
    sellers s  ON o_items_ac.seller_id = s.seller_id
JOIN
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items_ac.buyer_id = b.buyer_id
JOIN
    users u_buyer ON b.user_id = u_buyer.user_id
JOIN 
    orders o ON o_items_ac.order_id = o.order_id
JOIN
    auction a ON o_items_ac.auction_id = a.auction_ID
WHERE 
    o_items_ac.order_status = 'completed' AND o.payment_status = 1 AND o_items_ac.deliver_id = :deliver_id

    UNION

SELECT 
                o_items_rq.order_status AS order_state,
                 o_items_rq.order_date AS order_date,
                 o_items_rq.quantity AS quantity,
                 o_items_rq.deliver_fee AS deliver_fee,
                 o_items_rq.order_item_id AS order_item_id,
                 o_items_rq.completed_date AS completed_date,
                 o_items_rq.order_id AS order_id,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 r.name AS item_name,
                 r.unit AS item_unit,
                 r.req_img AS item_img,
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS seller_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile
FROM 
    order_items_rq o_items_rq
JOIN
    sellers s  ON o_items_rq.seller_id = s.seller_id
JOIN
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items_rq.buyer_id = b.buyer_id
JOIN
    users u_buyer ON b.user_id = u_buyer.user_id
JOIN 
    orders o ON o_items_rq.order_id = o.order_id
JOIN 
    requests r ON o_items_rq.req_id = r.request_ID
WHERE 
    o_items_rq.order_status = 'completed' AND o.payment_status = 1 AND o_items_rq.deliver_id = :deliver_id
ORDER BY completed_date DESC
"

;
    $this->db->query($query);
    $this->db->bind(":deliver_id",$deliver_id);

    $row=$this->db->resultSet();
    if($row){
        return $row;
    }else{
        return false;
    }               
}
public function getSellerCurrentOrders($seller_id){
    $query ="SELECT 
                 o_items.order_date AS order_date,
                 o_items.quantity AS quantity,
                 o_items.deliver_fee AS deliver_fee,
                 o_items.order_item_id AS order_item_id,
                 o_items.completed_date AS completed_date,
                 o_items.order_id AS order_id,
                 o_items.order_status AS order_status,
                 o_items.total_price AS total_price,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 i.name AS item_name,
                 i.unit AS item_unit,
                 i.item_img AS item_img,
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS seller_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile,
                 b.prof_img AS buyer_img,
                 u_deliver.mobile AS deliver_mobile,
                 u_deliver.name AS deliver_name,
                 d.prof_img AS deliver_img
                
FROM 
    order_items o_items
JOIN
    sellers s  ON o_items.seller_id = s.seller_id
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
    orders o ON o_items.order_id = o.order_id
JOIN 
    items_market i ON o_items.item_id = i.item_id
WHERE 
    o_items.order_status != 'completed' AND o.payment_status = 1 AND o_items.seller_id = :seller_id


UNION

SELECT 
               
                o_items_ac.order_date AS order_date,
                 o_items_ac.quantity AS quantity,
                 o_items_ac.deliver_fee AS deliver_fee,
                 o_items_ac.order_item_id AS order_item_id,
                 o_items_ac.completed_date AS completed_date,
                 o_items_ac.order_id AS order_id,
                 o_items_ac.order_status AS order_status,
                 o_items_ac.total_price AS total_price,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 a.name AS item_name,
                 a.unit AS item_unit,
                 a.item_img AS item_img,
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS seller_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile,
                 b.prof_img AS buyer_img,
                 u_deliver.mobile AS deliver_mobile,
                 u_deliver.name AS deliver_name,
                 d.prof_img AS deliver_img
FROM 
    order_items_ac o_items_ac
JOIN
    sellers s  ON o_items_ac.seller_id = s.seller_id
JOIN
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items_ac.buyer_id = b.buyer_id
JOIN
    users u_buyer ON b.user_id = u_buyer.user_id
LEFT JOIN
    delivers d ON o_items_ac.deliver_id = d.deliver_id
LEFT JOIN
    users u_deliver ON d.user_id = u_deliver.user_id
JOIN 
    orders o ON o_items_ac.order_id = o.order_id
JOIN
    auction a ON o_items_ac.auction_id = a.auction_ID
WHERE 
    o_items_ac.order_status != 'completed' AND o.payment_status = 1 AND o_items_ac.seller_id = :seller_id


    UNION

SELECT 
                
o_items_rq.order_date AS order_date,
                 o_items_rq.quantity AS quantity,
                 o_items_rq.deliver_fee AS deliver_fee,
                 o_items_rq.order_item_id AS order_item_id,
                 o_items_rq.completed_date AS completed_date,
                 o_items_rq.order_id AS order_id,
                 o_items_rq.order_status AS order_status,
                 o_items_rq.total_price AS total_price,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 r.name AS item_name,
                 r.unit AS item_unit,
                 r.req_img AS item_img,
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS seller_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile,
                 b.prof_img AS buyer_img,
                 u_deliver.mobile AS deliver_mobile,
                 u_deliver.name AS deliver_name,
                 d.prof_img AS deliver_img
FROM 
    order_items_rq o_items_rq
JOIN
    sellers s  ON o_items_rq.seller_id = s.seller_id
JOIN
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items_rq.buyer_id = b.buyer_id
JOIN
    users u_buyer ON b.user_id = u_buyer.user_id
LEFT JOIN
    delivers d ON o_items_rq.deliver_id = d.deliver_id
LEFT JOIN
    users u_deliver ON d.user_id = u_deliver.user_id
JOIN 
    orders o ON o_items_rq.order_id = o.order_id
JOIN 
    requests r ON o_items_rq.req_id = r.request_ID
WHERE 
    o_items_rq.order_status != 'completed' AND o.payment_status = 1 AND o_items_rq.seller_id = :seller_id
ORDER BY order_date DESC
"

;
    $this->db->query($query);
    $this->db->bind(":seller_id",$seller_id);

    $row=$this->db->resultSet();
    if($row){
        return $row;
    }else{
        return false;
    }               
}
public function getSellerCompletedOrders($seller_id){
    $query ="SELECT 
    *
FROM (
    SELECT 
        o_items.order_status AS order_state,
        o_items.order_date AS order_date,
        o_items.quantity AS quantity,
        o_items.deliver_fee AS deliver_fee,
        o_items.order_item_id AS order_item_id,
        o_items.completed_date AS completed_date,
        o_items.order_id AS order_id,
        o_items.order_status AS order_status,
        o_items.total_price AS total_price,
        o.order_address AS order_address,
        o.order_city AS order_city,
        o.order_type AS order_type,
        i.name AS item_name,
        i.unit AS item_unit,
        i.item_img AS item_img,
        u_seller.name AS seller_name,
        u_seller.user_id AS seller_user_id,
        u_seller.address AS seller_address,
        u_seller.city AS seller_city,
        u_seller.mobile AS seller_mobile,
        s.prof_img AS seller_img,
        u_buyer.name AS buyer_name,
        u_buyer.address AS buyer_address,
        u_buyer.city AS buyer_city,
        u_buyer.mobile AS buyer_mobile,
        b.prof_img AS buyer_img,
        u_deliver.mobile AS deliver_mobile,
        u_deliver.name AS deliver_name,
        d.prof_img AS deliver_img
    FROM 
        order_items o_items
    JOIN
        sellers s  ON o_items.seller_id = s.seller_id
    JOIN
        users u_seller ON s.user_id = u_seller.user_id
    JOIN 
        buyers b ON o_items.buyer_id = b.buyer_id
    JOIN
        users u_buyer ON b.user_id = u_buyer.user_id
    JOIN
        delivers d ON o_items.deliver_id = d.deliver_id
    JOIN
        users u_deliver ON d.user_id = u_deliver.user_id
    JOIN 
        orders o ON o_items.order_id = o.order_id
    JOIN 
        items_market i ON o_items.item_id = i.item_id
    WHERE 
        o_items.order_status = 'completed' AND o.payment_status = 1 AND o_items.seller_id = :seller_id

    UNION ALL

    SELECT 
        o_items_ac.order_status AS order_state,
        o_items_ac.order_date AS order_date,
        o_items_ac.quantity AS quantity,
        o_items_ac.deliver_fee AS deliver_fee,
        o_items_ac.order_item_id AS order_item_id,
        o_items_ac.completed_date AS completed_date,
        o_items_ac.order_id AS order_id,
        o_items_ac.order_status AS order_status,
        o_items_ac.total_price AS total_price,
        o.order_address AS order_address,
        o.order_city AS order_city,
        o.order_type AS order_type,
        a.name AS item_name,
        a.unit AS item_unit,
        a.item_img AS item_img,
        u_seller.name AS seller_name,
        u_seller.user_id AS seller_user_id,
        u_seller.address AS seller_address,
        u_seller.city AS seller_city,
        u_seller.mobile AS seller_mobile,
        s.prof_img AS seller_img,
        u_buyer.name AS buyer_name,
        u_buyer.address AS buyer_address,
        u_buyer.city AS buyer_city,
        u_buyer.mobile AS buyer_mobile,
        b.prof_img AS buyer_img,
        u_deliver.mobile AS deliver_mobile,
        u_deliver.name AS deliver_name,
        d.prof_img AS deliver_img
    FROM 
        order_items_ac o_items_ac
    JOIN
        sellers s  ON o_items_ac.seller_id = s.seller_id
    JOIN
        users u_seller ON s.user_id = u_seller.user_id
    JOIN 
        buyers b ON o_items_ac.buyer_id = b.buyer_id
    JOIN
        users u_buyer ON b.user_id = u_buyer.user_id
    JOIN
        delivers d ON o_items_ac.deliver_id = d.deliver_id
    JOIN
        users u_deliver ON d.user_id = u_deliver.user_id
    JOIN 
        orders o ON o_items_ac.order_id = o.order_id
    JOIN
        auction a ON o_items_ac.auction_id = a.auction_ID
    WHERE 
        o_items_ac.order_status = 'completed' AND o.payment_status = 1 AND o_items_ac.seller_id = :seller_id

    UNION ALL

    SELECT 
        o_items_rq.order_status AS order_state,
        o_items_rq.order_date AS order_date,
        o_items_rq.quantity AS quantity,
        o_items_rq.deliver_fee AS deliver_fee,
        o_items_rq.order_item_id AS order_item_id,
        o_items_rq.completed_date AS completed_date,
        o_items_rq.order_id AS order_id,
        o_items_rq.order_status AS order_status,
        o_items_rq.total_price AS total_price,
        o.order_address AS order_address,
        o.order_city AS order_city,
        o.order_type AS order_type,
        r.name AS item_name,
        r.unit AS item_unit,
        r.req_img AS item_img,
        u_seller.name AS seller_name,
        u_seller.user_id AS seller_user_id,
        u_seller.address AS seller_address,
        u_seller.city AS seller_city,
        u_seller.mobile AS seller_mobile,
        s.prof_img AS seller_img,
        u_buyer.name AS buyer_name,
        u_buyer.address AS buyer_address,
        u_buyer.city AS buyer_city,
        u_buyer.mobile AS buyer_mobile,
        b.prof_img AS buyer_img,
        u_deliver.mobile AS deliver_mobile,
        u_deliver.name AS deliver_name,
        d.prof_img AS deliver_img
    FROM 
        order_items_rq o_items_rq
    JOIN
        sellers s  ON o_items_rq.seller_id = s.seller_id
    JOIN
        users u_seller ON s.user_id = u_seller.user_id
    JOIN 
        buyers b ON o_items_rq.buyer_id = b.buyer_id
    JOIN
        users u_buyer ON b.user_id = u_buyer.user_id
    JOIN
        delivers d ON o_items_rq.deliver_id = d.deliver_id
    JOIN
        users u_deliver ON d.user_id = u_deliver.user_id
    JOIN 
        orders o ON o_items_rq.order_id = o.order_id
    JOIN 
        requests r ON o_items_rq.req_id = r.request_ID
    WHERE 
        o_items_rq.order_status = 'completed' AND o.payment_status = 1 AND o_items_rq.seller_id = :seller_id
) AS combined_orders
ORDER BY order_date DESC;

"

;
    $this->db->query($query);
    $this->db->bind(":seller_id",$seller_id);

    $row=$this->db->resultSet();
    if($row){
        return $row;
    }else{
        return false;
    }               
}




public function getCompletedOrders($deliver_id){
    $orderIds   = $this->getCompletedOrderIDs($deliver_id);
  
    
    if(!$orderIds){
        return false;
    }
    $orders = [];
    foreach($orderIds as $order){
        $orderDetails = $this->getOrderDetailsByOrderId($order->order_id,$order->order_type);
        array_push($orders,$orderDetails);
    }
        if($orders){
            return $orders;
        }else{
            return false;
        }
        

}




// public function getDeliveryCompletedOrders($order_id,$order_type,$order_item_id){
//     $query ="SELECT  
//     o_items.*,
//     o_items.order_item_id AS order_item_id,
//     u_seller.name AS seller_name,
//     o_items_.deliver_fee AS deliver_fee,
//     u_seller.user_id AS seller_user_id,
//     u_seller.address AS seller_address,
//     u_seller.mobile AS seller_mobile,
//     u_seller.city AS seller_city,
//     u_buyer.name AS buyer_name,
//     u_buyer.user_id AS buyer_user_id,
//     od.order_id AS order_id,
//     od.order_city AS order_city,
//     od.order_address AS order_address,
//     od.order_mobile AS order_mobile,
//     s.prof_img AS seller_img,
//     b.prof_img AS buyer_img,
//     COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
//     COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
//     i.item_img,
//     i.name AS item_name,
//     i.unit AS item_unit
// FROM
//     -- order_items
//     order_items o_items
// JOIN
//     orders od ON o_items.order_id = od.order_id    
// JOIN 
//     sellers s ON o_items.seller_id = s.seller_id
// JOIN 
//     users u_seller ON s.user_id = u_seller.user_id
// JOIN 
//     buyers b ON o_items.buyer_id = b.buyer_id
// JOIN 
//     users u_buyer ON b.user_id = u_buyer.user_id
// LEFT JOIN 
//     delivers d ON o_items.deliver_id = d.deliver_id
// LEFT JOIN 
//     users u_deliver ON d.user_id = u_deliver.user_id
// JOIN
//     items_market i ON o_items.item_id = i.item_id
// WHERE
//     od.order_id = :order_id
//         AND
//     od_order_type = :order_type
//         AND
//     o_items.order_item_id = :order_item_id
        

// ORDER BY o_items.order_date DESC
// ";

// $this->db->query($query);
// $this ->db ->bind(':order_item_id',$order_item_id);
// $this ->db ->bind(':order_type',$order_type);
// $this ->db ->bind(':order_id',$order_id);

// $row=$this->db->single();
// if($row){
// return $row;
// }else{
// return false;
// }
// }




// Recommended Order-----------------------------------------

public function getDeliveryCity($deliver_id){

    $query = "SELECT 
                u.city 
              FROM
                users u
              JOIN
                delivers d ON u.user_id = d.user_id
              WHERE
                deliver_id =:deliver_id
                ";
    $this->db->query($query);
    $this->db->bind(':deliver_id',$deliver_id);
    $row = $this->db->single();
    // var_dump($row);
    if($row){
        return $row;
    }else{
        return false;
    }
}



public function getRecommendedOrderIDs($deliver_id){

    
    $row = $this->getDeliveryCity($deliver_id);
    $city = $row->city;
    // var_dump($city);

    $query ="SELECT 
    o_items.order_id,
    o_items.order_item_id,
    o.order_type,
    o.order_date,
    o_items.order_status,
    i.district
FROM 
    order_items o_items
JOIN 
    orders AS o ON o_items.order_id = o.order_id
JOIN
    items_market AS i ON o_items.item_id = i.item_id
WHERE 
    o_items.order_status = 'pending' AND
    i.district = :district

UNION

SELECT 
    o_items_ac.order_id,
    o_items_ac.order_item_id,
    o.order_type,
    o.order_date,
    o_items_ac.order_status,
    a.district
FROM 
    order_items_ac o_items_ac
JOIN 
    orders o ON o_items_ac.order_id = o.order_id
JOIN
    auction AS a ON o_items_ac.auction_id = a.auction_ID
WHERE 
    o_items_ac.order_status = 'pending' AND a.district = :district

UNION

SELECT 
    o_items_rq.order_id,
    o_items_rq.order_item_id,
    o.order_type,
    o.order_date,
    o_items_rq.order_status,
    r.district
FROM 
    order_items_rq o_items_rq
JOIN 
    orders o ON o_items_rq.order_id = o.order_id
JOIN
    requests AS r ON o_items_rq.req_id = r.request_ID 
WHERE 
    o_items_rq.order_status = 'pending' AND r.district = :district

ORDER BY order_date DESC;
"

;
    $this->db->query($query);
    $this->db->bind(':district',$city);
    // $this->db->bind(':seller_id',$seller_id);
    $row=$this->db->resultSet();
    if($row){
        return $row;
    }else{
        return false;
    }
}





public function getRecommendedOrders($deliver_id){
    $orderIds   = $this->getRecommendedOrderIDs($deliver_id);
  
    
    if(!$orderIds){
        return false;
    }
    $orders = [];
    foreach($orderIds as $order){
        $orderDetails = $this->getOrderDetailsByOrderId($order->order_id,$order->order_type);
        array_push($orders,$orderDetails);
    }
        if($orders){
            return $orders;
        }else{
            return false;
        }
        

}

public function getDeliverReviewsById($deliver_id){

   $query = "SELECT
                    dr.review AS review,
                    dr.posted_date AS o_date,
                    o.quantity AS quantity,
                    i.name AS item_name,
                   
                    u.name AS buyer_name,
                    u.address AS buyer_address
                FROM 
                    delivery_review dr
                JOIN
                    order_items o ON dr.item_id = o.item_id
                JOIN
                    items_market i ON i.item_id = o.item_id
                JOIN
                    buyers b ON o.buyer_id = b.buyer_id
                JOIN
                    users u ON u.user_id = b.user_id
                WHERE
                    dr.deliver_id = :deliver_id

                UNION

                SELECT
                    dr.review,
                    dr.posted_date,
                    oac.quantity,
                    a.name AS item_name,
                 
                    u.name AS buyer_name,
                    u.address AS buyer_address
                FROM 
                    delivery_review dr
                JOIN
                    order_items_ac oac ON dr.auction_ID = oac.auction_id
                JOIN
                    auction a ON a.auction_ID = oac.auction_id
                JOIN
                    buyers b ON oac.buyer_id = b.buyer_id
                JOIN
                    users u ON u.user_id = b.user_id
                WHERE
                    dr.deliver_id = :deliver_id

                UNION

                SELECT
                    dr.review,
                    dr.posted_date,
                    orq.quantity,
                    r.name AS item_name,
                    
                    u.name AS buyer_name,
                    u.address AS buyer_address
                FROM 
                    delivery_review dr
                JOIN
                    order_items_rq orq ON dr.request_ID = orq.req_id
                JOIN
                    requests r ON r.request_ID = orq.req_id
                JOIN
                    buyers b ON orq.buyer_id = b.buyer_id
                JOIN
                    users u ON u.user_id = b.user_id
                WHERE
                    dr.deliver_id = :deliver_id

                ORDER BY
                   o_date DESC;
                ";

       $this->db->query($query);
       $this->db->bind(':deliver_id',$deliver_id);
       var_dump($deliver_id);
       $row = $this->db->resultSet();
       var_dump($row);

       if($row){
        return $row;
    }else{
        return false;
    }
}


public function getAucID($id){
    $this->db->query('SELECT auction_id FROM order_items_ac WHERE order_id =:id');
    $this->db->bind(':id',$id);

    $row = $this->db->Single();

    if($row){
        return $row->auction_id;
    }
    else{
        return false;
    }
}


public function getOrderTypebyID($id){

    $this->db->query('SELECT * FROM orders WHERE order_id=:id');
    $this->db->bind(':id',$id);

    $row = $this->db->Single();

    if($row){
        return $row->order_type;
    }
    else{
        return false;
    }
}

public function getDetailsforInvoice($seller_id,$order_item_id,$order_id,$type){

    
    if($type == 'PURCHASE'){
        $query = 'SELECT 
                    order_items.*,
                    orders.*,
                    buyers.prof_img AS buyer_img,
                    u_buyer.name AS buyer_name,
                    u_buyer.address AS buyer_address,
                    u_deliver.name AS deliver_name,
                    items_market.*
                    FROM
                    order_items
                    JOIN
                    orders ON
                    order_items.order_id = orders.order_id
                    JOIN
                    buyers ON
                    orders.buyer_id = buyers.buyer_id
                    JOIN
                    users u_buyer ON
                    buyers.user_id = u_buyer.user_id
                    JOIN
                    delivers ON
                    order_items.deliver_id = delivers.deliver_id
                    JOIN
                    users u_deliver ON
                    delivers.user_id = u_deliver.user_id
                    JOIN
                    items_market ON
                    order_items.item_id = items_market.item_id
                    WHERE
                    order_items.order_item_id = :order_item_id AND
                    order_items.order_id = :order_id AND
                    order_items.seller_id = :seller_id';
     
        $this->db->query($query);
        $this->db->bind(':order_item_id', $order_item_id);
        $this->db->bind(':order_id', $order_id);
        $this->db->bind(':seller_id', $seller_id);
    
        $row = $this->db->Single();
        if($row){
            return $row;
        } else {
            return false;
        }
    }
    elseif($type == 'AUCTION'){
        $query = 'SELECT 
                    order_items_ac.*,
                    orders.*,
                    buyers.prof_img AS buyer_img,
                    u_buyer.name AS buyer_name,
                    u_buyer.address AS buyer_address,
                    u_deliver.name AS deliver_name,
                    auction.*
                    FROM
                    order_items_ac
                    JOIN
                    orders ON
                    order_items_ac.order_id = orders.order_id
                    JOIN
                    buyers ON
                    orders.buyer_id = buyers.buyer_id
                    JOIN
                    users u_buyer ON
                    buyers.user_id = u_buyer.user_id
                    JOIN
                    delivers ON
                    order_items_ac.deliver_id = delivers.deliver_id
                    JOIN
                    users u_deliver ON
                    delivers.user_id = u_deliver.user_id
                    JOIN
                    auction ON
                    order_items_ac.auction_id = auction.auction_ID
                    WHERE
                    order_items_ac.order_item_id = :order_item_id AND
                    order_items_ac.order_id = :order_id AND
                    order_items_ac.seller_id = :seller_id';
    
        $this->db->query($query);
        $this->db->bind(':order_item_id', $order_item_id);
        $this->db->bind(':order_id', $order_id);
        $this->db->bind(':seller_id', $seller_id);
    
        $row = $this->db->Single();
        if($row){
            return $row;
        } else {
            return false;
        }
    }
    elseif($type =='REQUEST'){
        $query = 'SELECT 
                    order_items_rq.*,
                    orders.*,
                    buyers.prof_img AS buyer_img,
                    u_buyer.name AS buyer_name,
                    u_buyer.address AS buyer_address,
                    u_deliver.name AS deliver_name,
                    requests.*
                    FROM
                    order_items_rq
                    JOIN
                    orders ON
                    order_items_rq.order_id = orders.order_id
                    JOIN
                    buyers ON
                    orders.buyer_id = buyers.buyer_id
                    JOIN
                    users u_buyer ON
                    buyers.user_id = u_buyer.user_id
                    JOIN
                    delivers ON
                    order_items_rq.deliver_id = delivers.deliver_id
                    JOIN
                    users u_deliver ON
                    delivers.user_id = u_deliver.user_id
                    JOIN
                    requests ON
                    order_items_rq.req_id = requests.request_ID
                    WHERE
                    order_items_rq.order_item_id = :order_item_id AND
                    order_items_rq.order_id = :order_id AND
                    order_items_rq.seller_id = :seller_id';
    
        $this->db->query($query);
        $this->db->bind(':order_item_id', $order_item_id);
        $this->db->bind(':order_id', $order_id);
        $this->db->bind(':seller_id', $seller_id);
    
        $row = $this->db->Single();
        if($row){
            return $row;
        } else {
            return false;
        }
    }
    

}

public function getDeliverReviews($deliver_id){
    $query = "SELECT
                dr.review,
                dr.posted_date AS p_date,
                u.name AS buyer_name,
                order_item_id AS item_id,
                order_type

                FROM 
                    delivery_review dr
                JOIN
                    buyers b ON b.buyer_id = dr.buyer_id
                JOIN
                    users u ON u.user_id = b.user_id
                WHERE 
                    deliver_id = :deliver_id
                ORDER BY 
                    p_date"
                         ;
                
                $this->db->query($query);
                $this->db->bind(':deliver_id',$deliver_id);
                $row = $this->db->resultSet();

                if($row){
                    return $row;
                }else{
                    return false;
                }

}

public function getOrderComplainStatus($qc_id){
        $query = 'SELECT qc_status,buyer_message,buyer_img FROM quality_check WHERE qc_id = :qc_id';

    $this->db->query($query);
    $this->db->bind(':qc_id',$qc_id);

    $row = $this->db->single();

    if($row){
        return $row;
    }else{
        return false;
    }
}

public function GetOrderQualityCheckInfo($order_type,$order_item_id,$order_id){
    $this->db->query(
        'SELECT * FROM quality_check WHERE order_item_id=:order_item_id AND order_id=:order_id AND order_type=:order_type');

    $this->db->bind('order_item_id',$order_item_id);
    $this->db->bind('order_id',$order_id);
    $this->db->bind('order_type',$order_type);
    $row = $this->db->single();

    if($row){
        return $row;
    }
    else{
        return false;
    }

}

public function getQualityCheckOrders(){
    $query = "SELECT *
                FROM quality_check
                WHERE qc_status != 'not_raised'
                ORDER BY complain_date  DESC";
                ;

    $this->db->query($query);
    $row = $this->db->resultSet();

    if($row){
        return $row;
    }else{
        return false;
    }

}

public function getPenaltyOrders(){
    $query = "SELECT *
    FROM penalty
    ORDER BY penalty_date  DESC";
$this->db->query($query);
$row = $this->db->resultSet();

if($row){
return $row;
}else{
return false;
}
    
}

public function getQualityCheckDetails($qc_id){
    $query = "SELECT *
                FROM quality_check
                WHERE qc_id = :qc_id";
                ;

    $this->db->query($query);
    $this->db->bind(':qc_id',$qc_id);
    $row = $this->db->single();

    if($row){
        return $row;
    }else{
        return false;
    }

}

public function getinfoIM($order_item_id,$order_id){

    $this->db->query('SELECT order_items.*,quality_check.qc_id FROM order_items JOIN quality_check ON quality_check.order_item_id = order_items.order_item_id WHERE order_items.order_item_id=:order_item_id AND order_items.order_id=:order_id');

    $this->db->bind('order_item_id',$order_item_id);
    $this->db->bind('order_id',$order_id);
    $row = $this->db->single();

    if($row){
        return $row;
    }
    else{
        return false;
    }
}

public function getinfoAC($order_item_id,$order_id){

    $this->db->query('SELECT order_items_ac.*,quality_check.qc_id FROM order_items_ac JOIN quality_check ON quality_check.order_item_id = order_items_ac.order_item_id WHERE order_items_ac.order_item_id=:order_item_id AND order_items_ac.order_id=:order_id');

    $this->db->bind('order_item_id',$order_item_id);
    $this->db->bind('order_id',$order_id);
    $row = $this->db->single();

    if($row){
        return $row;
    }
    else{
        return false;
    }
}

public function getinfoRQ($order_item_id,$order_id){

    $this->db->query('SELECT  order_items_rq.*,quality_check.qc_id FROM order_items_rq
    JOIN quality_check ON quality_check.order_item_id = order_items_rq.order_item_id WHERE order_items_rq.order_item_id=:order_item_id AND order_items_rq.order_id=:order_id');

    $this->db->bind('order_item_id',$order_item_id);
    $this->db->bind('order_id',$order_id);
    $row = $this->db->single();

    if($row){
        return $row;
    }
    else{
        return false;
    }
}



public function PenaltySeller($data,$type){
    $query = 'INSERT INTO penalty(order_item_id,order_id,order_type,qc_id,penalty_type,seller_id,buyer_id,deliver_id,penalty_amount,user_type)
    VALUES (:order_item_id,:order_id,:order_type,:qc_id,"SELLER_RETURN",:seller_id,:buyer_id,:deliver_id,:penalty_amount,:user_type)';

    $this->db->query($query);
    $this->db->bind(':order_item_id',$data->order_item_id);
    $this->db->bind(':order_id',$data->order_id);
    $this->db->bind(':order_type',$type);
    $this->db->bind(':qc_id',$data->qc_id);
    $this->db->bind(':seller_id',$data->seller_id);
    $this->db->bind(':buyer_id',$data->buyer_id);
    $this->db->bind(':deliver_id',$data->deliver_id);
    $this->db->bind(':penalty_amount',$data->deliver_fee);
    $this->db->bind(':user_type',"seller");

    if($this->db->execute()){
        if($this->ComplaintQuality($data->order_item_id,$data->order_id,$type)){

            return true;
        }else{
            return false;
        }
    }
    else{
        return false;
    }

    
}

public function PenaltyDeliver($data,$type){

    $query = 'INSERT INTO penalty(order_item_id,order_id,order_type,qc_id,penalty_type,seller_id,buyer_id,deliver_id,penalty_amount,user_type)
    VALUES (:order_item_id,:order_id,:order_type,:qc_id,"DELIVERY_RETURN",:seller_id,:buyer_id,:deliver_id,:penalty_amount,:user_type)';

    $this->db->query($query);
    $this->db->bind(':order_item_id',$data->order_item_id);
    $this->db->bind(':order_id',$data->order_id);
    $this->db->bind(':order_type',$type);
    $this->db->bind(':qc_id',$data->qc_id);
    $this->db->bind(':seller_id',$data->seller_id);
    $this->db->bind(':buyer_id',$data->buyer_id);
    $this->db->bind(':deliver_id',$data->deliver_id);
    $this->db->bind(':penalty_amount',$data->deliver_fee);
    $this->db->bind(':user_type',"deliver");

    if($this->db->execute()){
        if($this->ComplaintQuality($data->order_item_id,$data->order_id,$type)){

            return true;
        }else{
            return false;
        }
    }
    else{
        return false;
    }

    
}

// -----------------------------------------------------------------------------------

public function test_get_reviews_orders($deliver_id){
    
    $orderIds   = $this->test_get_reviews_OrderIDs($deliver_id);
   

    
    if(!$orderIds){
        return false;
    }
    $orders = [];
    foreach($orderIds as $order){
        $orderDetails = $this->test_get_review_OrderDetailsByOrderId($order->order_id,$order->order_type);
        array_push($orders,$orderDetails);
    }
        if($orders){
            return $orders;
        }else{
            return false;
        }
    }

public function sellerPurchaseOrderDetails($seller_id){

    $query = 'SELECT
              COUNT(*) AS order_count,
              SUM(total_price) AS Prevenue
              FROM 
              order_items
              WHERE
              seller_id = :seller_id';

    $this->db->query($query);
    $this->db->bind(':seller_id', $seller_id);

    $row = $this->db->Single();

    if($row){
       return $row;
    }
    else{
        return false;
    }
}


public function sellerAuctionOrderDetails($seller_id){

    $query = 'SELECT
              COUNT(*) AS order_count,
              SUM(total_price) AS Arevenue
              FROM 
              order_items_ac
              WHERE
              seller_id =:seller_id';

    $this->db->query($query);
    $this->db->bind(':seller_id',$seller_id);

    $row = $this->db->Single();

    if($row){
        return $row;
    }
    else{
        return false;
    }
}

public function sellerRequestOrderDetails($seller_id){

    $query = 'SELECT
              COUNT(*) AS order_count,
              SUM(total_price) AS Rrevenue
              FROM 
              order_items_rq
              WHERE
              seller_id =:seller_id';

    $this->db->query($query);
    $this->db->bind(':seller_id',$seller_id);

    $row = $this->db->Single();

    if($row){
        return $row;
    }
    else{
        return false;
    }
}



public function countmypenalty($id){

    $this->db->Query(
        'SELECT
        COUNT(*) AS penalty_count
        FROM
        penalty
        WHERE
        seller_id =:id AND user_type = "seller"'
    );

    $this->db->bind(':id',$id);

    $row = $this->db->Single();

    if($row){
        return $row;
    }
    else{
        return false;
    }
}

        



public function test_get_reviews_OrderIDs($deliver_id){
    $query ="SELECT 
    o_items.order_id,
    o.order_type,
    o.order_date,
    o_items.order_status
FROM 
    order_items o_items
JOIN 
    orders AS o ON o_items.order_id = o.order_id
WHERE 
    o_items.order_status = 'completed'

UNION

SELECT 
    o_items_ac.order_id,
    o.order_type,
    o.order_date,
    o_items_ac.order_status
FROM 
    order_items_ac o_items_ac
JOIN 
    orders o ON o_items_ac.order_id = o.order_id
WHERE 
    o_items_ac.order_status = 'completed'

    UNION

SELECT 
    o_items_rq.order_id,
    o.order_type,
    o.order_date,
    o_items_rq.order_status
FROM 
    order_items_rq o_items_rq
JOIN 
    orders o ON o_items_rq.order_id = o.order_id
WHERE 
    o_items_rq.order_status = 'completed'

ORDER BY 
order_date DESC"

;
    $this->db->query($query);
    // $this->db->bind(':seller_id',$seller_id);
    $row=$this->db->resultSet();
    
    if($row){
        return $row;
    }else{
        return false;
    }
}
public function test_get_review_OrderDetailsByOrderId($order_id,$order_type){
     $deliver_id = $_SESSION['deliver_id'];
    if($order_type == 'AUCTION'){
        $query = "SELECT 
                    o.*,
                    o_items_ac.*,
                    o_items_ac.order_status AS order_state,
                    i.name AS item_name,
                    i.unit AS item_unit,
                    i.price AS item_price,
                    i.item_img AS item_img,
                    u_seller.user_id AS seller_user_id,
                    u_seller.name AS seller_name,
                    u_seller.address AS seller_address,
                    u_seller.city AS seller_city,
                    u_seller.mobile AS seller_mobile,
                    s.prof_img AS seller_img,
                    s.seller_id AS seller_id,
                    b.buyer_id AS buyer_id,
                    u_buyer.user_id AS buyer_user_id,
                    u_buyer.name AS buyer_name,
                    u_buyer.address AS buyer_address,
                    u_buyer.city AS buyer_city,
                    u_buyer.mobile AS buyer_mobile,
                    b.prof_img AS buyer_img,
                    dr.review AS review,
                    dr.posted_date AS p_date,
                    COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
        COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
        COALESCE(d.deliver_id, 'No Deliver assigned') AS deliver_id,
        COALESCE(u_deliver.user_id, 'No Deliver assigned') AS deliver_user_id,
        COALESCE(d.prof_img, 'No Deliver assigned') AS deliver_img,
        v.vehicle_img,
        v.vehicle_model,
        v.vehicle_type,
        v.vehicle_brand,
        v.vehicle_number
                FROM
                    orders o
                JOIN
                    order_items_ac o_items_ac ON o.order_id = o_items_ac.order_id
                JOIN
                    auction i ON o_items_ac.auction_id = i.auction_id
                JOIN
                    sellers s ON o_items_ac.seller_id = s.seller_id
                JOIN
                    users u_seller ON s.user_id = u_seller.user_id
                JOIN 
                    buyers b ON o_items_ac.buyer_id = b.buyer_id
                JOIN 
                    users u_buyer ON b.user_id = u_buyer.user_id
                LEFT JOIN
                    delivers d ON o_items_ac.deliver_id = d.deliver_id
                LEFT JOIN
                    users u_deliver ON d.user_id = u_deliver.user_id
                LEFT JOIN
                    vehicle v ON u_deliver.user_id = v.user_id
                JOIN
                    delivery_review dr ON o_items_ac.order_item_id = dr.order_item_id
                WHERE
                    o.order_id = :order_id AND o.payment_status=1 AND dr.deliver_id = :deliver_id
                ";
    }elseif($order_type == 'PURCHASE'){

    $query = "SELECT 
                    o.*,
                    o_items.*,
                    o_items.order_status AS order_state,
                    i.name AS item_name,
                    i.unit AS item_unit,
                    i.price AS item_price,
                    i.item_img AS item_img,
                    u_seller.name AS seller_name,
                    u_seller.address AS seller_address,
                    u_seller.user_id AS seller_user_id,
                    u_seller.city AS seller_city,
                    u_seller.mobile AS seller_mobile,
                    s.prof_img AS seller_img,
                    u_buyer.name AS buyer_name,
                    u_buyer.address AS buyer_address,
                    u_buyer.city AS buyer_city,
                    u_buyer.mobile AS buyer_mobile,
                    b.prof_img AS buyer_img,
                    dr.review AS review,
                    dr.posted_date AS p_date,
                    COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
        COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
        COALESCE(d.deliver_id, 'No Deliver assigned') AS deliver_id,
        COALESCE(u_deliver.user_id, 'No Deliver assigned') AS deliver_user_id,
        COALESCE(d.prof_img, 'No Deliver assigned') AS deliver_img,
        v.vehicle_img,
        v.vehicle_model,
        v.vehicle_type,
        v.vehicle_brand,
        v.vehicle_number
            FROM
                order_items o_items
            JOIN
                orders o ON o_items.order_id = o.order_id
            JOIN
                items_market  i ON o_items.item_id = i.item_id
            JOIN
                sellers  s ON o_items.seller_id = s.seller_id
            JOIN
                users  u_seller ON s.user_id = u_seller.user_id
            JOIN
                buyers  b ON o_items.buyer_id = b.buyer_id
            JOIN
                users  u_buyer ON b.user_id = u_buyer.user_id
            LEFT JOIN
                delivers d ON o_items.deliver_id = d.deliver_id
            LEFT JOIN
                users u_deliver ON d.user_id = u_deliver.user_id
            LEFT JOIN
                    vehicle v ON u_deliver.user_id = v.user_id
             JOIN
                    delivery_review dr ON o_items.order_item_id = dr.order_item_id
            WHERE
                o_items.order_id = :order_id AND o.payment_status=1 AND dr.deliver_id = :deliver_id
            ";
            }elseif($order_type=="REQUEST"){

    $query = "SELECT 
                    o.*,
                    o_items_rq.*,
                    o_items_rq.order_status AS order_state,
                    r.name AS item_name,
                    r.unit AS item_unit,
                    r.acp_amount AS item_price,
                    r.req_img AS item_img,
                    u_seller.name AS seller_name,
                    u_seller.user_id AS seller_user_id,
                    u_seller.address AS seller_address,
                    u_seller.city AS seller_city,
                    u_seller.mobile AS seller_mobile,
                    s.prof_img AS seller_img,
                    u_buyer.name AS buyer_name,
                    u_buyer.address AS buyer_address,
                    u_buyer.city AS buyer_city,
                    u_buyer.mobile AS buyer_mobile,
                    b.prof_img AS buyer_img,
                    dr.review AS review,
                    dr.posted_date AS p_date,
                    COALESCE(u_deliver.name, 'No Deliver assigned') AS deliver_name,
                    COALESCE(u_deliver.mobile, 'No Deliver assigned') AS deliver_mobile,
                    COALESCE(d.deliver_id, 'No Deliver assigned') AS deliver_id,
                    COALESCE(u_deliver.user_id, 'No Deliver assigned') AS deliver_user_id,
                    COALESCE(d.prof_img, 'No Deliver assigned') AS deliver_img,
                    v.vehicle_img,
        v.vehicle_model,
        v.vehicle_type,
        v.vehicle_brand,
        v.vehicle_number
                FROM
                    order_items_rq o_items_rq
                JOIN
                    orders o ON o_items_rq.order_id = o.order_id
                JOIN
                    requests  r ON o_items_rq.req_id = r.request_ID
                JOIN
                    sellers  s ON o_items_rq.seller_id = s.seller_id
                JOIN
                    users  u_seller ON s.user_id = u_seller.user_id
                JOIN
                    buyers  b ON o_items_rq.buyer_id = b.buyer_id
                JOIN
                    users  u_buyer ON b.user_id = u_buyer.user_id
                LEFT JOIN
                    delivers d ON o_items_rq.deliver_id = d.deliver_id
                LEFT JOIN
                    users u_deliver ON d.user_id = u_deliver.user_id
                LEFT JOIN
                    vehicle v ON u_deliver.user_id = v.user_id
                    JOIN
                    delivery_review dr ON o_items_rq.order_item_id = dr.order_item_id
                WHERE
                    o_items_rq.order_id = :order_id AND o.payment_status=1 AND dr.deliver_id = :deliver_id";


            }
    $this->db->query($query);
    $this->db->bind(':order_id',$order_id);
    $this->db->bind(':deliver_id',$deliver_id);
    $row=$this->db->resultSet();
   
    if($row){
        return $row;
    }else{
        return false;
    }
}
        


public function getReviewsInsideOrder($order_id,$order_item_id,$type){
    
    $query=
                    "SELECT *

                        FROM 
                            delivery_review 
                        WHERE 
                            order_item_id=:order_item_id AND order_id=:order_id AND order_type=:type";



        $this->db->query($query);
        $this->db->bind(':order_item_id', $order_item_id);
        $this->db->bind(':order_id', $order_id);
        $this->db->bind(':type', $type);

        $row = $this->db->single();

        if($row){
            return $row;
        }else{
            return false;
        }

}



public function getpenaltyAmount($seller_id){

    $query = 'SELECT penalty_amount FROM penalty WHERE user_type ="seller" AND peenalized_status="NO" AND seller_id =:seller_id';

    $this->db->query($query);
    $this->db->bind(':seller_id',$seller_id);
    
    $row = $this->db->Single();
    return $row;

    if($row){
        $this->db->query('UPDATE
                         penalty
                         SET
                        peenalized_status="YES"
                        WHERE user_type ="seller" AND
                        seller_id =:seller_id');

       $this->db->query($query);
       $this->db->bind(':seller_id',$seller_id);
       if($this->db->execute()){
        return true;
       }
       else{
        return false;
       }

       return $row;
    }
    else{
        return false;
    }

}




public function getReviewOrders($deliver_id){
    $orders=$this->getDeliverReviewOrders($deliver_id);
        if($orders){
            return $orders;
        }else{
            return false;
        }
        

}

public function getDeliverReviewOrders($deliver_id){
    $query ="SELECT 
                 o_items.order_status AS order_state,
                 o_items.order_date AS order_date,
                 o_items.quantity AS quantity,
                 o_items.deliver_fee AS deliver_fee,
                 o_items.order_item_id AS order_item_id,
                 o_items.order_id AS order_id,
                 o_items.completed_date AS completed_date,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 i.name AS item_name,
                 i.unit AS item_unit,
                 i.item_img AS item_img,
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS seller_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile,
                 dr.review AS review,
                 b.prof_img AS buyer_img,
                dr.posted_date AS p_date
                
FROM 
    order_items o_items
JOIN
    sellers s  ON o_items.seller_id = s.seller_id
JOIN
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items.buyer_id = b.buyer_id
JOIN
    users u_buyer ON b.user_id = u_buyer.user_id
JOIN 
    orders o ON o_items.order_id = o.order_id
JOIN 
    items_market i ON o_items.item_id = i.item_id
JOIN
    delivery_review dr ON o_items.order_item_id = dr.order_item_id
WHERE 
    o_items.order_status = 'completed' AND o.payment_status = 1 AND dr.deliver_id = :deliver_id

UNION

SELECT 
                o_items_ac.order_status AS order_state,
                 o_items_ac.order_date AS order_date,
                 o_items_ac.quantity AS quantity,
                 o_items_ac.deliver_fee AS deliver_fee,
                 o_items_ac.order_item_id AS order_item_id,
                 o_items_ac.order_id AS order_id,
                 o_items_ac.completed_date AS completed_date,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 a.name AS item_name,
                 a.unit AS item_unit,
                 a.item_img AS item_img,
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS seller_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile,
                 dr.review AS review,
                 b.prof_img AS buyer_img,
                dr.posted_date AS p_date
FROM 
    order_items_ac o_items_ac
JOIN
    sellers s  ON o_items_ac.seller_id = s.seller_id
JOIN
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items_ac.buyer_id = b.buyer_id
JOIN
    users u_buyer ON b.user_id = u_buyer.user_id
JOIN 
    orders o ON o_items_ac.order_id = o.order_id
JOIN
    auction a ON o_items_ac.auction_id = a.auction_ID
JOIN
    delivery_review dr ON o_items_ac.order_item_id = dr.order_item_id
WHERE 
    o_items_ac.order_status = 'pending' AND o.payment_status = 1 AND dr.deliver_id = :deliver_id

    UNION

SELECT 
                o_items_rq.order_status AS order_state,
                 o_items_rq.order_date AS order_date,
                 o_items_rq.quantity AS quantity,
                 o_items_rq.deliver_fee AS deliver_fee,
                 o_items_rq.order_item_id AS order_item_id,
                 o_items_rq.order_id AS order_id,
                 o_items_rq.completed_date AS completed_date,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 r.name AS item_name,
                 r.unit AS item_unit,
                 r.req_img AS item_img,
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS seller_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile,
                 dr.review AS review,
                 b.prof_img AS buyer_img,
                dr.posted_date AS p_date
FROM 
    order_items_rq o_items_rq
JOIN
    sellers s  ON o_items_rq.seller_id = s.seller_id
JOIN
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items_rq.buyer_id = b.buyer_id
JOIN
    users u_buyer ON b.user_id = u_buyer.user_id
JOIN 
    orders o ON o_items_rq.order_id = o.order_id
JOIN 
    requests r ON o_items_rq.req_id = r.request_ID
JOIN
    delivery_review dr ON o_items_rq.order_item_id = dr.order_item_id
WHERE 
    o_items_rq.order_status = 'pending' AND o.payment_status = 1 AND dr.deliver_id = :deliver_id

ORDER BY order_date DESC
"

;
    $this->db->query($query);
    $this->db->bind(':deliver_id',$deliver_id);

    $row=$this->db->resultSet();
    if($row){
        return $row;
    }else{
        return false;
    }               
}




public function getRecoDeliverOrders($deliver_id){
    $orders=$this->getDeliverRecoOrders($deliver_id);
        if($orders){
            return $orders;
        }else{
            return false;
        }
        

}


public function getDeliverRecoOrders($deliver_id){

    $del_city = $this->getDeliveryCity($deliver_id);
    $city = $del_city->city;

    $query ="SELECT 
                 o_items.order_status AS order_state,
                 o_items.order_date AS order_date,
                 o_items.quantity AS quantity,
                 o_items.deliver_fee AS deliver_fee,
                 o_items.order_item_id AS order_item_id,
                 o_items.order_id AS order_id,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 i.name AS item_name,
                 i.unit AS item_unit,
                 
                 i.item_img AS item_img,
                 i.district AS district,
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS seller_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile,
                 i.address AS pickup_address    
                

FROM 
    order_items o_items
JOIN
    sellers s  ON o_items.seller_id = s.seller_id
JOIN
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items.buyer_id = b.buyer_id
JOIN
    users u_buyer ON b.user_id = u_buyer.user_id
JOIN 
    orders o ON o_items.order_id = o.order_id
JOIN 
    items_market i ON o_items.item_id = i.item_id
WHERE 
    o_items.order_status = 'pending' AND o.payment_status = 1 AND i.district=:district

UNION

SELECT 
                o_items_ac.order_status AS order_state,
                 o_items_ac.order_date AS order_date,
                 o_items_ac.quantity AS quantity,
                 o_items_ac.deliver_fee AS deliver_fee,
                 o_items_ac.order_item_id AS order_item_id,
                 o_items_ac.order_id AS order_id,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 a.name AS item_name,
                 a.unit AS item_unit,
                 a.item_img AS item_img,
                 a.district AS district,
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS seller_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile,
                 a.address AS pickup_address  
                
FROM 
    order_items_ac o_items_ac
JOIN
    sellers s  ON o_items_ac.seller_id = s.seller_id
JOIN
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items_ac.buyer_id = b.buyer_id
JOIN
    users u_buyer ON b.user_id = u_buyer.user_id
JOIN 
    orders o ON o_items_ac.order_id = o.order_id
JOIN
    auction a ON o_items_ac.auction_id = a.auction_ID
WHERE 
    o_items_ac.order_status = 'pending' AND o.payment_status = 1 AND a.district=:district

    UNION

SELECT 
                o_items_rq.order_status AS order_state,
                 o_items_rq.order_date AS order_date,
                 o_items_rq.quantity AS quantity,
                 o_items_rq.deliver_fee AS deliver_fee,
                 o_items_rq.order_item_id AS order_item_id,
                 o_items_rq.order_id AS order_id,
                 o.order_address AS order_address,
                 o.order_city AS order_city,
                 o.order_type AS order_type,
                 r.name AS item_name,
                 r.unit AS item_unit,
                 r.req_img AS item_img,
                 r.district AS district,
                 u_seller.name AS seller_name,
                 u_seller.user_id AS seller_user_id,
                 u_seller.address AS pickup_address,
                 u_seller.city AS seller_city,
                 u_seller.mobile AS seller_mobile,
                 s.prof_img AS seller_img,
                 u_buyer.name AS buyer_name,
                 u_buyer.address AS buyer_address,
                 u_buyer.city AS buyer_city,
                 u_buyer.mobile AS buyer_mobile,
                 r.req_address AS request_address    
                 
                 
FROM 
    order_items_rq o_items_rq
JOIN
    sellers s  ON o_items_rq.seller_id = s.seller_id
JOIN
    users u_seller ON s.user_id = u_seller.user_id
JOIN 
    buyers b ON o_items_rq.buyer_id = b.buyer_id
JOIN
    users u_buyer ON b.user_id = u_buyer.user_id
JOIN 
    orders o ON o_items_rq.order_id = o.order_id
JOIN 
    requests r ON o_items_rq.req_id = r.request_ID
WHERE 
    o_items_rq.order_status = 'pending' AND o.payment_status = 1 AND r.district=:district 

ORDER BY order_date DESC
"

;
    $this->db->query($query);
    $this->db->bind(':district',$city);
    $row=$this->db->resultSet();
    if($row){
        return $row;
    }else{
        return false;
    }               
}



public function deleteAllOrdersByOrderId($order_id){
    $query = "
        DELETE orders, order_items, order_items_ac, order_items_rq
        FROM orders
        LEFT JOIN order_items_ac ON orders.order_id = order_items_ac.order_id 
        LEFT JOIN order_items_rq ON orders.order_id = order_items_rq.order_id 
        LEFT JOIN order_items ON orders.order_id = order_items.order_id
        WHERE orders.order_id = :order_id
    ";
    $this->db->query($query);
    $this->db->bind(":order_id", $order_id);
    if($this->db->execute()){
        var_dump("done");
    };
}







}

?>