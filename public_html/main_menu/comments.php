<?php
session_start();
include '../dbconnect.php';






   $status_id = $_GET['IN_status_id'];
   $user_id = $_GET['IN_user_id'];
   
   $_SESSION['status_id'] = $status_id;
   $_SESSION['user_id'] = $user_id ;
   

 ?>         
        <script>
            window.open ('http://www.mypark.co.za/main_menu/comments2.php','_self',false)
        </script>
        <?php
   
   
   
?>






