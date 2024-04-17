<?php
        // require_once '../vendor/autoload.php';
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;



class User{
    private $db;
    private $mail;


    
    public function __construct(){
        $this -> db = new Database;
        $this->mail = new PHPMailer(true);



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

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_type']);         
        unset($_SESSION['user_image']);         
        session_destroy();
    }

    public function getUserDet(){
        $this->db->query("SELECT * FROM users");
        $row= $this->db->resultset();

        if($row){
            return $row;
        }
        else{
            return false;
        }
    }

    public function countUsers(){
        $query=$this->db->query("SELECT * FROM users");
        $row = $this->db->rowCount($query);
        var_dump($row);
        if($row){
            return true;
        }
        else{
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
            return $row;
        } else{
            return false;
        }
    }
    //find check
    public function passwordCheck($id,$password){

        $this->db->query('SELECT * FROM users WHERE user_id=:user_id');
        $this ->db ->bind(':user_id',$id);

        $row = $this ->db -> single();
        if($row){

            //check row count
            $hashed_password =$row->password;

            if(password_verify($password,$hashed_password)){
                return $row;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }
    public function deleteAccount($id){
      
        $this->db->query('SELECT * FROM users WHERE user_id=:user_id');
        $this ->db ->bind(':user_id',$id);
        $row = $this ->db -> single();
        if($row){
            
            $this->db->query('INSERT INTO 
            deletedusers (user_id,name,email,mobile,address,city,user_type) 
            VALUES(:user_id,:name,:email,:mobile,:address,:city,:user_type)'
            );
$this ->db ->bind(':user_id',$row->user_id);
$this ->db ->bind(':name',$row->name);
$this ->db ->bind(':mobile',$row->mobile);
$this ->db ->bind(':email',$row->email);
$this ->db ->bind(':address',$row->address);
$this ->db ->bind(':city',$row->city);
$this ->db ->bind(':user_type',$row->user_type);
//execute
if ($this->db->execute()) {
// Get the ID of the newly inserted user
$user_id = $this->db->lastInsertId();
$this->db->query("DELETE FROM users WHERE user_id = :user_id");
$this ->db ->bind(':user_id',$row->user_id);
if ($this->db->execute()) {
    return true;
}else{
    return false;
}
}else{
    return false;
}

        }else{
            return false;
        }


    }



    public function findVerificationByUser($code,$id){
        $this->db->query('SELECT verification_code FROM users WHERE user_id=:user_id');
        $this ->db ->bind(':user_id',$id);
        $row = $this ->db -> single();
        if($this->db ->rowcount()>0 && $row->verification_code ==$code){
            return true;
        } else{
            return false;
        }
    }

    public function verifyEmail($email,$name,$id){
try{
        $this->mail->SMTPDebug = 0;
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'govisaviyahelp@gmail.com';
        //SMTP password
        $this->mail->Password = 'wxxs rerw knpk mnme';
        //Enable TLS encryption;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $this->mail->Port = 587;
        //Recipients
        $this->mail->setFrom('govisaviyahelp@gmail.com', 'GoviSaviya');
        $this->mail->addAddress($email, $name);
        //Set email format to HTML
        $this->mail->isHTML(true);
        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        $this->mail->Subject = 'Email verification';
        $this->mail->Body    = '<div style="font-family: Arial, sans-serif; margin:0 auto; width:90%; ">
        <h4 style="font-size: 18px; color: #333;">Hello ' . $name . '</h4>
        <p style="font-size: 14px; color: #333;">Thank you for choosing Govisaviaya, your trusted partner in the world of agriculture. We are excited to have you on board!</p>
        <p style="font-size: 14px; color: #333;">To complete your account creation, please use the following verification code:</p>
        <p style="font-size: 24px; color: #333;  cursor: pointer;
        user-select: all; margin: 15px 10px;">' . $verification_code . '</p>
        <script>
document.querySelectorAll(`.copyable`).forEach(element => {
  element.addEventListener(`click`, () => {
    navigator.clipboard.writeText(element.textContent);
  });
});
</script>
        <p style="font-size: 18px; margin-top: 10px; color: #333;">Best regards,</p>
        <p style="font-size: 18px; color: #008000;"><b>ගොවි</b><span style="color: #FFD700; margin-left: 5px;">සවිය</span></p>
    </div>';
                                
        $this->mail->send();

        $this->db->query(
            'UPDATE users 
            SET verification_code = :code 
            WHERE user_id = :user_id'
            );

$this ->db ->bind(':code',$verification_code);
$this ->db ->bind(':user_id',$id);



        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }

        exit();
    }catch (Exception $e) {
        
        // echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        // die($e);
        die("check your connection ! internet connection error");
    } 

    }

    public function setVerification($id){
        $this->db->query(
            'UPDATE users 
            SET verification_code =\'verified\',verified_at=NOW()
            WHERE user_id = :user_id'
            );

        $this ->db ->bind('user_id',$id);
        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }
    // public function getVerification($id){
    //     $this->db->query(
    //         'SELECT verification_code FROM users 
    //         WHERE user_id = :user_id'
    //         );
    //     $this ->db ->bind('user_id',$id);
    //     $row = $this ->db -> single();
    //     if ($row) {
    //         return $row;
    //     }else{
    //         return false;
    //     }
    // }


    public function getProfileInfo($user_id,$user_type){
        if($user_type=='buyer'){
            $this->db->query('SELECT * FROM buyers WHERE user_id=:id');
        }else if($user_type=='seller'){
            $this->db->query('SELECT * FROM sellers WHERE user_id=:id');
        }else if($user_type=='deliver'){
            $this->db->query('SELECT * FROM delivers WHERE user_id=:id'); 
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

    public function getUserInfo($id){
        $this->db->query('SELECT * FROM users WHERE user_id=:id');
        $this ->db ->bind(':id',$id);

        $row = $this ->db -> single();
        //check row count
        if($row){
            return $row;
        } else{
            return false;
        }
    }

    public function getUserType($user_id){
        $this->db->query('SELECT user_type FROM users WHERE user_id=:id');
        $this ->db ->bind(':id',$user_id);

        $row = $this ->db -> single();
        //check row count
        if($row){
            return $row->user_type;
        } else{
            return false;
        }
    }


 



}