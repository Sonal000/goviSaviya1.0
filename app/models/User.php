<?php
class User{
    private $db;

    
    public function __construct(){
        $this -> db = new Database;
    }

    //register fucntion
    public function login($email,$password){
        $this->db->query('
                    SELECT * FROM users WHERE 
                          email=:email
                        ');
        $this ->db ->bind(':email',$email);
        

        $row=$this->db->single();
        $hashed_password =$row->password;
        if(password_verify($password,$hashed_password)){
            return $row;
        }else{
            return false;
        }
        
    }


    //find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email=:email');
        $this ->db ->bind(':email',$email);

        $row = $this ->db -> single();

        //check row count
        if($this->db ->rowcount()>0){
            return true;
        } else{
            return false;
        }
    }
    public function getProfileImage($user_id,$user_type){
        if($user_type=='buyer'){
            $this->db->query('SELECT prof_img FROM buyers WHERE user_id=:id');
        }else if($user_type=='seller'){
            $this->db->query('SELECT prof_img FROM sellers WHERE user_id=:id');
        }else if($user_type=='deliver'){
            $this->db->query('SELECT prof_img FROM delivers WHERE user_id=:id'); 
        }
        $this ->db ->bind(':id',$user_id);

        $row = $this ->db -> single();

        //check row count
        if($this->db ->rowcount()>0){
            return $row;
        } else{
            return false;
        }
    }
}