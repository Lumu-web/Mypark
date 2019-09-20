<?php
session_start();
include '../dbconnect.php';



$search_name = $_GET['username'];

 $_SESSION['more_results_clicked'] = 0;
 $_SESSION['newer_posts'] = '';
 $_SESSION['newer_posts_journey'] = '';
 
 //get user id

$db = new mysqli("localhost", "myparkco_my_park", "+DE[Gu^z}ctW?QnAX6", "myparkco_mypark");

$login_details = "SELECT * FROM login_user WHERE Login_name LIKE '%$search_name%'";

$response = $db->query($login_details);

while ($row = $response->fetch_assoc()) {
    $user_id = $row['User_id'];
 };

 $_SESSION['IN_user_id'] = $user_id;

 ?>         
        <script>
            window.open ('http://www.mypark.co.za/explore/journey.php','_self',false)
        </script>
        <?php
   
   
   
?>






