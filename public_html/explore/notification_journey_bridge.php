<?php
session_start();
include '../dbconnect.php';



$IN_user_id = $_GET['IN_user_id'];
$notification_id = $_GET['IN_notification_id'];

 $_SESSION['more_results_clicked'] = 0;
 $_SESSION['newer_posts'] = '';
 $_SESSION['newer_posts_journey'] = '';
 $_SESSION['IN_user_id'] = $IN_user_id;

 
 
 
 
 
   

   
if (mysql_query("UPDATE notifications SET Notification_status = 'checked' WHERE Notification_id = '$notification_id';")) {
 ?>         
        <script>
            window.open ('http://www.mypark.co.za/explore/journey.php','_self',false)
        </script>
        <?php
   
}
   
?>
        






