<?php
    class DeliveryVehicle{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getVehicles(){
            $this->db->query('SELECT * FROM vehicle');

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
          $this->db->query('UPDATE vehicle SET vehicle_type = :type, vehicle_number = :number, 
                            vehicle_brand = :brand, vehicle_model = :model, vehicle_year = :year, 
                            max_capacity = :capacity WHERE vehicle_id = :id');
           
            //bind Values
                    $this->db->bind(':id',$data['id']);
                    $this->db->bind(':type',$data['type']);
                    $this->db->bind(':number',$data['number']);
                    $this->db->bind(':brand',$data['brand']);
                    $this->db->bind(':model',$data['model']);
                    $this->db->bind(':year',$data['year']);
                    $this->db->bind(':capacity',$data['capacity']);
                   
             if($this->db->execute()){   
                return true;
             }else{
                return false;
                }
             
        }

    }

?>