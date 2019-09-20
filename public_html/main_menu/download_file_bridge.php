<?php
session_start();
include '../dbconnect.php';


$status_id = $_GET['IN_status_id'];
$post_type = $_GET['IN_post_type'];


 $_SESSION['download_id'] = $status_id;
 $_SESSION['download_type'] = $post_type;


 ?>         
        <script>
            window.open ('http://www.mypark.co.za/main_menu/download_file.php','_self',false)
        </script>
        <?php
   
   
   
?>