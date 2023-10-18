<?php 
 class SellerRegister extends Controller{

   public function __construct()
   {
      $this ->sellerregisterModel = $this->model('SellerRegisterM');

   }

   public function index(){

    //we have to check if we are only load the view page or we submit the data as a registration in here. we check POST is for we have post method in our form
    if($_SERVER['REQUEST_METHOD']=='POST'){

      //sanitize POST data
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      //process form
      $data = [
        'name'=>trim($_POST['name']),
        'telNo' =>trim($_POST['telNo']),
        'Email' =>trim($_POST['Email']),
        'sellingtype'=>trim($_POST['sellingtype']),
        'addressline1'=>trim($_POST['addressline1']),
        'addressline2'=>trim($_POST['addressline2']),
        'district'=>trim($_POST['district']),
        'postalcode'=>trim($_POST['postalcode']),
        'password'=>trim($_POST['password']),
        'confirm_password'=>trim($_POST['confirm_password']),
        'name_err'=>'',
        'tellNo_err'=>'',
        'Email_err'=>'',
        'sellingtype_err'=>'',
        'addressline1_err'=>'',
        'addressline2_err'=>'',
        'district_err'=>'',
        'postalcode_err'=>'',
        'password_err'=>'',
        'confirm_password_err'=>'',
      ];
        //validate data

        if(empty($data['name'])){
         /* $data['name_err'] = 'please enter name';*/
         echo '<script>
           alert("Please Enter your Name");
           </script>';
        }

        if(empty($data['telNo'])){
          echo '<script>
           alert("Enter a mobile number");
           </script>';
        }

        if(empty($data['Email'])){
          echo '<script>
          alert("Enter a Email address");
          </script>';
        }else{
          //check email
          if($this->sellerregisterModel->findUserByEmail($data['Email'])){
            echo '<script>
           alert("Email is already taken");
           </script>';
          }
        }

        if(empty($data['sellingtype'])){
          echo '<script>
          alert("Choose a Selling type");
          </script>';
        }

        if(empty($data['addressline1'])){
          echo '<script>
           alert("address line 1 cannot be empty");
           </script>';
        }

        if(empty($data['addressline2'])){
          echo '<script>
          alert("address line 2 cannot be empty");
          </script>';
        }

        if(empty($data['district'])){
          echo '<script>
          alert("choose a district");
          </script>';
        }

        if(empty($data['postalcode'])){
          echo '<script>
           alert("Email is already taken");
           </script>';
        }
     
        if(empty($data['password'])){
          echo '<script>
          alert("Enter the password");
          </script>';
        } else if(strlen($data['password'])<6){
          echo '<script>
          alert("password must have 6 or more than 6 characters");
          </script>';
        }

        if(empty($data['confirm_password'])){
          echo '<script>
          alert("Enter the confirm password");
          </script>';
        }else{
          if($data['password']!=$data['confirm_password']){
            echo '<script>
            alert("password doesnt match");
            </script>';
        }
          }
          
          $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
          if($this ->sellerregisterModel->register($data)){
            echo '<script>
            alert("User Added succefully");
            </script>';
            header('location:'.URLROOT.'/Login');
          }
          else{
            die('something went wrong');
          }
          

          
          
       /* }else{
          //load view with errors
          $this->view('sellerRegister',$data);
        }*/
          


    }
    else{
      //load the view
      $data = [
        'name'=>'',
        'telNo' =>'',
        'Email' =>'',
        'sellingtype'=>'',
        'addressline1'=>'',
        'addressline2'=>'',
        'district'=>'',
        'postalcode'=>'',
        'password'=>'',
        'confirm_password'=>'',
       /* 'name_err'=>'',
        'mobile_number_err'=>'',
        'email_address_err'=>'',
        'type_sell_err'=>'',
        'address_line1_err'=>'',
        'address_line2_err'=>'',
        'District_err'=>'',
        'postalcode_err'=>'',
        'password_err'=>'',
        'confirm_password_err'=>'',*/
     ];
     //load view
     $this->view('sellerRegister',$data);

    }







    
      
   }


 }
?>