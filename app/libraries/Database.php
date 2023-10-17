<?php 
/* 
* PDO Database class
* Connect to database
* create prepared statements
* Bind values 
* Return rows and results 
*/
class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh; // whenever we prepare statement we gonna use this database handler
    private $stmt; 
    private $error;

    //prepare a constructor from database class
    public function ___constructor(){
        //Set DSN
        $dsn = 'mysql:host=' . $this->host . 'dbname=' .$this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,   // pdo attributes we have using only 2
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //create a PDO instance
        try{
            $this ->dbh = new PDO($dsn, $this->user,$this->pass,$options);
        }catch(PDOException $e){
            $this -> error = $e ->getMessage();
            echo $this -> error;
        }
    }

    //pepare statement with query
    public function query($sql){ 
        //we created the query and we passed that into prepare statement
        $this ->stmt = $this ->$dbh ->prepare($sql); //since we are using a class we are using the database handler here
    }

    //bind value
    public function bind($param, $value , $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;                          // when value type is change we will change the type
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                        
            }
        }

        $this ->stmt ->bindValue($param,$value,$type);

    }
    //Execute the prepare Statement
    public function execute(){
        return $this -> stmt -> execute();
    }
    //get result set as array of objects
    public function  resultSet(){
        this -> execute();
        return $this-> stmt->fetchAll(PDO::FETCH_OBJ);
    }
    //get single result as object
    public function single(){
        this -> execute();
        return $this-> stmt->fetch(PDO::FETCH_OBJ);
    }

    //Get the row coount 
    public function rowCount(){
        return $this -> stmt->rowCount();
    }
}