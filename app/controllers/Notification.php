<?php 
 class Notification extends Controller{

 
   private $notifiModel;
   public function __construct()
   {

    $this->notifiModel = $this->model("Notifi");
  
   }

   public function index(){

    redirect('home');

   }

   public function notifyuser($reciever_id,$message,$link,$type='OTHER]'){
    if(isset($_SESSION['user_id'])){
      $sender_id = $_SESSION['user_id'];
      if($this->notifiModel->notifyuser($sender_id,$reciever_id,$message,$link)){
        $data = [
          'status' => 'success',
          'message' => 'Notification sent'
        ];
        echo json_encode($data);
      }else{
        $data = [
          'status' => 'error',
          'message' => 'Notification not sent'
        ];
        echo json_encode($data);
      }
    }
  }

   
public function getNotification(){

    
  if(isset($_SESSION['user_id'])){
      $notifications = $this->notifiModel->getNotification($_SESSION['user_id']);
      $data = [
        'status' => 'success',
        'data' => $notifications
      ];
      echo json_encode($data);
    }
  }

  public function markNotificationAsRead($notification_id){
    if(isset($_SESSION['user_id'])){ 
      
      if($this->notifiModel->markNotificationAsRead($notification_id)){
        $link = $this->notifiModel->getNotificationLink($notification_id);
        var_dump($link);
        if($link){
          redirect($link);
      }else{
        if(isset($_SERVER['HTTP_REFERER'])) {
          header("Location: " . $_SERVER['HTTP_REFERER']);
          exit(); 
        }
      };
    }
  }
  }  

  public function markAllNotificationAsRead(){
    if(isset($_SESSION['user_id'])){
      if($this->notifiModel->markAllNotificationAsRead($_SESSION['user_id'])){
        $data = [
          'status' => 'success',
          'message' => 'All notifications marked as read'
        ];
        echo json_encode($data);
      }else{
        $data = [
          'status' => 'error',
          'message' => 'Notifications not marked as read'
        ];
        echo json_encode($data);
      }
    }
  }
  
  
  public function getNotificationCount(){
    if(isset($_SESSION['user_id'])){
      $count = $this->notifiModel->getNotificationCount($_SESSION['user_id']);
    
        $data = [
          'status' => 'success',
          'data' => $count
        ];
        echo json_encode($data);
    

    }
  }

 }

   ?>