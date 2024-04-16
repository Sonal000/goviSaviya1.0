<?php
class Post{
    private $db;

    
    public function __construct(){
        $this -> db = new Database;
    }

    public function selectMposts(){
        $query = 'SELECT 
                items_market.*,
                users.name AS seller_name
                FROM
                items_market
                JOIN
                sellers ON items_market.seller_id=sellers.seller_id
                JOIN
                users ON sellers.user_id=users.user_id';

                $this->db->query($query);
                $row=$this->db->resultset();
        if($row){
            return $row;
        }
        else{
            return true;
        }
    }

    public function selectAposts(){
        $query = 'SELECT 
                auction.*,
                users.name AS seller_name
                FROM
                auction
                JOIN
                sellers ON auction.seller_id=sellers.seller_id
                JOIN
                users ON sellers.user_id=users.user_id';

                $this->db->query($query);
                $row=$this->db->resultset();
        if($row){
            return $row;
        }
        else{
            return true;
        }
    }

    public function selectRposts(){
        
                $this->db->query('SELECT * FROM requests');
                $row=$this->db->resultset();
        if($row){
            return $row;
        }
        else{
            return true;
        }
    }



}