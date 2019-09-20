<?php
session_start();
include '../../dbconnect.php';



$hashtag = $_GET['hashtag'];

 $_SESSION['more_results_clicked'] = 0;
 $_SESSION['newer_posts'] = '';
 $_SESSION['newer_posts_journey'] = '';
 
 $_SESSION['hashtag_keyword'] = $hashtag;
   

 ?>         
        <script>
            window.open ('http://www.mypark.co.za/main_menu/hashtag.php','_self',false)
        </script>
        <?php
   
   
   
?>






