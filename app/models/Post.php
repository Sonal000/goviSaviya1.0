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

    public function countMposts(){
        $this->db->query('SELECT COUNT(*) AS post_count FROM items_market');
        $row=$this->db->Single();

        if($row){
            return $row;
        }
        else{
            return false;
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

    public function countAposts(){
        $this->db->query('SELECT COUNT(*) AS post_count FROM auction');
        $row=$this->db->Single();

        if($row){
            return $row;
        }
        else{
            return false;
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

    public function countRposts(){
        $this->db->query('SELECT COUNT(*) AS post_count FROM requests');
        $row=$this->db->Single();

        if($row){
            return $row;
        }
        else{
            return false;
        }
    }

    public function getinfoMposts($id){
        $query = 'SELECT 
                    items_market.*,
                    users.*,
                    users.name AS seller_name,
                    items_market.name AS product_name
                    FROM
                    items_market
                    JOIN
                    sellers ON
                    items_market.seller_id = sellers.seller_id
                    JOIN 
                    users ON 
                    sellers.user_id = users.user_id
                    WHERE
                    items_market.item_id = :id';

        $this->db->query($query);
        $this->db->bind(':id',$id);
        $row = $this->db->Single();

        if($row){
            return $row;
        }
        else{
            return false;
        }

    }

    public function getinfoRposts($id){
            $this->db->query('SELECT * FROM requests WHERE request_ID =:id');
            $this->db->bind(':id',$id);

            $row =$this->db->Single();
            if($row){
                return $row;
            }
            else{
                return false;
            }
    }

    public function getquotationinfo($id){
        $query = 'SELECT 
                req_quotation.*,
                sellers.prof_img AS seller_img,
                users.*
                FROM
                req_quotation
                JOIN
                sellers ON
                req_quotation.seller_ID =sellers.seller_id
                JOIN
                users ON
                sellers.user_id = users.user_id
                WHERE request_ID =:id';
        
        $this->db->query($query);
        $this->db->bind(':id',$id);
        $row = $this->db->resultSet();
    if($row){
        return $row;
    }
    else{
        return false;
    }
        
        
    }

    public function getinfoAposts($id){
        $query= 'SELECT 
                auction.*,
                users.*
                FROM
                auction
                JOIN
                sellers ON
                auction.seller_ID = sellers.seller_id
                JOIN
                users ON
                sellers.user_id = users.user_id
                WHERE auction_ID =:id';

        $this->db->query($query);
        $this->db->bind(':id',$id);

        $row =$this->db->Single();
            if($row){
                return $row;
            }
            else{
                return false;
            }
    }

    public function getbidsinfo($id){
        $query = 'SELECT 
                bids.*,
                users.*
                FROM
                bids
                JOIN
                buyers ON
                bids.buyer_id =buyers.buyer_id
                JOIN
                users ON
                buyers.user_id = users.user_id
                WHERE auction_ID =:id';
        
        $this->db->query($query);
        $this->db->bind(':id',$id);
        $row = $this->db->resultSet();
    if($row){
        return $row;
    }
    else{
        return false;
    }
        
        
    }

  




}