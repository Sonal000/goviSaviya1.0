<?php
class SellerRegisterM{
    private $db;

    
    public function __construct(){
        $this -> db = new Database;
    }

    //register fucntion
    public function register($data){
        $this->db->query('INSERT INTO Seller (name,telNo,Email,sellingtype,addressline1,addressline2,district,postalcode,password,confirm_password) VALUES(:name,:telNo,:Email,:sellingtype,:addressline1,:addressline2,:district,:postalcode,:password,:confirm_password)');
        $this ->db ->bind(':name',$data['name']);
        $this ->db ->bind(':telNo',$data['telNo']);
        $this ->db ->bind(':Email',$data['Email']);
        $this ->db ->bind(':sellingtype',$data['sellingtype']);
        $this ->db ->bind(':addressline1',$data['addressline1']);
        $this ->db ->bind(':addressline2',$data['addressline2']);
        $this ->db ->bind(':district',$data['district']);
        $this ->db ->bind(':postalcode',$data['postalcode']);
        $this ->db ->bind(':password',$data['password']);
        $this ->db ->bind(':confirm_password',$data['confirm_password']);

        //execute
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
        
    }



    //find user by email
    public function findUserByEmail($Email){
        $this->db->query('SELECT * FROM Seller WHERE Email= :Email');
        $this ->db ->bind(':Email',$Email);

        $row = $this ->db -> single();

        //check row count
        if($this->db ->rowcount()>0){
            return true;
        } else{
            return false;
        }
    }
}