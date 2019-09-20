<?php
session_start();
include '../dbconnect.php';



$IN_user_id = $_GET['IN_user_id'];

 $_SESSION['more_results_clicked'] = 0;
 $_SESSION['newer_posts'] = '';
 $_SESSION['newer_posts_journey'] = '';
 $_SESSION['IN_user_id'] = $IN_user_id;

 ?>         
        <script>
            window.open ('http://www.mypark.co.za/explore/journey.php','_self',false)
        </script>
        <?php
   
   
   
?>






