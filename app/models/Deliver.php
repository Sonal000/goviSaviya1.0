<?php
class Deliver{
    private $db;

    
    public function __construct(){
        $this -> db = new Database;
    }

    //register fucntion
    public function register($data){
        $this->db->query('INSERT INTO 
                          users (name,email,mobile,address,city,password,user_type) 
                          VALUES(:name,:email,:mobile,:address,:city,:password,:user_type)'
                          );


        $this ->db ->bind(':name',$data['name']);
        $this ->db ->bind(':mobile',$data['mobile']);
        $this ->db ->bind(':email',$data['email']);
        $this ->db ->bind(':address',$data['address']);
        $this ->db ->bind(':city',$data['city']);
        $this ->db ->bind(':password',$data['password']);
        $this ->db ->bind(':user_type','deliver');
  
        //execute
        if ($this->db->execute()) {
         // Get the ID of the newly inserted user
         $user_id = $this->db->lastInsertId();
         // $user_id = $this->db->stmt->lastInsertId();
 
         // Now insert the user_id into the delivers table
         $this->db->query('INSERT INTO delivers (user_id) VALUES(:user_id)');
         $this->db->bind(':user_id', $user_id);
 
         // Execute the delivers insertion query
         if ($this->db->execute()) {
             return $user_id;
         } else {
             return false;
         }
     } else {
         return false;
     }
        
    }

    public function getProfileInfo($user_id){
        $this->db->query(
                'SELECT users.*, delivers.* 
                FROM users
                LEFT JOIN delivers ON users.user_id = delivers.user_id
                WHERE users.user_id = :user_id');

        $this ->db ->bind(':user_id',$user_id);

        return $this->db->single();
    }

    public function getDeliverInfo($id) {
        // Corrected SQL query and parameter binding
        $this->db->query("SELECT delivers.*, users.* 
                         FROM delivers 
                         RIGHT JOIN users ON delivers.user_id = users.user_id 
                         WHERE delivers.deliver_id = :deliver_id");
        
        $this->db->bind(':deliver_id', $id);
        
        $this->db->execute(); // Execute the query
        $row = $this->db->single();
        
        
        if ($row) {
            return $row;
        } else {
            return false;
        }
      }

    public function getVehicleInfo($user_id){
        $this->db->query(
                'SELECT vehicle_brand,vehicle_model,vehicle_number,vehicle_id
                FROM vehicle
                WHERE user_id = :user_id');

        $this ->db ->bind(':user_id',$user_id);

        return $this->db->single();
        
    }

    public function delVehicle($id){
        $this->db->query(
            'DELETE FROM vehicle WHERE 
             vehicle_id =:vehicle_id');

        $this->db->bind(':vehicle_id',$id);
        

        if ($this->db->execute()) {   
            return true;
        }else{
            return false;
        }

    }

    public function deliverAvailability($deliver_id){
        $query="SELECT availability 
                FROM delivers 
                WHERE deliver_id=:deliver_id";
        $this->db->query($query);
        $this->db->bind(':deliver_id',$deliver_id);
        $row=$this->db->single();
        if(($row->count)>0){
            return false;
        }else{
            return true;
        }
    }




    public function updateProfile($data){
        $this->db->query(
                'UPDATE users SET 
                name=:name,
                address=:address,
                mobile=:mobile
                WHERE user_id =:user_id');
    
        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':mobile', $data['mobile']);
    
        if ($this->db->execute()) {
            return true;
            // $this->db->query(
            //     'UPDATE delivers SET 
            //     location=:location
            //     WHERE user_id =:user_id');

            // $this->db->bind(':user_id', $_SESSION['user_id']);
            // $this->db->bind(':location', $data['location']);


            // if ($this->db->execute()) {   
            //     return true;
            // }else{
            //     return false;
            // }
        } else {
            return false;
        }
    }
    

    

    public function updateAbout($data){


            $this->db->query(
                'UPDATE delivers SET 
                about=:about
                WHERE user_id =:user_id');

            $this->db->bind(':user_id', $_SESSION['user_id']);
            $this->db->bind(':about', $data['about']);

            if ($this->db->execute()) {   
                return true;
            }else{
                return false;
            }
    }

    public function updateProfileImage($data){
        $this->db->query(
            'UPDATE delivers SET 
            prof_img=:prof_img
            WHERE user_id =:user_id');

        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':prof_img', $data['prof_img']);

        if ($this->db->execute()) { 
            $_SESSION['user_image'] = $data['prof_img'];  
            return true;
        }else{
            return false;
        }
}

public function updateCoverImage($data){
        $this->db->query(
            'UPDATE delivers SET 
            cover_img=:cover_img
            WHERE user_id =:user_id');

        $this->db->bind(':user_id', $_SESSION['user_id']);
        $this->db->bind(':cover_img', $data['cover_img']);

        if ($this->db->execute()) {   
            return true;
        }else{
            return false;
        }
}

    //find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email= :email');
        $this ->db ->bind(':email',$email);

        $row = $this ->db -> single();

        //check row count
        if($this->db ->rowcount()>0){
            return true;
        } else{
            return false;
        }
    }

    public function findvehicle($id){
        $this->db->query('SELECT vehicle_brand,vehicle_model,vehicle_number FROM vehicle WHERE user_id=:user_id');
        $this ->db ->query(':user_id',$id);

        $row =$this ->db ->single();

        if($this->db ->rowcount()>0){
            return true;
        } else{
            return false;
        }
    }

    

    public function addVehicle($data){
       
        $this->db->query('INSERT INTO 
        vehicle (user_id,vehicle_type,vehicle_number,max_capacity,vehicle_brand,vehicle_model,vehicle_year) 
        VALUES(:user_id,:vehicle_type,:vehicle_number,:max_capacity,:vehicle_brand,:vehicle_model,:vehicle_year)'
        );

        $this ->db ->bind(':user_id',$data['deliver_id']);
        $this ->db ->bind(':vehicle_type',$data['vehicle_type']);
        $this ->db ->bind(':vehicle_number',$data['vehicle_number']);
        $this ->db ->bind(':max_capacity',$data['max_capacity']);
        $this ->db ->bind(':vehicle_brand',$data['vehicle_brand']);
        $this ->db ->bind(':vehicle_model',$data['vehicle_model']);
        $this ->db ->bind(':vehicle_year',$data['vehicle_year']);

        if ($this->db->execute()) {   
            return true;
        }else{
            return false;
        }
    }
    public function getOngoingOrdersDetails($id){

       $this->db->query('SELECT * from orders'); 
    }

    public function getTotalPurchaseOrdersCompleted($deliver_id){
        $query = "SELECT COUNT(*) AS total_purchase_orders
                    FROM order_items WHERE deliver_id=:deliver_id AND order_status='completed'";

        $this->db->query($query);
        $this->db->bind(':deliver_id',$deliver_id);
        $row = $this->db->Single();

        if($row){
            return $row->total_purchase_orders;
        }else{
            return false;
        }
    }

    public function getTotalAuctionOrdersCompleted($deliver_id){
        $query = "SELECT COUNT(*) AS total_purchase_orders
                    FROM order_items_ac WHERE deliver_id=:deliver_id AND order_status='completed'";

        $this->db->query($query);
        $this->db->bind(':deliver_id',$deliver_id);
        $row = $this->db->Single();

        if($row){
            return $row->total_purchase_orders;
        }else{
            return false;
        }
    }

    public function getTotalRequestOrdersCompleted($deliver_id){
        $query = "SELECT COUNT(*) AS total_purchase_orders
                    FROM order_items_rq WHERE deliver_id=:deliver_id AND order_status='completed'";

        $this->db->query($query);
        $this->db->bind(':deliver_id',$deliver_id);
        $row = $this->db->Single();

        if($row){
            return $row->total_purchase_orders;
        }else{
            return false;
        }
    }
        
    //Revenue

    public function getTotalPurchaseRevenue($deliver_id){
        $query = "SELECT 
        SUM(deliver_fee) AS total_revenue
    FROM 
        order_items
    WHERE 
        deliver_id = :deliver_id AND order_status = 'completed'
    ";

        $this->db->query($query);
        $this->db->bind(':deliver_id',$deliver_id);
        $row = $this->db->Single();

        if($row){
            return $row;
        }else{
            return false;
        }
    }

    public function getTotalAuctionRevenue($deliver_id){
        $query = "SELECT 
        SUM(deliver_fee) AS total_revenue
    FROM 
        order_items_ac
    WHERE 
        deliver_id = :deliver_id AND order_status = 'completed'
    ";

        $this->db->query($query);
        $this->db->bind(':deliver_id',$deliver_id);
        $row = $this->db->Single();

        if($row){
            return $row;
        }else{
            return false;
        }
    }

    public function getTotalRequestRevenue($deliver_id){
        $query = "SELECT 
        SUM(deliver_fee) AS total_revenue
    FROM 
        order_items_rq
    WHERE 
        deliver_id = :deliver_id AND order_status = 'completed'
    ";

        $this->db->query($query);
        $this->db->bind(':deliver_id',$deliver_id);
        $row = $this->db->Single();

        if($row){
            return $row;
        }else{
            return false;
        }
    }


    public function getThisPurchase($deliver_id){
        $query = "SELECT COUNT(*) AS month_orders_count
        FROM order_items
        WHERE 
            order_status = 'completed'
            AND deliver_id = :deliver_id
            AND YEAR(completed_date) = YEAR(CURRENT_DATE())
            AND MONTH(completed_date) = MONTH(CURRENT_DATE())
        ";

        $this->db->query($query);
        $this->db->bind(':deliver_id',$deliver_id);
        $row = $this->db->Single();

        if($row){
            return $row;
        }else{
            return false;
        }
    }

    public function getThisAuction($deliver_id){
        $query = "SELECT COUNT(*) AS month_orders_count
        FROM order_items_ac
        WHERE 
            order_status = 'completed'
            AND deliver_id = :deliver_id
            AND YEAR(completed_date) = YEAR(CURRENT_DATE())
            AND MONTH(completed_date) = MONTH(CURRENT_DATE())
        ";

        $this->db->query($query);
        $this->db->bind(':deliver_id',$deliver_id);
        $row = $this->db->Single();

        if($row){
            return $row;
        }else{
            return false;
        }
    }

    public function getThisRequest($deliver_id){
        $query = "SELECT COUNT(*) AS month_orders_count
        FROM order_items_rq
        WHERE 
            order_status = 'completed'
            AND deliver_id = :deliver_id
            AND YEAR(completed_date) = YEAR(CURRENT_DATE())
            AND MONTH(completed_date) = MONTH(CURRENT_DATE())
        ";

        $this->db->query($query);
        $this->db->bind(':deliver_id',$deliver_id);
        $row = $this->db->Single();

        if($row){
            return $row;
        }else{
            return false;
        }
    }



    public function getPrevPurchase($deliver_id){
        $query = "SELECT COUNT(*) AS month_orders_count
        FROM order_items
        WHERE 
            order_status = 'completed'
            AND deliver_id = :deliver_id
            AND YEAR(completed_date) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH)
            AND MONTH(completed_date) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH)
        ";

        $this->db->query($query);
        $this->db->bind(':deliver_id',$deliver_id);
        $row = $this->db->Single();

        if($row){
            return $row;
        }else{
            return false;
        }
    }

    public function getPrevAuction($deliver_id){
        $query = "SELECT COUNT(*) AS month_orders_count
        FROM order_items_ac
        WHERE 
            order_status = 'completed'
            AND deliver_id = :deliver_id
            AND YEAR(completed_date) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH)
            AND MONTH(completed_date) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH)
        ";

        $this->db->query($query);
        $this->db->bind(':deliver_id',$deliver_id);
        $row = $this->db->Single();

        if($row){
            return $row;
        }else{
            return false;
        }
    }

    public function getPrevRequest($deliver_id){
        $query = "SELECT COUNT(*) AS month_orders_count
        FROM order_items_rq
        WHERE 
            order_status = 'completed'
            AND deliver_id = :deliver_id
            AND YEAR(completed_date) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH)
            AND MONTH(completed_date) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH)
        ";

        $this->db->query($query);
        $this->db->bind(':deliver_id',$deliver_id);
        $row = $this->db->Single();

        if($row){
            return $row;
        }else{
            return false;
        }
    }

    public function getPrevPrevPurchase($deliver_id){
        $query = "SELECT COUNT(*) AS month_orders_count
        FROM order_items
        WHERE 
            order_status = 'completed'
            AND deliver_id = :deliver_id
            AND YEAR(completed_date) = YEAR(CURRENT_DATE() - INTERVAL 2 MONTH)
            AND MONTH(completed_date) = MONTH(CURRENT_DATE() - INTERVAL 2 MONTH)
        ";
    
        $this->db->query($query);
        $this->db->bind(':deliver_id', $deliver_id);
        $row = $this->db->Single();
    
        if($row){
            return $row;
        } else {
            return false;
        }
    }
    
    public function getPrevPrevAuction($deliver_id){
        $query = "SELECT COUNT(*) AS month_orders_count
        FROM order_items_ac
        WHERE 
            order_status = 'completed'
            AND deliver_id = :deliver_id
            AND YEAR(completed_date) = YEAR(CURRENT_DATE() - INTERVAL 2 MONTH)
            AND MONTH(completed_date) = MONTH(CURRENT_DATE() - INTERVAL 2 MONTH)
        ";
    
        $this->db->query($query);
        $this->db->bind(':deliver_id', $deliver_id);
        $row = $this->db->Single();
    
        if($row){
            return $row;
        } else {
            return false;
        }
    }
    
    public function getPrevPrevRequest($deliver_id){
        $query = "SELECT COUNT(*) AS month_orders_count
        FROM order_items_rq
        WHERE 
            order_status = 'completed'
            AND deliver_id = :deliver_id
            AND YEAR(completed_date) = YEAR(CURRENT_DATE() - INTERVAL 2 MONTH)
            AND MONTH(completed_date) = MONTH(CURRENT_DATE() - INTERVAL 2 MONTH)
        ";
    
        $this->db->query($query);
        $this->db->bind(':deliver_id', $deliver_id);
        $row = $this->db->Single();
    
        if($row){
            return $row;
        } else {
            return false;
        }
    }

    //This month Revenue

    public function getCurrentMonthPurchaseRevenue($deliver_id){
        $query = "SELECT 
            SUM(deliver_fee) AS total_revenue
        FROM 
            order_items
        WHERE 
            deliver_id = :deliver_id 
            AND order_status = 'completed' 
            AND YEAR(completed_date) = YEAR(CURRENT_DATE()) 
            AND MONTH(completed_date) = MONTH(CURRENT_DATE())";
    
        $this->db->query($query);
        $this->db->bind(':deliver_id', $deliver_id);
        $row = $this->db->Single();
    
        if($row){
            return $row;
        }else{
            return false;
        }
    }
    
    public function getCurrentMonthAuctionRevenue($deliver_id){
        $query = "SELECT 
            SUM(deliver_fee) AS total_revenue
        FROM 
            order_items_ac
        WHERE 
            deliver_id = :deliver_id 
            AND order_status = 'completed' 
            AND YEAR(completed_date) = YEAR(CURRENT_DATE()) 
            AND MONTH(completed_date) = MONTH(CURRENT_DATE())";
    
        $this->db->query($query);
        $this->db->bind(':deliver_id', $deliver_id);
        $row = $this->db->Single();
    
        if($row){
            return $row;
        }else{
            return false;
        }
    }
    
    public function getCurrentMonthRequestRevenue($deliver_id){
        $query = "SELECT 
            SUM(deliver_fee) AS total_revenue
        FROM 
            order_items_rq
        WHERE 
            deliver_id = :deliver_id 
            AND order_status = 'completed' 
            AND YEAR(completed_date) = YEAR(CURRENT_DATE()) 
            AND MONTH(completed_date) = MONTH(CURRENT_DATE())";
    
        $this->db->query($query);
        $this->db->bind(':deliver_id', $deliver_id);
        $row = $this->db->Single();
    
        if($row){
            return $row;
        }else{
            return false;
        }
    }
    

    //Prev Month Revenue

    public function getPrevMonthPurchaseRevenue($deliver_id){
        $query = "SELECT 
            SUM(deliver_fee) AS total_revenue
        FROM 
            order_items
        WHERE 
            deliver_id = :deliver_id 
            AND order_status = 'completed' 
            AND YEAR(completed_date) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH) 
            AND MONTH(completed_date) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH)";
    
        $this->db->query($query);
        $this->db->bind(':deliver_id', $deliver_id);
        $row = $this->db->Single();
    
        if($row){
            return $row;
        }else{
            return false;
        }
    }
    
    public function getPrevMonthAuctionRevenue($deliver_id){
        $query = "SELECT 
            SUM(deliver_fee) AS total_revenue
        FROM 
            order_items_ac
        WHERE 
            deliver_id = :deliver_id 
            AND order_status = 'completed' 
            AND YEAR(completed_date) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH) 
            AND MONTH(completed_date) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH)";
    
        $this->db->query($query);
        $this->db->bind(':deliver_id', $deliver_id);
        $row = $this->db->Single();
    
        if($row){
            return $row;
        }else{
            return false;
        }
    }
    
    public function getPrevMonthRequestRevenue($deliver_id){
        $query = "SELECT 
            SUM(deliver_fee) AS total_revenue
        FROM 
            order_items_rq
        WHERE 
            deliver_id = :deliver_id 
            AND order_status = 'completed' 
            AND YEAR(completed_date) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH) 
            AND MONTH(completed_date) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH)";
    
        $this->db->query($query);
        $this->db->bind(':deliver_id', $deliver_id);
        $row = $this->db->Single();
    
        if($row){
            return $row;
        }else{
            return false;
        }
    }

    //Prev prev month revenue

    public function getPrevPrevMonthPurchaseRevenue($deliver_id){
        $query = "SELECT 
            SUM(deliver_fee) AS total_revenue
        FROM 
            order_items
        WHERE 
            deliver_id = :deliver_id 
            AND order_status = 'completed' 
            AND YEAR(completed_date) = YEAR(CURRENT_DATE() - INTERVAL 2 MONTH) 
            AND MONTH(completed_date) = MONTH(CURRENT_DATE() - INTERVAL 2 MONTH)";
    
        $this->db->query($query);
        $this->db->bind(':deliver_id', $deliver_id);
        $row = $this->db->Single();
    
        if($row){
            return $row;
        }else{
            return false;
        }
    }
    
    public function getPrevPrevMonthAuctionRevenue($deliver_id){
        $query = "SELECT 
            SUM(deliver_fee) AS total_revenue
        FROM 
            order_items_ac
        WHERE 
            deliver_id = :deliver_id 
            AND order_status = 'completed' 
            AND YEAR(completed_date) = YEAR(CURRENT_DATE() - INTERVAL 2 MONTH) 
            AND MONTH(completed_date) = MONTH(CURRENT_DATE() - INTERVAL 2 MONTH)";
    
        $this->db->query($query);
        $this->db->bind(':deliver_id', $deliver_id);
        $row = $this->db->Single();
    
        if($row){
            return $row;
        }else{
            return false;
        }
    }
    
    public function getPrevPrevMonthRequestRevenue($deliver_id){
        $query = "SELECT 
            SUM(deliver_fee) AS total_revenue
        FROM 
            order_items_rq
        WHERE 
            deliver_id = :deliver_id 
            AND order_status = 'completed' 
            AND YEAR(completed_date) = YEAR(CURRENT_DATE() - INTERVAL 2 MONTH) 
            AND MONTH(completed_date) = MONTH(CURRENT_DATE() - INTERVAL 2 MONTH)";
    
        $this->db->query($query);
        $this->db->bind(':deliver_id', $deliver_id);
        $row = $this->db->Single();
    
        if($row){
            return $row;
        }else{
            return false;
        }
    }

    //Reviews

    public function getNumberofReviews($deliver_id){

        $query = "SELECT COUNT(*) AS reviews_count
        FROM delivery_review
        WHERE 
            deliver_id=:deliver_id
        ";
    
        $this->db->query($query);
        $this->db->bind(':deliver_id', $deliver_id);
        $row = $this->db->Single();
    
        if($row){
            return $row;
        } else {
            return false;
        } 
    }

public function Addreview($data){

    
  
  $this->db->query('INSERT INTO delivery_review(order_item_id,order_id,order_type,buyer_id,deliver_id,review) VALUES(:order_item_id,:order_id,:order_type,:buyer_id,:deliver_id,:review)');
  
  $this->db->bind(':order_item_id',$data['order_item_id']);
  $this->db->bind(':order_id',$data['order_id']);
  $this->db->bind(':order_type',$data['order_type']);
  $this->db->bind(':buyer_id',$data['buyer_id']);
  $this->db->bind(':deliver_id',$data['deliver_id']);
  $this->db->bind(':review',$data['review']);
  
  if($this->db->execute()){
    return true;
  }
  else{
    return true;
  }
  
  
  }
    
    
    
    
}