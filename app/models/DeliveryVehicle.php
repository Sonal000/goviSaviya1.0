<?php
    class DeliveryVehicle{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getVehicles($userId){
            $this->db->query('SELECT * FROM vehicle WHERE user_id = :id AND is_deleted = FALSE');
            $this->db->bind(':id',$userId);
            $results = $this->db->resultSet();

            return $results;
        }

        public function getVehicleById($id){
            $this->db->query('SELECT * FROM vehicle WHERE vehicle_id = :id'); 
            $this->db->bind(':id',$id);

            $row = $this->db->single();

            return $row;
        }

        public function updateVehicle($data){
          $this->db->query('UPDATE vehicle SET milage = :milage, max_capacity = :capacity, 
                            max_vol =:max_vol, ref_cap = :ref_cap, vehicle_img = :vehicle_img 
                            WHERE vehicle_id = :id');
           
            //bind Values
                    $this->db->bind(':id',$data['id']);
                    $this->db->bind(':milage',$data['milage']);
                    $this->db->bind(':capacity',$data['capacity']);
                    $this->db->bind(':max_vol',$data['max_vol']);
                    $this->db->bind(':ref_cap',$data['ref_cap']);
                    $this->db->bind(':vehicle_img',$data['vehicle_img']);
                    
                   
             if($this->db->execute()){   
                return true;
             }else{
                return false;
                }
             
        }

        public function addVehicle($data){

            var_dump($data);
            $this->db->query('INSERT INTO vehicle (user_id,vehicle_type,
                            vehicle_number,max_capacity
                            ,vehicle_brand,vehicle_model,vehicle_year,
                            fuel_type,milage,vehicle_img,front_img
                            ,back_img,rev_expiry,rev_license_imgs,insurance_status,ins_expiry
                            ,insurance_imgs,max_vol,ref_cap) 
                            VALUES
                            (:user_id,:type,
                            :vehicleNo,:capacity,:brand,:model,:year,:fuel_type
                            ,:milage,:vehicle_img,:front_img,:back_img,:rev_expiry
                            ,:rev_license_imgs,:insurance_status,:ins_expiry,:insurance_imgs
                            ,:max_vol,:ref_cap)');

        //Bind Values
        $this->db->bind(':user_id', $data['id']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':vehicleNo', $data['vehicleNo']);
        $this->db->bind(':capacity', $data['capacity']);
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':model', $data['model']);
        $this->db->bind(':year', $data['year']);
        $this->db->bind(':fuel_type', $data['fuel_type']);
        $this->db->bind(':milage', $data['milage']);
        $this->db->bind(':vehicle_img', $data['vehicle_img']);
        $this->db->bind(':front_img', $data['front_img']);
        $this->db->bind(':back_img', $data['back_img']);
        $this->db->bind(':rev_expiry', $data['rev_expiry']);
        $this->db->bind(':rev_license_imgs', $data['rev_license_imgs']);
        $this->db->bind(':insurance_status', $data['insurance_status']);
        $this->db->bind(':ins_expiry', $data['ins_expiry']);
        $this->db->bind(':insurance_imgs', $data['insurance_imgs']);
        $this->db->bind(':max_vol', $data['max_vol']);
        $this->db->bind(':ref_cap', $data['ref_cap']);

        //Execute
        if($this->db->execute()){   
            return true;
        }else{
            return false;
        }
        }

        public function deleteVehicle($id){
            $this->db->query('UPDATE vehicle SET is_deleted = 1 WHERE vehicle_id=:id');

            //Bind Values

            $this->db->bind(':id',$id);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
               return false;
            }
        }

        
        public function updateVehicleCom($data){
            $this->db->query('UPDATE vehicle SET insurance_status = :insurance_status, ins_expiry = :ins_expiry, 
                              insurance_imgs =:insurance_imgs, rev_expiry = :rev_expiry, rev_license_imgs = :rev_license_imgs 
                              WHERE vehicle_id = :id');
             
              //bind Values
                      $this->db->bind(':id',$data['id']);
                      $this->db->bind(':insurance_status',$data['insurance_status']);
                      $this->db->bind(':ins_expiry',$data['ins_expiry']);
                      $this->db->bind(':insurance_imgs',$data['insurance_imgs']);
                      $this->db->bind(':rev_expiry',$data['rev_expiry']);
                      $this->db->bind(':rev_license_imgs',$data['rev_license_imgs']);
                      
                     
               if($this->db->execute()){   
                  return true;
               }else{
                  return false;
                  }
               
          }

    public function getPickuptrucks(){
        $query = 'SELECT
                  vehicle.*,
                users.name AS owner_name
                FROM
                vehicle
                JOIN
                users ON vehicle.user_id=users.user_id
                WHERE 
                vehicle.vehicle_type= "Pickup Truck"';
        $this->db->query($query);
        
        $row = $this->db->resultSet();
        if($row){
            return $row;
        }
        else{
            return false;
        }

    }

    public function getContainertrucks(){
        $this->db->query(
            'SELECT
             vehicle.*,
             users.name AS owner_name
             FROM
             vehicle
             JOIN
             users ON vehicle.user_id=users.user_id
             WHERE 
             vehicle_type= "Container Truck" ');
        
        $row = $this->db->resultSet();
        if($row){
            return $row;
        }
        else{
            return false;
        }

    }

    public function getCars(){
        $this->db->query(
            'SELECT
             vehicle.*,
             users.name AS owner_name
             FROM
             vehicle
             JOIN
             users ON vehicle.user_id=users.user_id
             WHERE 
             vehicle_type= "Car" ');
        
        $row = $this->db->resultSet();
        if($row){
            return $row;
        }
        else{
            return false;
        }

    }

    public function getVehicleinfo($id){
        $this->db->query('SELECT * FROM vehicle WHERE vehicle_id=:vehicle_id');
        $this->db->bind(':vehicle_id',$id);

        $row = $this->db->Single();

        if($row){
            return $row;
        }
        else{
            return false;
        }
    }

    public function countVehicles($id){
    
        $query = "SELECT COUNT(*) as vehicle_count FROM vehicle WHERE user_id = :user_id AND is_deleted=0";
        $this->db->query($query);
        $this->db->bind(':user_id',$id);
        $row = $this->db->single();
        return $row;

    }

    public function checkVehicleAdd($id){

        $count = $this->countVehicles($id);
        if($count && $count->vehicle_count > 0){
            $available = 0;
            return $available;
        }else{
            $available = 1;
            return $available;
        }

    }




    public function countPickupTruck(){
        $this->db->query('SELECT COUNT(*) AS vehicle_count FROM vehicle WHERE vehicle_type="Pickup Truck"');
        $row = $this->db->Single();

        if($row){
            return $row;
        }
        else{
            return false;
        }
    }

    public function countContainerTruck(){
        $this->db->query('SELECT COUNT(*) AS vehicle_count FROM vehicle WHERE vehicle_type="Container Truck"');
        $row = $this->db->Single();

        if($row){
            return $row;
        }
        else{
            return false;
        }
    }

    public function countCars(){
        $this->db->query('SELECT COUNT(*) AS vehicle_count FROM vehicle WHERE vehicle_type="Car"');
        $row = $this->db->Single();

        if($row){
            return $row;
        }
        else{
            return false;
        }
    }

    


    }

?>