<?php
session_start();
include '../dbconnect.php';






  $status_id = $_GET['IN_status_id'];
   $user_id = $_GET['IN_user_id'];
   $notification_id = $_GET['IN_notification_id'];
   
   $_SESSION['status_id'] = $status_id;
   $_SESSION['user_id'] = $user_id ;
   
if (mysqli_query($conn,"UPDATE notifications SET Notification_status = 'checked' WHERE Notification_id = '$notification_id';")) {
 ?>         
        <script>
            window.open ('http://www.mypark.co.za/notifications/comments2.php','_self',false)
        </script>
        <?php   
}
   
   
   
      
   
   
   
?>






