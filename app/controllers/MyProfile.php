<?php
  class Myprofile extends Controller{

    private $buyerModel;
    private $sellerModel;
    private $deliverModel;
    private $userModel;

   public function __construct(){

      if(!isset($_SESSION['user_id'])){
        redirect('/home');
      }

    $this->buyerModel =$this->model('Buyer');
    $this->sellerModel =$this->model('Seller');
    $this->deliverModel =$this->model('Deliver');
    $this->userModel =$this->model('User');

   }

   public function index($id){



if($id==null || ($_SESSION['user_id']!=$id)  ){
  $this->view("_404");
 
}else{


// ================================================================================
// ==================for seller ====================================================
// ================================================================================


if($_SESSION['user_type']=="seller"){
  $profileData = $this->sellerModel->getProfileInfo($_SESSION['user_id']);

  if($_SERVER['REQUEST_METHOD']=='POST'){

    if(isset($_POST['details_submit'])){
    //sanitize POST data
    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    $data=[
      'name'=>trim($_POST['name']),
      'mobile' =>trim($_POST['mobile']),
      'address'=>trim($_POST['address']),
      'mobile'=>trim($_POST['mobile']),
      'city'=>trim($_POST['city']),
      'email' => $profileData->email,
      'about' => $profileData->about,
      "prof_img"=>$profileData->prof_img,
      "cover_img"=>$profileData->cover_img
    ];
    if($this ->sellerModel->updateProfile($data)){
      echo '<script>
      // alert("Edited");
      </script>';
      // header('city:'.URLROOT.'/Login');
    }
    else{
      die('something went wrong');
    }
  }
  if(isset($_POST['about_submit'])){
    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    $data=[
      'name'=>$profileData->name,
      'mobile' =>$profileData->mobile,
      'address'=>$profileData->address,
      'mobile'=>$profileData->mobile,
      'city'=>$profileData->city,
      'email' => $profileData->email,
      'about' => trim($_POST['about']),
      "prof_img"=>$profileData->prof_img,
      "cover_img"=>$profileData->cover_img
    ];
    if($this ->sellerModel->updateAbout($data)){
      echo '<script>
      // alert("Edited");
      </script>';
      // header('city:'.URLROOT.'/Login');
    }
    else{
      die('something went wrong');
    }
  }else if(isset($_POST['profile_submit'])){
    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    $data=[
      'name'=>$profileData->name,
      'mobile' =>$profileData->mobile,
      'address'=>$profileData->address,
      'mobile'=>$profileData->mobile,
      'city'=>$profileData->city,
      'email' => $profileData->email,
      'about' => $profileData->about,
      "prof_img"=>$profileData->prof_img,
      "cover_img"=>$profileData->cover_img
    ];
    
  }else if(isset($_FILES['prof_img'])){
      

    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    if (isset($_FILES['prof_img'])) {
      $uploadDirectory = (str_replace("\\", "/",STOREROOT)) . '/profiles/'; 
      $filename = uniqid() . '_' . $_FILES['prof_img']['name'];
      $targetPath = $uploadDirectory . $filename; 
      if (move_uploaded_file($_FILES['prof_img']['tmp_name'], $targetPath)){
        
    $data=[
      'name'=>$profileData->name,
      'mobile' =>$profileData->mobile,
      'address'=>$profileData->address,
      'mobile'=>$profileData->mobile,
      'city'=>$profileData->city,
      'email' => $profileData->email,
      'about' => $profileData->about,
      'prof_img' => $filename,
      "cover_img"=>$profileData->cover_img
    ];      
    if ($this->sellerModel->updateProfileImage($data)) {
      echo '<script>
      // alert("profile image uploaded");
      </script>';
  } else {
      die('Something went wrong.');
  }
} else {
  die('Failed to move the uploaded file.');
}
}
}else if(isset($_FILES['cover_img'])){
    

$_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
if (isset($_FILES['cover_img'])) {
  $uploadDirectory = (str_replace("\\", "/",STOREROOT)) . '/covers/'; 
  $filename = uniqid() . '_' . $_FILES['cover_img']['name'];
  $targetPath = $uploadDirectory . $filename;

  if (move_uploaded_file($_FILES['cover_img']['tmp_name'], $targetPath)){

$data=[
  'name'=>$profileData->name,
  'mobile' =>$profileData->mobile,
  'address'=>$profileData->address,
  'mobile'=>$profileData->mobile,
  'city'=>$profileData->city,
  'email' => $profileData->email,
  'about' => $profileData->about,
  'prof_img' => $profileData->prof_img,
  "cover_img"=>$filename
];     
if ($this->sellerModel->updateCoverImage($data)) {
  echo '<script>
  // alert("cover image uploaded");
  </script>';
} else {
  die('Something went wrong.');
}
} else {
die('Failed to move the uploaded file.');
}
}
}else{
    $data=[
      "logged"=>(isset($_SESSION['user_id'])),
      "userid"=>$_SESSION['user_id'],
      "name"=>$profileData->name,
      "address"=>$profileData->address,
      "email"=>$profileData->email,
      "mobile"=>$profileData->mobile,
      "city"=>$profileData->city,
      "about"=>$profileData->about,
      "prof_img"=>$profileData->prof_img,
      "cover_img"=>$profileData->cover_img
      ]; 

  }


    }else{

    $data=[
        "logged"=>(isset($_SESSION['user_id'])),
        "userid"=>$_SESSION['user_id'],
        "name"=>$profileData->name,
        "address"=>$profileData->address,
        "email"=>$profileData->email,
        "mobile"=>$profileData->mobile,
        "city"=>$profileData->city,
        "about"=>$profileData->about,
        "prof_img"=>$profileData->prof_img,
        "cover_img"=>$profileData->cover_img
        ]; 
        
    }
    // var_dump($data);
 $this->view("sellerProfile",$data); 
}


// ================================================================================
// ==================for buyer ====================================================
// ================================================================================

  if($_SESSION['user_type']=="buyer"){
    $profileData = $this->buyerModel->getProfileInfo($_SESSION['user_id']);

    if($_SERVER['REQUEST_METHOD']=='POST'){
     

            if(isset($_POST['delete_account'])){
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        //process form

        $data = [
          'password'=>trim($_POST['current_password']),
          'name'=>$profileData->name,
          'mobile' =>$profileData->mobile,
          'address'=>$profileData->address,
          'mobile'=>$profileData->mobile,
          'city'=>$profileData->city,
          'email' => $profileData->email,
          'about' => $profileData->about,
          'prof_img' => $profileData->prof_img,
          "cover_img"=>$profileData->cover_img
        ];
  
  
        $row=$this->userModel->passwordCheck($_SESSION['user_id'],$data['password']);
        if($row){

          $delete=$this->userModel->deleteAccount($_SESSION['user_id']);
          if($delete){
            $this->userModel->logout();
            redirect('/home');
          }else{
            $data = [
              'password'=>trim($_POST['current_password']),
              'name'=>$profileData->name,
              'mobile' =>$profileData->mobile,
              'address'=>$profileData->address,
              'mobile'=>$profileData->mobile,
              'city'=>$profileData->city,
              'email' => $profileData->email,
              'about' => $profileData->about,
              'prof_img' => $profileData->prof_img,
              "cover_img"=>$profileData->cover_img
            ];
            echo "<script>
              alert('delete failed');
            </script>";
        }
      }else{
          $data=[
            'invalid_password'=>'No user found',
            'password'=>trim($_POST['current_password']),
            'name'=>$profileData->name,
            'mobile' =>$profileData->mobile,
            'address'=>$profileData->address,
            'mobile'=>$profileData->mobile,
            'city'=>$profileData->city,
            'email' => $profileData->email,
            'about' => $profileData->about,
            'prof_img' => $profileData->prof_img,
            "cover_img"=>$profileData->cover_img,
        ];
        }

      }else if(isset($_POST['details_submit'])){
      //sanitize POST data
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      $data=[
        'password'=>'',
        'name'=>trim($_POST['name']),
        'mobile' =>trim($_POST['mobile']),
        'address'=>trim($_POST['address']),
        'mobile'=>trim($_POST['mobile']),
        'city'=>trim($_POST['city']),
        'email' => $profileData->email,
        'about' => $profileData->about,
        "prof_img"=>$profileData->prof_img,
        "cover_img"=>$profileData->cover_img
      ];
      if($this ->buyerModel->updateProfile($data)){
        echo '<script>
        // alert("Edited");
        </script>';
        // header('city:'.URLROOT.'/Login');
      }
      else{
        die('something went wrong');
      }
    }else if(isset($_POST['about_submit'])){
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      $data=[
        'password'=>'',
        'name'=>$profileData->name,
        'mobile' =>$profileData->mobile,
        'address'=>$profileData->address,
        'mobile'=>$profileData->mobile,
        'city'=>$profileData->city,
        'email' => $profileData->email,
        'about' => trim($_POST['about']),
        "prof_img"=>$profileData->prof_img,
        "cover_img"=>$profileData->cover_img
      ];
      if($this ->buyerModel->updateAbout($data)){
        echo '<script>
        // alert("Edited");
        </script>';
        // header('city:'.URLROOT.'/Login');
      }else{
        die('something went wrong');
      }
    }else if(isset($_FILES['prof_img'])){
      

      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      if (isset($_FILES['prof_img'])) {
        $uploadDirectory = (str_replace("\\", "/",STOREROOT)) . '/profiles/'; 
        $filename = uniqid() . '_' . $_FILES['prof_img']['name'];
        $targetPath = $uploadDirectory . $filename;
        if (move_uploaded_file($_FILES['prof_img']['tmp_name'], $targetPath)){
      $data=[
        'password'=>'',
        'name'=>$profileData->name,
        'mobile' =>$profileData->mobile,
        'address'=>$profileData->address,
        'mobile'=>$profileData->mobile,
        'city'=>$profileData->city,
        'email' => $profileData->email,
        'about' => $profileData->about,
        'prof_img' => $filename,
        "cover_img"=>$profileData->cover_img
      ];      
      if ($this->buyerModel->updateProfileImage($data)) {
        echo '<script>
        // alert("profile image uploaded");
        </script>';
    } else {
        die('Something went wrong.');
    }
} else {
    die('Failed to move the uploaded file.');
}
}
}else if(isset($_FILES['cover_img'])){
      

  $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
  if (isset($_FILES['cover_img'])) {
    $uploadDirectory = (str_replace("\\", "/",STOREROOT)) . '/covers/'; 
    $filename = uniqid() . '_' . $_FILES['cover_img']['name'];
    $targetPath = $uploadDirectory . $filename;

    if (move_uploaded_file($_FILES['cover_img']['tmp_name'], $targetPath)){
  $data=[
    'password'=>'',
    'name'=>$profileData->name,
    'mobile' =>$profileData->mobile,
    'address'=>$profileData->address,
    'mobile'=>$profileData->mobile,
    'city'=>$profileData->city,
    'email' => $profileData->email,
    'about' => $profileData->about,
    'prof_img' => $profileData->prof_img,
    "cover_img"=>$filename
  ];     
  if ($this->buyerModel->updateCoverImage($data)) {
    echo '<script>
    // alert("cover image uploaded");
    </script>';
} else {
    die('Something went wrong.');
}
} else {
die('Failed to move the uploaded file.');
}
}
}else{
      $data=[
        'password'=>'',
        "logged"=>(isset($_SESSION['user_id'])),
        "userid"=>$_SESSION['user_id'],
        "name"=>$profileData->name,
        "address"=>$profileData->address,
        "email"=>$profileData->email,
        "mobile"=>$profileData->mobile,
        "city"=>$profileData->city,
        "about"=>$profileData->about,
        "prof_img"=>$profileData->prof_img,
        "cover_img"=>$profileData->cover_img
        ]; 

    }
      }else{
      $data=[
          'password'=>'',
          "logged"=>(isset($_SESSION['user_id'])),
          "userid"=>$_SESSION['user_id'],
          "name"=>$profileData->name,
          "address"=>$profileData->address,
          "email"=>$profileData->email,
          "mobile"=>$profileData->mobile,
          "city"=>$profileData->city,
          "about"=>$profileData->about,
          "prof_img"=>$profileData->prof_img,
          "cover_img"=>$profileData->cover_img
          ];  
      }
      
   $this->view("buyerProfile",$data); 
  }



// ================================================================================
// ==================for deliver ====================================================
// ================================================================================

if($_SESSION['user_type']=="deliver"){
  $profileData = $this->deliverModel->getProfileInfo($_SESSION['user_id']);

  if($_SERVER['REQUEST_METHOD']=='POST'){

      if(isset($_POST['delete_account'])){
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        //process form
        $data = [
          'password'=>trim($_POST['current_password']),
          'name'=>$profileData->name,
          'mobile' =>$profileData->mobile,
          'address'=>$profileData->address,
          'mobile'=>$profileData->mobile,
          'city'=>$profileData->city,
          'email' => $profileData->email,
          'about' => $profileData->about,
          'prof_img' => $profileData->prof_img,
          "cover_img"=>$profileData->cover_img
        ];
  
        $row=$this->userModel->passwordCheck($_SESSION['user_id'],$data['passsword']);
        if($row){
          $delete=$this->userModel->deleteAccount($_SESSION['user_id']);
          if($delete){
            $this->userModel->logout();
            redirect('/home');
          }else{
            $data = [
              'password'=>trim($_POST['current_password']),
              'name'=>$profileData->name,
              'mobile' =>$profileData->mobile,
              'address'=>$profileData->address,
              'mobile'=>$profileData->mobile,
              'city'=>$profileData->city,
              'email' => $profileData->email,
              'about' => $profileData->about,
              'prof_img' => $profileData->prof_img,
              "cover_img"=>$profileData->cover_img
            ];
            echo "<script>
              alert('delete failed');
            </script>";
        }
      }else{
          $data=[
            'invalid_passsword'=>'No user found',
            'password'=>trim($_POST['current_password']),
            'name'=>$profileData->name,
            'mobile' =>$profileData->mobile,
            'address'=>$profileData->address,
            'mobile'=>$profileData->mobile,
            'city'=>$profileData->city,
            'email' => $profileData->email,
            'about' => $profileData->about,
            'prof_img' => $profileData->prof_img,
            "cover_img"=>$profileData->cover_img,
        ];
        }

      }else if(isset($_POST['details_submit'])){
    //sanitize POST data
    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    $data=[
      'name'=>trim($_POST['name']),
      'mobile' =>trim($_POST['mobile']),
      'address'=>trim($_POST['address']),
      'mobile'=>trim($_POST['mobile']),
      'city'=>trim($_POST['city']),
      'email' => $profileData->email,
      'about' => $profileData->about,
      "prof_img"=>$profileData->prof_img,
      "cover_img"=>$profileData->cover_img
    ];
    if($this ->deliverModel->updateProfile($data)){
      echo '<script>
      // alert("Edited");
      </script>';
      // header('city:'.URLROOT.'/Login');
    }
    else{
      die('something went wrong');
    }
  }else if(isset($_POST['about_submit'])){
    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    $data=[
      'name'=>$profileData->name,
      'mobile' =>$profileData->mobile,
      'address'=>$profileData->address,
      'mobile'=>$profileData->mobile,
      'city'=>$profileData->city,
      'email' => $profileData->email,
      'about' => trim($_POST['about']),
      "prof_img"=>$profileData->prof_img,
      "cover_img"=>$profileData->cover_img
    ];
    if($this ->deliverModel->updateAbout($data)){
      echo '<script>
      // alert("Edited");
      </script>';
      // header('city:'.URLROOT.'/Login');
    }else{
      die('something went wrong');
    }

  }else if(isset($_FILES['prof_img'])){
    

    $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    if (isset($_FILES['prof_img'])) {
      $uploadDirectory = (str_replace("\\", "/",STOREROOT)) . '/profiles/'; 
      $filename = uniqid() . '_' . $_FILES['prof_img']['name'];
      $targetPath = $uploadDirectory . $filename;
    
      if (move_uploaded_file($_FILES['prof_img']['tmp_name'], $targetPath)){
    $data=[
      'name'=>$profileData->name,
      'mobile' =>$profileData->mobile,
      'address'=>$profileData->address,
      'mobile'=>$profileData->mobile,
      'city'=>$profileData->city,
      'email' => $profileData->email,
      'about' => $profileData->about,
      'prof_img' => $filename,
      "cover_img"=>$profileData->cover_img
    ];      
    if ($this->deliverModel->updateProfileImage($data)) {
      echo '<script>
      // alert("profile image uploaded");
      </script>';
  } else {
      die('Something went wrong.');
  }
} else {
  die('Failed to move the uploaded file.');
}
}
}else if(isset($_FILES['cover_img'])){
    

$_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
if (isset($_FILES['cover_img'])) {
  $uploadDirectory = (str_replace("\\", "/",STOREROOT)) . '/covers/'; 
  $filename = uniqid() . '_' . $_FILES['cover_img']['name'];
  $targetPath = $uploadDirectory . $filename;

  if (move_uploaded_file($_FILES['cover_img']['tmp_name'], $targetPath)){

$data=[
  'name'=>$profileData->name,
  'mobile' =>$profileData->mobile,
  'address'=>$profileData->address,
  'mobile'=>$profileData->mobile,
  'city'=>$profileData->city,
  'email' => $profileData->email,
  'about' => $profileData->about,
  'prof_img' => $profileData->prof_img,
  "cover_img"=>$filename
];     
if ($this->deliverModel->updateCoverImage($data)) {
  echo '<script>
  // alert("cover image uploaded");
  </script>';
} else {
  die('Something went wrong.');
}
} else {
die('Failed to move the uploaded file.');
}
}
}else{
    $data=[
      "logged"=>(isset($_SESSION['user_id'])),
      "userid"=>$_SESSION['user_id'],
      "name"=>$profileData->name,
      "address"=>$profileData->address,
      "email"=>$profileData->email,
      "mobile"=>$profileData->mobile,
      "city"=>$profileData->city,
      "about"=>$profileData->about,
      "prof_img"=>$profileData->prof_img,
      "cover_img"=>$profileData->cover_img
      ]; 

  }
    }else{
    $data=[
        "logged"=>(isset($_SESSION['user_id'])),
        "userid"=>$_SESSION['user_id'],
        "name"=>$profileData->name,
        "address"=>$profileData->address,
        "email"=>$profileData->email,
        "mobile"=>$profileData->mobile,
        "city"=>$profileData->city,
        "about"=>$profileData->about,
        "prof_img"=>$profileData->prof_img,
        "cover_img"=>$profileData->cover_img
        ];  
    }
    
 $this->view("deliverProfile",$data); 
}



  

}
}
}

?>