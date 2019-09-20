<?php

$status_id = $_POST['IN_status_id'];
$user_id = $_POST['IN_user_id'];

include '../dbconnect.php';









                if (mysqli_query($conn,"INSERT INTO likes(Likes_type,User_id,Status_id) VALUES('like','$user_id','$status_id')")) {
            
            $db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

        $query = "SELECT * FROM status_post WHERE Status_id = '$status_id'";

        $response = $db->query($query);
$notification_desc = 'like status';

        while ($row = $response->fetch_assoc()) {
            $notified_id = $row['User_id'];
        }
            
            
            
            
            
            
           if (mysqli_query($conn,"INSERT INTO notifications(Notifier_user_id,Notified_user_id,Notification_desc,Notification_status,Status_id) VALUES('$user_id','$notified_id','$notification_desc','unchecked','$status_id')")){
           
         
           } 
               
}
    



        
$results = mysqli_query($conn,"SELECT * FROM likes WHERE likes.status_id = $status_id");

echo (mysqli_num_rows($results));
   
    
    
    
;
?>
