<?php

$status_id = $_POST['IN_status_id'];
$user_id = $_POST['IN_user_id'];

include '../dbconnect.php';









        if (mysqli_query($conn,"DELETE FROM likes WHERE status_id = '$status_id' AND user_id = '$user_id';")) {
             
           
}else{
   
}
    



        $results = mysqli_query($conn,"SELECT * FROM likes WHERE likes.status_id = $status_id");

echo (mysqli_num_rows($results));

   
    
    
    

?>
