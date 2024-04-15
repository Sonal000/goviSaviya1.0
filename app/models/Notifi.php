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

    public function markNotificationAsRead($notification_id){
        $this->db->query('UPDATE notifications SET seen = 1 WHERE notification_id=:notification_id');
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


    public function notifyuser($sender_id,$reciever_id,$message,$link,$type="OTHER"){
        $this->db->query('INSERT INTO notifications (sender_id,reciever_id,message,link,type) VALUES (:sender_id,:reciever_id,:message,:link ,:type)');
        $this ->db ->bind(':sender_id',$sender_id);
        $this ->db ->bind(':reciever_id',$reciever_id);
        $this ->db ->bind(':message',$message);
        $this ->db ->bind(':link',$link);
        $this ->db ->bind(':type',$type);

        if($this ->db -> execute()){
            return true;
        } else{
            return false;
        }
    }





}
?>