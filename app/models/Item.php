<?php 
  
  class Item {

   private $db;
   public function __construct()
   {
     $this->db = new Database;
   }

   public function getItems(){

    $this->db->query("SELECT * FROM items_market");

    return $this->db->resultSet();

   } 
   
  }