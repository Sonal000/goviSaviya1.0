<?php
class Notifi{
    private $db;
    public function __construct(){
        $this -> db = new Database;
    }




    public function getNotification($id){
        $this->db->query('SELECT * FROM notifications WHERE reciever_id=:id ORDER BY date_time DESC');
        $this ->db ->bind(':id',$id);

        $row = $this ->db -> resultset();
        //check row count
        if($row){
            return $row;
        } else{
            return false;
        }
    }

    public function getAdminNotification($id){
        $this->db->query('SELECT * FROM notifications_admin WHERE reciever_id=:id ORDER BY date_time DESC');
        $this ->db ->bind(':id',$id);

        $row = $this ->db -> resultset();
        //check row count
        if($row){
            return $row;
        } else{
            return false;
        }
    }

    public function markNotificationAsRead($notification_id){
        $this->db->query('UPDATE notifications SET seen = 1 WHERE notification_id=:notification_id');
        $this ->db ->bind(':notification_id',$notification_id);

        if($this ->db -> execute()){
            return true;
        } else{
            return false;
        }
    }

    public function markAdminNotificationAsRead($notification_id){
        $this->db->query('UPDATE notifications_admin SET seen = 1 WHERE notification_id=:notification_id');
        $this ->db ->bind(':notification_id',$notification_id);

        if($this ->db -> execute()){
            return true;
        } else{
            return false;
        }
    }

    public function getNotificationLink($notification_id){
        $this->db->query('SELECT link FROM notifications WHERE notification_id=:notification_id');
        $this ->db ->bind(':notification_id',$notification_id);

        $row = $this ->db -> single();
        //check row count
        if($row){
            return $row->link;
        } else{
            return false;
        }
    }
    public function getAdminNotificationLink($notification_id){
        $this->db->query('SELECT link FROM notifications_admin WHERE notification_id=:notification_id');
        $this ->db ->bind(':notification_id',$notification_id);

        $row = $this ->db -> single();
        //check row count
        if($row){
            return $row->link;
        } else{
            return false;
        }
    }

    public function getNotificationCount($id){
        $this->db->query('SELECT COUNT(*) as count FROM notifications WHERE reciever_id=:id AND seen = 0');
        $this ->db ->bind(':id',$id);

        $row = $this ->db -> single();
        //check row count
        if($row){
            return $row->count;
        } else{
            return false;
        }
    }
    public function getAdminNotificationCount($id){
        $this->db->query('SELECT COUNT(*) as count FROM notifications_admin WHERE reciever_id=:id AND seen = 0');
        $this ->db ->bind(':id',$id);

        $row = $this ->db -> single();
        //check row count
        if($row){
            return $row->count;
        } else{
            return false;
        }
    }


    public function notifyuser($sender_id,$reciever_id,$message,$link,$type){
        $this->db->query('INSERT INTO notifications (sender_id,reciever_id,message,link,type) VALUES (:sender_id,:reciever_id,:message_m,:link ,:type_n)');
        $this ->db ->bind(':sender_id',$sender_id);
        $this ->db ->bind(':reciever_id',$reciever_id);
        $this ->db ->bind(':message_m',$message);
        $this ->db ->bind(':link',$link);
        $this ->db ->bind(':type_n',$type);

        if($this ->db -> execute()){
            return true;
        } else{
            return false;
        }
    }
    public function notifyadmin($sender_id,$reciever_id,$message,$link,$type){
        $this->db->query('INSERT INTO notifications_admin (sender_id,reciever_id,message,link,type) VALUES (:sender_id,:reciever_id,:message_m,:link ,:type_n)');
        $this ->db ->bind(':sender_id',$sender_id);
        $this ->db ->bind(':reciever_id',$reciever_id);
        $this ->db ->bind(':message_m',$message);
        $this ->db ->bind(':link',$link);
        $this ->db ->bind(':type_n',$type);

        if($this ->db -> execute()){
            return true;
        } else{
            return false;
        }
    }

    public function markAllNotificationAsRead($id){
        $this->db->query('UPDATE notifications SET seen = 1 WHERE reciever_id=:id');
        $this ->db ->bind(':id',$id);

        if($this ->db -> execute()){
            return true;
        } else{
            return false;
        }
    }
    public function markAdminAllNotificationAsRead($id){
        $this->db->query('UPDATE notifications_admin SET seen = 1 WHERE reciever_id=:id');
        $this ->db ->bind(':id',$id);

        if($this ->db -> execute()){
            return true;
        } else{
            return false;
        }
    }





}
?>