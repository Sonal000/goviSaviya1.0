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

    
}