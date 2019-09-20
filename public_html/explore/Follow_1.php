<?php

$follower_id = $_GET['IN_follower_id'];
$followed_id = $_GET['IN_followed_id'];


include '../dbconnect.php';

       if (mysql_query("INSERT INTO following(following_flg_user_id,following_fld_user_id) VALUES('$follower_id','$followed_id')")) {
                 if (mysql_query("INSERT INTO followed(followed_flg_user_id,followed_fld_user_id) VALUES('$follower_id','$followed_id')")) {
                     
                       $notification_desc = 'follow';
                     
                    if (mysql_query("INSERT INTO notifications(Notifier_user_id,Notified_user_id,Notification_desc,Notification_status) VALUES('$follower_id','$followed_id','$notification_desc','unchecked')")){
            
                       ?>         
        <script>
            window.open ('http://www.mypark.co.za/explore/journey.php','_self',false)
        </script>
        <?php  }
}  
}

?>
