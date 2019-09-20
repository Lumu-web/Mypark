<?php

$status_id = $_POST['IN_status_id'];
$user_id = $_POST['IN_user_id'];

include '../dbconnect.php';









        if (mysql_query("DELETE FROM likes WHERE status_id = '$status_id' AND user_id = '$user_id';")) {
             
           
}else{
   
}
    



        $results = mysql_query("SELECT * FROM likes WHERE likes.status_id = $status_id");

echo (mysql_num_rows($results));

   
    
    
    

?>
