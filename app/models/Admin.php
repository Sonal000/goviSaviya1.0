<?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        use PHPMailer\PHPMailer\SMTP;


class Admin{
    private $db;
    private $mail;


    
    public function __construct(){
        $this -> db = new Database;
        $this->mail = new PHPMailer(true);
    }


    public function login($email,$password){
        $this->db->query('
                    SELECT * FROM admin WHERE 
                          email=:email
                        ');
        $this ->db ->bind(':email',$email);
        

        $row=$this->db->single();
        // $hashed_password =$row->password;
        if($password==$row->password){
            return $row;
        }else{
            return false;
        }
        
    }


    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM admin WHERE email=:email');
        $this ->db ->bind(':email',$email);

        $row = $this ->db -> single();

        //check row count
        if($this->db ->rowcount()>0){
            return $row;
        } else{
            return false;
        }
    }

    public function findUserByEmail_add($email){
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

    public function findVerificationByUser($code,$id){
        $this->db->query('SELECT verification_code FROM admin WHERE admin_ID=:admin_ID');
        $this ->db ->bind(':admin_ID',$id);
        $row = $this ->db -> single();
        if($this->db ->rowcount()>0 && $row->verification_code ==$code){
            return true;
        } else{
            return false;
        }
    }

    public function findUsers(){

        $this->db->query('SELECT name,user_id,email FROM users');
        $data = $this ->db -> resultSet();
       
        if($this->db->rowcount()>0){
            return $data;
        }
        else{
            return false;
        }
    }
    public function getUsers($id){

        $this->db->query('SELECT user_id,name,email,mobile,address,city FROM users WHERE user_id =:user_id');
        $this ->db ->bind(':user_id',$id);
        $data = $this ->db -> single();
       
        if($this->db->rowcount()>0){
            return $data;
        }
        else{
            return false;
        }
    }
    public function countUsers(){
        $this->db->query('SELECT COUNT(*) AS count FROM users');
        $row = $this->db->single();
         if($this->db->rowcount()>0){
            return $row->count;
         }
         else{
            return false;
         }
       
    }
    public function countBuyers(){
        $this->db->query('SELECT COUNT(*) AS count FROM buyers');
        $row = $this->db->single();
         if($this->db->rowcount()>0){
            return $row->count;
         }
         else{
            return false;
         }
       
    }
    public function countSellers(){
        $this->db->query('SELECT COUNT(*) AS count FROM sellers');
        $row = $this->db->single();
         if($this->db->rowcount()>0){
            return $row->count;
         }
         else{
            return false;
         }
       
    }
    public function countAgents(){
        $this->db->query('SELECT COUNT(*) AS count FROM delivers');
        $row = $this->db->single();
         if($this->db->rowcount()>0){
            return $row->count;
         }
         else{
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
        $this->mail->Password = 'wvlboztsvdvrzxho';
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
            'UPDATE admin 
            SET verification_code = :code 
            WHERE admin_ID = :admin_ID'
            );

$this ->db ->bind(':code',$verification_code);
$this ->db ->bind(':admin_ID',$id);



        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }

        exit();
    }catch (Exception $e) {
        
        // echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        die("check your connection ! internet connection error");
    } 

    }

    public function setVerification($id){
        $this->db->query(
            'UPDATE admin 
            SET verification_code =\'verified\',verified_at=NOW()
            WHERE admin_ID = :admin_ID'
            );

        $this ->db ->bind('admin_ID',$id);
        if ($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }

    public function getProfileInfo($user_id){
        $this->db->query(
            'SELECT * FROM admin WHERE admin_ID= :admin_ID');

        $this ->db ->bind(':admin_ID',$user_id);

        return $this->db->single();
    }

    public function updateProfile($data,$id){
        $this->db->query(
                'UPDATE users SET 
                name=:name,
                address=:address,
                mobile=:mobile,
                city=:city
                WHERE user_id =:user_id');
    
        $this->db->bind(':user_id',$id );
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':mobile', $data['mobile']);
        $this->db->bind(':city', $data['city']);
    
        if ($this->db->execute()) {
            return true;
            // $this->db->query(
            //     'UPDATE sellers SET 
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
                'UPDATE sellers SET 
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

    public function getProfileImage($user_id,$user_type){
        if($user_type=='admin'){
            $this->db->query('SELECT prof_img FROM admin WHERE admin_ID=:id');
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

    
    public function updateProfileImage($data){
        $this->db->query(
            'UPDATE sellers SET 
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
            'UPDATE sellers SET 
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

public function register($data){
    $this->db->query('INSERT INTO 
                      users (name,email,mobile,address,password,user_type) 
                      VALUES(:name,:email,:mobile,:address,:password,:user_type)'
                      );


    $this ->db ->bind(':name',$data['name']);
    $this ->db ->bind(':mobile',$data['mobile']);
    $this ->db ->bind(':email',$data['email']);
    $this ->db ->bind(':address',$data['address']);
    $this ->db ->bind(':password',$data['password']);
    $this ->db ->bind(':user_type','seller');

    //execute
    if ($this->db->execute()) {
     // Get the ID of the newly inserted user
     $user_id = $this->db->lastInsertId();
     // $user_id = $this->db->stmt->lastInsertId();

     // Now insert the user_id into the sellers table
     $this->db->query('INSERT INTO sellers (user_id) VALUES(:user_id)');
     $this->db->bind(':user_id', $user_id);

     // Execute the sellers insertion query
     if ($this->db->execute()) {
         return true;
     } else {
         return false;
     }
 } else {
     return false;
 }
    
}

public function userdelete($data){
    $this->db->query(
        'DELETE FROM users WHERE user_id =:user_id'
    );
    var_dump($data);
    $this->db->bind(':user_id',$data['id']);
    if($this->db->execute()){
        redirect('AdminC/adminDash');
    } 
    else{
      return false;
    }
}


}

