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
}