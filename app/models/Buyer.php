<?php
class Buyer{
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
        $this ->db ->bind(':user_type','buyer');
  
        //execute
        if ($this->db->execute()) {
         // Get the ID of the newly inserted user
         $user_id = $this->db->lastInsertId();
         // $user_id = $this->db->stmt->lastInsertId();
 
         // Now insert the user_id into the buyers table
         $this->db->query('INSERT INTO buyers (user_id) VALUES(:user_id)');
         $this->db->bind(':user_id', $user_id);
 
         // Execute the buyers insertion query
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
                'SELECT users.*, buyers.* 
                FROM users
                LEFT JOIN buyers ON users.user_id = buyers.user_id
                WHERE users.user_id = :user_id');

        $this ->db ->bind(':user_id',$user_id);

        return $this->db->single();
    }


    public function getBuyerInfo($id) {
        // Corrected SQL query and parameter binding
        $this->db->query("SELECT buyers.*, users.* 
                         FROM buyers 
                         RIGHT JOIN users ON buyers.user_id = users.user_id 
                         WHERE buyers.buyer_id = :buyer_id");
        
        $this->db->bind(':buyer_id', $id);
        
        $this->db->execute(); // Execute the query
        $row = $this->db->single();
        
        
        if ($row) {
            return $row;
        } else {
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
            //     'UPDATE buyers SET 
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
                'UPDATE buyers SET 
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
                'UPDATE buyers SET 
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
                'UPDATE buyers SET 
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
}