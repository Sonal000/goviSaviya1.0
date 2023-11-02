<?php
  class AdminProfile extends Controller{

    private $adminModel;
    
    

   public function __construct(){

      if(!isset($_SESSION['admin_ID'])){
        redirect('/home');
      }

    $this->adminModel =$this->model('Admin');
    

   }

 public function index($id){



if($id==null || ($_SESSION['user_id']!=$id)  ){
$this->view("_404");

}else{


// ================================================================================
// ==================for seller ====================================================
// ================================================================================


if($_SESSION['user_type']=="admin"){
$profileData = $this->adminModel->getProfileInfo($_SESSION['user_id']);

if($_SERVER['REQUEST_METHOD']=='POST'){

  if(isset($_POST['details_submit'])){
  //sanitize POST data
  $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
  $data=[
    'name'=>trim($_POST['name']),
    /*'mobile' =>trim($_POST['mobile']),
    'address'=>trim($_POST['address']),
    'mobile'=>trim($_POST['mobile']),
    'city'=>trim($_POST['city']),*/
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
    /*'mobile' =>$profileData->mobile,
    'address'=>$profileData->address,
    'mobile'=>$profileData->mobile,
    'city'=>$profileData->city,*/
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
    /*'mobile' =>$profileData->mobile,
    'address'=>$profileData->address,
    'mobile'=>$profileData->mobile,
    'city'=>$profileData->city,*/
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
    "cover_img"=>$profileData->cover_imgs
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
$this->view("adminProfile",$data); 
}



  








}
}

}